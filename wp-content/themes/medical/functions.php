<?php

/* using walker method 1 */

add_action( 'after_setup_theme', 'bootstrap_setup' );
 
if ( ! function_exists( 'bootstrap_setup' ) ):
 
    function bootstrap_setup(){
 
        add_action( 'init', 'register_menu' );
            
        function register_menu(){
            register_nav_menu( 'primary', 'Bootstrap Top Menu' ); 
            register_nav_menu( 'secondary', 'Bootstrap Bottom Menu' ); 
        }
 
        class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
 
            
            function start_lvl( &$output, $depth ) {
 
                $indent = str_repeat( "\t", $depth );

                //apply class to child ul
                $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";
                
            }
 
            function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
                $li_attributes = '';
                $class_names = $value = '';
 
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;

                //apply class to parent li
                $classes[] = ($args->has_children) ? 'dropdown' : '';
                $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
                $classes[] = 'menu-item-' . $item->ID;
 
 
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
                $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
 
                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                //apply class to parent a 
                $attributes .= ($args->has_children)        ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
 
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

                //apply icon after parent a
                $item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
                $item_output .= $args->after;
 
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
 
            function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
                
                if ( !$element )
                    return;
                
                $id_field = $this->db_fields['id'];
 
                //display this element
                if ( is_array( $args[0] ) ) 
                    $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
                else if ( is_object( $args[0] ) ) 
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'start_el'), $cb_args);
 
                $id = $element->$id_field;
 
                // descend only when the depth is right and there are childrens for this element
                if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
 
                    foreach( $children_elements[ $id ] as $child ){
 
                        if ( !isset($newlevel) ) {
                            $newlevel = true;
                            //start the child delimiter
                            $cb_args = array_merge( array(&$output, $depth), $args);
                            call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                        }
                        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                    }
                        unset( $children_elements[ $id ] );
                }
 
                if ( isset($newlevel) && $newlevel ){
                    //end the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
                }
 
                //end this element
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'end_el'), $cb_args);
                
            }
            
        }
 
    }
 
endif;


/* using walker method 2 
//this class is used to add class to menu element, this method needs jquery to add "open" class on hover/click element

class My_Custom_Nav_Walker extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_html = '';
       parent::start_el($item_html, $item, $depth, $args);

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
           $item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
       }

       $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


*/

/* without walker

if ( ! function_exists( 'medical_setup' ) ):

function medical_setup() {
 

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'medical' ),
    ) );
}
endif; // medical_setup
add_action( 'after_setup_theme', 'medical_setup' );

*/





function medical_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    wp_enqueue_script('jquery');
 
    
 
    
}
add_action( 'wp_enqueue_scripts', 'medical_scripts' );



function custom_post(){

    register_post_type('slider-items',
        array(
             'labels' => array(

                           'name' => __('Sliders'),
                           'singular_name' => __('Slider'),
                           'add_new_item' => __('Add New Slider')

                ),

             'public' => true,
             'menu_icon' => '',
             'supports' => array('thumbnail', 'title', 'editor', 'custom-fields'),
             'has_archive' => true,
             'rewrite' => array('slug' => 'slider-item')

            )
        );


    register_post_type('department-items',
        array(
             'labels' => array(

                           'name' => __('Departments'),
                           'singular_name' => __('Department'),
                           'add_new_item' => __('Add New Department')

                ),

             'public' => true,
             'menu_icon' => '',
             'supports' => array('thumbnail', 'title', 'editor', 'custom-fields'),
             'has_archive' => true,
             'rewrite' => array('slug' => 'department-item')

            )
        );

    register_post_type('specialist-items',
        array(
             'labels' => array(

                           'name' => __('Specialists'),
                           'singular_name' => __('Specialist'),
                           'add_new_item' => __('Add New Specialist')

                ),

             'public' => true,
             'menu_icon' => '',
             'supports' => array('thumbnail', 'title', 'editor', 'custom-fields'),

             'has_archive' => true,
             'rewrite' => array('slug' => 'specialist-item')

            )
        );

    register_post_type('why-us-items',
        array(
             'labels' => array(

                           'name' => __('Why us items'),
                           'singular_name' => __('Why us item'),
                           'add_new_item' => __('Add New Why us item')

                ),

             'public' => true,
             'menu_icon' => '',
             'supports' => array('title', 'editor','excerpt'), //we will use meta boxes instead of custom fields, we will use option tree for meta boxes support, meta boxes are more user friendly.
             'has_archive' => true,
             'rewrite' => array('slug' => 'why-us-item')

            )
        );

}


add_action('init', 'custom_post');





add_image_size('slider-larger', 1900, 650); 

add_image_size('department-smaller', 118, 101); 

add_image_size('specialist-medium', 230, 300); 

add_image_size('welcome-thumb', 457, 287); 

add_image_size('welcome-large', 700, 500, true);





add_theme_support('post-thumbnails', array('page','post', 'slider-items', 'department-items', 'specialist-items'));



