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
 * @package Winter_theme
 */

get_header();
?>
<?php
    if ( have_posts() ) : // если имеются записи в блоге.
        query_posts('posts_per_page=1');
      while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
    ?>
<div class="containerOutter">
    <div class="containerInner">
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
            <div class="titleDateContainer">
                <div class="weekDay">
                    <div class="weekDayText">
                        <h2><?php the_time('l'); ?>:</h2>
                        <h2 class="weekDayTitle">
                            Day Off
                        </h2>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/bedIcon.svg" alt="">
                </div>
                <div class="dateBlock">
                    <p class="date">
                        <?php the_time('M'); ?>
                    </p>
                    <p class="number">
                        <?php the_time('j'); ?>
                    </p>
                </div>
            </div>
            <div class="contentContainer">
                <div class="contentBlock">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            <div class="bottomCalendarBlock">
                <div class="bottomCalendarBlockInner">
                    <h3>Dignity</h3>
                    <a href="#archive" class="arrowToBottomBlock"><p>Archive</p><img src="<?php echo get_template_directory_uri(); ?>/inc/images/bottomArrow.svg" alt=""></a>
                    <h3 class="invisible">Dignity</h3>
                </div>
            </div>
            <p class="year"><?php the_time('Y'); ?></p>
        </div>

    </div>
</div>
    <?php 
    endwhile;  // завершаем цикл.
    endif;
    /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
    wp_reset_query();                
?>


<div class="archiveContainer" id="archive">
        <div class="filters">
            <ul class="filtersList">
                <li class="searchBlock"><img src="<?php echo get_template_directory_uri(); ?>/inc/images/searchIcon.svg" alt="">Search</li>
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
                Last Posts
            </h2>
            <div class="archiveCalendarContainer">
                <div class="weekDayTitles">
                    <h3 >
                        Monday
                    </h3>
                    <h3>
                        Tuesday
                    </h3>
                    <h3>
                        Wednesday
                    </h3>
                    <h3>
                        Thursday
                    </h3>
                    <h3>
                        Friday
                    </h3>
                    <h3>
                        Saturday
                    </h3>
                    <h3>
                        Sunday
                    </h3>
                </div>
                <div class="weekDayInner">
                    <?php
                        if ( have_posts() ) : // если имеются записи в блоге.
                            query_posts('posts_per_page=30');
                          while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
                        ?>
                            <a href="" class="weekOneDay">
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
                    <a href="" class="weekOneDay">
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
                    </a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a><a href="" class="weekOneDay"></a>
                </div>
            </div>
            <div class="archivePaginator">
                <a class="previousMonth unactive"><img src="./images/previousArrow.svg" alt="">Go to January</a>
                <a class="nextMonth">Go to November<img src="./images/nextArrow.svg" alt=""></a>
            </div>
        </div>
</div>















<?php
get_sidebar();
get_footer();
