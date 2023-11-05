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
        .containerNews {
        padding: 25px;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: start;
        gap: 25px;
}

    .oneNews {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 25px;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        position: relative;
        text-decoration: none;
    }

    .oneNews img{
        width: 30%;
        height: 100%;
        object-fit: cover;
    }



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
                <p><?php the_excerpt(); ?></p>
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