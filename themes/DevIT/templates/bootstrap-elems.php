<?php
/**
 * Template Name: Bootstrap ements
 */


get_header();?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
			<h3><?php the_title();?></h3>
			<div class="row">
				<?php
				$args = array(
					'post_type' => 'movies',
					'posts_per_page' => 4
				);
				$query = new WP_Query($args);
				if( $query->have_posts() ){
					while( $query->have_posts() ){ $query->the_post();
					?>
						<div class="col-md-6">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php the_excerpt(); ?>
						</div>
					<?php
					}
					wp_reset_postdata();
				} 
				else echo 'Фильов нет.';
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>