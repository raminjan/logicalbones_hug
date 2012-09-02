<?php
/**
 * Port format display for posts - page
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
?>
<?php do_action( 'bp_before_blog_page' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
	</header>
	<div class="post-body">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'logicalboneshug' ), 'after' => '</div>' ) ); ?>
	</div>
	<footer class="post-meta">
		<div class="post-edit">
				<?php edit_post_link( __( 'Edit &rarr;', 'logicalboneshug'), ' <span class="edit-link">', '</span> | ' ); ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'logicalboneshug'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'logicalboneshug'); ?></a>
		</div>
	</footer>
</article>
<?php do_action( 'bp_after_blog_page' ); ?>