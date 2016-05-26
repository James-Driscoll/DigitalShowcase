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

<?php $casestudy_noposts_text = get_field('noposts_text') ?>

<div class="row">
	<div class="content page-casestudies container">

		<!-- Heading -->
		<?php $page_heading = get_field('page_heading');
	    $page_sub_heading = get_field('page_sub_heading'); ?>
	    <div class="row">
            <div class="page-heading font1">
                <h2><?php echo $page_heading; ?></h2>
                <p><?php echo $page_sub_heading; ?></p>
            </div>
	    </div>
		<!-- / Heading -->

		<!-- Search Form -->
		<div class="row">
			<form id="tags-select" class="tags-select" action="<?php the_permalink(); ?>" method="get">
				<div class="row">
					<div class="col-md-3">
						<select class="tags-industry form-control select2-select" multiple="multiple" name="industry[]">
							<?php jd_get_industry_tags(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="tags-technology form-control select2-select" multiple="multiple" name="technology[]">
							<?php jd_get_technology_tags(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="tags-programme form-control select2-select" multiple="multiple" name="programme[]">
							<?php jd_get_programme_tags(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="tags-partner form-control select2-select" multiple="multiple" name="partner[]">
							<?php jd_get_partner_tags(); ?>
						</select>
					</div>
				</div>
				<?php $casestudies_button_text = get_field('casestudies_button_text', false, false); ?>
				<div class="row">
					<input class="mybutton" type="submit" value="<?php echo $casestudies_button_text; ?>">
				</div>
			</form>
		</div>
		<!-- / Search Form -->

		<!-- Empty Form or Page Just Loaded -->
		<?php if ( isset($_GET["industry"]) ||
		 		   isset($_GET["technology"]) ||
				   isset($_GET["programme"]) ||
				   isset($_GET["partner"])
				 ) {
					 // No Parameters
					 $parameters_set = true;
				 } else {
					 // Parameters Present
					 $parameters_set = false;
				 };

		 if ( $parameters_set == true ) { ?>

			 <!-- Returned Case Study Tiles -->
	 		<?php
			if ( isset($_GET["industry"]) ) {
	 			$industry = $_GET["industry"];
	 		}
			if ( isset($_GET["technology"]) ) {
	 			$technology = $_GET["technology"];
	 		}
			if ( isset($_GET["programme"]) ) {
				$programme = $_GET["programme"];
			}
			if ( isset($_GET["partner"]) ) {
				$partner = $_GET["partner"];
			}

	 		$args = array(
	 			'post_type' => 'casestudy',
	 			'tax_query' => array(
	 				'relation' => 'AND',
		 				array(
		 					'taxonomy' => 'industry',
		 					'field'    => 'slug',
		 					'terms'    => $industry,
		 					'operator' => 'IN',
		 				),
						array(
		 					'taxonomy' => 'technology',
		 					'field'    => 'slug',
		 					'terms'    => $technology,
		 					'operator' => 'IN',
		 				),
						array(
							'taxonomy' => 'programme',
							'field'    => 'slug',
							'terms'    => $programme,
							'operator' => 'IN',
						),
						array(
							'taxonomy' => 'partner',
							'field'    => 'slug',
							'terms'    => $partner,
							'operator' => 'IN',
						),
	 			),
	 		); ?>

	 		<div class="row">
	 			<!-- The Loop -->
	 			<?php $query = new WP_Query( $args );
	 			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	 				$casestudy_title = get_field('casestudy_title');
	 				$casestudy_summary = get_field('casestudy_summary');
	 				$casestudy_tags = get_field('casestudy_tags');
	 				$casestudy_image = get_field('casestudy_image') ?>
	 				<div class="tile font1 col-md-4">
	 					<a href="<?php the_permalink() ?>">
	 						<img src="<?php echo $casestudy_image; ?>" class="img-responsive"/>
	 						<h2><?php echo $casestudy_title; ?></h2>
	 						<p><?php echo $casestudy_summary; ?></p>
	 						<p><?php echo $casestudy_tags; ?></p>
	 					</a>
	 				</div>
	 			<?php endwhile;
	 			wp_reset_postdata();
	 		    else : ?>
	 				<?php $casestudy_noposts_text = get_field('noposts_text') ?>
	 		    	<p class="font1 text-center"><?php echo $casestudy_noposts_text; ?></p>
	 		    <?php endif; ?>
	 			<!-- / The Loop -->
	 		</div>
	 		<!-- / Returned Case Study Tiles -->
		 <?php } else {
			 jd_show_noposts_message($casestudy_noposts_text);
		 } ?>

	</div>
</div>
<?php endwhile; endif; ?>
<?php get_template_parts( array( 'footer') ); ?>
