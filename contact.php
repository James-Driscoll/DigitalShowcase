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

get_template_parts( array( 'parts/html-header') );

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div class="col-md-6 col-md-offset-3 content page-contact container">
        <h2><?php the_field('contact_heading'); ?></h2>
        <p><?php the_field('contact_sub-heading'); ?></p>
        <div><?php echo the_content(); ?></div>
    </div>

<?php endwhile;

get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>

<script type="text/javascript" src="form-scripts.js"></script>
<script type="text/javascript" src="validator.min.js"></script>
