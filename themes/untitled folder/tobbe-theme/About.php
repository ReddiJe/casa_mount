<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<div class="titleBlock">
    <div id="text2">
      <div class="textAndPhoto">
        <img src="<?php the_field('photo'); ?>" alt="" class="aboutImgMob">
        <div class="textLeftPh">
          <h1><?php the_field('title'); ?></h1>
          <p><?php the_field('1st_text'); ?></p>
          <p><?php the_field('2nd_text'); ?></p>
        </div>
        <img src="<?php the_field('photo'); ?>" alt="" class="aboutImg">
      </div>
        <ul class="whatDo">
            <h1><?php the_field('2nd_title'); ?></h1>
            <li><p> <?php the_field('2nd_block_1st_text'); ?></p> </li>
            <li><p> <?php the_field('2nd_block_2nd_text'); ?></p></li>
            <li><p> <?php the_field('2nd_block_3rd_text'); ?></p></li>
            <p><?php the_field('2nd_block_4rd_text'); ?></p>
        </ul>
    </div>
</div>
<?php get_footer(); ?>