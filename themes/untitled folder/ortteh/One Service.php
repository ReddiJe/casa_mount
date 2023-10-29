<?php
/*
Template Name: One service
*/

get_header();

?>

<div class="productionPage">
			<img class="productionPageHeroImg" src="<?php the_field(one_serv_img) ?>" alt="img">
			<div class="productionPageContainer">
				<div class="productionPageTitleBlock">
					<h1 class="productionPageTitle bigTitle"><?php the_title(); ?></h1>
				</div>
				<div class="productionPageContent">
					<p class="productionPageContentText"><?php the_content();?></p>
				</div>
			</div>
		</div>
		<div class="aboutUsButtom moreInfoButtom">
			<p class="aboutUsButtomText moreInfoButtomText">Інші послуги</p>
			<a class="aboutUsButtomLink moreInfoButtomLink" href="./services.html">
				<img class="aboutUsButtomIcon moreInfoButtomIcon" src="<?php echo get_template_directory_uri(); ?>/inc/img/arrow.webp" alt="icon-arrow">
			</a>
		</div>

<?php get_footer();?>