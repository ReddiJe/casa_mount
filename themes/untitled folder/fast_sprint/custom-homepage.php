<?php
/*
Template Name: Custom Homepage
*/


get_header();

?>


<div class="firstBlockContainer">
        <div class="firstBlockInner">
            <div class="textFirstBlock animate__animated animate__fadeInRight">
                <h1>
                    McCormick and Schofield Racing Pigeons
                </h1>
                <p>
                Welcome to Fast- Sprint Racing Pigeons web site, I hope you enjoy your visit where you are invited to read some articles and feel free to join in our Racing Pigeon Community by contributing your comments. I will occasionally be offering for sale proven and select Sprint and Middle Distance Racing Pigeons from my proven birds.
                </p>
                <a href="#" class="buttonFirstBlockText">Pigeons for sale</a>
            </div>
        </div>
    </div>
    <div class="secondBlockOutter">
        <div class="secondBlock">
            <h1>
                SPRINT PIGEONS FOR SALE
            </h1>
            <p>
                Spartan Racing Pigeons was set up to reduce the lottery element of selecting and buying racing pigeons by only offering offspring from racing pigeons that have proven their value for breeding or racing in the UK.
                The Spartan Racing and Breeding Lofts have been developed to provide proven performance pigeons, this has been obtaining quality bloodlines from the UK and Europe. The Stock Loft only contains pigeons with proven performance either breeding winners or being a proven winner in their own right, their pedigrees do not contain generations of ‘Bred for Stock’ as we believe that ‘The Apple Does not fall far from the Tree’ and even pigeons with great pedigrees have to be proven before they can earn a perch in our genuine winning loft. This strict selection methodology enables us to offer our clients with some confidence top class racing pigeons containing super breeding genes.
            </p>
            <a href="#" class="aboutUsHomePageButton"> About Us</a>
        </div>
    </div>

    <!-- <div class="pigeonListingBlock">
        <h1>Pigeon For Sale</h1>
        <p>Find your perfect racing pigeon from our extensive selection of breeds and ages. Our pigeons have won numerous awards and are bred for their speed, agility, and endurance.</p>
        <div class="pigeonListingVariantsBlock">
            <div class="listingPigeonMainPage">
                <div class="imgForPigeonCard">
                    <img src="./images/pigeon2.png" alt="">
                </div>
                <p class="nameOfPigeonTextCard">Name of Pigeon</p>
                <p>Description and cost</p>
                <a href="#">Buy</a>
            </div>
            <div class="listingPigeonMainPage activelistingPigeonMainPage">
                <div class="imgForPigeonCard">
                    <img src="./images/pigeon1.png" alt="">
                </div>
                <p class="nameOfPigeonTextCard">Name of Pigeon</p>
                <p>Description and cost</p>
                <a href="#">Buy</a>
            </div>
            <div class="listingPigeonMainPage">
                <div class="imgForPigeonCard">
                    <img src="./images/pigeon2.png" alt="">
                </div>
                <p class="nameOfPigeonTextCard">Name of Pigeon</p>
                <p>Description and cost</p>
                <a href="#">Buy</a>
            </div>
        </div>
        <a href="#" class="regularButton">
            Look more 
        </a>
    </div> -->

    <div class="newsBlock">
        <div class="newsTitleBlock">
            <h1>Latest News from Spartan Pigeons:</h1>
            <p>Stay up-to-date on the latest news and updates from Spartan Pigeons.  Our news section features the newest arrivals to our pigeon collection, upcoming races, and industry news. You can also read our articles and blog posts for tips and tricks on pigeon training, diet, and breeding.</p>
        </div>
        <div class="newsCardsContainer">



            <?php 
            $my_posts = get_posts( array(
	            'numberposts' => 3,
	            'category'    => 0,
	            'orderby'     => 'date',
	            'order'       => 'DESC',
	            'include'     => array(),
	            'exclude'     => array(),
	            'meta_key'    => '',
	            'meta_value'  =>'',
	            'post_type'   => 'News',
	            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            global $post;

            foreach( $my_posts as $post ){
	            setup_postdata( $post );
                ?>
	            <div class="newsCard">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <h1 class="newsTitle">
                        <?php the_title() ; ?>
                    </h1>
                    <p class="newsContent">
                        <?php the_excerpt() ; ?>
                    </p>
                    <div class="newsDateAutor">
                        <p class="newsAutor"><?php the_author(); ?></p>
                        <p class="newsDate">
                        <?php the_date( 'j F Y' ); ?>
                        </p>
                    </div>

                </div>


                <?php
            }

            wp_reset_postdata();

            ?>


        </div>
        <a href="#" class="goToAllNewsButton">
            Go To All News
        </a>
    </div>

    <div class="reviewsHomepage">
        <h2>Testimonials:</h2>
        <section class="splide" aria-label="...">
            <div class="splide__track">
              <ul class="splide__list">




                <?php 
                    $my_posts = get_posts( array(
	                    'numberposts' => 3,
	                    'category'    => 0,
	                    'orderby'     => 'date',
	                    'order'       => 'DESC',
	                    'include'     => array(),
	                    'exclude'     => array(),
	                    'meta_key'    => '',
	                    'meta_value'  =>'',
	                    'post_type'   => 'Testimonials',
	                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );
                    
                    global $post;
                    
                    foreach( $my_posts as $post ){
	                    setup_postdata( $post );
                        ?>
                        <li class="splide__slide">
                            <div class="reviewHomepage">
                                <div class="reviewInner">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    <div class="reviewInnerText">
                                        <div class="nameCompanyDate">
                                            <p><b>Name Sur</b> The Best Ads Company</p>
                                            <p><?php the_date(); ?> via <a href="#">Google</a></p>
                                        </div>
                                        <div class="reviewText">
                                           <?php the_content() ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                    
                        <?php
                    }
            
                wp_reset_postdata();
            
                ?>

              </ul>
            </div>
          
            <!-- Add the progress bar element -->
            <div class="my-carousel-progress">
              <div class="my-carousel-progress-bar"></div>
            </div>
        </section>
        <p class="regularText">
            Don't just take our word for it - see what our satisfied customers have to say about our pigeons and service. From champion racers to happy breeders, our customers love the quality of our pigeons and the support we provide. Read their testimonials and see their photos to get a sense of what you can expect from Spartan Pigeons.
        </p>
        <a href="#" class="regularButton">Go to Testimonials</a>
    </div>
    <div class="contactHomepageBlock">
        <h2>Reach Out</h2>
        <p class="regularText"> We're always happy to hear from our visitors! Use the form below to reach out to us with your questions, comments, or concerns. We promise to get back to you as soon as we can.</p>
        <form action="submit" class="homepageForm">
            <input type="email" name="" id="" placeholder="Your Email">
            <textarea name="" id="" cols="30" rows="10" style="resize: none;" placeholder="Your Message here"></textarea>
            <a href="#" class="regularButton">Send</a>
        </form>
    </div>




<?php get_footer(); ?>