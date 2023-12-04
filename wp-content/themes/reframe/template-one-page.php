<?php

/**
 * Template Name: Reframe One Page
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 // Define theme options
 global $rfpp_redux;

 $d3_effect = 'data-3d="' . ($rfpp_redux['profile_image_3d'] ?? 0) . '"';

 $inner_content_css = 'style='
 . 'height:' . $rfpp_redux['profile_image_dimensions']['height'] . ';'
 . 'width:' . $rfpp_redux['profile_image_dimensions']['width'] . ';'
 . '';

 $line_css = 'style='
 . 'border-style:' . $rfpp_redux['profile_image_lines_style'] . ';'
 . 'border-width:' . $rfpp_redux['profile_image_lines_width'] . 'rem;'
 . 'border-color:' . $rfpp_redux['profile_image_lines_color'] . ';'
 . '';

?>

<?php get_header(); ?>


<!-- MAIN -->
<div id="main">


    <!-- LEFT CONTENT -->
    <div class="left-content noselect">


        <!-- INNER CONTENT -->
        <div class="inner-content" <?php echo esc_html($inner_content_css) . " " . esc_attr( $d3_effect ); ?>>
            

            <!-- NAME -->
            <div class="name">
                <p class="small color-white"><?php echo esc_attr( $rfpp_redux['profile_image_name'] ); ?></p>
                <div class="seperator-line"></div>
            </div>
            <!-- /NAME -->

            <div class="picture-box"><div class="picture"></div></div>
            <div class="frame-1 frame" <?php esc_attr_e( $line_css ); ?>></div>
            <div class="frame-2 frame" <?php esc_attr_e( $line_css ); ?>></div>
            <div class="frame-3 frame" <?php esc_attr_e( $line_css ); ?>></div>


        </div>
        <!-- /INNER CONTENT -->


    </div>
    <!-- /LEFT CONTENT -->


    <!-- RIGHT CONTENT -->
    <div class="right-content">


        <!-- INNER CONTENT -->
        <div class="inner-content">


            <!-- SECTION CONTAINER -->
            <div class="section-container">
                

                <?php while ( have_posts() ) : the_post(); ?> 

                    <?php the_content(); ?>

                <?php endwhile; ?>
                

            </div>
            <!-- /SECTION CONTAINER -->
            

        </div>
        <!-- /INNER CONTENT -->


    </div>
    <!-- /RIGHT CONTENT -->


</div>
<!-- MAIN -->


<?php get_footer(); ?>