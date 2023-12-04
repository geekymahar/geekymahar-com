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

                    while ( have_posts() ) : the_post();
                        
                        get_template_part( 'template-parts/page', 'content' );

                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;
                    
                    ?>

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