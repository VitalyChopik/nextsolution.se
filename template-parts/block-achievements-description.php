<?php

/**
 * Block Name: Achievements description
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
$repeater_achievements_block = getFieldValue($page_fields, 'repeater_achievements_block');

$description      = getFieldValue($page_fields, 'description');
$image_url        = getFieldValue($page_fields, 'image');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="information pd-150 bg <?php echo $additional_class; ?>">
        <div class="container">
            <?php if ($repeater_achievements_block) : ?>
                <?php $element=0;?>
                <?php foreach ($repeater_achievements_block as $item) : ?>
                    <?php
                        $description = (array_key_exists('description', $item))
                        ? $item['description']
                        : '';
                        $image_url = (array_key_exists('image', $item))
                        ? $item['image']
                        : '';
                        $anchor_value = (array_key_exists('anchor_value', $item))
                        ? $item['anchor_value']
                        : '';
                        $element++;
                        
                    ?>
                <?php
                if($element % 2 === 0){
                    ?>
                    <div class="information__content achievements__content" id="<?php echo do_shortcode($anchor_value); ?>">
                        <div class="row align-items-center">
                            <div class="col-lg-7 offset-lg-0 col-md-6 offset-md-1 col-12 order-md-1 order-1">
                                <div class="information__content-text text-small custom__animate m-delay-2 slideIn-left">
                                    <?php echo ($description)
                                        ? do_shortcode($description)
                                        : ''; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-0 col-md-4 offset-md-0 col-8 offset-2 order-md-2 order-2 image ">
                                <!-- <div class="information__content-img custom__animate delay-2 zoomIn"> -->
                                <div class="information__content-img custom__animate zoomIn--custom">
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
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="information__content achievements__content" id="<?php echo do_shortcode($anchor_value); ?>">
                        <div class="row align-items-center">
                            <div class="col-lg-4 offset-lg-0 col-md-4 offset-md-0 col-8 offset-2 order-md-1 order-2 image">
                                <!-- <div class="information__content-img custom__animate delay-2 zoomIn"> -->
                                <div class="information__content-img custom__animate zoomIn--custom m-delay-3">
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
                                            <path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7 c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
                                        </mask>
                                        <image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-0 col-md-6 offset-md-1 col-12 order-md-2 order-1">
                                <div class="information__content-text text-small custom__animate m-delay-1 slideIn-left">
                                    <?php echo ($description)
                                        ? do_shortcode($description)
                                        : ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>