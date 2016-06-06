<?php get_header(); ?>
<div class="container">
	<main id="main" class="main" role="main">
		<article class="flex">
			<h2 class="col-12">新着記事</h2>
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
		<article class="flex">
			<h2 class="col-12">カテゴリー</h2>
				<?php 
                $my_query = new WP_Query(array(
                                               'category_name'	=> 'あさひ' ,
                                               'posts_per_page' => 3,
                                               'orderby'		=> 'date',
                                               'order'			=> 'DESC',
												'paged'			=> $paged,
                                               )
                                         );
                if ($my_query -> have_posts()):
				while($my_query -> have_posts()) : $my_query -> the_post();

				// $cat_ID = get_category_by_slug('campaign');
				?>
               <section class="col-3">
					<h2 class="post-title"><a href="<?php the_permalink() ;?>"><?php the_title();?></a></h2>
					<div class="content"><?php the_excerpt() ;?></div>
				</section>
                <?php endwhile;?>
			<?php endif; wp_reset_postdata();?>
		</article>
	</main>
</div>


<?php get_sidebar();?>

<?php get_footer(); ?>