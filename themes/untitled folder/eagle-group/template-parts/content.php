<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eagle_Group
 */

?>

<div class="oneNewsPageContainer">
        <a href="javascript:history.back()" class="oneNewsBack"><img src="<?php echo get_template_directory_uri(); ?>/inc/images/back button.svg" alt="" ></a>
        <?php the_post_thumbnail('thumbnail', array('class' => 'oneNewsPhoto')); ?>
        <div class="oneNewsPageInner">
            <div class="regularTitleContainer oneNewsRegularTitile">
                <h1 class="regularTitleBig">
                   <?php the_title(); ?>
                </h1>
                <h1 class="regularTitleNormal">
					<?php the_title(); ?>
                </h1>
            </div>
            <div class="oneNewsNameDateContainer">
                <div class="oneNewsNameContainer">
				<?php echo get_avatar( get_the_author_email(), '60' ); ?>
                    <div class="oneNewsNameContainerInner">
                        <h4><?php echo get_the_author_meta('display_name', $author_id); ?></h4>
                        <p></p>
                    </div>
                </div>
                <p class="dateOneNews"><?php the_date(); ?></p>
            </div>
            <div class="oneNewsMainText">
				<?php the_content(); ?>
			</div>
            <div class="browseAllNewsOneNewsOutter">
                <a href="./News.html" class="browseAllNewsOneNews">Browse All News</a>
            </div>

        </div>

    </div>
</div>

