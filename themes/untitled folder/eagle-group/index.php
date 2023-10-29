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
 * @package Eagle_Group
 */

get_header();
?>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css"
    />
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"
    ></script>
	<div class="firstBlock">
        <div class="firstBlockTextOutter">
            <div class="firstBlockText">
                <h1>CAR WRAP <b>it's</b> EAGLE GROUP</h1>
                <p>We Wrap Cars that Speak Your Style and Personality.</p>
                <div class="buttonsFirstBlock">
                    <a href="" class="ButtonFirstBlock button1">Reviews</a>
                    <a href="" class="ButtonFirstBlock secondButton button2">Contact Us</a>
                </div>
                <div class="backgroundFirstBlockText">
    
                </div>
            </div>
        </div>
        <div class="firstBlockContacts">
            <a href="tel:+1 (702) 764-6833" class="contactsFirstBlocktext">
                +1 (702) 764-6833
            </a>
            <a href="mailto:ivanalejandrob@gmail.com" class="contactsFirstBlocktext">
                ivanalejandrob@gmail.com
            </a>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images/LinkedIn.svg" alt="">
            </a>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images/Instagram.svg" alt="">
            </a>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images/Facebook.svg" alt="">
            </a>
        </div>
        <div class="firstBlockPartners">
            <div class="ticker">
                <div class="ticker__list">
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 10 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 12 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 11 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 9 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 8 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 7 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 6 (Traced).png" alt="">
                    </div>
                    <div class="ticker__item">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/companiesWorkWith/image 5 (Traced).png" alt="">
                    </div>
                </div>
            </div>



        </div>
    </div>
	<div class="secondBlock">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//SecondBlockCar1.png" alt="">
        <div class="secondBlockTextOutter">
            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//arrow 1.png" alt="">
            <div class="secondBlockTextContainer">
                <h2>
                    Custom Car Wrapping Services by Eagle Group
                </h2>
                <h3 class="subtitle">
                    Transform Your Vehicle Today
                </h3>
                <p class="regularText">
                    Elevate your vehicle's appearance with Eagle Group's custom car wrapping services. Our expert team uses high-quality vinyl graphics to transform your ride into a stunning work of art. Whether you want to advertise your business or add a personal touch to your vehicle, we've got you covered. Contact us today to learn more about how we can help you stand out on the road.
                </p>
                <a href="#" class="regularButton">Contact Us</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//arrow 2.png" alt="">
        </div>

        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//SecondBlockCar2.png" alt="" class="buttonLink">
    </div>
	<div class="latestNewsBlock">
        <h2>Latest News</h2>
        <h3 class="subtitle">Stay Up-to-Date on the Latest Car Wrapping Trends and Techniques</h3>
        <div class="lastOneNews">
            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="" class="newsImage newsImageLast">
            <div class="lastOneNewsText">
                <h3 class="newsTitle">State-owned companies choose the best car wraps</h3>
                <p class="newsText">We got another order to wrap all the ambulances in the state. State-owned companies always choose the best quality at the marginal price. And in this we have no equal. The new order was ...

                    We got another order to wrap all the ambulances in the state. State-owned companies always choose the best quality at the marginal price. And in this we have no equal. The new order was ...We got another order to wrap all the ambulances in the state. State-owned companies always choose the best quality at the marginal price. And in this we have no equal. The new order was ...
                </p>
                <a href="#" class="readFullLink">Read full ></a>
            </div>
        </div>
        <div class="latestNews">
            <div class="latestNewsInner">
                <div class="oneNewsFromLatest">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    <h3 class="newsTitle">New high quality vinyl film</h3>
                    <p class="newsText">The new film gives you a huge amount of customization options for your design, keeping all the features but at the same time significantly reducing the price...The new film gives you a huge amount of customization options for your ...</p>
                    <a href="#" class="readFullLink">Read full ></a>
                </div>
                <div class="oneNewsFromLatest">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    <h3 class="newsTitle">New high quality vinyl film</h3>
                    <p class="newsText">The new film gives you a huge amount of customization options for your design, keeping all the features but at the same time significantly reducing the price...The new film gives you a huge amount of customization options for your ...</p>
                    <a href="#" class="readFullLink">Read full ></a>
                </div>
                <div class="oneNewsFromLatest">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    <h3 class="newsTitle">New high quality vinyl film</h3>
                    <p class="newsText">The new film gives you a huge amount of customization options for your design, keeping all the features but at the same time significantly reducing the price...The new film gives you a huge amount of customization options for your ...</p>
                    <a href="#" class="readFullLink">Read full ></a>
                </div>
            </div>
        </div>
        <div class="secondBlockTextContainer">
            <p class="regularText">
                New services, replacement of consumables and all other company news can be found on the news page. Check if we have exactly the update you were waiting for.
            </p>
            <a href="#" class="regularButton">Go To All News</a>
        </div>
    </div>
    <div class="servicesBlockHomepage">
        <div class="secondBlockTextContainer">
            <h2>
                Services:
            </h2>
            <p class="regularText">
                We offer many high quality services at reasonable prices. Wrap: all types of shapes like car, bike, truck, boat walls etc. All services presented on our website are performed by professionals at the highest level. Below is one of the services provided, for a complete list, go to the services page.
            </p>
        </div>
        <div class="servicesListOutter">
            <ul class="servicesListHomepage">
                <li><a href="#" class="activeServiceListItem">Protection Film</a></li>
                <li><a href="#">Beauty wrap</a></li>
                <li><a href="#">Tech Wrap</a></li>
                <li><a href="#">Advertising Wrap</a></li>
                <li><a href="#">Outdoor advertising</a></li>
            </ul>
        </div>
        <h3>Paint <b>Protection Film</b> Packages:</h3>
        <div class="servicesCards">
            <div class="serviceCard ">
                <h2 class="cardTitle">Partial Front</h2>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images//Lamborgini 1.png" alt="">
                <div class="textInCardBlock card1">
                    <ul>
                        <li>Partial Hood</li>
                        <li>Partial Fenders</li>
                        <li>Full Front Bumper</li>
                        <li>Mirrors</li>
                    </ul>
                </div>
                <div class="cardButtonOutter">
                    <a class="cardRegularButton">
                        Order Now
                    </a>
                </div>

            </div>
            <div class="serviceCard ">
                <h2 class="cardTitle">Full Front</h2>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images//Lamborgini 2.png" alt="">
                <div class="textInCardBlock card2">
                    <ul>
                        <li>Full Hood</li>
                        <li>Full Fenders</li>
                        <li>Full Front Bumper</li>
                        <li>Mirrors</li>
                    </ul>
                </div>
                <div class="cardButtonOutter">
                    <a class="cardRegularButton">
                        Order Now
                    </a>
                </div>
                <p class="specialOffer">
                    Special offer -10%
                </p>

            </div>
            <div class="serviceCard activeServiceCard ">
                <h2 class="cardTitle">Partial Front</h2>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images//Lamborgini 3.png" alt="">
                <div class="textInCardBlock card3">
                    <ul>
                        <li>Full Hood | Roof |Trunk</li>
                        <li>Full Fenders | Quarters</li>
                        <li>Full Front and Rear Bumper</li>
                        <li>Full Doors | Rocker Panels</li>
                        <li>Mirrors | A- Pillars</li>
                    </ul>
                </div>
                <div class="cardButtonOutter">
                    <a class="cardRegularButton">
                        Order Now
                    </a>
                </div>
                <p class="specialOffer">
                    Special offer -30%
                </p>

            </div>
            <div class="serviceCard">
                <h2 class="cardTitle">Partial Front</h2>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/images//Lamborgini 4.png" alt="">
                <div class="textInCardBlock card4">
                    <ul>
                        <li>Full Hood</li>
                        <li>Full Fenders</li>
                        <li>Full Front Bumper</li>
                        <li>Mirrors | A- Pillars</li>
                        <li>Rocker Panels</li>
                    </ul>
                </div>
                <div class="cardButtonOutter">
                    <a class="cardRegularButton">
                        Order Now
                    </a>
                </div>
                <p class="specialOffer">
                    Special offer -20%
                </p>

            </div>
            
        </div>
        <div class="secondBlockTextContainer">
            <a href="#" class="regularButton" style="margin-top: 25px;">View All Services</a>
        </div>
        
    </div>
    <div class="GalleryHomepage">
            <div class="ticker1">
                <div class="ticker__list1 tikerForGallery">
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                </div>
            </div>
            <div class="secondBlockTextContainer">
                <h2>
                    Custom Car Wrapping Services by Eagle Group
                </h2>
                <h3 class="subtitle">
                    Transform Your Vehicle Today
                </h3>
                <p class="regularText">
                    Elevate your vehicle's appearance with Eagle Group's custom car wrapping services. Our expert team uses high-quality vinyl graphics to transform your ride into a stunning work of art. Whether you want to advertise your business or add a personal touch to your vehicle, we've got you covered. Contact us today to learn more about how we can help you stand out on the road.
                </p>
                <a href="#" class="regularButton">Contact Us</a>
            </div>
            <div class="ticker2">
                <div class="ticker__list2 tikerForGallery">
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                    <div class="ticker__item tickerImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                    </div>
                </div>
            </div>
    </div>
    <div class="reviewsHomepage">
        <h2>Reviews</h2>
        <section class="splide" aria-label="...">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide">
                    <div class="reviewHomepage">
                        <div class="reviewInner">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                            <div class="reviewInnerText">
                                <div class="nameCompanyDate">
                                    <p><b>John Bowie</b> The Best Ads Company</p>
                                    <p>24.01.2023 via <a href="#">Google</a></p>
                                </div>
                                <p class="reviewText">
                                    Finally, we met a company that wraps our car the way I want it. I have been in the advertising business for a long time, and very often we are faced with the need to wrap the car with an advertisement. We tried many companies, but there were always problems with either quality or speed (because sometimes advertising is needed urgently). The only company that does everything perfectly is the Eagle Group. I am sure that I will have a long cooperation with this company, and I am glad that I can finally stop looking for the perfect car wrap artist.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="reviewHomepage">
                        <div class="reviewInner">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                            <div class="reviewInnerText">
                                <div class="nameCompanyDate">
                                    <p><b>John Bowie</b> The Best Ads Company</p>
                                    <p>24.01.2023 via <a href="#">Google</a></p>
                                </div>
                                <p class="reviewText">
                                    Finally, we met a company that wraps our car the way I want it. I have been in the advertising business for a long time, and very often we are faced with the need to wrap the car with an advertisement. We tried many companies, but there were always problems with either quality or speed (because sometimes advertising is needed urgently). The only company that does everything perfectly is the Eagle Group. I am sure that I will have a long cooperation with this company, and I am glad that I can finally stop looking for the perfect car wrap artist.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="reviewHomepage">
                        <div class="reviewInner">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/images//imageForNews.png" alt="">
                            <div class="reviewInnerText">
                                <div class="nameCompanyDate">
                                    <p><b>John Bowie</b> The Best Ads Company</p>
                                    <p>24.01.2023 via <a href="#">Google</a></p>
                                </div>
                                <p class="reviewText">
                                    Finally, we met a company that wraps our car the way I want it. I have been in the advertising business for a long time, and very often we are faced with the need to wrap the car with an advertisement. We tried many companies, but there were always problems with either quality or speed (because sometimes advertising is needed urgently). The only company that does everything perfectly is the Eagle Group. I am sure that I will have a long cooperation with this company, and I am glad that I can finally stop looking for the perfect car wrap artist.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

              </ul>
            </div>
          
            <!-- Add the progress bar element -->
            <div class="my-carousel-progress">
              <div class="my-carousel-progress-bar"></div>
            </div>
        </section>
        <p class="regularText">
            If you still have questions, you can read the experience of our customers, when working with us, you can go to the feedback page and find exactly the information that interests you.
        </p>
        <a href="#" class="regularButton">Go to Reviews</a>
    </div>

	<script>
        headerNav = document.querySelector(".navigationHeader")
        let headerOpen = () => {
            headerNav.classList.toggle("open")
            console.log(1)
            console.log(headerNav)

        }
    </script>


    <script>
        let ticker = document.querySelector('.ticker')
            , list = 
            document.querySelector('.ticker__list')
            , clone = list.cloneNode(true)

        ticker.append(clone)

        let ticker1 = document.querySelector('.ticker1')
            , list1 = 
            document.querySelector('.ticker__list1')
            , clone1 = list1.cloneNode(true)

        ticker1.append(clone1)

        let ticker2 = document.querySelector('.ticker2')
            , list2 = 
            document.querySelector('.ticker__list2')
            , clone2 = list2.cloneNode(true)

        ticker2.append(clone2)

    </script>

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
    </script>

<?php
get_footer();
