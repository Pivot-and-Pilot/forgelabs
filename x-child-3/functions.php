<?php
// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================
// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================
// Enqueue Parent Stylesheet
// =============================================================================
add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );
// Additional Functions
// =============================================================================
function x_child_enqueue_child_stylesheet(){
  wp_enqueue_style( 'x-style-original', get_stylesheet_directory_uri() . '/style.css' );
    if(is_page('request-new-quote')){
        wp_enqueue_style( 'x-style-overrides', get_stylesheet_directory_uri() . '/style-overrides.css' );

        wp_enqueue_style( 'x-style-technology', get_stylesheet_directory_uri() . '/style-technology.css' );
        wp_enqueue_script( 'x-child-forgelabs-materials-about', get_stylesheet_directory_uri() . '/inc/materials-about.js');
        wp_enqueue_script( 'x-child-forgelabs-materials-data', get_stylesheet_directory_uri() . '/inc/materials-data.js');        

        wp_enqueue_style( 'x-style-uploads', get_stylesheet_directory_uri() . '/upload.css' );
        wp_enqueue_script( 'x-child-forgelabs-upload', get_stylesheet_directory_uri() . '/inc/upload.js', array('jquery'), true );

    

        wp_enqueue_script( 'x-child-forgelabs-tab', get_stylesheet_directory_uri() . '/inc/class-Tab.js', array(), '', true );
        wp_enqueue_script( 'x-child-forgelabs-form-controller', get_stylesheet_directory_uri() . '/inc/class-FormController.js', array('jquery', 'x-child-forgelabs-tab'), '', true );
//         // wp_enqueue_script( 'x-child-forgelabs-form', get_stylesheet_directory_uri() . '/index.js', array('jquery', 'x-child-forgelabs-tab'), '', true );

        // page 5 css and js
        wp_enqueue_script( 'page5-js', get_stylesheet_directory_uri() . '/inc/page5.js', array('jquery', 'x-child-forgelabs-tab'), '', true );
        wp_enqueue_style( 'page5-css', get_stylesheet_directory_uri() . '/page5.css' );

    }


    // Enqueue Font Awesome for menu icons always
    wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/affc2627e0.js', array(),'4.7.0');
}
add_action('wp_enqueue_scripts', 'x_child_enqueue_child_stylesheet');

function my_mime_types($mime_types){
    $mime_types['stl'] = 'application/sla';
    $mime_types['step'] = 'application/step'; 
    $mime_types['igs'] = 'application/iges'; 
    $mime_types['stp'] = 'application/step'; 
    $mime_types['dwg'] = 'application/acad'; 
    $mime_types['dxf'] = 'application/dxf'; 
    $mime_types['tgz'] = 'application/gnutar'; 
    $mime_types['wrl'] = 'application/x-world'; 
    $mime_types['iges'] = 'application/iges'; 
    $mime_types['asm'] = 'text/x-asm'; 
    $mime_types['jpeg'] = 'image/jpeg'; 
    $mime_types['png'] = 'image/png'; 
    return $mime_types;
}
add_filter('upload_mimes', 'my_mime_types', 1, 1);