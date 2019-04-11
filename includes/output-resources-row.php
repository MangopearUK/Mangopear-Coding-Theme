<?php

	/**
	 * [Function] Output useful articles row component
	 *
	 * @category 	Core WordPress template files
	 * @package  	coding
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2019 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	2.0.0
	 * @since   	2.0.0
	 */
	

	/**
	 * Contents
	 *
	 * [1]	Define function
	 * [2]	Default arguments
	 * [3]	Setup WP_Query
	 * [4]	Get term obj
	 * [5]	Perform WP_Query
	 */
	

	/**
	 * [1]	Define function
	 *
	 * @since 2.0.0
	 */
	
	if (! function_exists("coding_output_resources_row")) :
		function coding_output_resources_row($args = array()) {

			/**
			 * [2]	Default arguments
			 *
			 * @since 2.0.0
			 */
			
			$defaults = array(
				'term_id'		=> false,
				'number_posts'	=> 3,
			);


			$args = wp_parse_args($args, $defaults);





			/**
			 * [3]	Setup WP_Query
			 *
			 * @since 2.0.0
			 */

			$links_args = array(
				'post_type'			=> 'resources',
				'posts_per_page'	=> $args['number_posts'],
				'tax_query'			=> 	array(
											array(
												'taxonomy' => 'resource__types',
												'field'    => 'term_id',
												'terms'    => 5,
											),
											array(
												'taxonomy' => 'resource__tags',
												'field'    => 'term_id',
												'terms'    => $args['term_id'],
											),
										 ),
			);





			/**
			 * [4]	Get term obj
			 *
			 * @since 2.0.0
			 */
			
			$term_obj = get_term_by('id', $args['term_id'], 'resource__tags');





			/**
			 * [5]	Perform WP_Query
			 */

			$links_posts = new WP_Query($links_args);
			if ($links_posts->have_posts()) : ?>





				<section class="u-clearfix  c-collection  c-collection--resources">
					<div class="o-container">
						<header class="c-collection__header">
							<h2 class="c-collection__title"><a href="<?php echo get_term_link($term_obj, 'resource__tags'); ?>"><?php echo $term_obj->name; ?> resources&nbsp;&raquo;</a></h2>
						</header>


						<div class="c-collection__posts">
							<div class="o-grid  o-grid--narrow">
								<?php while ($links_posts->have_posts()) : $links_posts->the_post(); ?>
									<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
										<?php get_template_part('template-partials/useful-resource-article'); ?>
									</div><!-- /.o-grid__item -->
								<?php endwhile; ?>
							</div><!-- /.o-grid -->
						</div><!-- /.c-collection__posts -->
					</div><!-- /.o-container -->
				</section>





<?php

	/**
	 * Closing up
	 *
	 * @since 2.0.0
	 *
	 * [a]	End post loop
	 * [b]	Close function
	 * [c]	End function_exists()
	 */

			endif;					// [a]
		}							// [b]
	endif;							// [c]

?>