<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_post_thumbnail(); ?>


	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->





	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- article image -->
		<div class="image">
			<img src="/content/img/arduino-and-easydriver-stepper-motor-driver/easystepper_breadboard_setup.jpg" alt="">
		</div>

		<!-- article heading -->
		<div role="heading" class="heading">
			<div class="heading-position">
				<h1><?php the_title(); ?></h1>
				<time datetime="2014-07-13">13 July 2014</time>
			</div>
		</div>

		<div class="center">
			<?php if ( 'post' == get_post_type() ) { ?>
			<!-- author -->
			<aside>
				<img src="/content/img/author/default.png" alt="<?php echo get_the_author(); ?>">
				<h2><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></h2>
				<p><?php get_the_author_meta('description') ? the_author_meta('description') : ?>This author doesn't have a description...<?php ; ?></p>
			</aside>
			<?php } // if ( 'post' == get_post_type() ) ?>

			<!-- article content -->
			<div id="article-content">
				<!-- article text -->
				<section>
					<h2>The Sparkfun EasyDriver</h2>
					<p>Driving a stepper motor with your Arduino can be a risky business, since the stepper motor can easily overdraw the rated maximum current and fry your circuit. Thanks to Sparkfun's EasyDriver stepper motor driver it's become a real breeze. The EasyDriver offers multiple configurable settings as for how you wish to control your motors (ex. step resolution, explaind later in this article).</p>
				</section>
				<section>
					<h2>Setting the resolution</h2>
					<p>Setting the resolution of the EasyStepper has been made very easy using the <kbd>MS1</kbd> and <kbd>MS2</kbd> pins on the module. It has four settings to choose from:</p>
					<ul>
						<li>Full step</li>
						<li>Half step</li>
						<li>Quarter step</li>
						<li>Eigth step</li>
					</ul>
					<p>How many degrees this results in depend on the specifications of your stepper motor. You can see how to connect the <kbd>MS1</kbd> and <kbd>MS2</kbd> pins for setting the resolution in the table below:</p>
					<table class="center">
						<caption>EasyStepper resolution settings</caption>
						<thead>
							<tr>
								<th scope="col">MS1</th>
								<th scope="col">MS2</th>
								<th scope="col">Resolution</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>LOW</td>
								<td>LOW</td>
								<td>Full step</td>
							</tr>
							<tr class="even">
								<td>HIGH</td>
								<td>LOW</td>
								<td>Half step</td>
							</tr>
							<tr>
								<td>LOW</td>
								<td>HIGH</td>
								<td>Quarter step</td>
							</tr>
							<tr class="even">
								<td>HIGH</td>
								<td>HIGH</td>
								<td>Eighth step</td>
							</tr>
						</tbody>
					</table>
				</section>
				<section>
					<h2>Breadboard example</h2>
					<p>To hook up your arduino to a stepper motor you'll need the following:</p>
					<table class="full">
						<caption>Components used</caption>
						<thead>
							<tr>
								<th scope="col">Component</th>
								<th scope="col">Quantity</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Arduino</td>
								<td>1</td>
							</tr>
							<tr class="even">
								<td>Sparkfun EasyDriver</td>
								<td>1</td>
							</tr>
							<tr>
								<td>Stepper motor, 4 pin/cable interface</td>
								<td>1</td>
							</tr>
						</tbody>
					</table>
					<figure style="cursor: pointer;">
						<img src="/content/img/arduino-and-easydriver-stepper-motor-driver/easystepper_setup_diagram.png" alt="">
						<figcaption>Diagram of the set up.</figcaption>
					</figure>
					<figure style="cursor: pointer;">
						<img src="/content/img/arduino-and-easydriver-stepper-motor-driver/easystepper_breadboard_setup.jpg" alt="">
						<figcaption>The set up on a breadboard.</figcaption>
					</figure>
					<div class="note caution caution-esd">
						<h3>Caution!</h3>
						<p>You should never attempt to drive the motor directly from the arduino pins since it could damage the arduino. Also, be sure not to disconnect or reconnect the stepper motor while everything is powered up to avoid spikes that could damage the driver and arduino. </p>
					</div>
				</section>
				<section>
					<h2>Arduino sketch</h2>
					<p>We've created an Arduino sketch which you can download below to test the your EasyStepper. To change the stepper speed, simply change the variable <kbd>steptime</kbd> (in milliseconds) to what you want.</p>
					<p><a href="/content/downloads/arduino-and-easydriver-stepper-motor-driver/stepSimple.ino" class="btn btn-download" target="_blank">Download stepSimple.ino</a></p>
				</section>
			</div>
			<div class="clr"></div>
		</div>
	</article>