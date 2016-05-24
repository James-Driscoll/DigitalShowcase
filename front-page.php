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
<?php get_template_parts( array( 'nav') ); ?>

<!-- Carousel -->
<div class="row">
<div id="home_carousel" class="carousel slide" data-ride="carousel">

    <?php $carousel_slides = get_field('carousel_number_of_slides');
    $carousel_slide1_image = get_field('carousel_slide1_image');
    $carousel_slide1_title = get_field('carousel_slide1_title');
    $carousel_slide1_description = get_field('carousel_slide1_description');
    $carousel_slide1_link = get_field('carousel_slide1_link');
    $carousel_slide2_image = get_field('carousel_slide2_image');
    $carousel_slide2_title = get_field('carousel_slide2_title');
    $carousel_slide2_description = get_field('carousel_slide2_description');
    $carousel_slide2_link = get_field('carousel_slide2_link'); ?>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#home_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home_carousel" data-slide-to="1"></li>
        <?php if ( $carousel_slides > 2 ) { ?>
            <li data-target="#home_carousel" data-slide-to="2"></li>
            <?php if ( $carousel_slides > 3 ) { ?>
                <li data-target="#home_carousel" data-slide-to="3"></li>
                <?php if ( $carousel_slides > 4 ) { ?>
                    <li data-target="#home_carousel" data-slide-to="4"></li>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo $carousel_slide1_image; ?>" alt=""/>
            <div class="carousel-caption">
                <!-- Optional Overlay -->
                <div class="row">
                    <div class="col-md-7 col-md-offset-5 overlay font1">
                        <h3 class="text-left"><?php echo $carousel_slide1_title; ?></h3>
                        <P class="text-left"><?php echo $carousel_slide1_description; ?></p>
                        <a href="<?php echo $carousel_slide1_link; ?>" class="text-right">Read More<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- / Optional Overlay -->
            </div>
        </div>
        <div class="item">
            <img src="<?php echo $carousel_slide2_image; ?>" alt=""/>
            <div class="carousel-caption">
                <!-- Optional Article Overlay -->
                <div class="row">
                    <div class="col-md-7 col-md-offset-5 overlay">
                        <h3 class="text-left"><?php echo $carousel_slide2_title; ?></h3>
                        <P class="text-left"><?php echo $carousel_slide2_description; ?></p>
                        <a href="<?php echo $carousel_slide2_link; ?>" class="text-right">Read More<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- / Optional Article Overlay -->
            </div>
        </div>
        <?php if ( $carousel_slides > 2 ) {
            $carousel_slide3_image = get_field('carousel_slide3_image');
            $carousel_slide3_title = get_field('carousel_slide3_title');
            $carousel_slide3_description = get_field('carousel_slide3_description');
            $carousel_slide3_link = get_field('carousel_slide3_link'); ?>
            <div class="item">
                <img src="<?php echo $carousel_slide3_image; ?>" alt=""/>
                <div class="carousel-caption">
                    <!-- Optional Article Overlay -->
                    <div class="row">
                        <div class="col-md-7 col-md-offset-5 overlay">
                            <h3 class="text-left"><?php echo $carousel_slide3_title; ?></h3>
                            <P class="text-left"><?php echo $carousel_slide3_description; ?></p>
                            <a href="<?php echo $carousel_slide3_link; ?>" class="text-right">Read More<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- / Optional Article Overlay -->
                </div>
            </div>
            <?php if ( $carousel_slides > 3 ) {
                $carousel_slide4_image = get_field('carousel_slide4_image');
                $carousel_slide4_title = get_field('carousel_slide4_title');
                $carousel_slide4_description = get_field('carousel_slide4_description');
                $carousel_slide4_link = get_field('carousel_slide4_link'); ?>
                <div class="item">
                    <img src="<?php echo $carousel_slide4_image; ?>" alt=""/>
                    <div class="carousel-caption">
                        <!-- Optional Article Overlay -->
                        <div class="row">
                            <div class="col-md-7 col-md-offset-5 overlay">
                                <h3 class="text-left"><?php echo $carousel_slide4_title; ?></h3>
                                <P class="text-left"><?php echo $carousel_slide4_description; ?></p>
                                <a href="<?php echo $carousel_slide4_link; ?>" class="text-right">Read More<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- / Optional Article Overlay -->
                    </div>
                </div>
                <?php if ( $carousel_slides > 4 ) {
                    $carousel_slide5_image = get_field('carousel_slide5_image');
                    $carousel_slide5_title = get_field('carousel_slide5_title');
                    $carousel_slide5_description = get_field('carousel_slide5_description');
                    $carousel_slide5_link = get_field('carousel_slide5_link'); ?>
                    <div class="item">
                        <img src="<?php echo $carousel_slide5_image; ?>" alt=""/>
                        <div class="carousel-caption">
                            <!-- Optional Article Overlay -->
                            <div class="row">
                                <div class="col-md-7 col-md-offset-5 overlay">
                                    <h3 class="text-left"><?php echo $carousel_slide5_title; ?></h3>
                                    <P class="text-left"><?php echo $carousel_slide5_description; ?></p>
                                    <a href="<?php echo $carousel_slide5_link; ?>" class="text-right">Read More<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- / Optional Article Overlay -->
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#home_carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#home_carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<!-- / Carousel -->

<!-- Buttons -->
<?php $button_1_text = get_field('button_1_text');
$button_1_link = get_field('button_1_link');
$button_2_text = get_field('button_2_text');
$button_2_link = get_field('button_2_link'); ?>
<div class="row">
    <div class="container">
        <div class="text-center buttons font1">
            <a href="<?php echo $button_1_link ?>" class="mybutton"><?php echo $button_1_text ?></a>
            <a href="<?php echo $button_2_link ?>" class="mybutton"><?php echo $button_2_text ?></a>
        </div>
    </div>
</div>
<!-- / Buttons -->

<?php get_template_parts( array( 'footer') ); ?>
