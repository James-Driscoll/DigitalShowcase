<?php

error_reporting(E_ALL); //Turn on Error reporting

/* Starkers Items*/
require_once( 'external/starkers-utilities.php' );
add_filter( 'body_class', 'add_slug_to_body_class' );

/* --------------------------------------------------
Location Rewriting based on the URL, including templating!
-----------------------------------------------------*/

// REWRITE RULES
add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
add_filter('query_vars','wp_insertMyRewriteQueryVars');
add_filter('init','flushRules');

// Remember to flush_rules() when adding rules
function flushRules(){
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

// Adding a new rule
function wp_insertMyRewriteRules($rules){
  $newrules = array();
  //If the URL matches any of the locations, do an internal re-write.
  //$locations = require("locations.php");
  //$newrules['(.?.+?)(/[0-9]+)?/('.$locations.')'] = 'index.php?pagename=$matches[1]&page=$matches[2]&placename=$matches[3]';
  return $newrules + $rules;
}

// Adding the id var so that WP recognizes it
function wp_insertMyRewriteQueryVars($vars){
  array_push($vars, 'placename');
  return $vars;
}

//Modify buffer here, and then return the updated code
function location_callback($buffer) {
  //{##around #location# and surrounding areas##|## or this ##}
  $location = get_query_var("placename");

  //Replace any instances of #location# with the actual location (based on the URL)
  $location = str_replace("-"," ",$location);
  $location = ucwords($location);

  //We have a location! lets remove the stuff we don't want (from the | onwards)
  $buffer = str_replace('$location',$location,$buffer);
  if (strlen($location)){
    $buffer = preg_replace("/\|(.*?)}%/","%",$buffer);
  } else {
    $buffer = preg_replace("/%{(.*?)}\|/","%",$buffer);
  }
    $buffer = str_replace(array("%{","}%"),"",$buffer);
  return $buffer;
}

function buffer_start() { ob_start("location_callback"); }
function buffer_end() { ob_end_flush(); }

add_action('wp', 'buffer_start');
add_action('wp_footer', 'buffer_end');

/* -------------------------------------------------------
  Post Thumbnails
------------------------------------------------------- */
add_theme_support( 'post-thumbnails' );

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'jdtl_video'

        )
    );
}

/* --------------------------------------------------
 * Register Custom Menus
  -------------------------------------------------- */
register_nav_menus(
  array(
    'page_navigation' => "Page Navigation Menu",
  )
);

