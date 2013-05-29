<?php
/*
Plugin Name: Shortcode: hr
Description: The [hr] shortcode.
Author: Adam Fairhead
Author URI: http://fairheadcreative.com
Copyright: Fairhead Creative
*/

// Add Shortcodes to Widgets
  
  add_filter('widget_text', 'do_shortcode');
  
  
// hr Shortcode
  
  add_shortcode('line', 'sc_hr');

  function sc_hr( $atts, $content = null ) {
    
    extract(shortcode_atts(array( // Add attributes
        // No Attributes!
    ), $atts)); // then add the wrapped content
    
    return '<hr>'; // then display it
  }
  
  
  
// Add hr Shortcode button
  
  // Hook into WP
  add_action('init', 'sc_hr_add_button');
  
  // Initialization function
  function sc_hr_add_button() {
     if ( current_user_can('edit_posts') && current_user_can('edit_pages') )
     {  
       add_filter('mce_external_plugins', 'sc_hr_add_plugin');
       add_filter('mce_buttons', 'sc_hr_register_button');
     }  
  }
  
  // Register button
  function sc_hr_register_button($buttons) {
     array_push($buttons, "hr");
     return $buttons;
  }
  
  // Register TinyMCE plugin
  function sc_hr_add_plugin($plugin_array) {
     $plugin_array['hr'] = plugins_url('sc_hr.js', __FILE__);
     return $plugin_array;
  }
  
?>