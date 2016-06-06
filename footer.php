<footer id="footer" class="footer">
		<?php
$snav = array(
	'menu'            => 'fnav-item',
	'menu_class'      => 'fnav',
	'menu_id'         => 'fnav',
	'container'       => 'div',
	'container_class' => 'footer-nav',
	'container_id'    => 'footer-nav',
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'fnav',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $snav ); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>