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
	<header class="post-header">
			<hgroup>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'logicalboneshug'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</hgroup>
	</header>
	<?php if (( is_search() ) || (is_home()) || (is_category()) || (is_archive() ) || (is_page_template('template-blog.php') )) :?>
		<?php if(function_exists('the_post_thumbnail')) { ?>
			<?php if(get_the_post_thumbnail() != "") { ?>
					<div class="post-featured-thumb">
						<?php the_post_thumbnail(); ?>
					</div>
		<?php } } ?>
		<div class="post-summary">
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'logicalboneshug') ); ?>
		</div>
	<?php else : ?>
		<div class="post-body">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'logicalboneshug') ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'logicalboneshug'), 'after' => '</div>' ) ); ?>
		</div>
	<?php endif; ?>
	<footer class="post-meta">
		<div class="post-date"><?php echo get_the_date(); ?></div>
		<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'logicalboneshug'), __( '1 Comment', 'logicalboneshug'), __( '% Comments', 'logicalboneshug') ); ?>
			</div>
		<?php endif; ?>			
		<div class="post-categories">
			<span class="cat-links"><?php _e( 'Categories: ', 'logicalboneshug'); ?><?php the_category( ' ' ); ?></span>
		</div>
		<div class="post-tags">
			<?php $tags_list = get_the_tag_list( '', ', ' ); 
			if ( $tags_list ): ?>
			<?php printf( __( 'Tags: %2$s', 'logicalboneshug'), 'tag-links', $tags_list ); ?> | 
			<?php endif; ?>
		</div>
		<div class="post-edit">
				<?php edit_post_link( __( 'Edit &rarr;', 'logicalboneshug'), ' <span class="edit-link">', '</span> | ' ); ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'logicalboneshug'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'logicalboneshug'); ?></a>
		</div>
	</footer>
</article>