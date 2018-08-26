<?php

	/**
	 * Core template name: [Taxonomy] Collections
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
	 * Set up taxonomy name
	 */
	
	$term = $wp_query->get_queried_object();
	$title = 'Collection: ' . $term->name;


	/**
	 * Output page title
	 *
	 * @see /themes/mangopear/functions/source/mangopear/mangopear.output.page-title.php
	 */
	
	mangopear_output_page_title($show_title = true, $show_breadcrumb = true, $title_content = $title);
	
?>


	<main id="main">
		<?php

			$full_articles = array(
				'post_type'			=> 'resources',
				'posts_per_page'	=> -1,
				'tax_query'			=> 	array(
											array(
												'taxonomy' => 'resource__types',
												'field'    => 'slug',
												'terms'    => 'documented',
											),
											array(
												'taxonomy' => 'resource__tags',
												'field'    => 'slug',
												'terms'    => $term->slug,
											),
										),
			);


			$resource__full_articles = new WP_Query($full_articles);
			if ($resource__full_articles->have_posts()) :
				$full_articles_count = 0; ?>

				<section class="c-resources-row  c-resources-row--articles">
					<div class="o-container">
						<header class="c-resources-row__header">
							<h2 class="c-resources-row__title">Our latest articles</h2>
						</header>


						<div class="o-posts  o-posts--title-only">
							<ul class="o-posts__list  o-grid">
								<?php 
									
									while ($resource__full_articles->have_posts()) :
										$resource__full_articles->the_post();
										$full_articles_count++;
										$full_articles_class = 	($full_articles_count == 1) ? 'o-post__item--first  u-one-half  u-lap--one-half  u-palm--one-whole ' : 'u-one-quarter  u-lap--one-half  u-palm--one-whole';
										$post_classes = 		($full_articles_count == 1) ? 'o-post--large' : 'o-post--medium';
										$featured_image = 		($full_articles_count == 1) ? get_the_post_thumbnail_url(get_the_ID(), 'featured--large') : get_the_post_thumbnail_url(get_the_ID(), 'featured--medium');
								
								?>
									
									<li class="o-grid__item  o-posts__item  has-overlay-link  <?php echo $full_articles_class; ?>  u-portable--one-whole">
										<article class="o-post  <?php echo $post_classes; ?>">
											<header class="o-post__header">
												<div class="c-post__image">
													<img class="c-portfolio__image-el" 
													     alt="<?php the_title(); ?>" 
													     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
													     data-src="<?php echo $featured_image; ?>">


													<noscript><img class="c-portfolio__image-el" alt="<?php the_title(); ?>" src="<?php echo $featured_image; ?>"></noscript>
												</div><!-- /.c-portfolio__image -->

												<h3 class="o-post__title"><a href="<?php the_permalink(); ?>" class="o-post__title-link"><?php the_title(); ?></a></h3>
											</header>
											

											<div class="o-post__excerpt"><?php the_excerpt(); ?></div>
											<span class="o-post__from"><?php the_field('website_name'); ?></span>
											

											<?php if (get_field('read_time')) : ?>
												<span class="o-post__read-time"><span class="u-hide">You can read this post in </span><?php the_field('read_time'); ?></span>
											<?php endif; ?>
											

											<a href="<?php the_permalink(); ?>" class="o-post__overlay-link" title="<?php the_title(); ?>"></a>
										</article>
									</li>
								<?php endwhile; ?>
							</ul>


							<a href="/resource/type/documented/" class="o-button  o-button--secondary" style="margin-top: 40px;">
								<span class="o-button__text">Read all articles</span>
								<svg class="o-button__icon--right  o-icon--chevron--right" viewBox="0 0 16 16" width="14" height="14">
									<path fill="currentColor" d="M.156 0l.125.125 7.906 7.875-8 8h5.625l6.594-6.594 1.438-1.406-1.438-1.406-6.563-6.594h-5.688z"></path>
								</svg>
							</a>
						</div><!-- /.c-resources__links -->


						<?php get_template_part('template-partials/pagination'); ?>
					</div><!-- /.o-container -->
				</section>
			<?php endif; ?>
		<?php wp_reset_query(); ?>





		<?php

			$links_args = array(
				'post_type'			=> 'resources',
				'posts_per_page'	=> -1,
				'tax_query'			=> 	array(
											array(
												'taxonomy' => 'resource__types',
												'field'    => 'term_id',
												'terms'    => 5,
											),
											array(
												'taxonomy' => 'resource__tags',
												'field'    => 'slug',
												'terms'    => $term->slug,
											),
										 ),
			);


			$resource__links = new WP_Query($links_args);
			if ($resource__links->have_posts()) : ?>

				<section class="c-resources-row  c-resources-row--links">
					<div class="o-container">
						<header class="c-resources-row__header">
							<h2 class="c-resources-row__title">Useful links</h2>
						</header>


						<div class="c-resources__links  o-posts  o-posts--title-only">
							<ul class="o-flex  o-posts__list">
								<?php while ($resource__links->have_posts()) : $resource__links->the_post(); ?>
									<li class="o-flex__item  c-useful-link" <?php if (get_field('colour')) { echo 'style="color: ' . get_field('colour') . '"'; } ?>>
										<article class="o-posts__item  c-useful-link__wrap  has-overlay-link">
											<div class="o-post">
												<?php if (get_the_post_thumbnail_url(get_the_ID(), 'featured--medium')) : ?>
													<img class="o-post__image" 
														     alt="<?php the_title(); ?>" 
														     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
														     data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured--medium'); ?>">
												<?php endif; ?>


												<h3 class="o-post__title">
													<a href="<?php the_field('url'); ?>" target="_blank" class="o-post__title-link">
														<?php the_title(); ?>
													</a>
												</h3>


												<div class="o-post__excerpt">
													<?php the_excerpt(); ?>
												</div><!-- /.o-post__excerpt -->


												<div class="o-post__foot">
													<?php if (get_field('website_name')) : ?><span class="o-post__from"><?php the_field('website_name'); ?></span><?php endif; ?>
													<?php if (get_field('read_time'))    : ?><span class="o-post__read-time"><span class="u-hide">You can read this post in </span><?php the_field('read_time'); ?></span><?php endif; ?>
												</div><!-- /.o-post__foot -->
											</div>
										</article>
									</li>
								<?php endwhile; ?>
							</ul>


							<a href="/resource/type/links/" class="o-button  o-button--secondary" style="margin-top: 40px;">
								<span class="o-button__text">See all useful links</span>
								<svg class="o-button__icon--right  o-icon--chevron--right" viewBox="0 0 16 16" width="14" height="14">
									<path fill="currentColor" d="M.156 0l.125.125 7.906 7.875-8 8h5.625l6.594-6.594 1.438-1.406-1.438-1.406-6.563-6.594h-5.688z"></path>
								</svg>
							</a>
						</div><!-- /.c-resources__links -->
					</div><!-- /.o-container -->
				</section>
			<?php endif; ?>
		<?php wp_reset_query(); ?>





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