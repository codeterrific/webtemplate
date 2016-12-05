<?php get_header(); ?>
		<?php if (have_posts()) {
				while (have_posts()) {
					// Increment post ID to enable using
					// functions to retrieve data
					the_post(); 
		?>
		<!-- content -->
			<div role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- article image -->
					<?php if(has_post_thumbnail()){ ?>
					<div class="image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php } // if(has_post_thumbnail()) ?>

					<!-- article heading -->
					<div role="heading" class="heading">
						<div class="heading-position">
							<h1><?php the_title(); ?></h1>
							<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d F Y'); ?></time>
						</div>
					</div>

					<div class="center">
						<?php if ('post' == get_post_type()) { ?>
						<!-- Back button -->
						<?php
							/*
							$url = wp_get_referer();
							$path_parts = pathinfo($url);
						?>
						<a class="btn" href="<?php echo $url; ?>">&lsaquo; Back to "<?php echo $path_parts['filename']; ?>"</a>
						<div class="clr"></div>
						<?php */ ?>

						<!-- author -->
						<aside>
							<?php
								$author_id = get_the_author_meta( 'ID' );
								// Get and display avatar
								echo get_avatar( $author_id, 96 );
							?>
							<h2><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></h2>
							<p><?php if(get_the_author_meta('description')) { the_author_meta('description'); } else { ?>This author doesn't have a description...<?php } ?></p>
						</aside>
						<?php } // if ( 'post' == get_post_type() ) ?>

						<!-- article content -->
						<div id="article-content">
							<?php the_content(); ?>
						</div>
						<div class="clr"></div>
					</div>
				</article>
			</div>
			
			<?php if( current_user_can('level_10') ) : ?>
				<div id="comments">
					<?php comments_template(); ?> 
				</div>
				<div class="clr"></div>
			<?php endif; ?>
	<?php 
			}	// while (have_posts())
		}	// if (have_posts())
	?>
<?php get_footer(); ?>