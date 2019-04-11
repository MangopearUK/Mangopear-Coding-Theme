<?php

	/**
	 * [Partial] Useful resources article
	 *
	 * @category 	Core WordPress template files
	 * @package  	coding
	 * @author  	Andi North <andi@mangopear.co.uk>
	 * @copyright  	2019 Mangopear creative
	 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
	 * @version  	2.0.0
	 * @since   	2.0.0
	 */
	
?>

	<article class="c-resource">
		<header class="c-resource__header">
			<h3 class="c-resource__title"><a href="<?php the_field('url'); ?>" target="_blank"><?php the_title(); ?>&nbsp;&raquo;</a></h3>
		</header>


		<div class="c-resource__content">
			<?php the_excerpt(); ?>

			<?php if (get_field('website_name')) : ?><p>From <strong><?php the_field('website_name'); ?></strong>.</p><?php endif; ?>
		</div>


		<div class="c-resource__action">
			<a href="<?php the_field('url'); ?>" class="o-button  o-button--secondary  c-resource__link" target="_blank">
				<span class="o-button__text">Read more</span>
				<svg class="o-button__icon  o-button__icon--right" height="22" width="22" role="presentation"><use xlink:href="<?php echo MANGOPEAR_SPRITE; ?>#arrow--right"/></svg>
			</a>
		</div>
	</article>