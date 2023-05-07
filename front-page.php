<?php get_header(); ?>
		<div class="top-kv"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></div>
<div class="content-wrapper">
	<main id="main" class="top-main" role="main">
		<article class="top-contents container">
			<?php if (have_posts()): 
				while (have_posts()): the_post();?>
				<section class="top-page">
					<?php if (has_post_thumbnail()):?>
					<?php the_post_thumbnail( 'full' ); ?>
					<?php endif;?>
					<?php the_title(); ?>
					<?php the_content();?>
				</section>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
		<div class="container">
			<article class="flex">
				<?php $child_query1 =  new WP_Query( array(
					'post_type'		=> 'post',
					'category_name'	=> '未分類',
					'posts_per_page'=> 8,
				));?>
				<h2 class="col-12">未分類</h2>
				<?php if ( $child_query1 -> have_posts()): 
					while ( $child_query1 -> have_posts()): $child_query1 -> the_post();?>
					<section class="col-3 top-posts card">
						<?php if (has_post_thumbnail()):?>
						<a href="<?php the_permalink() ;?>" class="small-img"><?php the_post_thumbnail( 'small' ); ?></a>
						<?php else: ?>
						<a href="<?php the_permalink() ;?>" class="no-img">No image</a>
						<?php endif;?>
						<h2 class="card-post-title"><a href="<?php the_permalink() ;?>"><?php echo mb_substr( $post->post_title, 0, 20) . '...';?></a></h2>
						<div class="card-post-excerpt"><?php echo mb_substr( get_the_excerpt(), 0, 50 ) . '[...]';?></div>
						<div class="card-more" aria-role="button"><a href="<?php the_permalink() ;?>" class="card-more-btn">詳しく</a></div>
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
				<?php endif; wp_reset_postdata();?>
			</article>

		</div>
	</main>

<?php get_sidebar();?>
</div>
<?php get_footer(); ?>