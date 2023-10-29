<?php 
/*
Template Name: Gallery
*/
?>

<?php get_header();?>

<div class="galaryPage">
			<div class="galaryPageContainer">
				<h1 class="galaryPage bigTitle">Галерея</h1>
				<div class="galaryBody">
					<div id="columns">

					<?php query_posts($args);
        				while (have_posts()) : the_post(); ?>
									<figure>
										<img src="<?php the_field(GallleryImg); ?>">
									</figure>
        						<?php endwhile;
        						wp_reset_query();
        				?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>