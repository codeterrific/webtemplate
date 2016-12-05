			<?php 
			// Check if there are any posts to display
			if ( $query && $query->have_posts() ) {
			?>

			<div class="list">
				<!-- article list query -->
				<?php
					while ($query->have_posts()) {
						// Increment post ID to enable using
						// functions to retrieve data
						$query->the_post(); 
				?>
					<article>
						<?php $img_url = wp_get_attachment_url( get_post_thumbnail_id()); ?>
						<a href="<?php the_permalink(); ?>" style="<?php if(has_post_thumbnail()) { ?>background-image: url(<?php echo $img_url; ?>);<?php } ?>" title="<?php the_title(); ?>">
							<div class="cover">
								<img src="http://codeterrific.com/wp-content/themes/codeterrific/img/open_article.png" alt="">
							</div>
						</a>
						<div class="text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo (has_excerpt() ? get_the_excerpt() : "&nbsp;"); ?></p>
						</div>
						<div class="icons">
							<a href="<?php the_permalink(); ?>" target="_blank" class="new-window"></a>
						</div>
					</article>
				<?php 
					}	// while (have_posts())
				?>
				<div class="clr"></div>
			</div>
			<?php
			} else {// if (have_posts()) is FALSE
				// Try with ordinary listing?
				get_template_part("list");
			
			} // no content