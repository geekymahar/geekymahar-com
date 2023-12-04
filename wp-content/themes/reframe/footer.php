<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( function_exists( 'elementor_theme_do_location' ) ) {
	elementor_theme_do_location( 'footer' );
}
    
wp_footer();

?>

	</body>
</html>