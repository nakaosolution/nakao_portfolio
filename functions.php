<?php
function nakaofolio_scripts() {
    // css
    wp_enqueue_style('fontawesome','https://use.fontawesome.com/releases/v5.6.1/css/all.css');
    wp_enqueue_style('googlefonts','https://fonts.googleapis.com/css?family=Bitter&display|M+PLUS+1p|Manjari|Noto+Sans+JP&display=swap');
    wp_enqueue_style('nakaofolio-style',get_stylesheet_uri());
    if(is_singular('works')) {

    }else {
        
    }
    

    // JavaScript
    wp_enqueue_script('jquery-min-js', get_stylesheet_directory_uri().'/js/jquery-3.4.1.min.js', array(), '', true);
    wp_enqueue_script('debug-vue-js', 'https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js', array(), '', true);
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri().'/js/main.js', array('jquery-min-js','debug-vue-js'), '', true);
    // keisan
    if(is_single('32')) {
        wp_enqueue_style('keisan-style',get_template_directory_uri().'/css/keisan.css');
        wp_enqueue_script('keisan-script', get_stylesheet_directory_uri().'/js/keisan.js', array('jquery-min-js','debug-vue-js'), '', true);
    }
    
}
add_action('wp_enqueue_scripts','nakaofolio_scripts');


function nakaofolio_setup() {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_image_size('works', 340, 255, true);

    register_nav_menus(array(
        'header_nav' => 'header',
    ));

    
}
add_action('after_setup_theme', 'nakaofolio_setup');


// サムネイルのサイズ指定をなくす
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}

