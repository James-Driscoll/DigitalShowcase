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
get_template_parts( array( 'nav') );

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php $contact_heading = get_field('contact_heading', false, false);
    $contact_sub_heading = get_field('contact_sub_heading', false, false); ?>

    <div class="row">
        <div class="container">
            <div class="content page-contact page-heading">
                <h2><?php echo $contact_heading; ?></h2>
                <p><?php echo $contact_sub_heading; ?></p>
                <div><?php the_content(); ?></div>
            </div>
        </div>
    </div>

<?php endwhile;

get_template_parts( array( 'footer') ); ?>

<script type="text/javascript" src="form-scripts.js"></script>
<script type="text/javascript" src="validator.min.js"></script>
