<?php
require get_template_directory() . '/inc/Corppix.php';
require get_template_directory() . '/inc/initial-setup.php';
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/wpeditor-formats-options.php';
require get_template_directory() . '/inc/analytics-settings.php';
require get_template_directory() . '/inc/acf-setting.php';
require get_template_directory() . '/inc/custom-posts-type.php';
require get_template_directory() . '/inc/woocommerce-customization.php';
require get_template_directory() . '/inc/register-acf-blocks.php';
require get_template_directory() . '/inc/ajax-requests.php';
#require get_template_directory() . '/inc/custom-accept-cookies.php';


add_filter('show_admin_bar', '__return_false');

//Поддержка SVG
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
    
    // loop
    foreach( $items as &$item ) {
        
        // vars
        $image = get_field('menu__item-image', $item);
        
        // append icon
        if( $image ) {
            $item->title .= '<img src="'.$image['url'].'" class="menu__item-image" alt="'.$image['alt'].'">';   
        }
        
    }
    
    
    // return
    return $items;
    
}