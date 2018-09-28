<?php 

get_header(); 
pageBanner(array(
  'title' => 'Past Events',
  'subtitle' => 'A recap of our past events.'
));

?>

  <div class="container container--narrow page-section">

	<?php
		$today = date('Ymd');
		$pastEvents = new WP_Query(array(
			'paged' => get_query_var('paged', 1), // get paged url, if there is none then its the initial page, so the 1 is a fallback
			'post_type' => 'event',
			'meta_key' => 'event_date',
			'order_by' => 'meta_value_num', // post_date ; title ; rand
			'order' => 'ASC',
			'meta_query' => array( // Only show posts that the 'event_date' is greater or equal to Today
				array(
				'key' => 'event_date',
				'compare' => '<',
				'value' => $today,
				'type' => 'numeric' // The type of the values we are comparing
				)
			)
		));

	  while($pastEvents->have_posts()) {
			$pastEvents->the_post();
			get_template_part('template-parts/content', 'event');
		}
		
		echo paginate_links(array(
			'total' => $pastEvents->max_num_pages
		));
	?>

  </div>

 <?php get_footer(); ?>