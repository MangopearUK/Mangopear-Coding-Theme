<?php
	
	/**
	 * Default template: Post detail template (single.php)
	 */
	
	get_header();

?>





	<main class="o-panel">
		<div class="o-container">
			<div class="o-container  o-container--align-left  o-container--optimise-readability">
				<h1 style="margin: 2em 0 1em;">
					<?php the_title(); ?>
				</h1>


				<img style="margin: 1em 0 2em;" 
				     alt="<?php the_title(); ?>" 
				     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
				     data-src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">


				<?php
			
					/**
					 * Default WordPress Loop call
					 */
					
					if (have_posts()) : 
						while (have_posts()) : the_post(); 

							the_content();

						endwhile;

					else :
						echo '<h2>Oh shucks, it looks like there isn\'t any content to be found here!</h2>';

					endif;

				?>
			</div><!-- /.o-container -->
		</div><!-- /.o-container -->
	</main><!-- /.o-panel -->





	<?php comments_template(); ?>





<?php

	/**
	 * Get the footer code
	 */	
	get_footer();

?>











<?php
	
	/**
	 * Get the header code
	 */
	get_header();

?>