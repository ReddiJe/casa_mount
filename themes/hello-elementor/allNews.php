<?php
/* Template Name: allNews */
?>

<?php get_header(); 
?>

<h2><?php the_title();?></h2>

<?php
global $post;
$postslist = get_posts([
    'posts_per_page' => 10,
    'order' => 'ASC',
    'orderby' => 'title'
]);
?>

<style>
    .oneNews {
        padding: 25px;
        width: 100%;
        display: flex;
        align-items: center;
        gap: 25px;
        background-size: cover;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        position: relative;
        height: 150px;
        width: 150px;
        text-decoration: none;
    }

    .containerNews {
        padding: 25px;
        width: 100vw;
        display: flex;
        justify-content: flex-start; 
        align-items: flex-start; 
        flex-direction: column;
        gap: 25px;
}

.oneNews h2 {
    padding-left: 40px;
    padding-right: 40px;
    float: left;
}

.titleForImage {
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

     .containerNews img {
        border-radius: 25px;
        height: 150px;
        width: 150px;
     }


     /* 
     .newsTitle {
         display: inline-flex;
         padding: 0px 5px;
         justify-content: center;
         align-items: center;
         gap: 10px;
     }

    .arrowButton {
    position: absolute;
    bottom: 15px; 
    right: 15px; 
    background-color: #fff; 
    border: black; 
    border-radius: 25px;
    cursor: pointer;  
] */

</style>

<div class="containerNews">
    <?php
    $args = array(
        'post_type' => 'post',  
    );

    $postslist = new WP_Query($args);

    if ($postslist->have_posts()) :
        while ($postslist->have_posts()) : $postslist->the_post();
            // Your loop content here
    ?>

            <a href="<?php the_permalink(); ?>" class="oneNews">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="newsImage">
            <div>
            <h2 class="titleForImage"><?php the_title(); ?></h2>
            </div>
        </a>
                
    <?php
        endwhile;
        wp_reset_postdata();
    else :
    // No posts found
    endif;
    ?>
</div>

<?php get_footer(); ?>