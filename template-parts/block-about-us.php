<?php

/**
 * Block Name: About us
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();


$additional_class     = (array_key_exists('className', $block))
    ? $block['className']
    : '';
$block_title          = getFieldValue($page_fields, 'block_title');
$block_text           = getFieldValue($page_fields, 'block_text');
$block_button_text           = getFieldValue($page_fields, 'button_text');
$block_button_link           = getFieldValue($page_fields, 'button_link');
$title_tag = getFieldValue($page_fields, 'title_tag');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="information bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-md-12">
                    <div class="information__content">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="information__content-text">
                                    <?php
                                    if ($title_tag){
                                        ?>
                                        <<?php echo ($title_tag)
                                                ? do_shortcode($title_tag)
                                                : ''; ?>>
                                            <?php echo ($block_title)
                                                ? do_shortcode($block_title)
                                                : ''; ?>
                                        </<?php echo ($title_tag)
                                                ? do_shortcode($title_tag)
                                                : ''; ?>>
                                        <?php
                                    } else { ?>
                                    <h2>
                                        <?php echo ($block_title)
                                            ? do_shortcode($block_title)
                                            : ''; ?>
                                    </h2>
                                    <?php  } ?>

                                </div>
                            </div>
                            <div class="col-md-4 offset-md-1">
                                <div class="information__content-text">
                                    <p class="bl-sec">
                                        <?php echo ($block_text)
                                            ? do_shortcode($block_text)
                                            : ''; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($block_button_link && $block_button_text) { ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-7">
                                <div class="information__button d-flex justify-content-lg-center justify-content-md-end justify-content-center">
                                    <a href="<?php echo $block_button_link; ?>"><?php echo $block_button_text; ?></a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>