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

    .h1 {
        color: var(--Black, #2C2D2C);
        text-align: right;
        font-family: NewYork;
        font-size: 48px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }

    .oneNews {
        padding: 100px;
        width: 100%;
        background-size: cover;
        border-radius: 25px;
        text-decoration: none;
        padding: 20px;
    }

    .titleForImage {
        position: relative;
        display: inline-flex;
        padding: 0px 5px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        border-radius: 0px 0px 15px 15px;
        background: #FFF;
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

    .arrowButton {
    position: absolute; 
    bottom: 0; 
    right: 0; 
    background-color: #fff; 
    color: #000; 
    border: black; 
    border-radius: 25px;
    cursor: pointer; 
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
                <h2 class="titleForImage"><?php the_title(); ?></h2>
                <div class="arrow"><button class="arrowButton"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g id="iconoir:arrow-tr">
<path id="Vector" d="M6 19L19 6M19 6V18.48M19 6H6.52" stroke="#021822" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</g>
</svg>
</button></div>
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
        <a href="#" class="view-all-button">More News</a>
</div>

<?php get_footer(); ?>