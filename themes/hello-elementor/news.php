<?php
/* Template Name: News */
?>
<?php get_header(); ?>
<h1><?php the_title();?></h1>
<p class="subtitle">
    <?php the_content(); ?>
</p>

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
    }

    .containerNews {
        padding: 25px;
        grid-column-gap: 25px;
        grid-row-gap: 25px;
        height: 80vh;
        width: 100vw;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }

    .containerNews> :nth-child(1) {
        /* Styles for .div1 */
        grid-area: 1 / 1 / 3 / 3;
        /* Additional styles for .div1 */
    }

    .containerNews> :nth-child(2) {
        /* Styles for .div2 */
        grid-area: 1 / 3 / 2 / 4;
        /* Additional styles for .div2 */
    }

    .containerNews> :nth-child(3) {
        /* Styles for .div3 */
        grid-area: 2 / 3 / 3 / 4;
        /* Additional styles for .div3 */
    }
</style>

<div class="containerNews">
    <?php
    $args = array(
        'post_type' => 'post',  // Replace 'post' with the post type you want to query
        'posts_per_page' => 3, // Limit the query to the last three posts
    );

    $postslist = new WP_Query($args);

    if ($postslist->have_posts()) :
        while ($postslist->have_posts()) : $postslist->the_post();
            // Your loop content here
    ?>

            <a href="<?php the_permalink(); ?>" class="oneNews" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                <h1><?php the_title(); ?></h1>
                <div class="arrow"></div>
            </a>


    <?php
        endwhile;
        wp_reset_postdata(); // Reset post data to the main query
    else :
    // No posts found
    endif;
    ?>
</div>

<div class="containerButton">


</div>

<?php get_footer(); ?>