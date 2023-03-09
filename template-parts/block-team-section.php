<?php

/**
 * Block Name: Team section
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$page_fields = get_fields();

$additional_class    = (array_key_exists('className', $block))
    ? $block['className']
    : '';
$block_title         = getFieldValue($page_fields, 'block_title');
$repeater_team_items = getFieldValue($page_fields, 'repeater_team_items');

?>

<div class="section__wrapper" <?php if (!empty(get_field('block_id'))) {
                                    echo 'id="' . get_field('block_id') . '"';
                                } ?>>
    <section class="teamet bg <?php echo $additional_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h1 class="title-h1 custom__animate slideIn-top text-center">
                        <?php echo ($block_title)
                            ? do_shortcode($block_title)
                            : ''; ?>
                    </h1>
                </div>
            </div>
            <div class="teamet--scroll-row row custom__animate appear slower">
                <div class="btn-scroll--wrapper col-md-3">
                    <button type="button" class="btn-scroll">
                        <?php _e('Scroll'); ?>
                        <div class="btn-arrows"></div>
                    </button>
                </div>
                <div class="col-md-9">
                    <div class="teams-scroll js-teams-scroll">
                        <?php if ($repeater_team_items) : ?>
                            <?php foreach ($repeater_team_items as $item) : ?>
                                <?php
                                $image_url              = (array_key_exists('image', $item))
                                    ? $item['image']
                                    : '';
                                $teams_card_title       = (array_key_exists('teams_card_title', $item))
                                    ? $item['teams_card_title']
                                    : '';
                                $teams_card_description = (array_key_exists('teams_card_description', $item))
                                    ? $item['teams_card_description']
                                    : '';
                                ?>

                                <div class="teams-card">
                                    <div class="teams-card__figure">

                                        <?php
                                        $image_url = kama_thumb_src(array(
                                            'src' => $image_url,
                                            'w' => 520,
                                            'h' => 520,
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
                                    <h3 class="teams-card__title">
                                        <?php echo do_shortcode($teams_card_title); ?>
                                    </h3>
                                    <p class="teams-card__description">
                                        <?php echo do_shortcode($teams_card_description); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>