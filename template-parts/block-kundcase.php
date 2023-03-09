<?php

/*/**
 * Block Name: Kundcase
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class = ( array_key_exists( 'className', $block ) )
	? $block['className']
	: '';
$block_title      = getFieldValue( $page_fields, 'block_title' );
$sub_title        = getFieldValue( $page_fields, 'sub_title' );
$repeater_cards   = getFieldValue( $page_fields, 'repeater_cards' );
$button_text      = getFieldValue( $page_fields, 'button_text' );

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
<section class="kundcase bg <?php echo $additional_class; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-10 kundcase__content pd-150">
                <div class="text">
                    <h1 class="title-h1">
                        <?php echo ( $block_title ) ? do_shortcode($block_title) : ''; ?>
                    </h1>
                    <p class="description">
	                    <?php echo ( $sub_title ) ? do_shortcode($sub_title) : ''; ?>
                    </p>
                </div>

                <?php if ($repeater_cards): ?>
                    <?php foreach ($repeater_cards as $key => $card): ?>
                        <?php
                            $image_card = (array_key_exists('image_card', $card))
	                            ? $card['image_card']
	                            : '';
                            $card_title = (array_key_exists('card_title', $card))
	                            ? $card['card_title']
	                            : '';
                            $description_card = (array_key_exists('description_card', $card))
	                            ? $card['description_card']
	                            : '';
                        ?>

                        <?php if ( ($key % 2) !== 0 ): ?>
                            <div class="row card right">
                                <?php else: ?>
                                <div class="row card">
                        <?php endif; ?>
                            <div class="col-md-4 over">
                                <div class="block-hover custom__animate  <?php echo (($key % 2) !== 0)
                                        ? 'slideIn-leftTop'
                                        : 'slideIn-rightTop'; ?>">
                                    <div class="img">
                                        <img src="<?php echo  $image_card; ?>"
                                             alt="Card image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 under">
                                <div class="text custom__animate delay-2 m-delay-1 <?php echo (($key % 2) !== 0)
	                                ? 'slideIn-right'
	                                : 'slideIn-left'; ?>">
                                    <h2 class="title-h2">
	                                    <?php echo do_shortcode($card_title); ?>
                                    </h2>
                                    <p class="description">
	                                    <?php echo do_shortcode($description_card); ?>
                                    </p>
                                </div>
                            </div>
                                </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($button_text): ?>
	                <a href="#" data-role="show-more-case">
		                <div class="btn">
			                <?php echo do_shortcode($button_text); ?>
		                </div>
	                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
</div>