<?php get_header();

	while ( have_posts() ) :
		the_post(); 
		pageBanner();
		
		?>

		<div class="container container--narrow page-section">
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program' ); ?>">
						<i class="fa fa-home" aria-hidden="true"></i> All Programs
					</a>
					<span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
				</p>
			</div>
			<div class="generic-content"><?php the_content(); ?></div>

			<?php
				$relatedProfessors = new WP_Query( array(
					'posts_per_page' => -1,
					'post_type'      => 'professor',
					'order_by'       => 'title',
					'order'          => 'ASC',
					'meta_query'     => array(
						array( // Gets professors related programs
							'key'     => 'related_programs',
							'compare' => 'LIKE',
							'value'   => '"' . get_the_ID() . '"',
						),
					),
				) );
			?>
			<?php if ( $relatedProfessors->have_posts() ) : ?>
					<hr class="section-break">
					<h2 class="headline headline--medium"><?php get_the_title(); ?> Professors</h2>
					
					<ul class="professor-cards">
						<?php while ( $relatedProfessors->have_posts() ) :
								$relatedProfessors->the_post(); ?>

								<li class="professor-card__list-item">
									<a class="professor-card" href="<?php the_permalink(); ?>">
										<img src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="" class="professor-card__image">
										<span class="professor-card__name"><?php the_title(); ?></span>
									</a>
								</li>

						<?php endwhile; ?> 
					</ul>

			<?php endif; ?>

			<?php
				// resets the context of the global object to the default url object
				wp_reset_postdata();

				$today         = date( 'Ymd' );
				$relatedEvents = new WP_Query( array(
					'posts_per_page' => 2,
					'post_type'      => 'event',
					'meta_key'       => 'event_date',
					'order_by'       => 'meta_value_num', // post_date ; title ; rand
					'order'          => 'ASC',
					'meta_query'     => array(
						array( // Only show posts that the 'event_date' is greater or equal to Today
							'key'     => 'event_date',
							'compare' => '>=',
							'value'   => $today,
							'type'    => 'numeric' // The type of the values we are comparing
						),
						array( // Gets events related programs
							'key'     => 'related_programs',
							'compare' => 'LIKE',
							'value'   => '"' . get_the_ID() . '"',
						),
					),
				) );
			?>
			<?php 
			if ( $relatedEvents->have_posts() ) { 
			?>
				<hr class="section-break">
				<h2 class="headline headline--medium">Upcoming <?php get_the_title(); ?> Events</h2>

				<?php 
				while ( $relatedEvents->have_posts() ) {
					$relatedEvents->the_post();
					get_template_part('template-parts/content', 'event');
				}
			}?>
		</div>

	<?php endwhile; ?>

<?php get_footer(); ?>