<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main' ); ?>>
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>

	<?php endif; ?>

	<div class="page-content">


	<style>
	
	.oneArticleContainer{
		padding: 25px 25px 125px 25px;
		width: 100vw;
		padding-bottom: 300px;
		display: flex;
		padding-bottom: 0px;
		position: relative;  
	}
	
	.oneArticleContainerInner{
		width: 100%;
		position: relative;
		padding-top: 200px;
		padding-bottom: 200px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.dateName{
		display: flex;
		justify-content: space-between;
		align-items: start;
		padding: 25px 0;
	}
	
	.nameAvatar{
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 25px;
	}
	
	.content{
		color: var(--black);
	font-size: 1.125rem;
	font-weight: 300;
	line-height: 125%; /* 1.40625rem */
	}
	
	.backgroundBlock{
		position: absolute;
		top: 0;
		z-index: 0;
		width: 100%;
		height: 300px;
		background-size: 100% cover;
		background-repeat: no-repeat;
		background-position: top center;
		border-radius: 25px;
		overflow: hidden;
	}
	
	.hat{
		height: 300px;
		width: 100%;
		position: relative;
		border-radius: 25px;
	}
	
	.buttonBack{
		position: absolute;
		top: 25px;
		left: 25px;
		padding: 15px;
		background: #fff;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
		transition: all linear 300ms;
	}
	
	.buttonBack:hover{
		box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
	}
	
	.articleContainer{
		position: relative;
		z-index: 2;
		padding: 25px;
		width: 80%;
		background: #fff;
		border-radius: 25px;
		box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
	}
	
	.nameAvatar img{
		height: 60px;
		width: 60px;
		object-fit: cover;
		border-radius: 50%;
	}
	
	.articleContainer h1{
		color: var(--black);
	
	/* Title 1 */
	font-size: 3.5rem;
	font-weight: 300;
	}
	
	.name, .position{
		color: var(--black);
	font-size: 1.5rem;
	}
	
	.name{
		font-weight: 600;
	}
	
	.position{
		font-weight: 300;
	}
	
	.date{
		color: var(--black);
	font-size: 1rem;
	font-weight: 400;
	}
	
	.allNewsLink{
		width: 100%;
		text-align: right;
		display: block;
		padding: 25px 0;
		color: var(--blueDark);
		font-size: 1rem;
		font-weight: 400;
		text-decoration: underline;
	}
	
	</style>
	<div class="oneArticleContainer pageWidth" >
	
		<div class="oneArticleContainerInner pageWidth" >
			<div class="backgroundBlock" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
	
			</div>
			<div class="buttonBack" onclick="window.history.go(-1); return false;">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M19.172 10.4506L0.791213 10.0694M0.791213 10.0694L9.79699 1.42961M0.791213 10.0694L9.43102 19.0752" stroke="#2C2D2C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				  </svg>
			</div>
			<div class="articleContainer">
				<h1>
					<?php the_title(); ?>
				</h1>
				<div class="dateName">
					<div class="nameAvatar">
						<img src="./images/deepCleaningHero.png" alt="">
						<div class="name">
							<p class="name"><?php the_author(); ?></p>
							<p class="position">Position</p>
						</div>
					</div>
					<p class="date"><?php get_the_date( 'm-d-Y' ); ?></p>
				</div>
				<div class="content"><?php the_content(); ?></div>
				<a href="./blog.html" class="allNewsLink">Browse All News ></a>
			</div>
		</div>
	
	</div>
	</div>

	<?php comments_template(); ?>

</main>

	<?php
endwhile;
