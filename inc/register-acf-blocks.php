<?php
function custom_gutenberg_block()
{
	if ( !function_exists( 'acf_register_block' ) ) {
		return;
	}
	
	acf_register_block( array (
		'name'            => 'Slider Reviews',
		'title'           => __( 'Slider Reviews', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'slider', 'reviews')
	) );
	acf_register_block( array (
		'name'            => 'Who we are',
		'title'           => __( 'Who we are', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Who we are', 'banner')
	) );
	acf_register_block( array (
		'name'            => 'Text',
		'title'           => __( 'Text', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Text', 'title')
	) );
	
	acf_register_block( array (
		'name'            => 'Tabs',
		'title'           => __( 'Tabs', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'tabs')
	) );

	acf_register_block( array (
		'name'            => 'Tabs gallery',
		'title'           => __( 'Tabs gallery', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'tabs', 'gallery')
	) );

	// Example how to register new ACF Gutenberg block
	acf_register_block( array (
		'name'            => 'Hero banner',
		'title'           => __( 'Hero banner', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'hero', 'banner')
	) );
	
	acf_register_block( array (
		'name'            => 'About us',
		'title'           => __( 'About us', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'about', 'us')
	) );
	acf_register_block( array (
		'name'            => 'About case',
		'title'           => __( 'About case', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'about', 'case')
	) );
	acf_register_block( array (
		'name'            => 'Achievements',
		'title'           => __( 'Achievements', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'about', 'case')
	) );
	acf_register_block( array (
		'name'            => 'Achievements description',
		'title'           => __( 'Achievements description', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'about', 'case')
	) );
	acf_register_block( array (
		'name'            => 'Cta',
		'title'           => __( 'Cta', 'corppix_site'),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'cta', 'single')
	) );
	acf_register_block( array (
		'name'            => 'Kundcase',
		'title'           => __( 'Kundcase', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'kundcase')
	) );
	
	acf_register_block( array (
		'name'            => 'Om oss',
		'title'           => __( 'Om oss', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'om', 'oss')
	) );
	
	acf_register_block( array (
		'name'            => 'Kunder section',
		'title'           => __( 'Kunder section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'kunder', 'section')
	) );
	
	acf_register_block( array (
		'name'            => 'Next solution',
		'title'           => __( 'Next solution', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'next', 'solution')
	) );
	
	acf_register_block( array (
		'name'            => 'Services',
		'title'           => __( 'Services', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'services')
	) );

	acf_register_block( array (
		'name'            => 'Services Posts',
		'title'           => __( 'Services Posts', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'services Posts')
	) );
	
	acf_register_block( array (
		'name'            => 'Nyheter',
		'title'           => __( 'Nyheter', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'nyheter')
	) );
	
	acf_register_block( array (
		'name'            => 'Om oss banner',
		'title'           => __( 'Om oss banner', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'om', 'oss', 'banner')
	) );
	
	acf_register_block( array (
		'name'            => 'Om oss description',
		'title'           => __( 'Om oss description', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'om', 'oss', 'description')
	) );
	
	acf_register_block( array (
		'name'            => 'World map',
		'title'           => __( 'World map', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'world', 'map')
	) );
	
	acf_register_block( array (
		'name'            => 'How we are working',
		'title'           => __( 'How we are working', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'how', 'we', 'are', 'working')
	) );
	
	acf_register_block( array (
		'name'            => 'Team section',
		'title'           => __( 'Team section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'team', 'section')
	) );

	acf_register_block( array (
		'name'            => 'Description with name bg',
		'title'           => __( 'Description with name bg', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'description', 'with', 'name', 'bg')
	) );

	acf_register_block( array (
		'name'            => 'Konstlagret banner',
		'title'           => __( 'Konstlagret banner', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'konstlagret', 'banner')
	) );

	acf_register_block( array (
		'name'            => 'Konstlagret quote section',
		'title'           => __( 'Konstlagret quote section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'konstlagret', 'quote', 'section')
	) );

	acf_register_block( array (
		'name'            => 'Konstlagret with name bg',
		'title'           => __( 'Konstlagret with name bg', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'konstlagret', 'with', 'name', 'bg')
	) );

	acf_register_block( array (
		'name'            => 'Konstlagret decision',
		'title'           => __( 'Konstlagret decision', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'konstlagret', 'decision')
	) );

	acf_register_block( array (
		'name'            => 'Konstlagret result',
		'title'           => __( 'Konstlagret result', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'konstlagret', 'result')
	) );

	acf_register_block( array (
		'name'            => 'Contacts section',
		'title'           => __( 'Contacts section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Contacts', 'section')
	) );

	acf_register_block( array (
		'name'            => 'Top slider',
		'title'           => __( 'Top slider', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'top', 'slider')
	) );

	acf_register_block( array (
		'name'            => 'Onboarding section',
		'title'           => __( 'Onboarding section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'onboarding', 'section')
	) );

	acf_register_block( array (
		'name'            => 'Cases section',
		'title'           => __( 'Cases section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Cases', 'section')
	) );

	acf_register_block( array (
		'name'            => 'Related Cases section',
		'title'           => __( 'Related Cases section', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Related', 'Cases', 'section')
	) );
	acf_register_block( array (
		'name'            => 'Navigation block',
		'title'           => __( 'Navigation block', 'corppix_site' ),
		'render_callback' => 'wpahead_acf_block_render_callback',
		'category'        => 'layout',
		'icon'            => 'lightbulb',
		'post_types'      => array( 'page', 'post', 'services-post', 'cases-post' ),
		'keywords'        => array( 'Navigation', 'Nav', 'header')
	) );
	
}

add_action( 'init', 'custom_gutenberg_block' );

function wpahead_acf_block_render_callback( $block )
{
	$name = str_replace( 'acf/', '', $block['name'] );

	if ( file_exists( get_theme_file_path( "/template-parts/block-{$name}.php" ) ) ) {
		include( get_theme_file_path( "/template-parts/block-{$name}.php" ) );
	}
}


