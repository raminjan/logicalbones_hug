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
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'testtheme' ), 'after' => '</div>' ) ); ?>
	</div>
	<footer class="post-meta">
			<div class="post-meta-author">
				<div class="author-info">
					<div class="author-box">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>
						<p><?php printf( _x( 'by %s', 'Post written by...', 'logicalboneshug' ), bp_core_get_userlink( $post->post_author ) ); ?></p>
					</div>
					<div class="author-description">
						<h3><?php printf( __( 'Author: %s', 'logicalboneshug'), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h3>
					</div>
				</div>
			</div>
		<div class="post-date">
			<?php echo get_the_date(); ?></div>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'logicalboneshug'), __( '1 Comment', 'logicalboneshug'), __( '% Comments', 'logicalboneshug') ); ?>
			</div>
			<?php edit_post_link( __( 'Edit &rarr;', 'logicalboneshug'), ' <span class="edit-link">', '</span> | ' ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'logicalboneshug'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'logicalboneshug'); ?></a>
	</footer>
</article>
<?php do_action( 'bp_after_blog_single_post' ); ?>