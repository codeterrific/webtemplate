<?php get_header(); ?>
		
		<!-- content -->
			<div role="main">
				<section>
					<!-- Section heading -->
					<div role="heading" class="heading">
						<h1>Latest articles</h1>
					</div>

					<?php
						// Query for the first sticky post
						$sticky = get_option( 'sticky_posts' );
						/* Sort Sticky Posts, newest at the top */
						rsort( $sticky );
						$args = array(
							'posts_per_page' => 1,
							'post__in'  => $sticky,
							'ignore_sticky_posts' => 1
						);
						/* Query Sticky Posts */
						$query = new WP_Query( $args );
						if ( isset($sticky[0]) ) { 
						// If sticky post exists, extract it
						$query->the_post();
						// Add ID to exclusion list
						$exclude_from_list = [get_the_ID()];
						?>
					<!-- featurette -->
					<div class="featured">
						<article>
							<a href="<?php the_permalink(); ?>">
								<?php $img_url = wp_get_attachment_url( get_post_thumbnail_id()); ?>
								<img src="<?php echo $img_url; ?>" alt="" />
								<div class="cover"></div>
								<div class="text">
									<h2><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</a>
						</article>
					</div>
					<?php
						} // if ( isset($sticky[0]) )
						/* Restore original Post Data */
						wp_reset_postdata();
					?>

					<!-- list of articles -->
					<?php 
						/* Remove post from query */
						$query = new WP_Query( array( 'post__not_in' => $exclude_from_list));
						/* Fetch list */
						include( locate_template( 'list-query.php' ) );
					?>
				</section>
			</div>
<?php get_footer(); ?>