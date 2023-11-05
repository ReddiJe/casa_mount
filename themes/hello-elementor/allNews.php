<?php
/* Template Name: allNews */
?>

<?php get_header(); 


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
        padding: 100px;
        width: 100%;
        background-size: cover;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
    }

    .h2 {
        text-decoration: none;
    }

    .a {
        border-radius: 25px;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .containerNews {
        padding: 25px;
        grid-column-gap: 25px;
        grid-row-gap: 25px;
        height: 80vh;
        width: 100vw;
        display: flex;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
}

    // .h1 {
    //     font-size: 1.5rem;
    //     text-decoration: none;
    //     font-family: Urbanist;
    //     font-size: 48px;
    //     font-weight: 300;
    //     line-height: 72px;
    //     letter-spacing: 0em;
    //     text-align: left;
    //     padding: 0px 5px;
    //     justify-content: center;
    //     align-items: center;
    //     gap: 10px;
    // }

    // .newsTitle {
    //     display: inline-flex;
    //     padding: 0px 5px;
    //     justify-content: center;
    //     align-items: center;
    //     gap: 10px;
    // }

    // .arrow {
    //     border-radius: 25px;
    //     background: #FFF;
    //     box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
    //     width: 20px;
    //     height: 20px;
    // }

    .containerNews> :nth-child(1) {
        grid-area: 1 / 1 / 3 / 3;
    }

    .containerNews> :nth-child(2) {
        grid-area: 1 / 3 / 2 / 4;
    }

    .containerNews> :nth-child(3) {
        grid-area: 2 / 3 / 3 / 4;
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

            <a href="<?php the_permalink(); ?>" class="oneNews" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                <h1 class="newsTitle"><?php the_title(); ?></h1>
                <div class="arrow"></div>
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