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
$casestudy_image = get_field('casestudy_image');
$casestudy_challenge = get_field('casestudy_challenge', false, false);
$casestudy_result = get_field('casestudy_result', false, false);
$casestudy_solution = get_field('casestudy_solution', false, false);
$casestudy_achievement = get_field('casestudy_achievement', false, false);

get_template_parts( array( 'head') );
get_template_parts( array( 'nav') ); ?>

<div class="row">
	<div class="container">
		<div class="case-study-single content">
		    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
				<div class="row">
					<div class="casestudy_title">
						<h1 class="text-center"><?php echo $casestudy_title; ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_description text-center">
						<p><?php echo $casestudy_description; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_image text-center">
						<img src="<?php echo $casestudy_image; ?>" class="img-responsive">
					</div>
				</div>
				<div class="border row">
					<div class="casestudy_challenge col-md-6">
						<h3>Challenge</h3>
						<p><?php echo $casestudy_challenge; ?></p>
					</div>
					<div class="casestudy_result col-md-6">
						<h3>Result</h3>
						<p><?php echo $casestudy_result; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_solution">
						<h3>Solution</h3>
						<p><?php echo $casestudy_solution; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_achievement">
						<h3>Achievement</h3>
						<p><?php echo $casestudy_achievement; ?></p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'footer') ); ?>
