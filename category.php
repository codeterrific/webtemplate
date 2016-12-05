<?php get_header(); ?> 
	<div role="main">
		<section>
			<?php $current_category = strip_tags(single_cat_title("", false)); ?>
			<h1 class="hide"><?php echo $current_category; ?></h1>
			<?php get_template_part("list"); ?>
		</section>
	</div>

<?php get_footer(); ?>