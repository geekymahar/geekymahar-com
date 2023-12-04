<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

?>

<?php get_header(); ?>


<!-- MAIN -->
<div id="main" class="page-404">


    <!-- ERROR CONTENT -->
    <div class="error-content">


        <!-- INNER CONTENT -->
        <div class="inner-content">

            <h1><span><?php esc_html_e( "404 ", 'reframe' ) ?></span><?php esc_html_e( "Page", 'reframe' ) ?> <?php esc_html_e( "not found.", 'reframe' ) ?></h1>
            <p class="m-t-2"><?php esc_html_e( "The page you're looking for couldn't be found.", 'reframe' ) ?></p>
        
        </div>
        <!-- /INNER CONTENT -->


    </div>
    <!-- /ERROR CONTENT -->


</div>
<!-- MAIN -->


<?php get_footer(); ?>