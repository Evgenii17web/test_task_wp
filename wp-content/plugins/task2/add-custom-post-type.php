<?php
/*
Plugin Name: Custom post type Projects
Description: Plugin adds custom post type Projects
Version: 1.0
Author: Evgen
*/

add_action( 'init', 'register_post_type_projects' );

/**
 * Create post type Projects
 *
 * @return void
 */
function register_post_type_projects() {

	$labels = [
		'name'               => 'Projects',
		'singular_name'      => 'Project',
		'add_new'            => 'Add Projects',
		'add_new_item'       => 'Add Project',
		'edit_item'          => 'Edit Project',
		'new_item'           => 'New Project',
		'view_item'          => 'Check Project',
		'all_items'          => 'All Projects',
		'search_items'       => 'Search Projects',
		'not_found'          => 'There are no Projects',
		'not_found_in_trash' => 'Trash doesnt have Projects',
		'menu_name'          => 'Projects'
	];

	$args = [
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'has_archive'        => true,
		'rewrite'            => [ 'slug' => 'projects' ],
		'menu_icon'          => 'dashicons-portfolio',
		'menu_position'      => 2,
		'supports'           => [ 'title', 'excerpt', 'author', 'category', 'thumbnail', 'comments' ]
	];

	register_post_type( 'projects', $args );
}

function add_projects_single_body( $classes ) {
	if ( is_singular( 'projects' ) ) {
		$classes[] = 'projects-single';
	}

	return $classes;
}

add_filter( 'body_class', 'add_projects_single_body' );