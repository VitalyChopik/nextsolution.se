<?php

 /**
 * Block Name: Navigation block
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
$wwerw        = getFieldValue( $page_fields, 'wwerw' );
    
?>


<div class="nav__wrapper bg <?php echo $additional_class;?>" <?php if(!empty(get_field('block_id'))){ echo 'id="'. get_field('block_id') .'"'; } ?>>
  <div class="container">
        <?php
        wp_nav_menu([
            'theme_location' => 'header',
            'menu' => '',
            'container' => null,
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'nav__block',
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
  </div>
</div>
<script>
  const blockMenuItem = document.querySelectorAll('.nav__block .menu-item .sub-menu .menu-item');
if (blockMenuItem) {
  blockMenuItem.forEach((item) => {
    const menuItemLink = item.querySelectorAll('a');
    menuItemLink.forEach((itemLink) => {
      const menuItemImage = itemLink.querySelectorAll('img');
      menuItemImage.forEach((itemImage) => {
        item.append(itemImage);
      })

    })
  });
}
</script>