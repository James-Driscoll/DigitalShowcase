<?php
/**
 * Template Name: Contact
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

get_template_parts( array( 'head') );
get_template_parts( array( 'nav') ); ?>

<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php $page_heading = get_field('page_heading', false, false);
    $page_sub_heading = get_field('page_sub_heading', false, false); ?>

    <div class="row">
        <div class="container">
            <div class="content page-contact page-heading font1">
                <h2><?php echo $page_heading; ?></h2>
                <p><?php echo $page_sub_heading; ?></p>
                <div><?php the_content(); ?></div>
            </div>
        </div>
    </div>

<?php endwhile; else : ?>
    <p>Oops! There was a problem.</p>
<?php endif; ?>
<!-- / The Loop -->

<?php get_template_parts( array( 'footer') ); ?>
