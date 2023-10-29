<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<div class="titleBlock">
  <div id="text">
      <!-- <h1>Violinmaker Torbjörn Zethelius</h1> -->
      <h1><?php the_field(title); ?></h1>
      <img src="<?php the_field(image); ?>" alt="" class="mobImg">
      <p><?php the_field('1st_text'); ?></p>
  </div>
  <img src="<?php the_field(image); ?>" alt="" class="mobPc">
</div>
<div class="textNd">
  <p><?php the_field('2nd_text_1st_part'); ?>"<a href="http://localhost:8000/?page_id=25"><?php the_field('link_text'); ?></a>" <?php the_field('2nd_text_second_part'); ?></p>
</div>
<?php get_footer(); ?>