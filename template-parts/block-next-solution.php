<?php

/**
 * Block Name: Next solution
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
$title          = getFieldValue($page_fields, 'title');
$comment          = getFieldValue($page_fields, 'comment');
$gallery          = getFieldValue($page_fields, 'gallery');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="comment bg2 <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                <div class="comment__content">
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="title-h3">
                                <?php echo ($title)
                                    ? do_shortcode($title)
                                    : ''; ?>
                            </h3>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo ($comment)
                                    ? do_shortcode($comment)
                                    : ''; ?></p>
                        </div>
                    </div>

                    <div class="list-image">
                        <?php if ($gallery) : ?>
                            <?php foreach ($gallery

                                as $key => $image_url) : ?>
                                <?php if ($key === 1) : ?>
                                    <div class="list-image__big img">
                                    <?php else : ?>
                                        <div class="list-image__small img">
                                        <?php endif; ?>
                                        <?php
                                        if ($key === 1) {
                                            $image_url = kama_thumb_src(array(
                                                'src' => $image_url,
                                                'w' => 320,
                                                'h' => 320,
                                            ));
                                        } else {
                                            $image_url = kama_thumb_src(array(
                                                'src' => $image_url,
                                                'w' => 200,
                                                'h' => 200,
                                            ));
                                        }
                                        ?>
                                        <svg viewBox="0 0 420 420" role="img" class="image-mask" preserveAspectRatio="xMidYMid slice">
                                            <?php $rand_id = bin2hex(random_bytes(10)); ?>
                                            <mask id="svgmask-<?php echo $rand_id; ?>">
                                                <path fill="#ffffff" d="M58.1,84.3C137.8,15,316.4-40.2,369.2,38.7c52.8,78.9,66.3,178.4,31.7,250.2c-20,41.5-44.1,58-81.9,81.7
c-87.8,55.2-187.9,75.8-260.9,0C-17,292.7-21.7,153.6,58.1,84.3z" />
                                            </mask>
                                            <image width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image_url ?>" mask="url(#svgmask-<?php echo $rand_id; ?>)"></image>
                                        </svg>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                    </div>
                    </div>
                </div>
            </div>
    </section>
</div>