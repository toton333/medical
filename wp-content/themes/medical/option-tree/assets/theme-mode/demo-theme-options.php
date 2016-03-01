<?php

add_action( 'admin_init', 'custom_theme_options' );

function custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => __( 'General', 'theme-text-domain' )
      )
    ),

    
    'settings'        => array( 
      array(
        'id'          => 'welcome',
        'label'       => __( 'Welcome Text', 'theme-text-domain' ),
        'desc'        => __('Enter your custom Welcome Text here.'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
}