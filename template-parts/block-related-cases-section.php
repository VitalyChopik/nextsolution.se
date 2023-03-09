<?php
$additional_class = (array_key_exists('className', $block))
    ? $block['className']
    : '';
?>
<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="kundcase bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 kundcase__content">
                    <div class="text">
                        <?php if (!empty(get_field('title'))) { ?>
                            <h2 class="title-h1">
                                <?php echo get_field('title'); ?>
                            </h2>
                        <?php }  ?>
                    </div>

                    <?php $args = array(
                        'post_type'         => 'cases-post',
                        'posts_per_page'    => -1,
                        'post_status'       => 'publish',
                        'post__not_in'      => get_field('exclude_posts'),
                        'post__in'          => get_field('include_posts'),
                        'orderby' => 'post__in'
                    );

                    $wp_query = new WP_Query($args);



                    if ($wp_query->have_posts()) {

                        $i = 0;
                        while ($wp_query->have_posts()) {
                            $wp_query->the_post();

                    ?>

                            <div class="card">
                                <div class="col-md-12 col-6 offset-3 d-md-none d-block">
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h2 class="title-h2">
                                                        <?php echo ucwords(strtolower(get_the_title())); ?>
                                                    </h2>
                                                </div>
                                                <div class="col-md-5 offset-md-1 d-flex align-items-center">
                                                    <p><?php echo get_field('subtitle', get_the_ID()); ?></p>
                                                </div>
                                            </div>
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

                    <?php }
                    wp_reset_postdata(); ?>

                    <?php if (!empty(get_field('button_text')) && !empty(get_field('button_link'))) : ?>
                        <div class="show-more-case--wrapper">
                            <a href="<?php echo get_field('button_link'); ?>" data-role="show-more-case">
                                <div class="btn">
                                    <?php echo get_field('button_text'); ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>