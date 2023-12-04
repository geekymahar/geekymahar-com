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

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() );

                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;

                        the_post_navigation(array(
                            'prev_text' => '<span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Previous', 'reframe' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . '<span class="ti-arrow-left"></span>' . '</span>%title</span>',
                            'next_text' => '<span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Next', 'reframe' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . '<span class="ti-arrow-right">' . '</span></span>',
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