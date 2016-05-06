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

<div class="container">
	<div class="">
		<?php $query = new WP_Query( array('post_type' => 'jd_casestudies', 'posts_per_page' => 100 ) );
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="case-study">
				<h1><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
				<?php  wp_reset_postdata(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>


<?php get_template_parts( array( 'parts/html-footer') ); ?>
