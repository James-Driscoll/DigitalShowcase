<?php
/**
 *
 * This is the template for displaying a single Studio custom post type not done by James Driscoll.
 *
 * @package WordPress
 * @subpackage DigitalShowcase
 *
 */

$casestudy_title = get_field('casestudy_title');
$casestudy_description = get_field('casestudy_description');
$casestudy_image = get_field('casestudy_image');
$casestudy_challenge = get_field('casestudy_challenge');
$casestudy_result = get_field('casestudy_result');
$casestudy_solution = get_field('casestudy_solution');
$casestudy_achievement = get_field('casestudy_achievement');
$casestudy_reference = get_field('casestudy_reference');
$casestudy_details_molly_activity_id = get_field('details_molly_activity_id');
$casestudy_details_effort = get_field('details_effort');
$casestudy_details_duration = get_field('details_duration');
$casestudy_details_teams = get_field('details_teams');
$casestudy_industries = get_the_terms( get_the_ID(), 'industry');
$casestudy_programmes = get_the_terms( get_the_ID(), 'programme');
$casestudy_technologies = get_the_terms( get_the_ID(), 'technology');
$casestudy_partners = get_the_terms( get_the_ID(), 'partner');

get_template_parts( array( 'head') );
get_template_parts( array( 'nav') ); ?>

<div class="row">
	<div class="content container">
		<div class="row">
			<div class="nav-back">
				<a href="http://staging.digitalshowcase.marketing/case-studies"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Back to Case Studies</a>
			</div>
		</div>
		<!-- The Loop -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="casestudy_single">
				<div class="row">
					<div class="casestudy_title font1">
						<h1 class="text-center"><?php echo $casestudy_title; ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_tags font1">
						<div class="row">
							<strong>Verticals: </strong>
							<ul>
							<?php $posttags = get_the_terms( get_the_ID(), 'industry');
								if ($posttags) {
									foreach($posttags as $tag) {
										echo '<li>' . $tag->name . '</li>';
									}
								} ?>
							</ul>
						</div>
						<div class="row">
							<strong>Programmes: </strong>
							<ul>
							<?php $posttags = get_the_terms( get_the_ID(), 'programme');
								if ($posttags) {
									foreach($posttags as $tag) {
										echo '<li>' . $tag->name . '</li>';
									}
								} ?>
							</ul>
						</div>
						<div class="row">
							<strong>Technologies: </strong>
							<ul>
							<?php $posttags = get_the_terms( get_the_ID(), 'technology');
								if ($posttags) {
									foreach($posttags as $tag) {
										echo '<li>' . $tag->name . '</li>';
									}
								} ?>
							</ul>
						</div>
						<div class="row">
							<strong>Partners: </strong>
							<ul>
							<?php $posttags = get_the_terms( get_the_ID(), 'partner');
								if ($posttags) {
									foreach($posttags as $tag) {
										echo '<li>' . $tag->name . '</li>';
									}
								} ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_image font1 text-center">
						<img src="<?php echo $casestudy_image; ?>" class="img-responsive img-circle">
					</div>
				</div>
				<div class="row">
					<div class="casestudy_description font1 text-center">
						<p><?php echo $casestudy_description; ?></p>
					</div>
				</div>
				<div class="border row">
					<div class="casestudy_challenge font1 col-md-6">
						<h3>Challenge</h3>
						<p><?php echo $casestudy_challenge; ?></p>
					</div>
					<div class="casestudy_result font1 col-md-6">
						<h3>Result</h3>
						<p><?php echo $casestudy_result; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_solution font1">
						<h3>Solution</h3>
						<p><?php echo $casestudy_solution; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_achievement font1">
						<h3>Achievement</h3>
						<p><?php echo $casestudy_achievement; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="casestudy_reference font1">
						<p><strong>Reference: </strong><?php jd_build_reference( $casestudy_industries, $casestudy_programmes, $casestudy_details_molly_activity_id, $casestudy_details_effort, $casestudy_details_duration, $casestudy_details_teams ); ?></p>
					</div>
				</div>
			<?php endwhile; else : ?>
				<p>Oops! The post could not be found.</p>
			<?php endif; ?>
		</div>
		<!-- / The Loop -->
	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'footer') ); ?>
