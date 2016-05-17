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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="col-md-10 col-md-offset-1 content top">
	<div class="container">

	<div class="row">
		<h1>Our Case Studies</h1>
	</div>

	<div class="row">
		<form id="tags-select" class="tags-select" action="<?php the_permalink(); ?>" method="get">
			<select class="form-control select2-select" multiple="multiple" name="tags[]">
				<?php jd_get_tags(); ?>
			</select>
			<input class="btn btn-primary" type="submit" value="Filter">
		</form>
	</div>

	<?php
	if ( isset($_GET["tags"]) ) {
		$myterms = $_GET["tags"];
		$args = array(
			'post_type' => 'casestudy',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'slug',
					'terms'    => $myterms, //$myterms,array( 'api', 'financial' ),
					'operator' => 'AND',
				),
			),
		);

		$query = new WP_Query( $args );
		while ( $query->have_posts() ) : $query->the_post();
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
	<?php }; ?>

	</div>
</div>
<?php endwhile; endif; ?>
<?php get_template_parts( array( 'footer') ); ?>
