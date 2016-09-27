<?php get_header(); ?>
<div class="container">
<main id="main" class="main" role="main">
<?php  ki_breadcrumb() ;?>
	<?php if (have_posts()): 
		while (have_posts()): the_post();
	?>
		<?php the_title('<h2 class="post-title">','</h2>');?>
		<div <?php post_class();?>><?php the_content() ;?></div>
		<div class="link-pages">
			<?php
				$defaults = array(
					'before'           => '<p>' . __( 'Pages:','ki-orion' ),
					'after'            => '</p>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'nextpagelink'     => __( 'Next page','ki-orion' ),
					'previouspagelink' => __( 'Previous page','ki-orion' ),
					'pagelink'         => '%',
					'echo'             => 1
				);
				wp_link_pages( $defaults );
			?>
		</div>
		<?php endwhile; ?>

	<?php endif; ?>
</main>

<?php comments_template(); ?>
</div>


<?php get_sidebar();?>

<?php get_footer(); ?>