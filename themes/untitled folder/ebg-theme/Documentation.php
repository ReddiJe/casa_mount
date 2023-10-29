<?php /* 
Template Name: Documentation Page Template 
*/ ?>

<?php
get_header();
?>

<div class="screen">
        <h1 class="title">
            DOCUMENTATION
        </h1>
        <h2 class="subTitle">
            On this page you can download all the documentation you are interested in.
        </h2>
        <div class="cardsBlockOutter">
            <div class="cardsBlock">




            <?php 
				$my_posts = get_posts( array(
					'numberposts' => 0,
					'category'    => 0,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'include'     => array(),
					'exclude'     => array(),
					'meta_key'    => '',
					'meta_value'  =>'',
					'post_type'   => 'post',
					'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
				) );
				
				foreach( $my_posts as $post ){
					setup_postdata( $post );
				
					?>
                            <div class="card">
                                <img src="<?php the_field(photo_link); ?>" alt="" class="cardImg">
                                <div class="cardInner">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_content(); ?></p>
                                    <a href="<?php the_field(link); ?>">Download</a>
                                </div>
                            </div>
					
					<?php
				}
			?>
            
            </div>
        </div>

    </div>

<?php
get_footer();
?>