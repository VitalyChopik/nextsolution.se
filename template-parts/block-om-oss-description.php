<?php

/**
 * Block Name: Om oss description
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

$title       = getFieldValue($page_fields, 'title');
$description = getFieldValue($page_fields, 'description');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="descript bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 col-12 descript__content px-md-0 ">
                    <div class="description  custom__animate slideIn-bottom">
                        <?php if ($title) { ?>
                            <h3 class="title-h3">
                                <?php echo ($title) ? do_shortcode($title) : ''; ?>
                            </h3>
                        <?php } ?>
                        <?php echo ($description)
                            ? do_shortcode($description)
                            : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>