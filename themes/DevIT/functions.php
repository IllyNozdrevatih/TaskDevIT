<?php

add_action('wp_head','add_style');

function add_style(){
	wp_enqueue_style('fontawesome','https://use.fontawesome.com/releases/v5.6.3/css/all.css');
}

function create_post_type() {

	//Регистрация нового типа записи
	register_post_type('movies',
		array(
			'labels' => array(
				'name' => __( 'Movies' ),
				'singular_name' => __( 'Movie' )
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'movies'),
		'supports' => array('title','editor','custom-fields'),

		'menu_icon' => 'dashicons-format-video'
		)
	);

	//Регистрация таксономии жанры
	register_taxonomy('movies_genres', array('movies'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Genres',
			'singular_name'     => 'Genre',
			'search_items'      => 'Search Genres',
			'all_items'         => 'All Genres',
			'view_item '        => 'View Genre',
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Edit Genre',
			'update_item'       => 'Update Genre',
			'add_new_item'      => 'Add New Genre',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Genre',
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => null,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_tagcloud'         => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	) );

	//Регистрация таксономии страны
	register_taxonomy('movies_countries', array('movies'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Countries',
			'singular_name'     => 'Country',
			'search_items'      => 'Search Countries',
			'all_items'         => 'All Countries',
			'view_item '        => 'View Country',
			'parent_item'       => 'Parent Country',
			'parent_item_colon' => 'Parent Country:',
			'edit_item'         => 'Edit Country',
			'update_item'       => 'Update Country',
			'add_new_item'      => 'Add New Country',
			'new_item_name'     => 'New Country Name',
			'menu_name'         => 'Country',
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => null,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_tagcloud'         => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	) );

	//Регистрация таксономии год
	register_taxonomy('movies_year', array('movies'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Years',
			'singular_name'     => 'Year',
			'search_items'      => 'Search Years',
			'all_items'         => 'All Years',
			'view_item '        => 'View Year',
			'parent_item'       => 'Parent Year',
			'parent_item_colon' => 'Parent Year:',
			'edit_item'         => 'Edit Year',
			'update_item'       => 'Update Year',
			'add_new_item'      => 'Add New Year',
			'new_item_name'     => 'NewYeare Name',
			'menu_name'         => 'Year',
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => null,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_tagcloud'         => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	) );

	//Регистация таксономии актеры
	register_taxonomy('movies_actors', array('movies'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Actors',
			'singular_name'     => 'Actor',
			'search_items'      => 'Search Actors',
			'all_items'         => 'All Actors',
			'view_item '        => 'View Actor',
			'parent_item'       => 'Parent Actor',
			'parent_item_colon' => 'Parent Actor:',
			'edit_item'         => 'Edit Actor',
			'update_item'       => 'Update Actor',
			'add_new_item'      => 'Add New Actor',
			'new_item_name'     => 'New Actor Name',
			'menu_name'         => 'Actor',
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => null,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_tagcloud'         => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	) );
}

add_action( 'init', 'create_post_type' );

add_shortcode('last_films','last_films');

function last_films(){
	$posts = get_posts( array(
		'numberposts' => 5,
		'category'    => 0,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'movies',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	) );

	$return = '<ul class = "list-counter-circle">';

	foreach ($posts as $post) {
		$return .= '<li><a href='.get_permalink($post->ID).'>'.$post->post_title.'</a></li>';
	}

	$return .= '</ul>';

	return $return;
}
?>