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

<?php get_template_parts( array( 'nav') ); ?>

<?php
    $heading = get_field('heading', false, false);
    $sub_heading = get_field('sub_heading', false, false);
?>

<div class="intro" style="background: url(<?php echo $src[0]; ?> ) !important;">
    <div class="container">

        <!-- Title -->
        <div class="row title">
            <h1 class="text-right"><?php echo $heading; ?></h1>
            <h2 class="text-right"><?php echo $sub_heading; ?></h2>
        </div>
        <!-- / Title -->

        <!-- Buttons -->
        <div class="row text-center buttons">
            <a href="#" class="mybutton btn btn-primary">Read More Case Studies</a>
            <a href="#" class="mybutton btn btn-primary">Read More Articles</a>
        </div>
        <!-- / Buttons -->

        <!-- Optional Article Overlay -->
        <?php $article_enabled = get_field('article_enabled', false, false);
        if ( $article_enabled == 'enabled' ) {
            $article_title = get_field('article_title', false, false);
            $article_description = get_field('article_description', false, false);
            $article_link_text = get_field('article_link_text', false, false);
            $article_link_url = get_field('article_link_url', false, false); ?>
            <div class="row">
                <div class="col-md-7 col-md-offset-5 overlay">
                    <h3><?php echo $article_title; ?></h3>
                    <P><?php echo $article_description; ?></p>
                    <a href="<?php echo get_site_url() . $article_link_url; ?>"><?php echo $article_link_text; ?><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                </div>
            </div>
        <?php }; ?>
        <!-- / Optional Article Overlay -->

        <!-- Scroll Down -->
        <div class="row">
            <div class="col-md-12 scroll-down text-center">
                <a href="#strapline" rel="m_PageScroll2id" class="mPS2id-clicked">
                    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <!-- / Scroll Down -->

    </div>
</div>

<div class="col-md-12 page-home mPS2id-target" id="strapline">
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
