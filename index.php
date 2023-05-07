<?php get_header(); ?>
	<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post();
	?>
	<?php if (has_post_thumbnail() ) :?>
	<div class="page-kv"><?php the_post_thumbnail( 'full' );?></div>
	<?php endif;?>
	<?php  ki_breadcrumb() ;?>
<div class="content-wrapper">
<main id="main" class="main" role="main">

	<div class="container">
		<?php the_title('<h2 class="post-title">','</h2>');?>
		<div <?php post_class();?>><?php the_content() ;?></div>
		</div>
		<?php comments_template(); ?>
	</main>
	<?php get_sidebar();?>
</div>
		<?php endwhile; ?>

	<?php endif; ?>
<?php get_footer(); ?>