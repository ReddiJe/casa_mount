<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EBG_Theme
 */

get_header();
?>

<div class="mainScreen">
        <img src="<?php echo get_template_directory_uri();?>/inc/images/Boat-background.webp" alt="" class="boatBg">
        <h1>HARMONY ON THE WATER</h1>
        <div class="bottomArrow">
            <a href="#2"><img src="<?php echo get_template_directory_uri();?>/inc/images/bottom-arrow.webp" alt="" class="bottomArrow"></a>
        </div>
    </div>
    <div class="futureScreen" id="2">
        <h2 class="title">WE SEE THE FUTURE</h2>
        <p class="biggerText">The Electric Boat Group is pioneering the world’s transition to electric marine power. Our unwavering commitment to the boating experience drives our passion for innovation to save The Earth’s aquatic ecosystems from pollution and destruction.  We seek to create, embrace, navigate and accelerate meaningful change without compromise.</p>
    </div>
    <div class="CEO">
        <img src="<?php echo get_template_directory_uri();?>/inc/images/CEO-img.webp" alt="">
        <div class="innerCEO">
            <h2>Jason Buchanan<br>
                CEO and Co-Founder <br>
                The Electric Boat Group Inc.

            </h2>
            <p class="biggerText">
            “For over 45 years, I've been boating around the globe. And for 35 of those years I've been involved in the marine engine repair business. I founded this company, for our children, and for future generations of children to enjoy the wonders on the water just like I have, but without the devastating effects of the pollution caused by marine diesel and marine gas engines. We believe that we are at the start of an electrifying shift in this industry, with the opportunities to repower to electric the 12 million existing leisure boats that are available to us, everything from a skiff to a center console, from a sport fish to a mega yacht, including the commercial market, and even the shipping market. I welcome and encourage you to join us on this amazing journey to electrify the marine industry so that future generations can enjoy life on the water while protecting the ocean at the same time.”
            </p>
        </div>
    </div>
	<?php
get_footer();
?>