<?php
/*
Plugin Name: Shortcode: lead
Description: The [lead] shortcode.
Author: Adam Fairhead
Author URI: http://fairheadcreative.com
Copyright: Fairhead Creative
*/

// Add Shortcodes to Widgets
  
  add_filter('widget_text', 'do_shortcode');
  
  
// lead Shortcode
  
  add_shortcode('lead', 'sc_lead');

  function sc_lead( $atts, $content = null ) {
    return '<p class="lead">'.$content.'</p>'; // then display it
  }
  
  
  
// Add lead Shortcode button
  
  // Hook into WP
  add_action('init', 'sc_lead_add_button');
  
  // Initialization function
  function sc_lead_add_button() {
     if ( current_user_can('edit_posts') && current_user_can('edit_pages') )
     {  
       add_filter('mce_external_plugins', 'sc_lead_add_plugin');
       add_filter('mce_buttons', 'sc_lead_register_button');
     }  
  }
  
  // Register button
  function sc_lead_register_button($buttons) {
     array_push($buttons, "lead");
     return $buttons;
  }
  
  // Register TinyMCE plugin
  function sc_lead_add_plugin($plugin_array) {
     $plugin_array['lead'] = plugins_url('sc_lead.js', __FILE__);
     return $plugin_array;
  }
  
?>