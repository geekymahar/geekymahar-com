<article id="post-<?php the_ID(); ?>"<?php echo post_class('blog-post'); ?>>
   <div class="blog-post-inner">

        <div class="post-content">
           
            <?php the_title( '<h2 class="entry-title m-b-3">', '</h2>' ); ?> 
            <?php the_content(); ?>
            
        </div>
            
    </div>
</article>