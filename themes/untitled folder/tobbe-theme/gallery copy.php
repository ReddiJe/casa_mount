<?php
/*
Template Name: Gallery_whats
*/
?>
<?php get_header(); ?>
<script type="text/javascript">
  {
  if (screen.width > 480) document.write ('<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></sc'+'ript>');
  }
</script>
<div class="artOn">
    <h1 class="artic">What's new</h1>
    <div class="whatsNew">
        <?php
        // параметры по умолчанию
          $posts = get_posts( array(
          	'numberposts' => 0,
          	'post_type'   => array('photo', 'articles'),
          	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
          ) );
          foreach( $posts as $post ){
          	setup_postdata($post);
              ?>
                        <div class="whatsNewOne"><a class="whatsNewlink" href="<?php the_field('pdf_file'); ?>"><p class="artTit"><?php the_title(); ?></p><img src="<?php the_field('image'); ?>" alt=""><p class="artDes"><?php the_field('description') ?></p><p class="date"><?php echo get_the_date(); ?></p></a></div>
              <?php
          }
          wp_reset_postdata(); // сброс
        ?>

    </div>
</div>
<?php get_footer(); ?>