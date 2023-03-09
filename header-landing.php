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
	
	<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-71MKJY9FL6"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-71MKJY9FL6'); </script>
</head>

<?php
global $global_options;
$page_class            = '';
$post_id               = get_queried_object_id();
$logo                  = getFieldValue( $global_options, 'site_logo' );
$site_logo_burger_menu = getFieldValue( $global_options, 'site_logo_burger_menu' );
$logo_link             = getFieldValue( $global_options, 'logo_link' );
$email                 = getFieldValue( $global_options, 'email' );
$phone                 = getFieldValue( $global_options, 'phone' );
$address               = getFieldValue( $global_options, 'address' );
$repeater_social       = getFieldValue( $global_options, 'repeater_social' );


if ( function_exists( 'get_fields' ) ) {
	$page_class = ( get_field( 'body_class', $post_id ) ) ?: '';
}

$page_class .= ' ';
?>

<body <?php body_class( $page_class ); ?>>


<?php do_action( 'corppix_after_open_body_tag' ); ?>

	
	<?php include( locate_template( 'template-parts/custom-header.php', false, false ) ); ?>


			<?php do_action( 'corppix_before_site_header' ); ?>
			
			<?php do_action( 'corppix_after_site_header' ); ?>
			
			<?php if ( ! is_front_page() && ! is_404() ) { ?>
          <!-- <div class="breadcrumbs">
              <div class="breadcrumbs-nav container" typeof="BreadcrumbList" vocab="http://schema.org/">
                  <?php
                    //   if ( function_exists( 'bcn_display' ) ) {
                    //       bcn_display();
                    //   }
                  ?>
              </div>
          </div> -->
			<?php } ?>