/*

//code to remove width, height attributes from image which wordpress automatically attaches , which prevent responsiveness of
//the images , simple solution is to use this code or just use height and width as auto using css

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
*/


function medical_widget_area(){
    register_sidebar(
           array(
              'name' => 'Welcome_text',
              'id' =>'welcome_text',
              'description' => 'Simple widget for welcome text',
              'before_widget' => '<article class="col-sm-7">',
              'after_widget' => '</article>',
              'before_title' => '<h4 class="text-title">',
              'after_title' => '</h4>'
            )
        );

    register_sidebar(
           array(
              'name' => 'Welcome_video',
              'id' =>'welcome_video',
              'description' => 'Simple widget for welcome text',
              'before_widget' => '<div class="col-sm-5 video-placeholder">',
              'after_widget' => '</div>',
              'before_title' => '',
              'after_title' => ''
            )
        );
}

add_action('widgets_init', 'medical_widget_area');



/* option tree */
 
//add_filter( 'ot_show_pages', '__return_false' );
 
add_filter( 'ot_theme_mode', '__return_true' );

add_filter( 'ot_show_new_layout', '__return_false' );

include_once( 'option-tree/ot-loader.php' );

include_once( 'option-tree/assets/theme-mode/demo-theme-options.php' );

include_once( 'option-tree/assets/theme-mode/demo-meta-boxes.php' );




//how to add category support in custom post

function themes_taxonomy() {
  register_taxonomy(
    'themes_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'themes',        //post type name
    array(
      'hierarchical'    => true,
      'label'       => 'Themes store',  //Display name
      'query_var'     => true,
      'rewrite'     => array(
          'slug'      => 'themes', // This controls the base slug that will display before each term
          'with_front'  => false // Don't display the category base before
          )
      )
    );
}
add_action( 'init', 'themes_taxonomy');

/**
 * Maintain the permalink structure for custom taxonomy
 * Display custom taxonomy term name before post related to that term
 * @uses post_type_filter hook
 */
function filter_post_type_link( $link, $post) {
    if ( $post->post_type != 'themes' )
        return $link;

    if ( $cats = get_the_terms( $post->ID, 'themes_categories' ) )
        $link = str_replace( '%themes_categories%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

//Registering Custom Post Type Themes
add_action( 'init', 'register_themepost', 20 );
function register_themepost() {
    $labels = array(
    'name' => _x( 'Themes', 'catchthemes_custom_post','catchthemes' ),
    'singular_name' => _x( 'Theme', 'catchthemes_custom_post', 'catchthemes' ),
    'add_new' => _x( 'Add New', 'catchthemes_custom_post', 'catchthemes' ),
    'add_new_item' => _x( 'Add New ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
    'edit_item' => _x( 'Edit ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
    'new_item' => _x( 'New ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
    'view_item' => _x( 'View ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
    'search_items' => _x( 'Search ThemePosts', 'catchthemes_custom_post', 'catchthemes' ),
    'not_found' => _x( 'No ThemePosts found', 'catchthemes_custom_post', 'catchthemes' ),
    'not_found_in_trash' => _x( 'No ThemePosts found in Trash', 'catchthemes_custom_post', 'catchthemes' ),
    'parent_item_colon' => _x( 'Parent ThemePost:', 'catchthemes_custom_post', 'catchthemes' ),
    'menu_name' => _x( 'Themes Posts', 'catchthemes_custom_post', 'catchthemes' ),
    );

    $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'Custom Theme Posts',
    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
    'taxonomies' => array( 'post_tag','themes_categories'),
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => '',
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => array('slug' => 'themes/%themes_categories%','with_front' => FALSE),
    'public' => true,
    'has_archive' => 'themes',
    'capability_type' => 'post'
    );
  register_post_type( 'themes', $args );//max 20 charachter cannot contain capital letters and spaces
}
?><?php
 
 // adding custom menu icon for custom post themes.
/*
step1: set menu-icon: '', in register_post_type
step2: go to http://melchoyce.github.io/dashicons/  then an icon then copy css code into admin_head related function

 */

function add_menu_icons_styles(){
?><style>
#adminmenu .menu-icon-themes div.wp-menu-image:before {
  content: "\f319";
}
#adminmenu .menu-icon-why-us-items div.wp-menu-image:before {
  content: "\f328";
}
#adminmenu .menu-icon-specialist-items div.wp-menu-image:before {
  content: "\f115";
}
#adminmenu .menu-icon-department-items div.wp-menu-image:before {
  content: "\f233";
}
#adminmenu .menu-icon-slider-items div.wp-menu-image:before {
  content: "\f177";
}
</style>
 <?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );



//shortcode

function test($atts, $content=null){

   $a = shortcode_atts(
           array(
            'key'=>1,
            'value' =>'name'

            ),$atts );


     echo $content," key is {$a['key']} and value is {$a['value']}";
  
}

add_shortcode('t', 'test');

