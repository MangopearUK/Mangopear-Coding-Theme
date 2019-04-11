<?php

	/**
	 * Default template: Home page
	 *
	 * @category 	Templates
	 * @package  	coding
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2019 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	2.0.0
	 * @since   	1.0.0
	 */


	/**
	 * CHANGELOG
	 *
	 * @version 1.0.0
	 *          Init
	 *
	 * @version 2.0.0
	 *          Rebuild of template to support mangopear-core
	 *          Complete redesign of template
	 */


	/**
	 * Get website header
	 *
	 * @since 2.0.0 [<description>]
	 */

	get_header();

?>


	<main class="o-main" id="main">
		<header class="c-title  c-title--short">
			<div class="o-container">
				<h1 class="c-title__title">Welcome to Coding. <br>A blog from Mangopear creative.</h1>
			</div><!-- /.o-container -->
		</header>





		<?php

		/**
		 * Get latest articles
		 */

		$recent_args = array(
			'post_type'			=> 'resources',
			'posts_per_page'	=> 4,
			'tax_query'			=> 	array(
										array(
											'taxonomy' => 'resource__types',
											'field'    => 'slug',
											'terms'    => 'documented',
										),
									),
		);


		$recent_articles = new WP_Query($recent_args);
		if ($recent_articles->have_posts()) : ?>


			<section class="c-collection  c-collection--articles">
				<div class="o-container">
					<header class="c-collection__header">
						<h2 class="c-collection__title"><a href="/resource/type/documented/">Recent articles&nbsp;&raquo;</a></h2>
					</header>


					<div class="c-collection__posts">
						<div class="o-grid">
							<?php while ($recent_articles->have_posts()) : $recent_articles->the_post(); ?>
								<div class="o-grid__item  u-one-half  u-palm--one-whole">
									<?php get_template_part('template-partials/article-listing-item'); ?>
								</div><!-- /.o-grid__item -->
							<?php endwhile; ?>
						</div><!-- /.o-grid -->
					</div><!-- /.c-collection__posts -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>





		<?php

			/**
			 * Output useful resources rows
			 *
			 * @since 2.0.0
			 *
			 * [a]	Accessibility resources
			 */
			
			coding_output_resources_row(array('term_id' => 31));		// [a]

		?>
	</main><!-- /.o-panel -->


<?php get_footer(); ?>