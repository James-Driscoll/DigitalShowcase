<?php
/**
 *
 * This is the template for displaying a single Studio custom post type.
 *
 * @package WordPress
 * @subpackage DigitalShowcase
 *
 */

$casestudy_title = get_field('casestudy_title', false, false);
$casestudy_description = get_field('casestudy_description', false, false);
$casestudy_bullet_points = get_field('casestudy_bullet_points', false, false);
$casestudy_challenge = get_field('casestudy_challenge', false, false);
$casestudy_result = get_field('casestudy_result', false, false);
$casestudy_solution = get_field('casestudy_solution', false, false);
$casestudy_achievement = get_field('casestudy_achievement', false, false);

get_template_parts( array( 'head') );
get_template_parts( array( 'nav') ); ?>

<div class="container">
	<div class="">
	    <?php if (have_posts()) ?>
	        <?php while (have_posts()) : the_post(); ?>

				<h1 class=""><?php the_field('casestudy_title'); ?></h1>
				<p class=""><?php the_field('casestudy_description'); ?></p>
				<p class=""><?php the_field('casestudy_bullet_points'); ?></p>
				<p class=""><?php the_field('casestudy_challenge'); ?></p>
				<p class=""><?php the_field('casestudy_result'); ?></p>
				<p class=""><?php the_field('casestudy_solution'); ?></p>
				<p class=""><?php the_field('casestudy_achievement'); ?></p>

 			<?php endwhile; ?>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'footer') ); ?>
