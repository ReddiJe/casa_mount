<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EBG_Theme
 */

?>

<footer>
        <a href="#"><img src="<?php echo get_template_directory_uri();?>/inc/images/logo.webp" alt=""></a>
        <ul class="bottomMenu">
            <a href=""><li>Home</li></a>
            <li class="bottomMenuLine"></li>
            <a href=""><li>Documentation</li></a>
            <li class="bottomMenuLine"></li>
            <a href=""><li>Contact Us</li></a>
        </ul>
        <p class="littleText">Ⓒ CONFIDENTIAL ELECTRIC BOAT GROUP 2022</p>
</footer>

<?php wp_footer(); ?>

</body>
</html>
