<?php /* Template Name: News Page */ 
get_header();
?>
    <div class="regularTitleContainer">
        <h1 class="regularTitleBig">
            News
        </h1>
        <h1 class="regularTitleNormal">
            All News
        </h1>
    </div>
    
    <div class="latestNewsBlock newsPageLatestNews">




<?php
query_posts('' );

if( have_posts() ){
	while( have_posts() ){
		the_post();?>


<div class="lastOneNews">
<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="newsImage newsImageLast">
<div class="lastOneNewsText">
    <h3 class="newsTitle"><?php the_title(); ?></h3>
    <p class="newsText"><?php echo the_excerpt() ;?>...
    </p>
    <div class="readFullLinkContainer">
        <p><?php the_date();?> by <?php echo get_the_author_meta('display_name', $author_id); ?></p>
        <a href="<?php the_permalink() ?>" class="readFullLink">Read full ></a>
    </div>
    
</div>
</div>

        <?php
	}
}
else {
	echo 'Записей нет';
}

?>

</div>



<?php get_footer();?>