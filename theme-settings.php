<?php

function fiveseeds_settings($saved_settings, $subtheme_defaults = array()) {

  // Get the default values from the .info file.
  $defaults = fiveseeds_theme_get_default_settings('fiveseeds');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API
   */
  
  $form = array();
   
  $form['javascript_libraries'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Activate JavaScript Libraries'),
    '#attributes'    => array('id' => 'fiveseeds-js-libraries'),
  );
  $form['javascript_libraries']['fiveseeds_modernizr'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include Modernizr'),
    '#default_value' => $settings['fiveseeds_modernizr'],
    '#description'   => t('Include a reference the the Modernizr JS library. (!url) <br />
                           Requires manual download. Place in /sites/all/themes/fiveseeds/js/ directory.',  array('!url' => l('Modernizr', 'http://www.modernizr.com'))),
    '#prefix'        => '<strong>' . t('Modernizr') . ':</strong>',
  );
  
  $form['mobile_viewport'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Meta tags for mobile devices'),
    '#attributes'    => array('id' => 'fiveseeds-mobile-view-port'),
  );
  $form['mobile_viewport']['fiveseeds_use_mobile_viewport'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use a mobile viewport meta tag'),
    '#default_value' => $settings['fiveseeds_use_mobile_viewport'],
    '#prefix'        => '<strong>' . t('Mobile Viewport Fix') . ':</strong>',
  );
  $form['mobile_viewport']['fiveseeds_mobile_viewport'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Mobile viewport meta tag value'),
    '#default_value' => $settings['fiveseeds_mobile_viewport'],
    '#description'   => t('device-width : Occupy full width of the screen in its current orientation<br/>
                          initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height<br/>
                          maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width<br/>
                          suggested default: width=device-width; initial-scale=1.0; maximum-scale=1.0;<br/>
                          <a href="j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag">More info</a>
                          '),
  );
  $form['fiveseeds_include_chrome_frame'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include Chrome Frame for IE users with Chrome Frame installed'),
    '#default_value' => $settings['fiveseeds_include_chrome_frame'],
    '#description'   => t('Include a meta tag to initialize Chrome Frame. Only affects IE users who already have Chrome Frame installed.'),
    '#prefix'        => '<strong>' . t('Chrome Frame') . ':</strong>',
  );

  $form['fiveseeds_zen_tabs'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use Zen Tabs'),
    '#default_value' => $settings['fiveseeds_zen_tabs'],
    '#description'   => t('Replace the default tabs by the Zen Tabs.'),
    '#prefix'        => '<strong>' . t('Zen Tabs') . ':</strong>',
  );

  $form['fiveseeds_breadcrumb'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
    '#attributes'    => array('id' => 'fiveseeds-breadcrumb'),
  );
  $form['fiveseeds_breadcrumb']['fiveseeds_breadcrumb'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => $settings['fiveseeds_breadcrumb'],
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
  $form['fiveseeds_breadcrumb']['fiveseeds_breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => $settings['fiveseeds_breadcrumb_separator'],
    '#size'          => 5,
    '#maxlength'     => 10,
    '#prefix'        => '<div id="div-fiveseeds-breadcrumb-collapse">', // jquery hook to show/hide optional widgets
  );
  $form['fiveseeds_breadcrumb']['fiveseeds_breadcrumb_home'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show home page link in breadcrumb'),
    '#default_value' => $settings['fiveseeds_breadcrumb_home'],
  );
  $form['fiveseeds_breadcrumb']['fiveseeds_breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => $settings['fiveseeds_breadcrumb_trailing'],
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
  );
  $form['fiveseeds_breadcrumb']['fiveseeds_breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => $settings['fiveseeds_breadcrumb_title'],
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
    '#suffix'        => '</div>', // #div-zen-breadcrumb
  );

  $form['fiveseeds_wireframe'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Display borders around main layout elements'),
    '#default_value' => $settings['fiveseeds_wireframe'],
    '#description'   => t('<a href="!link">Wireframes</a> are useful when prototyping a website.', array('!link' => 'http://www.boxesandarrows.com/view/html_wireframes_and_prototypes_all_gain_and_no_pain')),
    '#prefix'        => '<strong>' . t('Wireframes') . ':</strong>',
  );

  $form['fiveseeds_block_editing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show block editing on hover'),
    '#description'   => t('When hovering over a block, privileged users will see block editing links.'),
    '#default_value' => $settings['fiveseeds_block_editing'],
    '#prefix'        => '<strong>' . t('Block Edit Links') . ':</strong>',
  );

  $form['themedev']['fiveseeds_rebuild_registry'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Rebuild theme registry on every page.'),
    '#default_value' => $settings['fiveseeds_rebuild_registry'],
    '#description'   => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING: this is a huge performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
    '#prefix'        => '<div id="div-fiveseeds-registry"><strong>' . t('Theme registry') . ':</strong>',
    '#suffix'        => '</div>',
  );

  // Return the form
  return $form;
}


function _fiveseeds_theme(&$existing, $type, $theme, $path) {
  // Each theme has two possible preprocess functions that can act on a hook.
  // This function applies to every hook.
  $functions[0] = $theme . '_preprocess';
  // Inspect the preprocess functions for every hook in the theme registry.
  // @TODO: When PHP 5 becomes required (Zen 7.x), use the following faster
  // implementation: foreach ($existing AS $hook => &$value) {}
  foreach (array_keys($existing) AS $hook) {
    // Each theme has two possible preprocess functions that can act on a hook.
    // This function only applies to this hook.
    $functions[1] = $theme . '_preprocess_' . $hook;
    foreach ($functions AS $key => $function) {
      // Add any functions that are not already in the registry.
      if (function_exists($function) && !in_array($function, $existing[$hook]['preprocess functions'])) {
        // We add the preprocess function to the end of the existing list.
        $existing[$hook]['preprocess functions'][] = $function;
      }
    }
  }

  // Since we are rebuilding the theme registry and the theme settings' default
  // values may have changed, make sure they are saved in the database properly.
  fiveseeds_theme_get_default_settings($theme);

  // If we are auto-rebuilding the theme registry, warn about feature.
  if (theme_get_setting('fiveseeds_rebuild_registry')) {
    drupal_set_message(t('The theme registry has been rebuilt. <a href="!link">Turn off</a> this feature on production websites.', array('!link' => base_path() . 'admin/build/themes/settings/' . $GLOBALS['theme'])), 'warning');
  }

  // Since we modify the $existing cache directly, return nothing.
  return array();
}


function fiveseeds_theme_get_default_settings($theme) {
  $themes = list_themes();

  // Get the default values from the .info file.
  $defaults = !empty($themes[$theme]->info['settings']) ? $themes[$theme]->info['settings'] : array();

  if (!empty($defaults)) {
    // Get the theme settings saved in the database.
    $settings = theme_get_settings($theme);
    // Don't save the toggle_node_info_ variables.
    if (module_exists('node')) {
      foreach (node_get_types() as $type => $name) {
        unset($settings['toggle_node_info_' . $type]);
      }
    }
    // Save default theme settings.
    variable_set(
      str_replace('/', '_', 'theme_' . $theme . '_settings'),
      array_merge($defaults, $settings)
    );
    // If the active theme has been loaded, force refresh of Drupal internals.
    if (!empty($GLOBALS['theme_key'])) {
      theme_get_setting('', TRUE);
    }
  }

  // Return the default settings.
  return $defaults;
}
