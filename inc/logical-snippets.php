<?php

/* useful stuff */

// show or hide the admin bar
if ( ! function_exists( 'logicalboneshug_adminbar_hide' ) ) :
function logicalboneshug_register_menus($hide) {
	if ($show == "yes"){
		add_filter( 'show_admin_bar', '__return_false' );
	}
}
endif;

// logicalboneshug special functions
// logicalboneshug fallback menu 
function logicalboneshug_fallback_menu() {
	echo '<ul class="topmenu">';
    wp_list_pages('sort_column=menu_order&title_li=');
	echo '</ul>';
};

// Switch to mobile menu for devices
function logicalboneshug_headadd(){
    ?>
	<script>
		jQuery(document).ready(function(){
				jQuery('.top_menu').mobileMenu();
		});
	</script>
 <?php 
}
add_action ('wp_head', "logicalboneshug_headadd");
?>