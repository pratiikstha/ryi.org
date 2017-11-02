<?php
// $Id: stream.admin.inc,v 1.1.4.3.2.1 2010/06/23 07:55:43 prajwala Exp $

/**
 * @file
 * administrator form for facebook stream module
 *
 * Display the Facebook stream Settings form 
 * Configure comments, posts and status messages to publish on the facebook wall
 */
function facebook_stream_settings_form() {
  //Display textfields when first option is selected
  $form['facebook_stream_facebook_api_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Application API ID'),
    '#prefix' => '<div id="facebook_stream_admin_wrapper">',
    '#default_value' => variable_get('facebook_stream_facebook_api_id', NULL),
  );
  $form['facebook_stream_facebook_secret_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Application Secret Key'),
    '#suffix' => '</div>',
    '#default_value' => variable_get('facebook_stream_facebook_secret_key', NULL),
  );

  $form['stream_post_comments'] = array(
    '#type' => 'checkbox',
    '#title' => t('Allow users to post comments'),
    '#default_value' => variable_get('stream_post_comments', 0),
    '#prefix' => "<b>". t('Set the options to post comments, likes and Status messages on the user wall of facebook') ."</b>",
  );
  $form['stream_post_likes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Allow users to post Likes'),
    '#default_value' => variable_get('stream_post_likes', 0),
  );
  $form['stream_post_status'] = array(
    '#type' => 'checkbox',
    '#title' => t('Allow users to post Status messages'),
    '#default_value' => variable_get('stream_post_status', 0),
  );

  return system_settings_form($form);
}

