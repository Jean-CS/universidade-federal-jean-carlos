<?php get_header();

	while ( have_posts() ) {
		the_post(); 
		pageBanner();
		?>

		<div class="container container--narrow page-section">

			<div class="generic-content">
				<div class="row-group" style="overflow: auto;">
					<div class="one-third">
						<?php the_post_thumbnail('professorPortrait'); ?>
					</div>
					<div class="two-thirds">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
			
				$relatedPrograms = get_field( 'related_programs' ); // Advanced Custom Fields plugin function

				if ( $relatedPrograms ) { ?>
					<hr class="section-break">
					<h2 class="headline headline--medium">Subject(s) Taught</h2>
					<ul class="link-list min-list">
					<?php
						foreach ( $relatedPrograms as $related_program ) { ?>
							<li>
								<a href="<?php echo get_the_permalink( $related_program ); ?>"><?php echo get_the_title($related_program); ?></a>
							</li>
							<?php
						} ?>
					</ul>
					<?php
				} ?>

		</div>

		<?php
	 } ?>

<?php get_footer(); ?>