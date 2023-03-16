<?php

/*/**
 * Block Name: Om oss
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
$description      = getFieldValue($page_fields, 'description');
$block_image_url  = getFieldValue($page_fields, 'block_image');
$button_text      = getFieldValue($page_fields, 'button_text');
$button_link      = getFieldValue($page_fields, 'button_link');
$title_tag = getFieldValue($page_fields, 'title_tag');
?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="omoss bg2 <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row omoss__content align-items-md-center">

                <div class="col-md-5 offset-md-0 col-8 offset-2 image">
                    <div class="omoss__content-img custom__animate slideIn-leftTop">
                        <?php
                        if ($title_tag){
                            ?>
                            <<?php echo ($title_tag)
                                    ? do_shortcode($title_tag)
                                    : ''; ?> class="title-h1">
                                <?php echo ($block_title)
                                    ? do_shortcode($block_title)
                                    : ''; ?>
                            </<?php echo ($title_tag)
                                    ? do_shortcode($title_tag)
                                    : ''; ?>>
                            <?php
                        } else { ?>
                        <h2 class="title-h1">
                            <?php echo ($block_title)
                                ? do_shortcode($block_title)
                                : ''; ?>
                        </h2>
                        <?php  } ?>
                        <img src="<?php echo ($block_image_url)
                                        ? do_shortcode($block_image_url)
                                        : ''; ?>" alt="Section image">
                    </div>
                </div>
                <div class="col-md-6 offset-md-1 custom__animate zoomIn--custom">
                    <p class="description">
                        <?php echo ($description)
                            ? do_shortcode($description)
                            : ''; ?>
                    </p>
                    <div class="d-flex justify-content-md-start justify-content-center">
                        <?php if ($button_link) { ?>
                            <a href="<?php echo $button_link; ?>" class="btn">
                                <?php echo ($button_text)
                                    ? do_shortcode($button_text)
                                    : ''; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>