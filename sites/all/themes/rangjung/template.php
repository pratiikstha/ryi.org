<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function rangjung_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  rangjung_preprocess_html($variables, $hook);
  rangjung_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function rangjung_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function rangjung_preprocess_page(&$vars, $hook) {
  // $variables['sample_variable'] = t('Lorem ipsum.');

  // To add page.tpl.php depending on content type.
  // If the content type is "event" the template suggestion will be "page--event.tpl.php".
  if (isset($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
  }

  if (isset($vars['page']['content']['system_main']['default_message'])) {
       unset($vars['page']['content']['system_main']['default_message']);
       drupal_set_title('');
  }

  drupal_add_js(libraries_get_path('match-height') . '/jquery.matchHeight-min.js');
  drupal_add_js(libraries_get_path('cycle') . '/jquery.cycle2.min.js');

  if ($vars['is_front']) {
    unset($vars['page']['content']['system_main']);
  }

  $vars['course_code'] = '';
  if (isset($vars['node']) && $vars['node']->type == 'course') {
    $vars['course_code'] = $vars['node']->field_course_code['und'][0]['value'];
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function rangjung_preprocess_node(&$vars, $hook) {
  //$vars['sample_variable'] = t('Lorem ipsum.');
  // Optionally, run node-type-specific preprocess functions, like
  // rangjung_preprocess_node_page() or rangjung_preprocess_node_story().

  $function = __FUNCTION__ . '_' . $vars['node']->type;
  if (function_exists($function)) {
    $function($vars, $hook);
  }

  $vars['course_code'] = '';
  if (isset($vars['node']) && $vars['node']->type == 'course') {
    $vars['course_code'] = $vars['node']->field_course_code['und'][0]['value'];
  }
}


/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function rangjung_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function rangjung_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function rangjung_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

function rangjung_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'webform_client_form_204') {
    $form['address'] = $form['submitted']['address'];
    unset($form['submitted']['address']);
    $form['address']['#weight'] = 1001;
    $form['actions']['submit']['#attributes'] = array('class' => array('btn'));
  }
}