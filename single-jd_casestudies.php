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
	<div class="case-study-single content">
	    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<div class="row">
				<h1 class="col-md-12 text-center"><?php echo $casestudy_title; ?></h1>
			</div>
			<div class="row">
				<div class="col-md-6 description">
					<?php echo $casestudy_description; ?>
				</div>
				<div class="col-md-6 bullet_points">
					<?php echo $casestudy_bullet_points; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 challenge">
					<h3>Challenge</h3>
					<?php echo $casestudy_challenge; ?>
				</div>
				<div class="col-md-6 result">
					<h3>Results</h3>
					<?php echo $casestudy_result; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 solution">
					<h3>Solution</h3>
					<?php echo $casestudy_solution; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 achievement">
					<h3>Achievement</h3>
					<?php echo $casestudy_achievement; ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'footer') ); ?>
