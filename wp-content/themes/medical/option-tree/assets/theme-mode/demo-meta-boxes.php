<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $why_us_meta_box = array(
    'id'          => 'why_us_meta_box',
    'title'       => __( 'Why us meta box', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'why-us-items' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(


      array(
        'label'       => __( 'Icon', 'theme-text-domain' ),
        'id'          => 'icon',
        'desc'        => __( '<b><-----   Please select an icon', 'theme-text-domain' ),
        'type'        => 'select',
        'choices'     => array(
                            array(
                              'value'       => '',
                              'label'       => '-- Choose One --'
                            ),
                            array(
                              'value'       => 'database',
                              'label'       => 'Database'
                            ),
                            array(
                              'value'       => 'codepen',
                              'label'       => 'Codepen'
                            ),
                            array(
                              'value'       => 'life-saver',
                              'label'       => 'Life Saver'
                            ),
                             array(
                              'value'       => 'home',
                              'label'       => 'Home'
                            ),
                             array(
                              'value'       => 'heart',
                              'label'       => 'Heart'
                            ),
                             array(
                              'value'       => 'child',
                              'label'       => 'Child'
                            ),
                             array(
                              'value'       => 'bolt',
                              'label'       => 'Bolt'
                            ),
                             array(
                              'value'       => 'user',
                              'label'       => 'User'
                            ),
                             array(
                              'value'       => 'clock',
                              'label'       => 'Clock'
                            ),
                             array(
                              'value'       => 'globe',
                              'label'       => 'Globe'
                            )

                          )

      ),






      array(
        'label'       => __( 'Icon Color', 'theme-text-domain' ),
        'id'          => 'iconColor',
        'desc'        => __( '<b>Please choose a color</b>', 'theme-text-domain' ),
        'std'         => '#0392EF',
        'type'        => 'colorpicker',
        
      )


      


    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $why_us_meta_box );

}