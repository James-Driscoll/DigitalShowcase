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

<?php get_template_parts( array( 'parts/html-header') ); ?>

<div class="col-md-10 col-md-offset-1 content page-home container">

    <div class="row strap-line">
        <h2 class="text-center">This is Aimee's Heading</h2>
        <p class="text-center">Thiss is Aimee's Description. Thiss is Aimee's Description. Thiss is Aimee's Description. Thiss is Aimee's Description. Thiss is Aimee's Description. </p>
    </div>
    <div class="col-md-4 item item-top">
        <i class="fa <?php the_field('item_1_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_1_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_1_description'); ?></p>
    </div>
    <div class="col-md-4 item item-top">
        <i class="fa <?php the_field('item_2_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_2_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_2_description'); ?></p>
    </div>
    <div class="col-md-4 item item-top">
        <i class="fa <?php the_field('item_3_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_3_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_3_description'); ?></p>
    </div>
    <div class="col-md-4 item">
        <i class="fa <?php the_field('item_4_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_4_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_4_description'); ?></p>
    </div>
    <div class="col-md-4 item">
        <i class="fa <?php the_field('item_5_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_5_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_5_description'); ?></p>
    </div>
    <div class="col-md-4 item">
        <i class="fa <?php the_field('item_6_icon'); ?> text-center" aria-hidden="true"></i>
        <h3 class="text-center"><?php the_field('item_6_heading'); ?></h3>
        <p class="text-center"><?php the_field('item_6_description'); ?></p>
    </div>
</div>

<?php get_template_parts( array( 'parts/html-footer') ); ?>
