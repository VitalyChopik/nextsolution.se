<?php

/**
 * Block Name: Achievements
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class = (array_key_exists('className', $block))
    ? $block['className']
    : '';
$block_title      = getFieldValue($page_fields, 'block_title');
$repeater_achievements_items = getFieldValue($page_fields, 'repeater_achievements_items');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="achievements pd-150 bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h1 class="title-h1 text-center custom__animate slideIn-top">
                        <?php echo ($block_title)
                            ? do_shortcode($block_title)
                            : ''; ?>
                    </h1>
                </div>
            </div>
            <div class="achievements__content">
                <div class="row align-items-center">
                    <div class="col-lg-12 ">
                        <div class="achievements__content-block custom__animate zoomIn--custom m-delay-1">
                        <?php if ($repeater_achievements_items) : ?>
                            <?php foreach ($repeater_achievements_items as $item) : ?>
                              <?php
                              $achievements_box_title = (array_key_exists('achievements_box_title', $item))
                                  ? $item['achievements_box_title']
                                  : '';
                              $achievements_box_progress = (array_key_exists('achievements_box_progress', $item))
                                  ? $item['achievements_box_progress']
                                  : '';
                              $achievements_box_atr = (array_key_exists('achievements_box_atr', $item))
                                  ? $item['achievements_box_atr']
                                  : '';
                                $anchor_link = (array_key_exists('anchor_link', $item))
                                ? $item['anchor_link']
                                : '';

                              ?>
                              <div class="achievements__content-wrapper">
                                <a href="#<?php echo do_shortcode($anchor_link); ?>" class="achievements__content-box">
                                    <span class="achievements__content-count">
                                    <?php echo do_shortcode($achievements_box_title); ?>
                                    </span>
                                    <div class="achievements__content-value">
                                    <span class="achievements__content-progress">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.5 2C23.5 1.17157 22.8284 0.499999 22 0.5L8.5 0.499999C7.67157 0.499999 7 1.17157 7 2C7 2.82843 7.67157 3.5 8.5 3.5H20.5V15.5C20.5 16.3284 21.1716 17 22 17C22.8284 17 23.5 16.3284 23.5 15.5L23.5 2ZM3.06066 23.0607L23.0607 3.06066L20.9393 0.939339L0.93934 20.9393L3.06066 23.0607Z" fill="#F6921E"/>
                                        </svg>
                                        <?php echo do_shortcode($achievements_box_progress); ?>
                                    </span>
                                    <span class="achievements__content-atr">
                                        <?php echo do_shortcode($achievements_box_atr); ?>
                                    </span>
                                    </div>
                                </a>
                              </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>