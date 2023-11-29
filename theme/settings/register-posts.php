<?php 
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_taxonomy( 'speciality', [ 'catalog' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Специальность',
			'singular_name'     => 'Специальность',
			'search_items'      => 'Искать Специальность',
			'all_items'         => 'Все Специальности',
			'view_item '        => 'Смотреть Специальность',
			'parent_item'       => 'Родительская специальность',
			'parent_item_colon' => 'Родительская специальность:',
			'edit_item'         => 'Редактировать Специальность',
			'update_item'       => 'Обновить Специальность',
			'add_new_item'      => 'Добавить новую Специальность',
			'new_item_name'     => 'Имя новой Специальности',
			'menu_name'         => 'Специальность',
			'back_to_items'     => '← Вернуться к Специальностям',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );


	register_post_type( 'catalog', [
		'label'  => null,
		'labels' => [
			'name'               => 'Курсы', // основное название для типа записи
			'singular_name'      => 'Курс', // название для одной записи этого типа
			'add_new'            => 'Добавить Курс', // для добавления новой записи
			'add_new_item'       => 'Добавление Курса ', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Курса', // для редактирования типа записи
			'new_item'           => 'Новый Курс', // текст новой записи
			'view_item'          => 'Смотреть Курс', // для просмотра записи этого типа.
			'search_items'       => 'Искать Курс', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Курсы', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-media-document',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => [ 'title', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['speciality'],
		'has_archive'         => false,
		'rewrite' => array( 'slug' => 'courses'),
		'query_var'           => true,
	] );

	register_post_type( 'news', [
		'label'  => null,
		'labels' => [
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новость', // название для одной записи этого типа
			'add_new'            => 'Добавить Новость', // для добавления новой записи
			'add_new_item'       => 'Добавление Новости ', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Новости', // для редактирования типа записи
			'new_item'           => 'Новая Новость', // текст новой записи
			'view_item'          => 'Смотреть Новость', // для просмотра записи этого типа.
			'search_items'       => 'Искать Новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-aside',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'], 
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite' => true,
		'query_var'           => true,
	] );
	register_post_type( 'reviews', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв ', // название для одной записи этого типа
			'add_new'            => 'Добавить Отзыв ', // для добавления новой записи
			'add_new_item'       => 'Добавление Отзывы ', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Отзывы', // для редактирования типа записи
			'new_item'           => 'Новый Отзыв ', // текст новой записи
			'view_item'          => 'Смотреть Отзыв ', // для просмотра записи этого типа.
			'search_items'       => 'Искать Отзыв ', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-status',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'], 
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite' => true,
		'query_var'           => true,
	] );
}

