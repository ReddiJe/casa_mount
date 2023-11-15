<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
	<style>

.footerLogoContainer {
    margin-left: 25px;
    margin-top: 20px;
}

.footer {
    position: absolute;
    width: 100%;
    background-position: center bottom;
    background-size: cover;
    display: flex;
    background-image: url(http://casamounthomesja.com/wp-content/uploads/2023/11/Group-88-scaled.webp);
    justify-content: start;
    align-items: start;
    flex-direction: column;
    gap: 10px;
}

.footer h3,
.footer a {
    color: white;
}

.footer ul {
    display: flex;
    width: 50rem;
    align-items: flex-start;
    align-content: flex-start;
    gap: 1.5rem 8rem;
    flex-wrap: wrap;
	list-style: none;
}

.footer h3 {
    font-size: 2rem;
    gap: 25px;
    padding-left: 25px;
}

.footer ul li a {
    font-size: 1.125rem;
    text-decoration: none;
    color: #fff;
    padding-bottom: 10px;
}

.footer ul li a:hover {
    text-decoration: underline;
}

.socialNetworksFooter {
    padding-left: 50px;
    padding-bottom: 10px;
    display: flex;
    justify-content: start;
    align-items: start;
    gap: 25px;
}

.emailFooterContainer{
    padding-left: 25px;
}


@media screen and (max-width: 600px){
    .footer-inner{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 15px
    }

    .site-navigation ul.menu{
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
}
</style>
<footer id="site-footer" class="footer <?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
	<div class="footer-inner">


        <div class="footerLogoContainer">
            <img src="/logo.png" alt="">
            <?php the_custom_logo(); ?>
        </div>
        <h3>Website Map</h3>
        <!-- <ul class="menuFooterContainer">
            <li><a href="#" class="active">Homepage</a></li>
            <li><a href="./Gallery.html">Gallery</a></li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./investors.html">Investors</a></li>
            <li><a href="./timeline.html">Timeline</a></li>
            <li><a href="./accommodation.html">Accommodation</a></li>
            <li><a href="./faq.html">FAQ</a></li>
            <li><a href="./facilities.html">Facilities</a></li>
            <li><a href="./collaboration.html">Colloboration</a></li>
            <li><a href="./Contacts.html">Contacts</a></li>
        </ul> -->
		<?php if ( $footer_nav_menu ) : ?>
			<nav class="site-navigation <?php echo esc_attr( hello_show_or_hide( 'hello_footer_menu_display' ) ); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $footer_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif; ?>
        <div class="emailFooterContainer">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 20C3.45 20 2.979 19.804 2.587 19.412C2.195 19.02 1.99934 18.5493 2 18V6C2 5.45 2.196 4.979 2.588 4.587C2.98 4.195 3.45067 3.99934 4 4H20C20.55 4 21.021 4.196 21.413 4.588C21.805 4.98 22.0007 5.45067 22 6V18C22 18.55 21.804 19.021 21.412 19.413C21.02 19.805 20.5493 20.0007 20 20H4ZM12 13L4 8V18H20V8L12 13ZM12 11L20 6H4L12 11ZM4 8V6V18V8Z" fill="white"/>
                </svg>                      
            <a class="email" href="mailto:">info@casamounthomesja.com</a>
        </div>
        <div class="socialNetworksFooter">
            <a href="www.facebook.com">
                <img src="/1Vector.png" alt="">
            </a>
            <a href="www.instagram.com">
                <img src="/Vector.png" alt="">
            </a>
            <a href="www.linkedin.com">
                <img src="/Vector1.png" alt="">
            </a>
        </div>

	</div>
</footer>

