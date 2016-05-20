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

<div class="row">
	<div class="content page-casestudies container">

		<!-- Heading -->
		<?php $casestudies_heading = get_field('casestudies_heading', false, false);
	    $casestudies_sub_heading = get_field('casestudies_sub_heading', false, false); ?>
	    <div class="row">
            <div class="heading">
                <h2><?php echo $casestudies_heading; ?></h2>
                <p><?php echo $casestudies_sub_heading; ?></p>
            </div>
	    </div>
		<!-- / Heading -->

		<!-- Search Form -->
		<div class="row">
			<form id="tags-select" class="tags-select" action="<?php the_permalink(); ?>" method="get">
				<select class="form-control select2-select" multiple="multiple" name="tags[]">
					<?php jd_get_tags(); ?>
				</select>
				<?php $casestudies_button_text = get_field('casestudies_button_text', false, false); ?>
				<input class="mybutton" type="submit" value="<?php echo $casestudies_button_text; ?>">
			</form>
		</div>
		<!-- / Search Form -->

		<!-- Returned Case Study Tiles -->
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
						'terms'    => $myterms,
						'operator' => 'AND',
					),
				),
			);

			$query = new WP_Query( $args ); ?>
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post();
					$casestudy_title = get_field('casestudy_title', false, false);
					$casestudy_summary = get_field('casestudy_summary', false, false);
					$casestudy_tags = get_field('casestudy_tags', false, false);
					$casestudy_image = get_field('casestudy_image') ?>
					<div class="tile col-md-4">
						<a href="<?php the_permalink() ?>">
							<img src="<?php echo $casestudy_image; ?>" class="img-responsive"/>
							<h2><?php echo $casestudy_title; ?></h2>
							<p><?php echo $casestudy_summary; ?></p>
							<p><?php echo $casestudy_tags; ?></p>
							<?php  wp_reset_postdata(); ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		<?php } else {

			$args = array(
				'post_type' => 'casestudy',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'slug',
						'terms'    => 'highlight',
						'operator' => 'AND',
					),
				),
			);

			$query = new WP_Query( $args ); ?>
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post();
					$casestudy_title = get_field('casestudy_title', false, false);
					$casestudy_summary = get_field('casestudy_summary', false, false);
					$casestudy_tags = get_field('casestudy_tags', false, false);
					$casestudy_image = get_field('casestudy_image') ?>
					<div class="tile col-md-4">
						<a href="<?php the_permalink() ?>">
							<img src="<?php echo $casestudy_image; ?>" class="img-responsive"/>
							<h2><?php echo $casestudy_title; ?></h2>
							<p><?php echo $casestudy_summary; ?></p>
							<p><?php echo $casestudy_tags; ?></p>
							<?php  wp_reset_postdata(); ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		<?php } ?>
		<!-- / Returned Case Study Tiles -->

	</div>
</div>
<?php endwhile; endif; ?>
<?php get_template_parts( array( 'footer') ); ?>
