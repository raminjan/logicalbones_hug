<?php

/**
 * BuddyPress - Users Blogs
 *
 * @package logicalbones
 * @since logicalbones 1.0
 */

?>

<div class="item-list-tabs" id="subnav" role="navigation">
	<ul>

		<?php bp_get_options_nav(); ?>

		<li id="blogs-order-select" class="last filter">

			<label for="blogs-all"><?php _e( 'Order By:', 'logicalboneshug' ); ?></label>
			<select id="blogs-all">
				<option value="active"><?php _e( 'Last Active', 'logicalboneshug' ); ?></option>
				<option value="newest"><?php _e( 'Newest', 'logicalboneshug' ); ?></option>
				<option value="alphabetical"><?php _e( 'Alphabetical', 'logicalboneshug' ); ?></option>

				<?php do_action( 'bp_member_blog_order_options' ); ?>

			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->

<?php do_action( 'bp_before_member_blogs_content' ); ?>

<div class="blogs myblogs" role="main">

	<?php locate_template( array( 'blogs/blogs-loop.php' ), true ); ?>

</div><!-- .blogs.myblogs -->

<?php do_action( 'bp_after_member_blogs_content' ); ?>
