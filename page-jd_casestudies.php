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
	<?php $query = new WP_Query( array('post_type' => 'jd_casestudies', 'posts_per_page' => 100 ) ); ?>
	<h1>Our Case Studies</h1>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div>
			<a href="<?php the_permalink() ?>" class="case-study row">
				<h2><?php the_field('casestudy_title'); ?></h2>
				<p><?php the_field('casestudy_summary'); ?></p>
				<?php  wp_reset_postdata(); ?>
			</a>
		</div>
	<?php endwhile; ?>
	</div>
</div>

<?php get_template_parts( array( 'parts/html-footer') ); ?>
