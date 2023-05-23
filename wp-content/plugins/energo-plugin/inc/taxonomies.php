<?php namespace ENERGOPLUGIN\Inc;
use ENERGOPLUGIN\Inc\Abstracts\Taxonomy;

class Taxonomies extends Taxonomy {

	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'energo' ),
			'singular_name'     => _x( 'Project Category', 'energo' ),
			'search_items'      => __( 'Search Category', 'energo' ),
			'all_items'         => __( 'All Categories', 'energo' ),
			'parent_item'       => __( 'Parent Category', 'energo' ),
			'parent_item_colon' => __( 'Parent Category:', 'energo' ),
			'edit_item'         => __( 'Edit Category', 'energo' ),
			'update_item'       => __( 'Update Category', 'energo' ),
			'add_new_item'      => __( 'Add New Category', 'energo' ),
			'new_item_name'     => __( 'New Category Name', 'energo' ),
			'menu_name'         => __( 'Project Category', 'energo' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);
		register_taxonomy( 'project_cat', 'project', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'energo' ),
			'singular_name'     => _x( 'Testimonials Category', 'energo' ),
			'search_items'      => __( 'Search Category', 'energo' ),
			'all_items'         => __( 'All Categories', 'energo' ),
			'parent_item'       => __( 'Parent Category', 'energo' ),
			'parent_item_colon' => __( 'Parent Category:', 'energo' ),
			'edit_item'         => __( 'Edit Category', 'energo' ),
			'update_item'       => __( 'Update Category', 'energo' ),
			'add_new_item'      => __( 'Add New Category', 'energo' ),
			'new_item_name'     => __( 'New Category Name', 'energo' ),
			'menu_name'         => __( 'Testimonials Category', 'energo' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);
		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'energo' ),
			'singular_name'     => _x( 'Team Category', 'energo' ),
			'search_items'      => __( 'Search Category', 'energo' ),
			'all_items'         => __( 'All Categories', 'energo' ),
			'parent_item'       => __( 'Parent Category', 'energo' ),
			'parent_item_colon' => __( 'Parent Category:', 'energo' ),
			'edit_item'         => __( 'Edit Category', 'energo' ),
			'update_item'       => __( 'Update Category', 'energo' ),
			'add_new_item'      => __( 'Add New Category', 'energo' ),
			'new_item_name'     => __( 'New Category Name', 'energo' ),
			'menu_name'         => __( 'Team Category', 'energo' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);
		register_taxonomy( 'team_cat', 'team', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'energo' ),
			'singular_name'     => _x( 'Service Category', 'energo' ),
			'search_items'      => __( 'Search Category', 'energo' ),
			'all_items'         => __( 'All Categories', 'energo' ),
			'parent_item'       => __( 'Parent Category', 'energo' ),
			'parent_item_colon' => __( 'Parent Category:', 'energo' ),
			'edit_item'         => __( 'Edit Category', 'energo' ),
			'update_item'       => __( 'Update Category', 'energo' ),
			'add_new_item'      => __( 'Add New Category', 'energo' ),
			'new_item_name'     => __( 'New Category Name', 'energo' ),
			'menu_name'         => __( 'Service Category', 'energo' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);
		register_taxonomy( 'service_cat', 'service', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'energo' ),
			'singular_name'     => _x( 'Faq Category', 'energo' ),
			'search_items'      => __( 'Search Category', 'energo' ),
			'all_items'         => __( 'All Categories', 'energo' ),
			'parent_item'       => __( 'Parent Category', 'energo' ),
			'parent_item_colon' => __( 'Parent Category:', 'energo' ),
			'edit_item'         => __( 'Edit Category', 'energo' ),
			'update_item'       => __( 'Update Category', 'energo' ),
			'add_new_item'      => __( 'Add New Category', 'energo' ),
			'new_item_name'     => __( 'New Category Name', 'energo' ),
			'menu_name'         => __( 'Faq Category', 'energo' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);
		register_taxonomy( 'faqs_cat', 'faqs', $args );
	}
	
}
