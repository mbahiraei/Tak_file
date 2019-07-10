<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kubrick'); ?></p>

			<?php
			return;
		}
	}
	/* Support-wp.ir Create file Comment -> persianscript.ir */
	/* This variable is for alternating comment background */
	$oddcomment = ' ';
?>


<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>

<p>
    <?php _e('Enter your password to view comments.'); ?>
</p>

<?php return; endif; ?>
<?php if ($comments) : ?>

<div class="post">
<div class="post_top"><h2><a href="#">نظرات کاربران سایت</a></h2></div>
<?php foreach ($comments as $comment) : ?>
<div class="post_body"><?php if (!empty($comment->user_id) && get_userdata($comment->user_id)->wp_user_level == '10') : ?>
<div class="cmbox">
<div class="cmbox_top cmbox_top_admin_style"></div>
<div class="cmbox_body cmbox_body_admin_style">
<div class="right"><div class="avatar_box"><?php echo get_avatar( $comment, $size = '40' );  ?></div></div><!-- right -->
<div class="left">
<div class="cmtitle"><h5>نويسنده ديدگاه : </h5><p> <?php comment_author() ?> </p><span class="cmdate"> <?php comment_jdate('l j F Y'); ?> </span></div>
<div class="cmtext cmtext_admin_style"><?php comment_text() ?></div></div><!--Left-->   
</div><div class="cmbox_bottom cmbox_bottom_admin_style"></div></div>
</div><!--Comment Box-->
<div style="height:2px;">&nbsp;</div><?php else: ?>
<div class="cmbox">
<div class="cmbox_top "></div>
<div class="cmbox_body ">
<div class="right"><div class="avatar_box"><?php echo get_avatar( $comment, $size = '40' );  ?></div></div><!-- right -->
<div class="left">
<div class="cmtitle"><h5>نويسنده ديدگاه : </h5><p> <?php comment_author() ?> </p><span class="cmdate"> <?php comment_jdate('l j F Y'); ?> </span></div>
<div class="cmtext"><?php comment_text() ?></div></div><!--Left-->   
</div><div class="cmbox_bottom "></div></div>
</div><!--Comment Box-->
<div style="height:2px;">&nbsp;</div><?php endif; ?>
<?php endforeach; ?>
<div class="post_bottom"></div>
</div>

<div style="clear: both;"></div>

<?php endif; ?>
<div style="height:5px;">&nbsp;</div>

<?php if ( comments_open() ) : ?>
<h2 id="postcomment"></h2>
        
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p><?php printf(__('شما ابتدا بايد <a href="%s">وارد شويد</a> تا بتوانيد ديدگاهتان را ارسال کنيد.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>

<?php else : ?>



<div class="post">
<div class="post_top"><h2> ديدگاه خود را ارائه نماييد</h2></div>
<div class="post_body">


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comments">
<?php if ( $user_ID ) : ?>

    <?php else : ?>
<input type="text" name="author" id="author" value="" size="25" tabindex="1" placeholder="نام شما ..."/>

<input dir="ltr" type="text" name="email" id="email" value="" size="25" tabindex="2" placeholder="ایمیل شما ..." />

<input dir="ltr" type="text" name="url" id="url" value="" size="25" tabindex="3" placeholder="وب سایت ...." />
    <?php endif; ?>

    <!--<p><small><strong>XHTML:</strong> <?php printf(__('شما از اين تگ ها ميتوانيد استفاده کنيد %s'), allowed_tags()); ?></small></p>-->
<br />        <textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea>
<br />        <input name="submit" type="submit" id="submit" tabindex="5" value="فرستادن ديدگاه" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </p>
    <?php do_action('comment_form', $post->ID); ?>
<div class="post_bottom"></div>
</form>
<?php endif; // If registration required and not logged in ?>
<?php else : // Comments are closed ?>
<p>
    <?php _e('متاسفانه ديدگاه اين پست بسته شده است'); ?>
    </p>
<?php endif; ?>
</div></div>