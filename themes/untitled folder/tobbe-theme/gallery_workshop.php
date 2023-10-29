<?php
/*
Template Name: Gallery_work
*/
?>

<?php get_header(); ?>
<script type="text/javascript">
  {
  if (screen.width > 480) document.write ('<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></sc'+'ript>');
  }
</script>
<div class="artOn">
              <h1 class="artic">Gallery</h1>
              <?php wp_nav_menu(array(
                  'theme_location' => 'Gallery'
                )); ?>
              <div class="articles" id="articles">
                  <div class="gutter-sizer"></div>
                  <?php
                  // параметры по умолчанию
                    $posts = get_posts( array(
                    	'numberposts' => 0,
                    	'post_type'   => 'photo',
                    	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        'category' => 4,
                    ) );
                    
                    foreach( $posts as $post ){
                    	setup_postdata($post);
                        ?>
                          <div class="article" id="article" ><img src="<?php the_field('image'); ?>" alt=""><p><?php the_field('description');?></p></div>
                        <?php
                    }
                  
                    wp_reset_postdata(); // сброс
                  ?>
              </div>
            </div>
<?php get_footer(); ?>