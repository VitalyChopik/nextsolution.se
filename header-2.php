<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
	<meta name="format-detection" content="telephone=no"/>
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
	<?php if ( is_404() ) { ?>
		<meta name="robots" content="noindex, nofollow"/>
	<?php } ?>
	<?php wp_head(); ?>
	<?php do_action( 'corppix_before_close_head_tag' ); ?>
</head>

<?php

$page_class = '';
$post_id    = get_queried_object_id();

if ( function_exists( 'get_fields' ) ) {
	$page_class = ( get_field( 'body_class', $post_id ) ) ?: '';
}

?>

<body <?php body_class( $page_class ); ?>>
