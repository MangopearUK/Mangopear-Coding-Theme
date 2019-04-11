<?php

	/**
	 * Core template: [Archive] Resources
	 *
	 * @category 	Additional WordPress template files
	 * @package  	mangopear
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2015 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	3.0.0
	 * @link 		https://mangopear.co.uk/
	 * @since   	2.0.0
	 */
	

	get_header();
	
?>


	<main id="main">
		<header class="c-title  c-title--short">
			<div class="o-container">
				<h1 class="c-title__title">
					<span class="h6  c-title__sub-title">Collection</span><span class="u-hide"> - </span>
					<strong>Useful resources</strong>
				</h1>
			</div><!-- /.o-container -->
		</header>





		<?php get_template_part('template-partials/footer-additions'); ?>





		<?php if (have_posts()) : ?>
			<section class="u-clearfix  c-collection  c-collection--resources">
				<div class="o-container">
					<header class="c-collection__header">
						<h2 class="c-collection__title">All useful resources</h2>
					</header>


					<div class="c-collection__posts">
						<div class="o-grid  o-grid--narrow">
							<?php while (have_posts()) : the_post(); ?>
								<div class="o-grid__item  u-one-third  u-lap--one-half  u-palm--one-whole">
									<?php get_template_part('template-partials/useful-resource-article'); ?>
								</div><!-- /.o-grid__item -->
							<?php endwhile; ?>
						</div><!-- /.o-grid -->
					</div><!-- /.c-collection__posts -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>