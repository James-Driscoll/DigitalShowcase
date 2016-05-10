<?php
/*
 *
 * Template Name: Case Study
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

get_template_parts( array( 'head') );
get_template_parts( array( 'nav') ); ?>

<div class="col-md-10 col-md-offset-1">
	<div class="container">
	<?php $query = new WP_Query( array('post_type' => 'casestudy', 'posts_per_page' => 100 ) ); ?>
	<h1>Our Case Studies</h1>
	<?php while ( $query->have_posts() ) : $query->the_post();
		$casestudy_title = get_field('casestudy_title', false, false);
		$casestudy_summary = get_field('casestudy_summary', false, false);
		$casestudy_tags = get_field('casestudy_tags', false, false); ?>
		<div>
			<a href="<?php the_permalink() ?>" class="case-study-page row">
				<h2><?php echo $casestudy_title; ?></h2>
				<p><?php echo $casestudy_summary; ?></p>
				<p><?php echo $casestudy_tags; ?></p>
				<?php  wp_reset_postdata(); ?>
			</a>
		</div>
	<?php endwhile; ?>
	</div>
</div>

<?php get_template_parts( array( 'parts/html-footer') ); ?>
