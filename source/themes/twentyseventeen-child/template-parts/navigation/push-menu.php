<?php
/**
 * Displays push-menu
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


$menu_items = wp_get_nav_menu_items('Main');

function listClasses($menu_item) {
  echo implode(', ', $menu_item->classes);
};
?>
<!-- Pushy Menu -->
<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <ul>
          <?php
          $submenu = false;
          $count = 0;
          foreach ($menu_items as $menu_item) {
            if ( !$menu_item->menu_item_parent ):
              $parent_id = $menu_item->ID;
            ?>
              <li id="id-<?php echo $menu_item->ID; ?>" class="<?php in_array('pushy-submenu', $menu_item->classes) ? '' : 'pushy-link'; ?> <?php $menu_item->classes ? listClasses($menu_item) : ''; ?>">
                <?php
                if (!in_array('pushy-submenu', $menu_item->classes)) {
                ?>
                  <a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
            <?php
                }
                else {
                ?>
                  <button><?php echo $menu_item->title; ?></button>
                <?php
                }
            endif;

            if ( $parent_id == $menu_item->menu_item_parent ):
              if ( !$submenu ): $submenu = true;
              ?>
                <ul class="sub-menu">
              <?php
              endif;
              ?>
                  <li class="pushy-link item">
                    <a href="<?php echo $menu_item->url; ?>" class="title"><?php echo $menu_item->title; ?></a>
                  </li>
              <?php
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                </ul>
                <?php
                $submenu = false;
                endif;
                ?>
            <?php
          endif;
          ?>
          <?php if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
          </li>
          <?php
          endif;
          $count++;
          }
          ?>
        </ul>
    </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>
