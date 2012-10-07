<?php
/**
 * Attachment
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
?>
<?php get_header('signup'); ?>
<div id="primary" class="main-content">
	<div id="content">
		<?php do_action( 'bp_before_attachment' ); ?>
		<div id="single-view" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
			get_template_part( 'content', 'attachment' );
			logicalboneshug_content_nav( 'nav-below' );
			comments_template( '', true ); 
		endwhile; ?>
		</div>
		<?php do_action( 'bp_after_attachment' ); ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer() ?>