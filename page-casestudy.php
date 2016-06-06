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
                <h1><?php echo $page_heading; ?></h2>
                <p><?php echo $page_sub_heading; ?></p>
            </div>
	    </div>
		<!-- / Heading -->


		<?php
		// Empty Form or Page Just Loaded
		if ( isset($_GET["vertical"]) ||
		     isset($_GET["technology"]) ||
			 isset($_GET["programme"]) ||
			 isset($_GET["partner"])
			) {
				// Some parameters set
				$parameters_set = true;
			} else {
				// No parameters set
				$parameters_set = false;
			};
		// / Empty Form or Page Just Loaded

		// Build tags arrays.
		if ( $parameters_set == true ) {
			if ( isset($_GET["vertical"]) ) {
				$industries = $_GET["vertical"];
			}
			if ( isset($_GET["technology"]) ) {
				$technologies = $_GET["technology"];
			}
			if ( isset($_GET["programme"]) ) {
				$programmes = $_GET["programme"];
			}
			if ( isset($_GET["partner"]) ) {
				$partners = $_GET["partner"];
			}
		}
		// / Build tags arrays.
		?>

		<!-- Search Form -->
		<div class="row">
			<form id="tags-select" class="font1 tags-select" action="<?php the_permalink(); ?>" method="get">
				<div class="row">
					<div class="col-md-3">
						<select class="font1 myselect2-select tags-vertical form-control" multiple="multiple" name="vertical[]">
							<?php jd_get_search_tags('vertical'); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="myselect2-select tags-technology form-control" multiple="multiple" name="technology[]">
							<?php jd_get_search_tags('technology'); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="myselect2-select tags-programme form-control" multiple="multiple" name="programme[]">
							<?php jd_get_search_tags('programme'); ?>
						</select>
					</div>
					<div class="col-md-3">
						<select class="myselect2-select tags-partner form-control" multiple="multiple" name="partner[]">
							<?php jd_get_search_tags('partner'); ?>
						</select>
					</div>
				</div>
				<?php $casestudies_button_text = get_field('casestudies_button_text', false, false); ?>
				<div class="row">
					<div class="col-md-12">
						<input class="mybutton" type="submit" value="<?php echo $casestudies_button_text; ?>">
					</div>
				</div>
			</form>
		</div>
		<!-- / Search Form -->

		<?php
		if ( $parameters_set == true ) {
			if ( isset($_GET["vertical"]) ) {
	 			$industries = $_GET["vertical"];
			} else {
				$terms = get_terms( array(
					'taxonomy' => 'vertical',
					'hide_empty' => false,
				) );
				$count = 0;
				foreach ( $terms as $term ) {
					$industries[$count] = $term->name;
					$count = $count + 1;
				}
			}
			if ( isset($_GET["technology"]) ) {
	 			$technologies = $_GET["technology"];
	 		} else {
				$terms = get_terms( array(
					'taxonomy' => 'technology',
					'hide_empty' => false,
				) );
				$count = 0;
				foreach ( $terms as $term ) {
					$technologies[$count] = $term->name;
					$count = $count + 1;
				}
			}
			if ( isset($_GET["programme"]) ) {
				$programmes = $_GET["programme"];
			} else {
				$terms = get_terms( array(
					'taxonomy' => 'programme',
					'hide_empty' => false,
				) );
				$count = 0;
				foreach ( $terms as $term ) {
					$programmes[$count] = $term->name;
					$count = $count + 1;
				}
			}
			if ( isset($_GET["partner"]) ) {
				$partners = $_GET["partner"];
			} else {
				$partners = false;
			}

			if ( ! $partners == false ) {

				$args = array(
		 			'post_type' => 'casestudy',
		 			'tax_query' => array(
		 				'relation' => 'AND',
			 				array(
			 					'taxonomy' => 'vertical',
			 					'field'    => 'slug',
			 					'terms'    => $industries,
			 					'operator' => 'IN',
			 				),
							array(
			 					'taxonomy' => 'technology',
			 					'field'    => 'slug',
			 					'terms'    => $technologies,
			 					'operator' => 'IN',
			 				),
							array(
								'taxonomy' => 'programme',
								'field'    => 'slug',
								'terms'    => $programmes,
								'operator' => 'IN',
							),
							array(
								'taxonomy' => 'partner',
								'field'    => 'slug',
								'terms'    => $partners,
								'operator' => 'IN',
							),
		 			),
		 		);
			} else {
				$args = array(
		 			'post_type' => 'casestudy',
		 			'tax_query' => array(
		 				'relation' => 'AND',
			 				array(
			 					'taxonomy' => 'vertical',
			 					'field'    => 'slug',
			 					'terms'    => $industries,
			 					'operator' => 'IN',
			 				),
							array(
			 					'taxonomy' => 'technology',
			 					'field'    => 'slug',
			 					'terms'    => $technologies,
			 					'operator' => 'IN',
			 				),
							array(
								'taxonomy' => 'programme',
								'field'    => 'slug',
								'terms'    => $programmes,
								'operator' => 'IN',
							),
		 			),
		 		);
			}
			} else {
				$args = array(
				   'post_type' => 'casestudy',
				   'tax_query' => array(
					   'relation' => 'AND',
						   array(
							   'taxonomy' => 'category',
							   'field'    => 'slug',
							   'terms'    => 'highlight',
						   ),
				   ),
			   );
		   } ?>

	    <!-- Returned Case Study Tiles -->
		<div class="returned row">
			<!-- The Loop -->
			<?php $query = new WP_Query( $args );
			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
				$casestudy_title = get_field('casestudy_title');
				$casestudy_summary = get_field('casestudy_summary');
				$casestudy_tags = get_field('casestudy_tags');
				$casestudy_image = get_field('casestudy_image') ?>
				<div class="tile font1 col-sm-3">
					<a href="<?php the_permalink() ?>" class="thumbnail">
						<img src="<?php echo $casestudy_image; ?>" class="img-responsive img-circle"/>
						<div class="caption">
							<h2><?php echo $casestudy_title; ?></h2>
							<p><?php echo $casestudy_summary; ?></p>
							<p><?php echo $casestudy_tags; ?></p>
						</div>
					</a>
				</div>
			<?php endwhile;
			wp_reset_postdata();
			else :
				$casestudy_noposts_text = get_field('noposts_text');
				jd_show_noposts_message($casestudy_noposts_text);
			endif; ?>
			<!-- / The Loop -->
		</div>
		<!-- / Returned Case Study Tiles -->

	</div>
</div>
<?php endwhile; endif; ?>
<?php get_template_parts( array( 'footer') ); ?>
