<?php

/**
 * Block Name: Text
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
$title_tag = getFieldValue($page_fields, 'title_tag');

?>

<div class="section__wrapper section__wrapper--no-full-height" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="text__section bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                  <div class="text__block">

                      <?php if ($title_tag){
                        ?>
                        <<?php echo ($title_tag) ? do_shortcode($title_tag) : ''; ?> class="text__title">
                        <?php echo ($block_title) ? do_shortcode($block_title) : ''; ?>
                        </<?php echo ($title_tag) ? do_shortcode($title_tag) : ''; ?>>
                        <?php
                    } else { ?>
                    <h2 class="text__title">
                        <?php echo ($block_title)
                            ? do_shortcode($block_title)
                            : ''; ?>
                    </h2>
                    <?php  } ?>
                    <?php if($block_title){
                      ?>
                      <div class="text__box">
                          <?php echo ($block_text)
                          ? do_shortcode($block_text)
                          : ''; ?>
                      </div>
                      <?php
                    }else {
                      ?>
                      <div class="text__box text__box-center">
                          <?php echo ($block_text)
                          ? do_shortcode($block_text)
                          : ''; ?>
                      </div>
                      <?php
                    }?>

                  </div>
            </div>
        </div>
    </section>
</div>