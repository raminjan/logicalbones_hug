<?php
/**
 * Functions and definitions for logicalboneshug
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
/* logicalboneshug setup functions */
if ( ! function_exists( 'bp_is_active' ) ) {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	return;
}

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

// logicalboneshug set up function
add_action( 'after_setup_theme', 'logicalboneshug_build' );
if ( ! function_exists( 'logicalboneshug_build' ) ) :
function logicalboneshug_build() {
	
	// incs incoming
	require( get_template_directory() . '/assets/scripts/ajax.php' );

	// template contents and structure functions
	require( get_template_directory() . '/inc/template-functions.php' );
	// snippets and 'doing things' collection
	require( get_template_directory() . '/inc/logical-snippets.php' );

	// Language set up
	load_theme_textdomain('logicalboneshug', get_template_directory() . '/languages/');
	
	add_theme_support( 'logicalboneshug' );
	
	add_theme_support( 'bp-default-responsive' );

	// Add RSS feed links
	add_theme_support('automatic-feed-links');

	// If having editor style add this
	add_editor_style();

	// Enable support for post thumbnails
	add_theme_support('post-thumbnails'); 
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'eee',
	) );

	// Register navigation menus
	register_nav_menu('top', __('Top', 'logicalboneshug'));
	register_nav_menu('bottom', __('Bottom', 'logicalboneshug'));
	
	// Add post format support
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote' ) );

	if ( !is_admin() ) {
		// Register buttons for the relevant component templates
		// Friends button
		if ( bp_is_active( 'friends' ) )
			add_action( 'bp_member_header_actions',    'bp_add_friend_button',           5 );

		// Activity button
		if ( bp_is_active( 'activity' ) )
			add_action( 'bp_member_header_actions',    'bp_send_public_message_button',  20 );

		// Messages button
		if ( bp_is_active( 'messages' ) )
			add_action( 'bp_member_header_actions',    'bp_send_private_message_button', 20 );

		// Group buttons
		if ( bp_is_active( 'groups' ) ) {
			add_action( 'bp_group_header_actions',     'bp_group_join_button',           5 );
			add_action( 'bp_group_header_actions',     'bp_group_new_topic_button',      20 );
			add_action( 'bp_directory_groups_actions', 'bp_group_join_button' );
		}

		// Blog button
		if ( bp_is_active( 'blogs' ) )
			add_action( 'bp_directory_blogs_actions',  'bp_blogs_visit_blog_button' );
	}
	
	require( get_template_directory() . '/inc/buddypress-functions.php' );
}
endif;

// logicalboneshug load scripts
if ( ! function_exists( 'logicalboneshug_load_scripts' ) ) :
function logicalboneshug_load_scripts() {

	wp_enqueue_style( 'normalise',  get_template_directory_uri() . '/assets/css/normalise.css', array());
	
	/* bare bones print styles */
	wp_enqueue_style( 'print',  get_template_directory_uri() . '/assets/css/print.css', array());
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	/* font awesome is rolled into Logical Bones */
	wp_enqueue_style( 'font-awesome',  get_template_directory_uri() . '/assets/css/font-awesome.css', array());
	
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/scripts/modernizr-2.5.3-min.js', array("jquery"), '2.0');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue the global JS - Ajax will not work without it
	wp_enqueue_script( 'dtheme-ajax-js', get_template_directory_uri() . '/assets/scripts/global.js', array( 'jquery' ), bp_get_version() );

	// Add words that we need to use in JS to the end of the page so they can be translated and still used.
	$params = array(
		'my_favs'           => __( 'My Favorites', 'logicalboneshug' ),
		'accepted'          => __( 'Accepted', 'logicalboneshug' ),
		'rejected'          => __( 'Rejected', 'logicalboneshug' ),
		'show_all_comments' => __( 'Show all comments for this thread', 'logicalboneshug' ),
		'show_all'          => __( 'Show all', 'logicalboneshug' ),
		'comments'          => __( 'comments', 'logicalboneshug' ),
		'close'             => __( 'Close', 'logicalboneshug' ),
		'view'              => __( 'View', 'logicalboneshug' ),
		'mark_as_fav'	    => __( 'Favorite', 'logicalboneshug' ),
		'remove_fav'	    => __( 'Remove Favorite', 'logicalboneshug' )
	);
	wp_localize_script( 'dtheme-ajax-js', 'BP_DTheme', $params );
	
}
endif;
add_action( 'wp_enqueue_scripts', 'logicalboneshug_load_scripts' );

// Add support for custom backgrounds
function logicalboneshug_custom_background() {
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
}

// logicalboneshug widgets
if ( ! function_exists( 'logicalboneshug_widgets_init' ) ) :
function logicalboneshug_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'logicalboneshug'),
			'id'            => 'sidebar',
			'description'   => 'Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">', 	  
			'after_widget' => '</aside>',
       		'before_title' => '<h3 class="widgettitle">',
       		'after_title' => '</h3>'
			)
	);
}
endif;
add_action( 'widgets_init', 'logicalboneshug_widgets_init' );
?>