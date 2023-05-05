<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scall=1.0, minimum-scale=0.25, maximum-scale=4.0">
	<?php get_template_part('phpmodule/ogp');?>
	
	<title><?php wp_title(); ?></title>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
<?php get_template_part('phpmodule/ies');?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header" id="header">
	<div class="container header-container">
		<div class="header-logo">
			logo
		</div>
		<?php $gnav = array(
	'menu'            => 'gnav-item',
	'menu_class'      => 'toggle-menu',
	'menu_id'         => '',
	'container'       => 'nav',
	'container_class' => '',
	'container_id'    => 'gnav',
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'gnav',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $gnav );?>
		<button class="hamburger" id="hamburger" onclick="navopen()">
			<span class="burg-line-tc" aria-role="presentation"></span>
			<span class="burg-line-b" aria-role="presentation"></span>
			<span class="burg-text"></span>
		</button>
	</div>
    <script>
        function navopen() {
            document.getElementById("hamburger").classList.toggle("js-open");
            document.getElementById("gnav").classList.toggle("js-open");
        }
    </script>
</header>