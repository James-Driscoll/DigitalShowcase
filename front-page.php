<?php
  /**
   * Template Name: Homepage
   *
   * @package     WordPress
   * @subpackage  Starkers
   * @since       Starkers 4.0
   *
   * Please see /external/starkers-utilities.php for info on get_template_parts()
   */
?>

<?php get_template_parts( array( 'head') ); ?>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>

<div class="intro" style="background: url(<?php echo $src[0]; ?> ) !important;">
    <div class="col-md-10 col-md-offset-1">
        <div class="container">
    		<div class="navWrapper">
    		  <?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
    		</div>

            <div class="title">
                <h1 class="text-right"><?php the_field('home_heading'); ?></h1>
                <h2 class="text-right"><?php the_field('home_sub_heading'); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 page-home">
    <div class="col-md-12 strap-line">
        <h2 class="text-center"><?php the_field('home_strapline_heading'); ?></h2>
        <p class="text-center"><?php the_field('home_strapline_sub_heading'); ?></p>
    </div>

    <?php $rows = get_field('home_icon_rows', false, false);
    if ( $rows == 1 ) { ?>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_1_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_1_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_1_description'); ?></p>
        </div>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_2_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_2_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_2_description'); ?></p>
        </div>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_3_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_3_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_3_description'); ?></p>
        </div>
    <?php }
    if ( $rows == 2 ) { ?>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_1_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_1_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_1_description'); ?></p>
        </div>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_2_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_2_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_2_description'); ?></p>
        </div>
        <div class="col-md-4 item item-top">
            <i class="fa <?php the_field('home_item_3_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_3_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_3_description'); ?></p>
        </div>
        <div class="col-md-4 item">
            <i class="fa <?php the_field('home_item_4_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_4_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_4_description'); ?></p>
        </div>
        <div class="col-md-4 item">
            <i class="fa <?php the_field('home_item_5_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_5_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_5_description'); ?></p>
        </div>
        <div class="col-md-4 item">
            <i class="fa <?php the_field('home_item_6_icon'); ?> text-center" aria-hidden="true"></i>
            <h3 class="text-center"><?php the_field('home_item_6_heading'); ?></h3>
            <p class="text-center"><?php the_field('home_item_6_description'); ?></p>
        </div>
    <?php } ?>
</div>

<?php get_template_parts( array( 'footer') ); ?>
