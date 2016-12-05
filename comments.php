<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>

<?php $comment_count = count($comments); ?>
<h2>
	<span class="comment-count"><?php echo $comment_count; ?></span> Comments to<br/>
	<span class="article-title"><?php the_title(); ?></span>
	<hr class="full">
</h2>

<?php if($comments) : ?>
  	<ol class="center">
    	<?php 
    	for($i = 0; $i < $comment_count; $i++) :
    		$comment = $comments[$i];
    	?>
  		<li class="single-comment" id="comment-<?php comment_ID(); ?>">
  			<?php if ($comment->comment_approved == '0') : ?>
  				<p>Your comment is awaiting approval</p>
  			<?php endif; ?>
  			<p class="meta">
  				<span class="comment-author"><?php comment_author_link(); ?></span> <span class="comment-timestamp"><?php comment_date(); ?> @ <?php comment_time(); ?></span>
  			</p>
  			<div class="comment-content">
  			<?php comment_text(); ?>
  			</div>
  			<hr<?php echo ($comment_count == ($i+1)) ? " class=\"full\"" : ""; ?>/>
  		</li>
		<?php endfor; ?>
	</ol>
<?php endif; ?>

<?php if(comments_open()) : ?>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<h4>Add your comment:</h4>
			<?php if($user_ID && false) :  // TEMP FALSE TO ENABLE STYLING ?>
				<p>
					Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
					<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a>
				</p>
			<?php else : ?>
				<p>
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Name" tabindex="1" />
					<label id="labelAuthor" for="author"><?php if($req) echo "<span class=\"req\">*</span>"; ?></label>
				</p>
				<?php if($req): ?>
				<p>
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Email" tabindex="2" />
					<label id="labelEmail" for="email"><?php if($req) echo "<span class=\"req\">*</span>"; ?></label>
				</p>
			<?php endif; ?>
			<?php endif; ?>
			<p>
				<textarea name="comment" id="comment" tabindex="4"></textarea>
			</p>
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<div class="clr"></div>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; ?>
<?php else : ?>
	<p>The comments are closed.</p>
<?php endif; ?>