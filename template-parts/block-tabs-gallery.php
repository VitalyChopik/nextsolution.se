<?php
/**
 * Block Name: Tabs gallery
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
$tabs             = getFieldValue( $page_fields, 'tabs_gallery' );
$rand             = rand( 1, 999 );
$tabs_id_keys     = [];

?>

<div class="section__wrapper" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
    <section class="kundcase pd-t-200 bg case-page">
        <div class="container">
            <div class="row kundcase-row">
                <div id="tabs" class="col-md-10 info-omoss__content">
                    <ul class="tabs-ul custom__animate appear">
						<?php foreach ( $tabs as $key => $val ) { ?>
							<?php
							$id_key = $rand + $key;
							array_push( $tabs_id_keys, $id_key );
							?>
                            <li>
                                <a class="js-nav-selector <?php echo $key === 0 ? 'active' : ''; ?>"
                                   href="#tab-<?php echo $id_key; ?>">
									<?php echo $val['nav_text']; ?>
                                </a>
                            </li>
						<?php } ?>
                    </ul>
                    <div class="col-md-10 kundcase__content pd-150">
						<?php foreach ( $tabs as $key => $val ) { ?>
							<?php
							$id = $tabs_id_keys[ $key ];
							?>
							<?php if ( $val['repeater_cards'] ) { ?>
                                <div id="tab-<?php echo $id; ?>"
                                     class="row tab js-tab-selector <?php echo $key === 0 ? 'active' : ''; ?>">
									<?php foreach ( $val['repeater_cards'] as $key_2 => $card ) { ?>
										<?php
										$title       = ( array_key_exists( 'title', $card ) )
											? $card['title']
											: '';
										$description = ( array_key_exists( 'description', $card ) )
											? $card['description']
											: '';
										$image       = ( array_key_exists( 'image', $card ) )
											? $card['image']
											: '';
										?>
										<?php if ( ( $key_2 % 2 ) === 0 ) { ?>
                                            <div class="row card">
                                                <div class="col-md-4 over">
                                                    <div class="block-hover custom__animate slideIn-rightTop">
                                                        <div class="img">
															<?php if ( $image ) { ?>
                                                                <img src="<?php echo do_shortcode( $image ); ?>"
                                                                     alt="Card image"/>
															<?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 under">
                                                    <div class="text big custom__animate slideIn-left delay-2 m-delay-1">
                                                        <h2 class="title-h2">
															<?php echo ( $title )
																? $title
																: ''; ?>
                                                        </h2>
														<?php echo ( $description )
															? $description
															: ''; ?>
                                                    </div>
                                                </div>
                                            </div>
										<?php } else { ?>
                                            <div class="row card right">
                                                <div class="col-md-4 over">
                                                    <div class="block-hover custom__animate slideIn-leftTop">
                                                        <div class="img">
															<?php if ( $image ) { ?>
                                                                <img src="<?php echo do_shortcode( $image ); ?>"
                                                                     alt="Card image"/>
															<?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 under">
                                                    <div class="text big custom__animate slideIn-right delay-2 m-delay-1">
                                                        <h2 class="title-h2">
															<?php echo ( $title )
																? $title
																: ''; ?>
                                                        </h2>
                                                        <p class="description">
															<?php echo ( $description )
																? $description
																: ''; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
										<?php } ?>
									<?php } ?>
                                </div>
							<?php } ?>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>