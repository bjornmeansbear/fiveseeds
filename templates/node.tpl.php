<article class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <header>
    <?php if (!$page): ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $picture; ?>

    <?php if ($submitted): ?>
      <small class="submitted"><?php print $submitted; ?></small>
    <?php endif; ?>
        
  </header>
  
    <div class="content">
      <?php print $content; ?>
    </div>
 
  <?php if (($terms) || $links): ?>
    <footer>
      <?php if ($terms): ?>
        <nav class="taxonomy"><?php print $terms; ?></nav>
      <?php endif;?>
      <?php if ($links): ?> 
        <nav class="links"> <?php print $links; ?></nav>
      <?php endif; ?>
    </footer>
  <?php endif; ?>
  
</article> <!-- /node-->