<?php
/* Template Name: News */
?>
<?php get_header(); ?>

<style>
    .titlesContainer .subtitle p {
        color: var(--Black, #2C2D2C);
        text-align: right;
        font-family: Open Sans;
        font-size: 1.5rem;
        font-weight: 300;
        line-height: normal;
    }

    .titlesContainer {
        display: flex;
        width: 100vw;
        padding: 25px;
        flex-direction: column;
        align-items: flex-end;
        width: 100%;
        max-width: 100%;
    }
</style>

<div class="titlesContainer">
    <h1 style="text-align: right;"><?php the_title(); ?></h1>
    <div class="subtitle">
        <?php the_content(); ?>
    </div>
</div>


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
        position: relative;
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
        width: 100%;
        max-width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }

    span {
        height: 40px;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .arrowButton {
        position: absolute;
        bottom: 30px;
        right: 35px;
        background-color: #fff;
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

    .containerButton {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 100px;
    }

    .containerButton svg {
        width: 25px;
        height: 20px;
        vertical-align: middle;
        margin-right: 5px;
    }

    .containerButton svg:first-child {
        width: 30px;
        height: 25px;
        fill: white;
        margin-right: 10px;
    }

    .containerButton svg:last-child {
        width: 25px;
        height: 23px;
        vertical-align: middle;
        margin-left: 10px;
    }

    .viewAllButton {
        border-radius: 37px;
        background: #1A2B32;
        color: #fff;
        padding: 15px 30px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: 0.3ms;
    }

    .viewAllButton:hover {
        background: #151B1D;
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
                <div class="arrow">
                    <span class="arrowButton"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 14L14 1M14 1V13.48M14 1H1.52" stroke="#021822" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
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
    <a href="#" class="viewAllButton"><svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.766 20H3.26599C2.43585 20.0001 1.63716 19.6824 1.03376 19.1123C0.430358 18.5422 0.0679899 17.7628 0.0209913 16.934L0.0159912 16.75V2.25C0.0159212 1.67987 0.232287 1.13098 0.621361 0.714247C1.01043 0.297514 1.5432 0.0440221 2.11199 0.00500013L2.26599 1.69987e-08H17.766C18.3361 -7.00219e-05 18.885 0.216295 19.3017 0.605369C19.7185 0.994443 19.972 1.52721 20.011 2.096L20.016 2.25V3H21.766C22.3361 2.99993 22.885 3.2163 23.3017 3.60537C23.7185 3.99444 23.972 4.52721 24.011 5.096L24.016 5.25V16.75C24.016 17.5801 23.6984 18.3788 23.1283 18.9822C22.5582 19.5856 21.7788 19.948 20.95 19.995L20.766 20ZM3.26599 18.5H20.766C21.2053 18.5 21.6286 18.3347 21.9517 18.037C22.2748 17.7392 22.4741 17.3309 22.51 16.893L22.516 16.75V5.25C22.516 5.06876 22.4503 4.89366 22.3312 4.75707C22.2121 4.62048 22.0475 4.53165 21.868 4.507L21.766 4.5H20.016V15.25C20.016 15.4312 19.9503 15.6063 19.8312 15.7429C19.7121 15.8795 19.5475 15.9684 19.368 15.993L19.266 16C19.0848 16 18.9096 15.9344 18.7731 15.8152C18.6365 15.6961 18.5476 15.5316 18.523 15.352L18.516 15.25V2.25C18.516 2.06876 18.4503 1.89366 18.3312 1.75707C18.2121 1.62048 18.0475 1.53165 17.868 1.507L17.766 1.5H2.26599C2.08475 1.50001 1.90965 1.56564 1.77306 1.68477C1.63647 1.80389 1.54764 1.96845 1.52299 2.148L1.51599 2.25V16.75C1.51601 17.1892 1.68116 17.6123 1.97867 17.9354C2.27618 18.2585 2.68429 18.4579 3.12199 18.494L3.26599 18.5ZM8.26199 9.004C8.95199 9.004 9.51199 9.564 9.51199 10.254V13.75C9.51199 14.44 8.95199 15 8.26199 15H4.76599C4.07599 15 3.51599 14.44 3.51599 13.75V10.254C3.51599 9.564 4.07599 9.004 4.76599 9.004H8.26199ZM12.266 13.5H15.762C15.952 13.5001 16.1349 13.5722 16.2738 13.702C16.4126 13.8317 16.4971 14.0093 16.51 14.1989C16.523 14.3885 16.4635 14.5759 16.3436 14.7233C16.2236 14.8707 16.0522 14.9671 15.864 14.993L15.762 15H12.266C12.076 14.9999 11.8931 14.9278 11.7542 14.798C11.6153 14.6683 11.5309 14.4907 11.518 14.3011C11.505 14.1115 11.5645 13.9241 11.6844 13.7767C11.8043 13.6293 11.9757 13.5329 12.164 13.507L12.266 13.5ZM8.01299 10.504H5.01599V13.5H8.01299V10.504ZM12.266 9.004H15.762C15.952 9.00406 16.1349 9.07624 16.2738 9.20597C16.4126 9.3357 16.4971 9.5133 16.51 9.70288C16.523 9.89246 16.4635 10.0799 16.3436 10.2273C16.2236 10.3747 16.0522 10.4711 15.864 10.497L15.762 10.504H12.266C12.0746 10.5059 11.8897 10.4347 11.7492 10.3047C11.6087 10.1748 11.5231 9.99607 11.5101 9.80512C11.4971 9.61418 11.5575 9.42548 11.6791 9.27766C11.8006 9.12984 11.9741 9.03408 12.164 9.01L12.266 9.004ZM4.26199 4.497H15.762C15.952 4.49706 16.1349 4.56924 16.2738 4.69897C16.4126 4.8287 16.4971 5.0063 16.51 5.19588C16.523 5.38546 16.4635 5.57289 16.3436 5.7203C16.2236 5.86771 16.0522 5.9641 15.864 5.99L15.762 5.997H4.26199C4.07205 5.99669 3.88931 5.92433 3.75065 5.79452C3.61199 5.66471 3.52774 5.48713 3.51492 5.29762C3.5021 5.10812 3.56166 4.92081 3.68158 4.77351C3.80149 4.6262 3.97283 4.52989 4.16099 4.504L4.26199 4.497Z" fill="white" />
        </svg>
        More News
        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.0622 21.116C13.913 20.9666 13.8292 20.764 13.8292 20.5529C13.8292 20.3417 13.913 20.1392 14.0622 19.9898L22.2634 11.7873L0.812835 11.7873C0.60149 11.7873 0.398801 11.7033 0.249359 11.5539C0.099916 11.4044 0.0159602 11.2017 0.0159602 10.9904C0.0159603 10.779 0.099916 10.5763 0.249359 10.4269C0.398801 10.2775 0.60149 10.1935 0.812835 10.1935L22.2634 10.1935L14.0622 1.991C13.9215 1.83994 13.8448 1.64014 13.8485 1.4337C13.8521 1.22725 13.9357 1.03028 14.0817 0.884278C14.2277 0.738276 14.4247 0.654645 14.6312 0.651003C14.8376 0.64736 15.0374 0.723991 15.1885 0.864751L24.751 10.4273C24.9002 10.5767 24.984 10.7792 24.984 10.9904C24.984 11.2015 24.9002 11.4041 24.751 11.5535L15.1885 21.116C15.039 21.2652 14.8365 21.3491 14.6253 21.3491C14.4142 21.3491 14.2116 21.2652 14.0622 21.116Z" fill="white" />
        </svg>
    </a>
</div>

<?php get_footer(); ?>