/* -------------------------------------------------------
    Register Custom Post Type
------------------------------------------------------- */
add_action('init', 'register_casestudy');
function register_casestudy() {
  register_post_type( 'casestudy',
    array('labels' => array(
      'name' => __('Case Studies', 'post type general name'), /* The Title of the Group */
      'singular_name' => __('Case Study', 'post type singular name'), /* The individual type */
      'add_new' => __('Add New Case Study', 'custom post type item'), /* The add new menu item */
      'add_new_item' => __('Add New Case Study'), /* Add New Display Title */
      'edit' => __( 'Edit' ), /* Edit Dialog */
      'edit_item' => __('Edit Case Study'), /* Edit Display Title */
      'new_item' => __('New Case Study'), /* New Display Title */
      'view_item' => __('View Case Studies'), /* View Display Title */
      'search_items' => __('Search Case Studies'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'This is the Case Study custom post type.' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'taxonomies' => array('category')
    ) /* end of options */
  ); /* end of register post type */
}

/* -------------------------------------------------------
    Register Custom Taxonomies
------------------------------------------------------- */
// Vertical
add_action( 'init', 'create_vertical_nonhierarchical_taxonomy', 0 );
function create_vertical_nonhierarchical_taxonomy() {
    $labels = array(
        'name' => _x( 'Vertical', 'taxonomy general name' ),
        'singular_name' => _x( 'Verticals', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Verticals' ),
        'popular_items' => __( 'Popular Verticals' ),
        'all_items' => __( 'All Verticals' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Vertical' ),
        'update_item' => __( 'Update Vertical' ),
        'add_new_item' => __( 'Add New Vertical' ),
        'new_item_name' => __( 'New Vertical Name' ),
        'separate_items_with_commas' => __( 'Separate Verticals with commas' ),
        'add_or_remove_items' => __( 'Add or remove Verticals' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Verticals' ),
    );
    register_taxonomy('vertical','casestudy',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'vertical' ),
    ));
}


// Technology
add_action( 'init', 'create_technology_nonhierarchical_taxonomy', 0 );
function create_technology_nonhierarchical_taxonomy() {
    $labels = array(
        'name' => _x( 'Technology', 'taxonomy general name' ),
        'singular_name' => _x( 'Technologies', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Technologies' ),
        'popular_items' => __( 'Popular Technologies' ),
        'all_items' => __( 'All Technologies' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Technology' ),
        'update_item' => __( 'Update Technology' ),
        'add_new_item' => __( 'Add New Technology' ),
        'new_item_name' => __( 'New Technology Name' ),
        'separate_items_with_commas' => __( 'Separate Technologies with commas' ),
        'add_or_remove_items' => __( 'Add or remove Technologies' ),
        'choose_from_most_used' => __( 'Choose from the most used Technologies' ),
        'menu_name' => __( 'Technologies' ),
    );
    register_taxonomy('technology','casestudy',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'technology' ),
    ));
}
// Programme
add_action( 'init', 'create_programme_nonhierarchical_taxonomy', 0 );
function create_programme_nonhierarchical_taxonomy() {
    $labels = array(
        'name' => _x( 'Programme', 'taxonomy general name' ),
        'singular_name' => _x( 'Programmes', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Programmes' ),
        'popular_items' => __( 'Popular Programmes' ),
        'all_items' => __( 'All Programmes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Programme' ),
        'update_item' => __( 'Update Programme' ),
        'add_new_item' => __( 'Add New Programme' ),
        'new_item_name' => __( 'New Programme Name' ),
        'separate_items_with_commas' => __( 'Separate Programmes with commas' ),
        'add_or_remove_items' => __( 'Add or remove Programmes' ),
        'choose_from_most_used' => __( 'Choose from the most used Programmes' ),
        'menu_name' => __( 'Programmes' ),
    );
    register_taxonomy('programme','casestudy',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'programme' ),
    ));
}
// Partner
add_action( 'init', 'create_partner_nonhierarchical_taxonomy', 0 );
function create_partner_nonhierarchical_taxonomy() {
    $labels = array(
        'name' => _x( 'Partner', 'taxonomy general name' ),
        'singular_name' => _x( 'Partners', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Partners' ),
        'popular_items' => __( 'Popular Partners' ),
        'all_items' => __( 'All Partners' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Partner' ),
        'update_item' => __( 'Update Partner' ),
        'add_new_item' => __( 'Add New Partner' ),
        'new_item_name' => __( 'New Partner Name' ),
        'separate_items_with_commas' => __( 'Separate Partners with commas' ),
        'add_or_remove_items' => __( 'Add or remove Partners' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Partners' ),
    );
    register_taxonomy('partner','casestudy',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'partner' ),
    ));
}

// JD : Show 'No Posts' message.
function jd_show_noposts_message( $casestudy_noposts_text ) {
    echo '<p class="font1 text-center">' . $casestudy_noposts_text . '</p>';
}

// JD : Build Case Study Reference.
function jd_build_reference( $casestudy_verticals, $casestudy_programmes, $casestudy_details_molly_activity_id, $casestudy_details_effort, $casestudy_details_duration, $casestudy_details_teams ) {
    $reference = '';
    // Verticals
    if ( $casestudy_verticals ) {
        foreach($casestudy_verticals as $vertical) {
            $reference = $reference . $vertical->name;
        }
        $reference = $reference . '_';
    }
    // Programmes
    if ( $casestudy_programmes ) {
        foreach($casestudy_programmes as $programme ) {
            $reference = $reference . $programme->name;
        }
        $reference = $reference . '_';
    }
    // Activity ID
    if ( $casestudy_details_molly_activity_id ) {
        $reference = $reference . 'ID' . $casestudy_details_molly_activity_id . '_';
    }
    // Effort
    if ( $casestudy_details_effort ) {
        $reference = $reference . $casestudy_details_effort . 'h_';
    }
    // Duration
    if ( $casestudy_details_duration ) {
        $reference = $reference . $casestudy_details_duration . 'w_';
    }
    // Teams
    if ( $casestudy_details_teams ) {
        foreach($casestudy_details_teams as $team) {
            $reference = $reference . $team;
        }
        $reference = $reference;
    }
        echo $reference;
}

// JD : Return tags in the form of form <option>s
function jd_get_search_tags( $taxonomy ) {
    $terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ) );
	if ( $terms ) {
		foreach ( $terms as $term ) {
			printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
		}
	}
}


/* -------------------------------------------------------
    Make the site private
------------------------------------------------------- */
function is_local(){
  $whitelist = array('127.0.0.1');
  return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if (isset($_GET["importer"])) {
  require "importer.php";
}
