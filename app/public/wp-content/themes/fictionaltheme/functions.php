<?php 

function university_files() {
    university_scripts();
    university_styles();
}

function university_scripts() {
    // arg1: name
    // arg2: path
    // arg3: has any dependency?
    // arg4: version number -> set to current time for Caching purposes
    // arg5: load right before closing </body> tag?
    wp_enqueue_script('main-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
}

function university_styles() {
    // arg1: arbitrary name
    // arg2: path
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    // arg1: name for the stylesheet
    // arg2: wp function
    // arg3: has any dependecy?
    // arg4: version number -> set to current time for Caching purposes
    wp_enqueue_style('university_main_styles', get_stylesheet_uri(), NULL, microtime());
}

function university_features() {
    add_theme_support('title-tag');
}

/* wp function
 1st argument: what type of instruction for wp
 2nd argument: your function */
add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');

?>