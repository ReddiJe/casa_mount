<?php
/*
Template Name: Articles
*/
?>
<?php get_header(); ?>
<script type="text/javascript">
  {
  if (screen.width > 480) document.write ('<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></sc'+'ript>');
  }
</script>
<div class="artOn">
  <h1 class="artic">Articles</h1>
  <div class="articles" id="articles">
      <div class="gutter-sizer"></div>





      <?php
      // параметры по умолчанию
        $posts = get_posts( array(
        	'numberposts' => 0,
        	'post_type'   => 'articles',
        	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        
        foreach( $posts as $post ){
        	setup_postdata($post);
            ?>
                    <a class="article" id="article" href="<?php the_field('pdf_file'); ?>" target="_blank"><p class="artTit"><?php the_title(); ?></p><img src="<?php the_field('image'); ?>" alt=""><p class="artDes"><?php the_field('description'); ?></p></a>
            <?php
        }

        wp_reset_postdata(); // сброс
      ?>
  </div>
</div>
<?php get_footer(); ?>