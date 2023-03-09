<?php
$block_class = (isset($block_class) && !empty($block_class)) ? $block_class : 'col-md-4';
$post_ID     = (isset($post_ID) && !empty($post_ID)) ? $post_ID : $post->ID;
// $feat_image  = wp_get_attachment_url(get_post_thumbnail_id($post_ID));
$feat_image  = get_the_post_thumbnail_url();

$post_date   = get_the_date('j F Y', $post_ID);
?>

<div class="blog-post " data-id="<?php echo $post_ID; ?>" <?php if (!empty(get_field('block_id'))) {
																echo 'id="' . get_field('block_id') . '"';
															} ?>>
	<div class="img custom__animate zoomIn--custom delay-1">
		<?php
		$image_url = kama_thumb_src(array(
			'src' => $feat_image,
			'w' => 840,
			'h' => 840,
		));
		?>
		<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
			<?php $rand_id = bin2hex(random_bytes(10)); ?>
			<mask id="svgmask-<?php echo $rand_id; ?>">
				<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
			</mask>
			<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
		</svg>
	</div>
	<div class="text custom__animate appear delay-2">
		<div class="post-date"><span><?php echo $post_date; ?></span></div>
		<h3 class="title-h3"><?php the_title(); ?></h3>
	</div>
	<a href="<?php echo get_permalink(); ?>" class="blog-post__cover-full"></a>
</div>

