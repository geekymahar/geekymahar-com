<article id="post-<?php the_ID(); ?>"<?php echo post_class('blog-post'); ?>>
   <div class="blog-post-inner">

        <?php if( !is_single() ) { echo '<a href="' . get_the_permalink() . '">'; } ?>



            <?php if ( has_post_thumbnail() ) : ?>

                <div class="post-thumbnail">
                    <div class="featured-container-image">
                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                    </div>
                </div>
    
            <?php endif; ?> 

            <div class="post-content">
               
                <p class="blog-post-date"><?php the_date(); ?></p>
                <h3 class="blog-post-title"><?php the_title(); ?></h3>
                
                <?php if( !is_single() ): ?>
                    <p class="blog-post-excerpt"><?php echo get_the_excerpt(); ?></p>
                <?php endif; ?>
                
                <?php if( is_single() ): ?>
                   
                    <div class="blog-post-content"><?php the_content(); ?></div>
                    
                    <?php wp_link_pages(array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'reframe' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ));
                    
                endif; ?>

            </div>

            <div class="post-footer">
                
                <?php if( !is_single() ): ?>

                    <button type="submit" class="default-button blog-post-button m-t-2-5"> <span class="button-text">Read Post</span> <span class="icon-button m-l-1-5"><span class="ti-arrow-right icon"></span></span> </button>

                <?php endif; ?>
                
                <?php if( is_single() && 1 == 2 ): ?>
                    
                    <?php if( get_the_category() ) : ?>
                       
                        <div class="blog-post-categories" title="<?php esc_attr_e( 'Categories', 'reframe') ?>">
                            <i class="fa fa-folder-open footer-icon"></i>
                            <?php the_category( ' ' ); ?>
                        </div>
                        
                    <?php endif; 

                    if( get_the_tags() ) : ?>
                       
                        <div class="blog-post-tags" title="<?php esc_attr_e( 'Tags', 'reframe') ?>">
                            <i class="fa fa-hashtag footer-icon"></i>
                            <?php the_tags( '', '' ); ?>
                        </div>
                        
                    <?php endif;
                
                endif; ?>

            </div>

        <?php if( !is_single() ) { echo '</a>'; } ?>
            
    </div>
</article>