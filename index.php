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
						<h2 class="c-collection__title">Recent articles</h2>
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
		 * Get latest articles
		 */

		$links_args = array(
			'post_type'			=> 'resources',
			'posts_per_page'	=> 9,
			'tax_query'			=> 	array(
										array(
											'taxonomy' => 'resource__types',
											'field'    => 'term_id',
											'terms'    => 5,
										),
									 ),
		);


		$links_posts = new WP_Query($links_args);
		if ($links_posts->have_posts()) : ?>


			<section class="c-collection  c-collection--resources">
				<div class="o-container">
					<header class="c-collection__header">
						<h2 class="c-collection__title">Useful resources</h2>
					</header>


					<div class="c-collection__posts">
						<div class="o-grid  o-grid--narrow">
							<?php while ($links_posts->have_posts()) : $links_posts->the_post(); ?>
								<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
									<article class="c-resource">
										<header class="c-resource__header">
											<h3 class="c-resource__title"><a href="<?php the_field('url'); ?>" target="_blank"><?php the_title(); ?>&nbsp;&raquo;</a></h3>
										</header>


										<div class="c-resource__content">
											<?php the_excerpt(); ?>
										</div>


										<div class="c-resource__action">
											<a href="<?php the_field('url'); ?>" class="o-button  o-button--secondary  c-resource__link" target="_blank">
												<span class="o-button__text">Read more</span>
												<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
											</a>
										</div>
									</article>
								</div><!-- /.o-grid__item -->
							<?php endwhile; ?>
						</div><!-- /.o-grid -->
					</div><!-- /.c-collection__posts -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->


<?php get_footer(); ?>