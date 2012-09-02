<?php
/**
 * Footer
 *
 * @package logicalboneshug
 * @since logicalboneshug 1.0
 */
?>
			</div>
			<?php do_action( 'bp_after_container' ); ?>
			<?php do_action( 'bp_before_footer'   ); ?>
			<footer id="bottom-footer" role="contentinfo">
				<nav id="bottom-nav" role="navigation">
				<!-- add in themename call -->
					<div id="copyright">&copy; <?php the_time('Y')?>  </div>
					<div id="credits"><?php do_action( 'bp_dtheme_credits' ); ?></div>
					<?php wp_nav_menu( array(
						'theme_location' => 'bottom', 
						'menu_class' => 'bottom_menu',
						'container' => ''
					)); ?>
				</nav>
				<?php do_action( 'bp_footer' ); ?>
			</footer>
		</div>
		<?php do_action( 'bp_after_footer' ); ?>
		<?php wp_footer(); ?>
	</body>
</html>