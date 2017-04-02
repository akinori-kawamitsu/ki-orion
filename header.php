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
<header class="header" id="header">
	<div class="container">
		<div class="float">
			<div class="col-sp-9 col-tab-11">
			<?php get_template_part('top-gnav');?>
			</div>
			<div class="col-sp-3 col-tab-1">
				logo
			</div>
		</div>
	</div>
</header>