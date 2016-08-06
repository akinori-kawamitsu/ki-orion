<?php get_header(); ?>
<div class="container">
	<main id="main" class="main" role="main">
		<article class="flex">
			<h2 class="post-title col-12"><?php single_cat_title( '', true ); ?></h2>
			<?php if (have_posts()): 
				while (have_posts()): the_post();?>
				<section class="col-3">
					<h2 class="post-title"><a href="<?php the_permalink() ;?>"><?php the_title();?></a></h2>
					<div class="content"><?php the_excerpt() ;?></div>
				</section>
				<?php endwhile; ?>
				<?php ki_page_navigation(); ?>
			<?php endif; ?>
		</article>
	</main>
</div>


<?php get_sidebar();?>

<?php get_footer(); ?>