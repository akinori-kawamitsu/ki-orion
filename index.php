<?php get_header(); ?>
<div class="container">
<main id="main" class="main" role="main">
	<?php if (have_posts()): 
		while (have_posts()): the_post();
	?>
		<?php the_title('<h2 class="post-title">','</h2>');?>
		<div <?php post_class();?>><?php the_content() ;?></div>
		<?php endwhile; ?>

	<?php endif; ?>
</main>
</div>


<?php get_sidebar();?>

<?php get_footer(); ?>