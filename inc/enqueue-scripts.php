<?php
// Enqueue scripts and styles.
function px_site_scripts()
{
	// Load our main stylesheet.
	wp_enqueue_style( 'corppix_site-style', get_stylesheet_uri() );

	wp_enqueue_style( 'corppix_site_style', get_template_directory_uri() . '/build/styles/screen.css' );
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/build/styles/swiper-bundle.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/build/styles/custom-style.css' );
	wp_enqueue_style( 'header', get_template_directory_uri() . '/build/styles/header.css' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/build/styles/blog.css' );

	//wp_enqueue_style( 'corppix_site_style', get_template_directory_uri() . '/build/js/wheel/fullpage.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'corppix_site-script', 'screenReaderText', array(
		'expand' => '<span class="screen-reader-text">' . __( 'expand child menu', 'corppix_site' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'corppix_site' ) . '</span>',
	) );

	

	wp_enqueue_script( 'snap_js', '//cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'libs_js', get_template_directory_uri() . '/build/js/libs.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'customization_js', get_template_directory_uri() . '/build/js/customization.js', array(
		'jquery',
		'libs_js'
	), null, true );
	wp_enqueue_script( 'swiper_js', get_template_directory_uri() . '/build/js/swiper-bundle.min.js', array(), null, true );
	// wp_enqueue_script( 'menu_js', get_template_directory_uri() . '/build/js/menu.js', array(
	// 	'customization_js'
	// ), null, true );
	

	// wp_enqueue_script( 'marquee', get_template_directory_uri() . '/build/js/wheel/jquery.marquee.min.js', array( 'jquery' ), null, true );
	// //wp_enqueue_script( 'scrollify', get_template_directory_uri() . '/build/js/wheel/jquery.scrollify.js', array( 'jquery' ), null, true );
	// wp_enqueue_script( 'smartscroll', get_template_directory_uri() . '/build/js/wheel/smartscroll.js', array( 'jquery' ), null, true );

	// wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/build/js/custom.js', array(
	// 	'jquery',
	// 	'libs_js'
	// ), null, true );
	global $global_options;
	$myaccount_page_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );

	$vars = array(
		'ajax_url'           => admin_url( 'admin-ajax.php' ),
		'theme_path'         => get_stylesheet_directory_uri(),
		'site_url'           => get_site_url(),
	);

	wp_localize_script( 'customization_js', 'var_from_php', $vars );


	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
	if (is_page('annonsering')  ) {
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/landing-page/css/animate.css');
		wp_enqueue_style( 'style.min', get_template_directory_uri() . '/landing-page/css/style.min.css');
		wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/landing-page/css/custom-style.css');
	     wp_deregister_style ('corppix_site_style');
		// wp_deregister_style ('admin-bar-css');
		// wp_deregister_style ('wp-block-library');
		// wp_deregister_style ('global-styles-inline');
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/landing-page/js/wow.min.js', array(), false, false);
		wp_deregister_script( 'jquery' );
	   wp_register_script( 'jquery', get_template_directory_uri() . '/landing-page/js/jQuery-3.6.1.min.js', array('wow'), false, false);
	   wp_enqueue_script('jquery');
	   wp_deregister_script( 'jquery-migrate');
	  //  wp_deregister_script( 'snap_js' );
	  //  wp_deregister_script( 'libs_js' );
	  //  wp_deregister_script( 'customization_js' );
	   wp_enqueue_script( 'main', get_template_directory_uri() . '/landing-page/js/main.min.js', array('jquery'), false, false);
	  //  wp_enqueue_script( 'snap', get_template_directory_uri() . '/landing-page/js/snap.svg-min.js', array('jquery'), false, true);
	  //  wp_enqueue_script( 'kute', get_template_directory_uri() . '/landing-page/kute-2.2.4.min.js', array('jquery'), false, true);
	  //  wp_enqueue_script( 'app', get_template_directory_uri() . '/landing-page/js/app.js', array('jquery'), false, true);
	 

	}
}

add_action( 'wp_enqueue_scripts', 'px_site_scripts' );

//add_action( 'admin_enqueue_scripts', function(){
//	wp_enqueue_style( 'my-wp-admin', get_template_directory_uri() .'css/wp-admin.css' );
//}, 99 );



add_action( 'after_setup_theme', 'register_site_menu');

function register_site_menu () {
	register_nav_menu( 'header', 'Menu in header' );
	register_nav_menu( 'footer', 'Menu in footer' );
}

function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
	  'menu_js'
	);
  
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	  
	  return $tag;
  } 
  
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );




