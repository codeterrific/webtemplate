<?php get_header(); ?>
		<?php if (have_posts()) {
				while (have_posts()) {
					// Increment post ID to enable using
					// functions to retrieve data
					the_post(); 
		?>
		<!-- content -->
			<div role="main" id="page">
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
						</div>
					</div>

					<div class="center">
						<!-- article content -->
						<div id="article-content">
							<?php the_content(); ?>
						</div>
						<div class="clr"></div>
					</div>
				</article>
			</div>
	<?php 
			}	// while (have_posts())
		}	// if (have_posts())
	?>
<?php get_footer(); ?>