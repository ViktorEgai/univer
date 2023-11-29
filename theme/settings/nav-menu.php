<?php 
add_action( 'after_setup_theme', 'menu');

function menu() {
  register_nav_menu('header-menu', 'Меню шапки - Основное ');
  register_nav_menu('header-top-menu', 'Меню шапки - Верхнее');
  register_nav_menu('about-nav-menu', 'Меню "Об университете"');
  register_nav_menu('footer-menu', 'Меню подвала');
}

// Изменяет основные параметры меню
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args ($args) {
  if ( $args['theme_location'] === 'header-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'header-menu';
  }
  if ( $args['theme_location'] === 'header-top-menu' ) {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'header-top-menu';
  }
  if ( $args['theme_location'] === 'footer-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'footer-menu';
  }
  if ( $args['theme_location'] === 'about-nav-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'about-nav';
  }
  return $args;
} 


// Изменяем атрибут class у тега li 
add_filter( 'nav_menu_css_class', 'filter_menu_css_classes', 10, 4 );
function filter_menu_css_classes( $classes, $item, $args, $depth ) {
  
  if ($args -> theme_location === 'header-menu' ) {     
    array_push($classes, 'header-menu__item') ;
  }

  if ($args -> theme_location === 'header-top-menu' ) {  
    array_push($classes, 'header-top-menu__item') ;
  }

  if ( $args -> theme_location === 'footer-menu') {
    array_push($classes, 'footer-menu__item') ;   
  }
  if ( $args -> theme_location === 'about-nav-menu') {
    array_push($classes, 'about-nav__item') ;   
  }
  return $classes;
}
// Изменяем класс у подменю ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth) {
  if ($args -> theme_location === 'header-menu' ) {
    $classes = [
      'header-submenu'
      // классы для ul sub-menu
    ];
  }
  if ($args -> theme_location === 'footer-menu' ) {
    $classes = [
      'footer-submenu'
      // классы для ul sub-menu
    ];
  }
  
  return $classes;
}
// изменения класс для ссылки
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $attr, $item, $args, $depth) {
  if ($args -> theme_location === 'header-menu' ) {
    $attr['class'] = ''; // класс для ссылки
  }  
  
  if ($args -> theme_location === 'footer-menu') {
    $attr['class'] = ''; // класс для ссылки
  }  
  return $attr;
} 

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}





add_filter('wp_nav_menu_items','add_item', 10, 2 );

function add_item($items, $args) {
  if ( 'footer-menu' == $args->theme_location ) {
    $address = get_field('address','options');
    $email = get_field('email','options');
    $phone = get_field('phone','options');
    $items .= '<li class="footer-menu__item">
              <a href="/contacts/">Контакты</a>
              <ul class="footer-submenu">
                <li class="footer-menu__item">' . $address .'</li>
                <li class="footer-menu__item"><a href="mailto:'. $email .'">'.$email.'</a></li>
                <li class="footer-menu__item"><a href="' . getPhone($phone) . '">'. $phone .'</a></li>
              </ul>
            </li>';
  };

  return $items;
}




