<?php
/**
 * Content display for posts - default template
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
?>
<?php do_action( 'bp_before_blog_post' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-body">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'logicalboneshug') ); ?>
	</div>
	<footer class="post-meta">
		<div class="post-edit">
			<?php edit_post_link( __( 'Edit &rarr;', 'logicalboneshug'), ' <span class="edit-link">', '</span> | ' ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'logicalboneshug'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'logicalboneshug'); ?></a>
		</div>
	</footer>
</article>
<?php do_action( 'bp_after_blog_post' ); ?>