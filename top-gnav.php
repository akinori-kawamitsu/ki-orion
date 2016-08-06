<?php
$gnav = array(
	'menu'            => 'gnav-item',
	'menu_class'      => 'toggle-menu',
	'menu_id'         => 'gnav',
	'container'       => 'nav',
	'container_class' => 'drawer-left drawer-wide-top',
	'container_id'    => 'nav',
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'gnav',
	'items_wrap'      => '<div class="btn-burg wp-toggle"></div><ul id="%1$s" class="%2$s flex-tab-eq">%3$s</ul>',
);
wp_nav_menu( $gnav );
?>