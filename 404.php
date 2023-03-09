<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header( '2' );
global $global_options;
$options = getFieldValue( $global_options, 'not_found' );
//var_dump('$options', $options);

$title       = getFieldValue( $options, 'title' );
$subtitle    = getFieldValue( $options, 'subtitle' );
$description = getFieldValue( $options, 'description' );
$link_header = getFieldValue( $options, 'link_header' );
$link_home   = getFieldValue( $options, 'text_and_link_homepage' );
$tel         = getFieldValue( $options, 'tel_number' );
$logo        = getFieldValue( $options, 'logo' );
$link1       = getFieldValue( $options, 'link_1' );
$link2       = getFieldValue( $options, 'link_2' );
$link3       = getFieldValue( $options, 'link_3' );
$link4       = getFieldValue( $options, 'link_4' );
$link5       = getFieldValue( $options, 'link_5' );
$link6       = getFieldValue( $options, 'link_6' );
$link7       = getFieldValue( $options, 'link_7' );
$link8       = getFieldValue( $options, 'link_8' );
$link9       = getFieldValue( $options, 'link_9' );
$link10      = getFieldValue( $options, 'link_10' );

?>


<section class="bg section-404">
	<div class="section-404__wrapper">
		<h2 class="section-404__title">
			<?php echo $title; ?>
		</h2>
		<p class="section-404__subtitle"><?php echo $subtitle; ?></p>
		<p class="section-404__description"><?php echo $description; ?></p>
		<?php
		$text_link = array_key_exists('text_after_link', $link_home)
						? $link_home['text_after_link']
						: '';
		$link_arr    = array_key_exists('link', $link_home)
						? $link_home['link']
						: '';
		?>
		<p class="section-404__home"><?php echo $text_link; ?>
			<a class="section-404__link"
			   href="<?php echo (array_key_exists('url', $link_arr))
				        ? $link_arr['url']
			            : ''; ?>">
				<?php echo (array_key_exists('title', $link_arr))
						? $link_arr['title']
						: ''; ?>
			</a>
		</p>

		<a class="section-404-top__logo mobile-hide text-normal" href="<?php echo $link_header['url']; ?>">
			<?php echo $link_header['title']; ?>
		</a>
		<a class="section-404-top__link" href="<?php echo home_url(); ?>">
			<img class="section-404-top__img" src="<?php echo $logo['url']; ?>" alt="img">
		</a>
		<?php if ( isset( $link1['link'] ) && is_array( $link1['link'] ) ) { ?>
			<a href="<?php echo $link1['link']['url']; ?>" class=" position position-1 btn">
				<?php echo $link1['text']; ?>
			</a>
		<?php } ?>
		<?php if ( isset( $link2['link'] ) && is_array( $link2['link'] ) ) { ?>
			<a href="<?php echo $link2['link']['url']; ?>"
			   class=" position position-2 text-bold mobile-hide"><?php echo $link2['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link3['link'] ) && is_array( $link3['link'] ) ) { ?>
			<a href="<?php echo $link3['link']['url']; ?>"
			   class=" position position-3 text-semibold mobile-hide"><?php echo $link3['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link4['link'] ) && is_array( $link4['link'] ) ) { ?>
			<a href="<?php echo $link4['link']['url']; ?>"
			   class=" position position-4 text-bold"><?php echo $link4['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link5['link'] ) && is_array( $link5['link'] ) ) { ?>
			<a href="<?php echo $link5['link']['url']; ?>"
			   class=" position position-5 text-normal"><?php echo $link5['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link6['link'] ) && is_array( $link6['link'] ) ) { ?>
			<a href="<?php echo $link6['link']['url']; ?>"
			   class=" position position-6 text-normal"><?php echo $link6['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link7['link'] ) && is_array( $link7['link'] ) ) { ?>
			<a href="<?php echo $link7['link']['url']; ?>"
			   class=" position position-7 mobile-hide text-semibold"><?php echo $link7['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link8['link'] ) && is_array( $link8['link'] ) ) { ?>
			<a href="<?php echo $link8['link']['url']; ?>"
			   class=" position position-8 text-semibold"><?php echo $link8['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link9['link'] ) && is_array( $link9['link'] ) ) { ?>
			<a href="tel:<?php echo $link9['link']['url']; ?>"
			   class=" position position-9 text-lg"><?php echo $link9['text']; ?></a>
		<?php } ?>

		<?php if ( isset( $link10['link'] ) ) { ?>
			<a href="<?php echo $link10['link']; ?>" class=" position position-10 mobile-hide text-normal">
				<?php echo $link10['text']; ?>
			</a>
		<?php } ?>
		<a href="tel:<?php echo $tel; ?>" class="position position-11">
			<svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="27" cy="27" r="27" fill="#F6921E"/>
				<g clip-path="url(#clip0_1172_1295)">
					<path
						d="M28.5232 20.6184C29.4822 20.8055 30.2083 21.4297 30.8992 22.1206C31.5901 22.8115 32.2143 23.5376 32.4014 24.4966L28.5232 20.6184ZM28.5232 16.6912C30.5156 16.9125 31.7881 17.9451 33.2065 19.3617C34.6248 20.7783 36.1048 22.4947 36.3286 24.4868L33.2065 19.8133L28.5232 16.6912ZM35.3468 32.3217V35.2672C35.3479 35.5406 35.2919 35.8113 35.1824 36.0618C35.0728 36.3123 34.9122 36.5372 34.7107 36.7221C34.5092 36.9069 34.2713 37.0477 34.0123 37.1353C33.7533 37.2229 33.4788 37.2554 33.2065 37.2308C30.1852 36.9025 27.2832 35.8701 24.7334 34.2166C22.3611 32.7092 20.3499 30.6979 18.8425 28.3257C17.1832 25.7643 16.1506 22.8481 15.8283 19.8133C15.8037 19.5418 15.836 19.2682 15.923 19.0098C16.01 18.7515 16.1499 18.5141 16.3337 18.3128C16.5175 18.1114 16.7412 17.9505 16.9905 17.8404C17.2399 17.7303 17.5095 17.6732 17.7821 17.673H20.7276C21.204 17.6683 21.666 17.837 22.0272 18.1477C22.3885 18.4584 22.6245 18.8899 22.6912 19.3617C22.8155 20.3043 23.0461 21.2298 23.3785 22.1206C23.5106 22.472 23.5391 22.854 23.4608 23.2211C23.3825 23.5883 23.2006 23.9253 22.9366 24.1923L21.6897 25.4392C23.0874 27.8972 25.1226 29.9324 27.5806 31.3301L28.8276 30.0832C29.0945 29.8192 29.4315 29.6373 29.7987 29.559C30.1659 29.4807 30.5478 29.5092 30.8992 29.6413C31.79 29.9737 32.7155 30.2043 33.6581 30.3286C34.135 30.3959 34.5706 30.6361 34.882 31.0036C35.1933 31.3711 35.3588 31.8402 35.3468 32.3217Z"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
					<clipPath id="clip0_1172_1295">
						<rect width="23.5636" height="23.5636" fill="white" transform="translate(13.7461 15.7092)"/>
					</clipPath>
				</defs>
			</svg>
		</a>
	</div>
</section>

<?php get_footer( '2' ); ?>
