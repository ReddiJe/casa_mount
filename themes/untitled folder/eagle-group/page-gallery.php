<?php /* Template Name: Gallery Page */ 
get_header();
?>
    <div class="regularTitleContainer">
        <h1 class="regularTitleBig">
            News
        </h1>
        <h1 class="regularTitleNormal">
            All News
        </h1>
    </div>

    <?php 
    
    $args = array('post_type' => 'Gallery' );                                              
    $the_query = new WP_Query( $args );
    
    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<div class="masonry-container"/>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            ?>
            <div class="masonry-item"> 
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
            <div class="galleryGridInnerText">
              <h3 class="gridGalleryTitle">
                   <?php the_title() ?>
              </h3>
              <div class="gridGalleryText">
              <?php the_content() ?>
        </div>
            </div>
          </div><?php
        }
        echo '</div>';
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
    }
    ?>




<div class="regularTitleContainer">
        <h1 class="regularTitleBig">
            Gallery
        </h1>
        <h1 class="regularTitleNormal">
            Outdoor advertising
        </h1>
    </div>


<?php get_footer();?>