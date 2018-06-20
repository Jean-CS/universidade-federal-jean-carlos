<?php 

function university_post_types() {
    register_post_type('events', array(
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
}

// Adds all the post_types, defined in the function, to /wp-admin
add_action('init', 'university_post_types');

?>

