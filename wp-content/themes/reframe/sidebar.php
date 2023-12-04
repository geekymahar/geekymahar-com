<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<div id="sidebar" class="widget-area" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</div>