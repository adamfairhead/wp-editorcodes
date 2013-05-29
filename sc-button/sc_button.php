<?php
/*
Plugin Name: Shortcode: button
Description: The [button] shortcode.
Author: Adam Fairhead
Author URI: http://fairheadcreative.com
Copyright: Fairhead Creative
*/

// Add Shortcodes to Widgets
  
  add_filter('widget_text', 'do_shortcode');
  
  
// button Shortcode
  
  add_shortcode('button', 'sc_button');

  function sc_button( $atts, $content = null ) {
    
    extract(shortcode_atts(array( // Add attributes
        "url" => 'Address'  
    ), $atts)); // then add the wrapped content
    
    return '<a class="button rounded" href="'.$url.'">'.$content.'</a>'; // then display it
  }
  
  
  
// Add button Shortcode button
  
  // Hook into WP
  add_action('init', 'sc_button_add_button');
  
  // Initialization function
  function sc_button_add_button() {
     if ( current_user_can('edit_posts') && current_user_can('edit_pages') )
     {  
       add_filter('mce_external_plugins', 'sc_button_add_plugin');
       add_filter('mce_buttons', 'sc_button_register_button');
     }  
  }
  
  // Register button
  function sc_button_register_button($buttons) {
     array_push($buttons, "button");
     return $buttons;
  }
  
  // Register TinyMCE plugin
  function sc_button_add_plugin($plugin_array) {
     $plugin_array['button'] = plugins_url('sc_button.js', __FILE__);
     return $plugin_array;
  }
  
?>