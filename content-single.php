<?php
/**
 * Single post view
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
?>
<?php do_action( 'bp_before_blog_post' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
	</header>
	<div class="post-body">
		<?php the_content(); ?>
	</div>
	<footer class="post-meta">
			<div class="post-meta-author">
				<div class="author-info">
					<div class="author-box">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>
						<p><?php printf( _x( 'by %s', 'Post written by...', 'thatcamp' ), bp_core_get_userlink( $post->post_author ) ); ?></p>
					</div>
					<div class="author-description">
						<h3><?php printf( __( 'Author: %s', 'thatcamp'), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h3>
					</div>
				</div>
			</div>
		<div class="post-date">
			<?php echo get_the_date(); ?></div>
				<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'thatcamp'), __( '1 Comment', 'thatcamp'), __( '% Comments', 'thatcamp') ); ?>
			</div>
		<?php endif; ?>
			<?php edit_post_link( __( 'Edit &rarr;', 'thatcamp'), ' <span class="edit-link">', '</span> | ' ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'thatcamp'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'thatcamp'); ?></a>
	</footer>
</article>
<?php do_action( 'bp_after_blog_single_post' ); ?>