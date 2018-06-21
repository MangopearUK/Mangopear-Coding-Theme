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


	/**
	 * Output page title
	 *
	 * @see /themes/mangopear/functions/source/mangopear/mangopear.output.page-title.php
	 */
	
	mangopear_output_page_title($show_title = true, $show_breadcrumb = false, $title_content = 'All useful links');
	
?>


	<main id="main">
		<?php if (have_posts()) : ?>
			<section class="c-resources-row  c-resources-row--links">
				<div class="o-container">
					<header class="c-resources-row__header">
						<h2 class="c-resources-row__title">Useful links</h2>
					</header>


					<div class="c-resources__links  o-posts  o-posts--title-only">
						<ul class="o-flex  o-posts__list">
							<?php while (have_posts()) : the_post(); ?>
								<li class="o-flex__item  c-useful-link">
									<article class="o-posts__item  c-useful-link__wrap  has-overlay-link">
										<div class="o-post">
											<h3 class="o-post__title"><a href="<?php the_field('url'); ?>" target="_blank" class="o-post__title-link"><?php the_title(); ?></a></h3>
											<span class="o-post__from"><?php the_field('website_name'); ?></span>
											<?php if (get_field('read_time')) : ?><span class="o-post__read-time"><span class="u-hide">You can read this post in </span><?php the_field('read_time'); ?></span><?php endif; ?>
											<a href="<?php the_field('url'); ?>" target="_blank" class="o-post__overlay-link" title="<?php the_title(); ?>"></a>
										</div>
									</article>
								</li>
							<?php endwhile; ?>
						</ul>


						<?php get_template_part('template-partials/pagination'); ?>
					</div><!-- /.c-resources__links -->
				</div><!-- /.o-container -->
			</section>
		<?php endif; ?>





		<section class="c-resources-row  c-resources-row--collections">
			<div class="o-container">
				<header class="c-resources-row__header">
					<h2 class="c-resources-row__title">Collections</h2>
				</header>


				<nav class="o-nav  o-nav--row  o-nav--collections">
					<h3 class="o-nav__title"><span class="o-nav__title-overflow">Development:</span></h3>
					<ul class="o-nav__list">
						<li class="o-nav__item"><a href="/resource/collections/css/" class="o-nav__link"><span class="o-nav__text"><abbr title="Cascading stylesheets">CSS</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/css/" class="o-nav__link"><span class="o-nav__text"><abbr title="Object orientated cascading stylesheets">OOCSS</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/bem/" class="o-nav__link"><span class="o-nav__text"><abbr title="Block element modifier">BEM</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/bemit/" class="o-nav__link"><span class="o-nav__text"><abbr title="Block element modifier inverted triangle">BEMIT</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/html5/" class="o-nav__link"><span class="o-nav__text"><abbr title="Hypertext markup language version 5">HTML5</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/js/" class="o-nav__link"><span class="o-nav__text"><abbr title="Javascript">JS</abbr></span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/js-components/" class="o-nav__link"><span class="o-nav__text"><abbr title="Javascript">JS</abbr> components</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/woocommerce/" class="o-nav__link"><span class="o-nav__text">WooCommerce</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/wordpress/" class="o-nav__link"><span class="o-nav__text">WordPress</span></a></li>
					</ul>
				</nav>


				<nav class="o-nav  o-nav--row  o-nav--collections">
					<h3 class="o-nav__title"><span class="o-nav__title-overflow">Best practices:</span></h3>
					<ul class="o-nav__list">
						<li class="o-nav__item"><a href="/resource/collections/accessibility/" class="o-nav__link"><span class="o-nav__text">Accessibility</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/performance/" class="o-nav__link"><span class="o-nav__text">Performance</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/responsive/" class="o-nav__link"><span class="o-nav__text">Responsive</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/standard-conventions/" class="o-nav__link"><span class="o-nav__text">Standards</span></a></li>
					</ul>
				</nav>


				<nav class="o-nav  o-nav--row  o-nav--collections">
					<h3 class="o-nav__title"><span class="o-nav__title-overflow">Content strategy:</span></h3>
					<ul class="o-nav__list">
						<li class="o-nav__item"><a href="/resource/collections/content/" class="o-nav__link"><span class="o-nav__text">Content strategy</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/testing/" class="o-nav__link"><span class="o-nav__text">Testing</span></a></li>
						<li class="o-nav__item"><a href="/resource/collections/user-experience/" class="o-nav__link"><span class="o-nav__text">User experience</span></a></li>
					</ul>
				</nav>
			</div><!-- /.o-container -->
		</section>
	</main><!-- /.o-panel -->





<?php get_footer(); ?>