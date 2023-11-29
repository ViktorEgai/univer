<?php 

// Удаление  меню из админки
add_action( 'admin_menu', 'remove_menus' );

function remove_menus(){
	remove_menu_page( 'edit.php' );                   // Записи
}

add_theme_support( 'post-thumbnails');

// Преобразование номера телефона
function getPhone($phone) {
  return preg_replace('/[\s+()-]/i', '', $phone);
}

// Настройки темы acf
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Общие блоки',
		'menu_title'	=> 'Общие блоки',
		'menu_slug' 	=> 'global-blocks',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

// Удаление <p> <br> contact form 7 
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Add Formats to TinyMCE
 * - https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
 * - https://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
 *
 * @param array $args   - Arguments used to initialize the tinyMCE
 *
 * @return array $args  - Modified arguments
 */
function prefix_tinymce_toolbar( $args ) {

    $args['fontsize_formats'] = "8px 10px 12px 13px 14px 16px 20px 24px 28px 32px 36px";

    return $args;

}
add_filter( 'tiny_mce_before_init', 'prefix_tinymce_toolbar' );




add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );

function custom_breadcrumbs( $links ) {
    global $post;

    if ( is_singular( 'catalog' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( get_page_by_path('courses') ),
            'text' => get_the_title(get_page_by_path('courses') ),
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }
    if ( is_singular( 'news' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( get_page_by_path('news') ),
            'text' => get_the_title(get_page_by_path('news') ),
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}

function declOfNum($num, $titles) {
    $cases = array(2, 0, 1, 1, 1, 2);

    return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}