<?php 

function university_post_types() {
	// Event Post Type
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'), // So the url "/events" works instead of '/event' 
        'has_archive' => true, //  Required for wp to display list of events
        'public' => true, // Makes post_type public to viewers/admins of the site
        'labels' => array(
            'name' => 'Events', // Changes the label on the wp-admin
            'add_new_item' => 'Add New Event', // Title header of page Add New
            'edit_item' => 'Edit Event', // Title header of page Edit
            'all_items' => 'All Events', // Label on the dropdown menu on the sidebar
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar' //WordPress Dashicons
    ));

    // Program Post Type
	register_post_type('program', array(
		'supports' => array('title', 'editor'),
		'rewrite' => array('slug' => 'programs'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Programs',
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'all_items' => 'All Programs',
			'singular_name' => 'Program'
		),
		'menu_icon' => 'dashicons-awards'
    ));
    
    // Professor Post Type
	register_post_type('professor', array(
		'supports' => array('title', 'editor'),
		'public' => true,
		'labels' => array(
			'name' => 'Professors',
			'add_new_item' => 'Add New Professor',
			'edit_item' => 'Edit Professor',
			'all_items' => 'All Professors',
			'singular_name' => 'Professor'
		),
		'menu_icon' => 'dashicons-welcome-learn-more'
	));
}

// Adds all the post_types, defined in the function, to /wp-admin
add_action('init', 'university_post_types');

?>

