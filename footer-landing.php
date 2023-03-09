<footer class="footer">
<?php
global $global_options;

$footer_image_url = getFieldValue( $global_options, 'footer_image' );
$copyright_text   = getFieldValue( $global_options, 'copyright_text' );
$footer_title     = getFieldValue( $global_options, 'footer_title' );
$email            = getFieldValue( $global_options, 'email' );
$phone            = getFieldValue( $global_options, 'phone' );
$address          = getFieldValue( $global_options, 'address' );
$repeater_social  = getFieldValue( $global_options, 'repeater_social' );

?>
    <div class="container">
        <div class="footer__block">
            <div class="img">
                <h3 class="contact__title">
                <?php echo ($footer_title)
                        ? do_shortcode($footer_title)
                        : ''; ?>
                </h3>
                    <?php if ($footer_image_url) : ?>
                        <img src="<?php echo $footer_image_url; ?>" alt="Contact phone" />
                    <?php endif; ?>
               
            </div>
            <div class="contacts d-flex">
                <div class="contacts__box">
                    <h4><?php _e('Email'); ?></h4>
                    <?php if ($email) : ?>
                        <a class="site-footer__contacts--item-mail" href="mailto:<?php echo $email
                                            ? do_shortcode($email)
                                            : ''; ?>">
                        
                            <?php echo $email
                                ? do_shortcode($email)
                                : '';
                            ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="contacts__box">
                    <h4><?php _e('Telefon'); ?></h4>
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
                <div class="contacts__box">
                    <h4><?php _e('Adress'); ?></h4>
                    <a><?php echo ($address) ? do_shortcode($address) : ''; ?></a>
                </div>
            </div>
            <div class="social">
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
                        
                        <a href="<?php echo  $social_link; ?>" target="_blank" class="site-footer__social-item">
                            <?php echo $social_icon; ?>
                            <span><?php echo do_shortcode($social_title); ?></span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="copy-text">
               <span>© <?php echo ($copyright_text)
                            ? do_shortcode($copyright_text)
                            : ''; ?></span>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();?>
<script>
    wow = new WOW(
            {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       false,       // default
            live:         true        // default
        }
        )
        wow.init();
</script>
</body>

</html>