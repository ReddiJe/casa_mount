<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Winter_theme
 */

?>

	<footer>
        <div class="footerInner">
            <div class="logoBlockFooter">
                <div class="lineBlock"></div>
                <?php
					the_custom_logo();
				?>
                <div class="lineBlock"></div>
            </div>
            <ul class="footerMenu">
                <li><a href="">Today</a></li>
                <li><a href="">Archive</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Autors</a></li>
            </ul>
            <p class="copyright">
                © Copyright info
            </p>
        </div>
    </footer>
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
