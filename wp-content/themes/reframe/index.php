<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<?php get_header(); ?>

<!-- MAIN -->
<div id="main" class="rfpp_core_wp <?php if ( !is_active_sidebar('sidebar-1')) echo 'no_sidebar'; ?>">


    <!-- LEFT CONTENT -->
    <div class="left-content noselect">

        <!-- INNER CONTENT -->
        <div class="inner-content">

            <?php get_sidebar(); ?>

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


                <!-- POST CONTAINER -->
                <div class="post-container">
                    
                    <?php 

                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile;

                        the_posts_pagination( array(
                            'prev_text' => '<div class="icon-button"><span class="ti-arrow-left"></span></div>' . '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'reframe' ) . '</span>',
                            'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'reframe' ) . '</span>' . '<div class="icon-button"><span class="ti-arrow-right"></div>',
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'reframe' ) . ' </span>',
                        ));

                    endif; ?>


                </div>
                <!-- /POST CONTAINER -->
                

            </div>
            <!-- /SECTION CONTAINER -->
            

        </div>
        <!-- /INNER CONTENT -->


    </div>
    <!-- /RIGHT CONTENT -->


</div>
<!-- MAIN -->

<?php get_footer(); ?>