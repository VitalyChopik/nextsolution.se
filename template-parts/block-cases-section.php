<?php
$terms = get_terms('case-cat', array(
	'hide_empty' => true,
));

?>

<div class="section__wrapper section__wrapper--no-full-height" <?php if (!empty(get_field('block_id'))) {
																	echo 'id="' . get_field('block_id') . '"';
																} ?>>
	<section class="kundcase bg case-page">
		<div class="container">
			<div class="row kundcase-row">
				<div id="tabs">
					<ul class="tabs-ul custom__animate appear">
						<li>
							<a class="js-nav-selector active" href="#tab-all">
								<?php _e('All', 'corppix_site'); ?>
							</a>
						</li>
						<?php $cat_posts = array();
						foreach ($terms as $cat) { ?>

							<li>
								<a class="js-nav-selector" href="#tab-<?php echo $cat->slug; ?>">
									<?php echo $cat->name; ?>
								</a>
							</li>

						<?php $cat_posts[$cat->slug] = array();
						} ?>

					</ul>
					<div class="col-md-12 kundcase__content">

						<?php $args = array(
							'post_type'			=> 'cases-post',
							'posts_per_page'	=> -1,
							'post_status'		=> 'publish',
							'post__not_in'		=> get_field('exclude_posts'),
							'post__in'			=> get_field('include_posts')
						);

						$wp_query = new WP_Query($args);



						if ($wp_query->have_posts()) { ?>

							<div id="tab-all" class="tab js-tab-selector active">

								<?php $i = 0;
								$j = 0;
								while ($wp_query->have_posts()) {
									$wp_query->the_post();

									$terms = get_the_terms(get_the_ID(), 'case-cat');
									foreach ($terms as $term) {
										$cat_post = array(
											'title' => get_the_title(),
											'subtitle' => get_field('subtitle', get_the_ID()),
											'thumb_url' => get_the_post_thumbnail_url(get_the_ID()),
											'permalink' => get_the_permalink(),
										);

										array_push($cat_posts[$term->slug], $cat_post);
									}

									// print_r(get_the_terms(get_the_ID(), 'case-cat'));

								?>

									<div class="card mb-0">
										<div class="d-md-none d-block col-6 offset-3 justify-content-center align-items-center">
											<a href="<?php echo get_the_permalink(); ?>">
												<?php if (get_the_post_thumbnail_url(get_the_ID())) { ?>
													<?php
													$image_url = kama_thumb_src(array(
														'src' => get_the_post_thumbnail_url(get_the_ID()),
														'w' => 280,
														'h' => 280,
													));
													?>
													<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
														<?php $rand_id = bin2hex(random_bytes(10)); ?>
														<mask id="svgmask-<?php echo $rand_id; ?>">
															<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z"></path>
														</mask>
														<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
													</svg>
												<?php } ?>
											</a>
										</div>
										<div class="card-text">
											<a href="<?php echo get_the_permalink(); ?>">
												<div class="text big">
													<h2 class="title-h2">
														<?php echo ucwords(strtolower(get_the_title())); ?>
													</h2>
													<p><?php echo get_field('subtitle', get_the_ID()); ?></p>
												</div>
											</a>
										</div>
										<div class="card-img">
											<a href="<?php echo get_the_permalink(); ?>">
												<div class="block-hover">
													<div class="img">
														<?php if (get_the_post_thumbnail_url(get_the_ID())) { ?>
															<?php
															$image_url = kama_thumb_src(array(
																'src' => get_the_post_thumbnail_url(get_the_ID()),
																'w' => 280,
																'h' => 280,
															));
															?>
															<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="xMidYMid slice">
																<?php $rand_id = bin2hex(random_bytes(10)); ?>
																<mask id="svgmask-<?php echo $rand_id; ?>">
																	<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
                            c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
																</mask>
																<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
															</svg>

															<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo ucwords(strtolower(get_the_title())); ?>">
															<span>View</span>
														<?php } ?>
													</div>
												</div>
											</a>
										</div>
									</div>

								<?php }
								wp_reset_query(); ?>

							</div>

							<?php foreach ($cat_posts as $key => $value) { ?>

								<div id="tab-<?php echo $key; ?>" class="row tab js-tab-selector">

									<?php $i = 0;
									foreach ($value as $post) {

									?>
										<div class="card">
											<div class="card-img--mob col-6 offset-3 justify-content-center align-items-center">
												<a href="<?php echo get_the_permalink(); ?>">
													<?php if (get_the_post_thumbnail_url(get_the_ID())) { ?>
														<?php
														$image_url = kama_thumb_src(array(
															'src' => get_the_post_thumbnail_url(get_the_ID()),
															'w' => 280,
															'h' => 280,
														));
														?>
														<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
															<?php $rand_id = bin2hex(random_bytes(10)); ?>
															<mask id="svgmask-<?php echo $rand_id; ?>">
																<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z"></path>
															</mask>
															<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
														</svg>
													<?php } ?>
												</a>
											</div>
											<div class="card-text">
												<a href="<?php echo $post['permalink']; ?>">
													<div class="text big">
														<h2 class="title-h2">
															<?php echo ucwords(strtolower($post['title'])); ?>
														</h2>
														<p><?php echo $post['subtitle']; ?></p>
													</div>
												</a>
											</div>
											<div class="card-img">
												<a href="<?php echo $post['permalink']; ?>">
													<div class="block-hover">
														<div class="img">
															<?php if ($post['thumb_url']) { ?>
																<?php
																$image_url = kama_thumb_src(array(
																	'src' => $post['thumb_url'],
																	'w' => 280,
																	'h' => 280,
																));
																?>
																<svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="xMidYMid slice">
																	<?php $rand_id = bin2hex(random_bytes(10)); ?>
																	<mask id="svgmask-<?php echo $rand_id; ?>">
																		<path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
								c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
																	</mask>
																	<image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
																</svg>

																<img src="<?php echo $post['thumb_url']; ?>" alt="<?php echo ucwords(strtolower($post['title'])); ?>">
																<span>View</span>
															<?php } ?>
														</div>
													</div>
												</a>
											</div>
										</div>

									<?php } ?>

								</div>

							<?php } ?>

						<?php }
						wp_reset_postdata(); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>