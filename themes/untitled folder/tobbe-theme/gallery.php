<?php
/*
Template Name: Gallery
*/
?>

<div class="slider" id="slider">
  <button class="closeHideImg" onclick="closeHideF();">X</button>
  <span class="arrows">
    <span class="leftArrow" onclick="previousPhoto()">
      <svg width="246" height="413" viewBox="0 0 246 413" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M195.525 408.487C201.382 414.344 210.88 414.344 216.738 408.487L241.487 383.738C247.344 377.88 247.344 368.382 241.487 362.525L85.7114 206.75L241.44 51.021C247.297 45.1636 247.297 35.6655 241.44 29.8081L216.691 5.05908C210.833 -0.798337 201.335 -0.798336 195.478 5.05909L4.55906 195.978C1.0991 199.437 -0.316913 204.168 0.310041 208.668C0.680158 211.919 2.1118 215.074 4.60594 217.568L195.525 408.487Z" fill="white"/>
      </svg>
    </span>
    <span class="rightArrow" onclick="nextPhoto()">
      <svg width="246" height="413" viewBox="0 0 246 413" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M50.521 5.05909C44.6636 -0.798332 35.1655 -0.798334 29.3081 5.05909L4.55908 29.8081C-1.29835 35.6655 -1.29835 45.1636 4.55907 51.021L160.334 206.796L4.60589 362.525C-1.25153 368.382 -1.25153 377.88 4.60589 383.738L29.3549 408.487C35.2123 414.344 44.7104 414.344 50.5678 408.487L241.487 217.568C244.947 214.109 246.363 209.377 245.736 204.878C245.366 201.627 243.934 198.472 241.44 195.978L50.521 5.05909Z" fill="white"/>
      </svg>
    </span>
  </span>

  <?php
  // параметры по умолчанию
    $posts = get_posts( array(
    	'numberposts' => 0,
    	'post_type'   => 'photo',
    	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      'category' => 0,
    ) );
    
    foreach( $posts as $post ){
    	setup_postdata($post);
        ?>
          <div class="hideImg" id="<?php the_id(); ?>"><img class="heideImgPic" src="<?php the_field('image');?>" alt=""><p class="hideImgText"><?php the_field('description');?></p></div>
        <?php
    }

    wp_reset_postdata(); // сброс
  ?>
</div>


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
                      'category' => 0,
                    ) );
                    
                    foreach( $posts as $post ){
                    	setup_postdata($post);
                        ?>
                          <div class="article" id="<?php the_id(); ?>" onclick="var thisId = this.id; openSlider(thisId);">
                            <img src="<?php the_field('image'); ?>" alt=""><p><?php the_field('description');?></p>
                          </div>
                        <?php
                    }
                  
                    wp_reset_postdata(); // сброс
                  ?>
              </div>
            </div>
<?php get_footer(); ?>