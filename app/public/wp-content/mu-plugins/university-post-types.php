<?php 

function university_post_types() {
    register_post_type('events', array(
        'public' => true, // Makes post_type public to viewers/admins of the site
        'labels' => array(
            'name' => 'Events' // Changes the label on the wp-admin
        ),
        'menu_icon' => 'dashicons-calendar' //WordPress Dashicons
    ));
}

// Adds all the post_types, defined in the function, to /wp-admin
add_action('init', 'university_post_types');

?>

