			<div class="list">
				<!-- article list -->
				<?php 
				// Check if there are any posts to display
				if ( have_posts() ) {
						while (have_posts()) {
							// Increment post ID to enable using
							// functions to retrieve data
							the_post(); 
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
					} else {// if (have_posts())
				?>
					<div class="message no-content">
						<img src="<?php echo get_template_directory_uri(); ?>/img/rocket_blue.png" alt="Speedy rocket">
						<h2>Holy smokes!</h2>
						<p>You're reading too fast, we aren't able to keep up.</p>
						<p>Come back later when we've cooked up something amazing for you to read!</p>
						<p><span style="font-weight: 400; font-style: italic; color:#af3e65;">- Code Terrific Team</span></p>
						<div class="clr"></div>
					</div>

				<?php } // no content ?>
				<div class="clr"></div>
			</div>