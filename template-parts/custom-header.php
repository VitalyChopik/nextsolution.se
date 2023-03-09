<header class="site-header">
    <div class="container header-line">
        <div class="row">
            <div class="col-md-12">
                <div class="head js-head ">
                    <?php if ($logo) : ?>
                        <a href="<?php echo get_home_url(); ?>" class="site-logo">
                            <img src="<?php echo $logo; ?>" alt="Site logo" />
                        </a>
                    <?php endif; ?>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header',
                        'menu' => '',
                        'container' => null,
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'header-nav',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => '',
                    ]);
                    ?>
                    <?php 
                    global $global_options;
                    $headerBtn = getFieldValue( $global_options, 'header_button' );
                    if($headerBtn){ ?>
                        <a href="<?php echo get_permalink($headerBtn->ID)?>" class="header__contact-link"><?php echo esc_html( $headerBtn->post_title)?></a>
                    <?php } ?>
                    <button type="button" class="icon-menu btn-menu">
                        <svg width="63" height="23" class="icon-menu-burger" viewBox="0 0 63 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="1.5" x2="46" y2="1.5" stroke="#F6921E" stroke-width="2" />
                            <line y1="11.5" x2="46" y2="11.5" stroke="#F6921E" stroke-width="2" />
                            <line y1="21.5" x2="46" y2="21.5" stroke="#F6921E" stroke-width="2" />
                        </svg>
                    </button>
                    <button class="icon-cross btn-menu-cross">
                        <svg width="37" height="35" class="icon-cross-menu" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.39739" y1="33.9246" x2="33.9243" y2="1.3977" stroke="white" stroke-width="2" />
                            <line x1="3.07527" y1="1.66118" x2="35.6022" y2="34.1881" stroke="white" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
const menuItem = document.querySelectorAll('.menu-item .sub-menu .menu-item'),
  menuItemActive = document.querySelectorAll('.header-nav .menu-item-has-children'),
  menuBtn = document.createElement('div'),
  dropdownMenu = document.querySelector('.dropdown-menu');

menuBtn.classList.add('menu__item-btn');
if (menuItem) {
  menuItem.forEach((item) => {
    const menuItemLink = item.querySelectorAll('a');
    menuItemLink.forEach((itemLink) => {
      const menuItemImage = itemLink.querySelectorAll('img');
      menuItemImage.forEach((itemImage) => {
        item.append(itemImage);
      })

    })
  });
}
if(dropdownMenu) {
    dropdownMenu.append(menuBtn);
    menuBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('active');
    });
}
</script>
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>