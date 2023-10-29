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
 * @package Tobbe_Theme
 */

get_header();
?>

<div class="titleBlock">
  <div id="text">
      <!-- <h1>Violinmaker Torbjörn Zethelius</h1> -->
      <h1>Torbjörn Zethelius</h1>
      <img src="images/slider 5.jpeg" alt="" class="mobImg">
      <p>Welcome to the website of Torbjörn Zethelius, contemporary violinmaker. Torbjörn’s instruments are crafted in the classical Cremonese Italian style. I'm also researching, teaching & writing about classic lutherie techniques. </p>
  </div>
  <img src="images/slider 5.jpeg" alt="" class="mobPc">
</div>
<div class="textNd">
  <p>If you have visited before, you might want to try the "<a href="What's new.html">What's New</a>" page to see the latest additions.</p>
</div>

<?php
get_footer();
