<?php
/*
 * Template Name: Autor5
 * Template Post Type: post, page, product
 */
   
 get_header();  ?>

<div class="oneAutorPageContainerOutter">
        <div class="oneAutorPageContainer">
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
            <div class="autorsAutorOutter ">
                <div class="autorPageContainer">
                    <img src="./images/Portret.png" alt="">
                    <div class="autorPageTextContainer" href="./Autor.html">
                        <h4>
                            <?php the_title(); ?>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div class="archiveContainer" id="archive">
                    <div class="filters">
                        <ul class="filtersList">
                            <li class="searchBlock"><img src="./images/searchIcon.svg" alt="">Search</li>
                            <li>Management</li>
                            <li>Product & Service</li>
                            <li>Marketing & Communications</li>
                            <li>Partnerships & Growth</li>
                            <li>Culture</li>
                            <li>Strategy</li>
                            <li>Wellness</li>
                        </ul>
                    </div>
                    <div class="calendarArchive">
                        <h2 class="archiveTitle">
                            Posts:
                        </h2>
                        <div class="archiveCalendarContainer">
                            <div class="weekDayInner">
                            <?php
                                if ( have_posts() ) : // если имеются записи в блоге.
                                  query_posts('cat=49');   // указываем ID рубрик, которые необходимо вывести.
                                  while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="weekOneDay">
                                        <div class="weekOneDayInner">
                                            <p class="date">
                                                31
                                            </p>
                                            <h4>
                                                <?php the_title(); ?>
                                            </h4>
                                            <p class="year">
                                                2022
                                            </p>
                                        </div>
                                    </a>
                                <?php 
                                endwhile;  // завершаем цикл.
                                endif;
                                /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
                                wp_reset_query();                
                                ?>
                                <a href="./One post.html" class="weekOneDay">
                                    <div class="weekOneDayInner">
                                        <p class="date">
                                            31
                                        </p>
                                        <h4>
                                            From Solidarity to Dignity
                                        </h4>
                                        <p class="year">
                                            2022
                                        </p>
                                    </div>
                                </a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>