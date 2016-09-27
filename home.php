<?php get_header(); ?>
<div class="container">
	<main id="main" class="main" role="main">
		<article class="flex">
			<h2 class="col-12"><?php esc_html_e('recent posts', 'ki-orion');?></h2>
			<?php if (have_posts()): 
				while (have_posts()): the_post();?>
				<section class="col-3">
					<h2 class="post-title"><a href="<?php the_permalink() ;?>"><?php the_title();?></a></h2>
					<div class="content"><?php the_excerpt() ;?></div>
				</section>
				<?php endwhile; ?>
						<?php echo paginate_links( array(
										'base'               => '%_%',
										'format'             => '?page=%#%',
										'total'              => 1,
										'current'            => 0,
										'show_all'           => False,
										'end_size'           => 1,
										'mid_size'           => 2,
										'prev_next'          => True,
										'prev_text'          => esc_html__('&laquo; Previous', 'ki-orion'),
										'next_text'          => esc_html__('Next &raquo;', 'ki-orion'),
										'type'               => 'plain',
										'add_args'           => False,
										'add_fragment'       => '',
										'before_page_number' => '',
										'after_page_number'  => ''
									)); ?>
				<?php ki_page_navigation(); ?>
			<?php endif; ?>
		</article>
		<article class="flex">
			<?php echo do_shortcode('topic'); ?>

		</article>
	</main>
</div>


<?php get_sidebar();?>

<?php get_footer(); ?>