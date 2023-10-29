<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $udesign_options;
?>

<?php udesign_page_content_bottom(); ?>
</section><!-- end page-content -->
<?php udesign_page_content_after(); ?>

<div class="clear"></div>

<?php
// Bottom widget area.
get_template_part( 'template-parts/bottom/bottom', 'widgets' );

udesign_footer_before();

if( ! udesign_check_page_layout_option( 'no_footer' ) ) :
	?>
	<!-- <footer id="footer-bg">

		<div id="footer" class="container_24 footer-top">

			<?php udesign_footer_inside(); ?>

		</div>

	</footer> end footer-bg -->

	<footer>
        <div class="footerContainerOutter">
            <div class="footerContainerInner">
                <div class="footecontainerText">
                    <h5 class="footerTitle">Sitemap</h5>
                    <div class="footerLine">

                    </div>
                    <?php wp_nav_menu( [
					'theme_location'  => 'primary',
					'items_wrap'      => '<ul>%3$s</ul>',
				    ] ); ?>
                </div>
                <div class="footerContainerLogo">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/logotype.png" alt="" class="logoFooter">
                    <div class="contactValuePairsContainer">
                        <div class="contactValuePair">
                            <img src="./images/Map.svg" alt="">
                            <div class="contactValuePairTextContainer">
                                <p>65 Weeton Road, Wesham,</p>
                                <p>Preston PR4 3DH</p>
                            </div>
                            
                        </div>
                        <div class="contactValuePair">
                            <img src="./images/phone.svg" alt="">
                            <p>(+44) 7890 854605</p>
                        </div>
                        <div class="contactValuePair">
                            <img src="./images/mail.svg" alt="">
                            <p>john@spartanracingpigeons.co.uk</p>
                        </div>
                        <div class="socialLinksFooter socialLinks">
                            <a href="#">
                                <img src="./images/youtube.png" alt="">
                            </a><a href="#">
                                <img src="./images/facebook.png" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <p class="rights">© 2023. All right is reserved. Fast sprint pigeons.</p>
        </div>
    </footer>
    <script>
        var splide = new Splide( '.splide' );
        var bar    = splide.root.querySelector( '.my-carousel-progress-bar' );

        // Updates the bar width whenever the carousel moves:
        splide.on( 'mounted move', function () {
          var end  = splide.Components.Controller.getEnd() + 1;
          var rate = Math.min( ( splide.index + 1 ) / end, 1 );
          bar.style.width = String( 100 * rate ) + '%';
        } );

        splide.mount();


        let logo = document.querySelector(".logo")



        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            logo.style.height = "30px";
            logo.style.width = "30px";
          } else {
            logo.style.height = "100px";
            logo.style.width = "100px";
          }
        }

        let closeHeaderBut = document.querySelector(".closeheaderMobile")
        let openHeaderBut = document.querySelector(".openHeaderMobile")
        let headerMobile = document.querySelector('.newClassForMobile')


        openHeaderMobile = () => {
            closeHeaderBut.style.display = "flex";
            openHeaderBut.style.display = "none";
            headerMobile.style.display = "flex"
        }

        closeHeaderMobile = () => {
            closeHeaderBut.style.display = "none";
            openHeaderBut.style.display = "flex";
            headerMobile.style.display = "none"
        }



    </script>

	<div class="clear"></div>
	<?php
endif;

udesign_footer_after();

wp_footer();

udesign_body_bottom();

?>
</body>
</html>