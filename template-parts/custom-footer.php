<footer class="site-footer bg-fill">
    <div class="container">
        <div class="site-footer__content row">
            <div class="site-footer__title col-md-3 col-5">
                <h3 class="title col-12">
                    <?php echo ($footer_title)
                        ? do_shortcode($footer_title)
                        : ''; ?>
                </h3>
                <div class="img col-12">
                    <?php if ($footer_image_url) : ?>
                        <img src="<?php echo $footer_image_url; ?>" alt="Contact phone" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="site-footer__info col-md-8 offset-md-1 col-6">
                <div class="site-footer__contacts row">
                    <div class="site-footer__contacts--item col-md-4 col-12">
                        <span><?php _e('Email'); ?></span>
                        <?php if ($email) : ?>
                            <a class="site-footer__contacts--item-mail" href="mailto:<?php echo $email
                                                ? do_shortcode($email)
                                                : ''; ?>">
                            <svg style="margin: 0 5px 1px 0; " fill="none" height="11" viewBox="0 0 34 27" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 25.6H5.5C3.4 25.6 1.70001 23.8929 1.70001 21.7841V5.41592C1.70001 3.30714 3.4 1.59998 5.5 1.59998H28.5C30.6 1.59998 32.3 3.30714 32.3 5.41592V21.7841C32.4 23.8929 30.6 25.6 28.5 25.6Z" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"/><path d="M17 14.9557L2.60001 3.60834" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><path d="M31.4 3.60834L17 14.9557" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></svg>
                            
                                <?php echo $email
                                    ? do_shortcode($email)
                                    : '';
                                ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="site-footer__contacts--item col-md-3 offset-md-1 col-12">
                        <span><?php _e('Telefon'); ?></span>
                        <?php
                        if (!empty($phone)) {
                            $phone_arr = explode(',', $phone);
                            if (!empty($phone_arr)) {
                                foreach ($phone_arr as $item) {
                                    $tel_attr = preg_replace('/([\-\s\(\)\/])+/', '', $item);
                                    echo '<a href="tel:' . $tel_attr . '">' . $item . '</a>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="site-footer__contacts--item col-md-3 offset-md-1 col-12">
                        <span><?php _e('Adress'); ?></span>
                        <p>
                            <?php echo ($address) ? do_shortcode($address) : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="site-footer__social d-md-block d-none">
                    <ul>
                        <?php if ($repeater_social) : ?>
                            <?php foreach ($repeater_social as $item) : ?>
                                <?php
                                $social_link = (array_key_exists('social_link', $item))
                                    ? $item['social_link']
                                    : '';
                                $social_icon = (array_key_exists('social_icon', $item))
                                    ? $item['social_icon']
                                    : '';
                                $social_title = (array_key_exists('social_title', $item))
                                    ? $item['social_title']
                                    : '';
                                ?>
                                <li>
                                    <a href="<?php echo  $social_link; ?>" target="_blank" class="site-footer__social-item">
                                        <?php echo $social_icon; ?>
                                        <span><?php echo do_shortcode($social_title); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="site-footer__copyright d-md-flex d-flex" style="margin-bottom: 20px;">
                    <a href="https://nextsolution.se/privacy-policy-for-next-solution/" style="margin-right: 20px;">Privacy Policy</a>
                    <a href="https://nextsolution.se/cookies-policy-for-next-solution/">Cookies Policy</a>
                </div>
                <div class="site-footer__copyright d-md-block d-none">
                    <p><span>©</span>
                        <?php echo ($copyright_text)
                            ? do_shortcode($copyright_text)
                            : ''; ?>
                    </p>
                </div>
            </div>
            <div class="site-footer__social d-md-none d-block">
                <ul class="d-flex justify-content-center">
                    <?php if ($repeater_social) : ?>
                        <?php foreach ($repeater_social as $item) : ?>
                            <?php
                            $social_link = (array_key_exists('social_link', $item))
                                ? $item['social_link']
                                : '';
                            $social_icon = (array_key_exists('social_icon', $item))
                                ? $item['social_icon']
                                : '';
                            $social_title = (array_key_exists('social_title', $item))
                                ? $item['social_title']
                                : '';
                            ?>
                            <li>
                                <a href="<?php echo  $social_link; ?>" target="_blank"  class="site-footer__social-item">
                                    <?php echo $social_icon; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="site-footer__copyright d-md-none d-block">
                <p><span>©</span>
                    <?php echo ($copyright_text)
                        ? do_shortcode($copyright_text)
                        : ''; ?>
                </p>
            </div>
        </div>
    </div>
</footer>