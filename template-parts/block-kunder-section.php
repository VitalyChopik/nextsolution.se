<?php
/**
 * Block Name: Kunder section
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class             = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$block_title                  = getFieldValue( $page_fields, 'block_title' );
$sub_title                    = getFieldValue( $page_fields, 'sub_title' );
$repeater_items_top_slider    = getFieldValue( $page_fields, 'repeater_items_top_slider' );
$repeater_items_bottom_slider = getFieldValue( $page_fields, 'repeater_items_bottom_slider' );
$title_tag = getFieldValue($page_fields, 'title_tag');
?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="kunder bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 kunder__content">
                    <div class="text">
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
                        <p class="description">
							<?php echo ( $sub_title )
								? do_shortcode( $sub_title )
								: ''; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-icon animate-brands-left">
            <div class="list-icon__content js-move-right">
                <?php if ( $repeater_items_top_slider ): ?>
                    <?php foreach ( $repeater_items_top_slider as $item ): ?>
                        <?php
                        $image_url = array_key_exists( 'image', $item )
                            ? $item['image']
                            : '';
                        ?>
                        <div class="list-item">
                            <img src="<?php echo $image_url; ?>"
                                 alt="Slide image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ( $repeater_items_top_slider ): ?>
                    <?php foreach ( $repeater_items_top_slider as $item ): ?>
                        <?php
                        $image_url = array_key_exists( 'image', $item )
                            ? $item['image']
                            : '';
                        ?>
                        <div class="list-item">
                            <img src="<?php echo $image_url; ?>"
                                 alt="Slide image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <div class="list-icon animate-brands-right">
            <div class="list-icon__content js-move-left">
                <?php if ( $repeater_items_bottom_slider ): ?>
                    <?php foreach ( $repeater_items_bottom_slider as $item ): ?>
                        <?php
                        $image_url = array_key_exists( 'image', $item )
                            ? $item['image']
                            : '';
                        ?>
                        <div class="list-item">
                            <img src="<?php echo $image_url; ?>"
                                 alt="Slide image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ( $repeater_items_bottom_slider ): ?>
                    <?php foreach ( $repeater_items_bottom_slider as $item ): ?>
                        <?php
                        $image_url = array_key_exists( 'image', $item )
                            ? $item['image']
                            : '';
                        ?>
                        <div class="list-item">
                            <img src="<?php echo $image_url; ?>"
                                 alt="Slide image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </section>
</div>