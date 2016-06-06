<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scall=1.0, minimum-scale=0.25, maximum-scale=4.0">
	<?php get_template_part('phpmodule/ogp');?>
	<title><?php wp_title(); ?></title>

<?php wp_head(); ?>
<?php get_template_part('phpmodule/ies');?>

</head>
<body>
<header class="header-fix" id="header">
	<div class="container">
		<?php get_template_part('top-gnav');?>
	</div>
</header>