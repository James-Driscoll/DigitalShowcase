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

<div class="col-md-10 col-md-offset-1 top">
	<div class="container">
	<?php $query = new WP_Query( array('post_type' => 'casestudy', 'posts_per_page' => 100 ) ); ?>

	<div class="row">
		<h1>Our Case Studies</h1>
	</div>

	<div class="row">
		<div class"col-md-3">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Industry
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu_industry">
					<li class="dropdown-header">Select an Industry</li>
					<?php print_bs_customtaxonomies( 'industry' ); ?>
				</ul>
			</div>
		</div>
		<div class"col-md-3">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Programme
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu_programme">
					<li class="dropdown-header">Select a Programme</li>
					<?php print_bs_customtaxonomies( 'programme' ); ?>
				</ul>
			</div>
		</div>
		<div class"col-md-3">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Technology
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu_technology">
					<li class="dropdown-header">Select a Technology</li>
					<?php print_bs_customtaxonomies( 'technology' ); ?>
				</ul>
			</div>
		</div>
		<div class"col-md-3">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Partner
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu_partner">
					<li class="dropdown-header">Select a Partner </li>
					<?php print_bs_customtaxonomies( 'partner' ); ?>
				</ul>
			</div>
		</div>
	</div>

	<!-- EXAMPLE -->
	<div class="all-technology">
	<?php
	// If the taxonomy term has previously been selected from the dropdowm menu, grab it
	$term = isset( $_GET[ 'technology' ] ) ? sanitize_text_field( $_GET[ 'technology' ] ) : false;

	// In this section, set selected and taxonomy_query values before creating the taxonomy dropdown & getting WP_Query results
	$selected = '';
	$tax_query = '';

	if ( $term ) {
		// Get all posts with the selected taxonomy term
		$term = get_term_by( 'slug', $term, 'technology' );
		if ( ! empty( $term->name ) ) {
			// Set the 'selected' value that we'll use to show which option in the dropdown menu is the currently selected one
			$selected = $term->name;
			// Set the taxonomy to 'technology' and the term to the selected term. We'll use these to filter the posts, below
			$tax_query = array(
				array(
					'taxonomy' => 'technology',
					'terms'    => $term,
				),
			);
		}
	}
?>

<form id="casestudy-category-select" class="casestudy-category-select" action="<?php the_permalink(); ?>" method="get">
	<?php
		// Create and display the dropdown menu using 'technology' for the taxonomy, and the selected value we set above
		wp_dropdown_categories(
			array(
				'orderby'         => 'NAME',		// Order the items in the dropdown menu by their name
				'taxonomy'        => 'technology',		// Only include posts with the taxonomy of 'technology'
				'name'            => 'technology',		// This field is needed for submitting the form
				'value_field'     => 'slug',		// This field is needed for submitting the form
				'show_option_all' => 'All technology',	// Text the dropdown will display when none of the options have been selected
				'selected'        => $selected,		// Set which option in the dropdown menu is the currently selected one
				'hide_empty'	  => false,
		) );
	?>
	<input type="submit" name="submit" value="view" />
</form>

</div>

<section id="technology-listing">

<?php
	// Get all posts with a post type of 'casestudy', a taxonomy of 'technology', and the taxonomy term that was selected in the dropdown
	$tool_query = new WP_Query(
		array(
			'post_type'      => 'casestudy',
			'posts_per_page' => 1000,
			'tax_query'      => $tax_query,
		)
	);
?>

<!-- Loop through every post that matched our query -->
<?php if ( $tool_query->have_posts() ) : while ( $tool_query->have_posts() ) : $tool_query->the_post(); ?>

	<!-- Display each post's title and content - you can change this section to display whatever post content you want -->
	<article class="casestudy-entry">
		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>
	</article>

	<?php endwhile; endif; ?>

	</section>



	<?php //fjarrett_custom_taxonomy_dropdown( 'technology' ); ?>
	<?php //fjarrett_custom_taxonomy_dropdown_two( 'technology', 'date', 'DESC', '5', 'technology', 'Select All', 'Select None' ); ?>

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

<?php get_template_parts( array( 'footer') ); ?>
