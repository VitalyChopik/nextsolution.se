<?php

/**
 * Block Name: Slider Reviews
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
$repeater_slider = getFieldValue($page_fields, 'repeater_slider');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="reviews bg2 <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
              <div class="swiper-container reviews__slider">
                <div class="swiper-wrapper">
                <?php if ($repeater_slider) : ?>
                   <?php foreach ($repeater_slider as $item) : ?>
                    <?php
                        $title = (array_key_exists('title', $item))
                        ? $item['title']
                        : '';
                        $description = (array_key_exists('description', $item))
                        ? $item['description']
                        : '';
                        $name = (array_key_exists('name', $item))
                        ? $item['name']
                        : '';
                        $image_url = (array_key_exists('image', $item))
                        ? $item['image']
                        : '';
                    ?>
                      <div class="swiper-slide reviews__slide">
                        <div class="reviews__slide-boxtext">
                          <h3 class="title-h3 reviews__slide-title">                                    
                            <?php echo ($title) ? do_shortcode($title) : ''; ?>
                          </h3>
                          <p class="reviews__slide-text">
                          <?php echo ($description) ? do_shortcode($description) : ''; ?>
                          </p>
                          <h4 class="reviews__slide-name"><?php echo ($name) ? do_shortcode($name) : ''; ?></h4>
                        </div>
                        <div class="reviews__slide-img">
                          <?php
                          $image_url = kama_thumb_src(array(
                              'src' => $image_url,
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
                      </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>