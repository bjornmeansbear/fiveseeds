<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" <?php print $modernizr_head; ?>>

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>    
  <!-- www.phpied.com/conditional-comments-block-downloads/ -->
  <!--[if IE]><![endif]-->  
  <?php // Add HTML5 shiv if Modernizr is not included 
  if (!theme_get_setting('fiveseeds_modernizr')): ?>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <?php endif; ?>
</head>

  <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->

  <!--[if lt IE 7 ]> <body class="ie6 <?php print $body_classes; ?>"> <![endif]-->
  <!--[if IE 7 ]>    <body class="ie7 <?php print $body_classes; ?>"> <![endif]-->
  <!--[if IE 8 ]>    <body class="ie8 <?php print $body_classes; ?>"> <![endif]-->
  <!--[if IE 9 ]>    <body class="ie9 <?php print $body_classes; ?>"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!-->
<body class="<?php print $body_classes; ?>"> <!--<![endif]-->
  
  <div id="skip">
    <a href="#content"><?php print t('Skip to Content'); ?></a>
    <a href="#navigation"><?php print t('Skip to Navigation'); ?></a>
  </div>  
    
  <div id="page">

  <!-- ______________________ HEADER _______________________ -->

    <header role="banner">
    	<div class='inner'>
        <hgroup id="logo-title">
  	
          <?php if (!empty($logo)): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
            </a>
          <?php endif; ?>
  
          <div id="name-and-slogan">
            <?php if (!empty($site_name)): ?>
              <h1 id="site-name">
                <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
            <?php if (!empty($site_slogan)): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div> <!-- /name-and-slogan -->
  
        </hgroup> <!-- /logo-title -->
  
        <?php if ($header): ?>
          <div id="header-region">
            <?php print $header; ?>
          </div>
        <?php endif; ?>
  
    	</div>
    </header>

    <!-- ______________________ MAIN _______________________ -->

    <section id="main" class="clearfix">
    
      <section id="content">
        <div id="content-inner" class="inner column center">

          <?php if ($content_top): ?>
            <section id="content-top">
              <?php print $content_top; ?>
            </section> <!-- /#content-top -->
          <?php endif; ?>

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <header id="content-header">

              <?php if ($title): ?>
                <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>

              <?php print $messages; ?>

              <?php print $help; ?> 

              <?php if ($tabs): ?>
                <nav class="tabs" role="menu"><?php print $tabs; ?></nav>
              <?php endif; ?>

            </header> <!-- /#content-header -->
          <?php endif; ?>

          <section id="content-area" role="main">
            <?php print $content; ?>
          </section> <!-- /#content-area -->

          <?php if ($content_bottom): ?>
            <section id="content-bottom">
              <?php print $content_bottom; ?>
            </section><!-- /#content-bottom -->
          <?php endif; ?>

          </div>
        </section> <!-- /content-inner /content -->

        <?php if ($sidebar_first): ?>
          <aside id="sidebar-first" class="column sidebar first">
            <?php print $sidebar_first; ?>
          </aside>
        <?php endif; ?> <!-- /sidebar-first -->

        <?php if ($sidebar_second): ?>
          <aside id="sidebar-second" class="column sidebar second">
              <?php print $sidebar_second; ?>
          </aside>
        <?php endif; ?> <!-- /sidebar-second -->

      </section> <!-- /main -->

      <?php if (!empty($primary_links)): ?>
        <nav id="navigation" class="menu">
    			<?php if (is_array($primary_links)) : ?>
    			<ul id="dropdown">
    			<?php foreach ($primary_links as $link): ?>
    			<li class="list-item <?php print $link['title']; ?>"><?php        
    			        $href = $link['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($link['href']);
    			        print "<a href='" . $href . "'>" . $link['title'] . "</a>";            
    			        ?></li>
    			<?php endforeach; ?>
    			</ul>
    			<?php endif; ?>
        </nav>
      <?php endif; ?>

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_region)): ?>
        <footer>
          <?php print $footer_message; ?>
          <?php print $footer_region; ?>
        </footer>
      <?php endif; ?>

    </div> <!-- /page -->
    
    <div id="rotate">
      <?php
        $view = views_get_view('backgrounds');
        $display = $view->execute_display('block_1');
        print $display['content']
      ?>
    </div>

  <!-- Toggle Sections Open/Closed -->
  <script>
    $(document).ready(function() {
       $('div.toggle > p').hide();
       $('div.toggle > form').hide();
     });
   
    $("div#csa.toggle h3").click(function () {
      $("div#csa.toggle > p").toggle("slow");
      $("div#csa.toggle > form").toggle("slow");
      $("div#fs.toggle > p").hide("slow");
      $("div#fs.toggle > form").hide("slow");
      });    
    $("div#fs.toggle h3").click(function () {
      $("div#fs.toggle > p").toggle("slow");
      $("div#fs.toggle > form").toggle("slow");
      $("div#csa.toggle > p").hide("slow");
      $("div#csa.toggle > form").hide("slow");
      });    
  </script>


    <?php print $closure; ?>
  </body>
</html>
