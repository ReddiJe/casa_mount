<?php 
    /* Template Name: About */ 

    get_header();
?>

<div class="containerOutter autorsContainer">
        <div class="headerWithoutBg">
            <div class="calendarList">
                <header>
                    <?php
			            wp_nav_menu(
				            array(
				            	'theme_location' => 'menu-1',
				            	'menu_id'        => 'primary-menu',
				            )
			            );
			        ?>
                </header>
                <div class="aboutTextBlockOutter">
                    <div class="aboutTextBlock">
                        <p class="aboutText">
                            BVH is a daily themed collaborative effort to ensure that good, common sense values are rooted in ALL aspects of business, especially in its stages of early formation
                        </p>
                    </div>
                </div>
                <div class="autorsOutter">
                    <h2>Autors</h2>
                    <div class="autors">
                        <?php
                        if ( have_posts() ) : // если имеются записи в блоге.
                          query_posts('cat=46');   // указываем ID рубрик, которые необходимо вывести.
                          while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
                        ?>
                            <a class="autor" href="<?php the_permalink(); ?>">
                                <img src="./images/Portret.png" alt="">
                                <h4>
                                    <?php the_title(); ?>
                                </h4>
                                <?php the_content(); ?>
                            </a>
                        <?php 
                          endwhile;  // завершаем цикл.
                        endif;
                        /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
                        wp_reset_query();                
                        ?>
                        <a class="autor">
                            <img src="./images/Portret.png" alt="">
                            <h4>
                                Name Surname
                            </h4>
                            <p>About InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout Info</p>
                        </a>
                        <a class="autor">
                            <img src="./images/Portret.png" alt="">
                            <h4>
                                Name Surname
                            </h4>
                            <p>About InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout Info</p>
                        </a>
                        <a class="autor">
                            <img src="./images/Portret.png" alt="">
                            <h4>
                                Name Surname
                            </h4>
                            <p>About InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout InfoAbout Info</p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
    get_footer();
?>