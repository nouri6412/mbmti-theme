<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__('صفحه', 'twentytwentyone') . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__('صفحه %', 'twentytwentyone'),
			)
		);

		$tags = wp_get_post_tags(get_the_ID());
		if ($tags) {
			echo '<p><strong>مطالبت مرتبط</strong></p><div>';
			$tags1 = [];
			foreach ($tags as $tag) {

				$first_tag = $tag->term_id;
				$args = array(
					'tag__in' => array($first_tag),
					'post__not_in' => array(get_the_ID()),
					'posts_per_page' => 10,
					'caller_get_posts' => 1
				);
				$my_query = new WP_Query($args);
				if ($my_query->have_posts()) {
					while ($my_query->have_posts()) : $my_query->the_post();

						if (isset($tags1['tag-' . get_the_ID()])) {
							continue;
						}

						$tags1['tag-' . get_the_ID()] = get_the_ID();
		?>
						<a class="related-post-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

		<?php
					endwhile;
				}
				wp_reset_query();
			}
			echo '</div>';
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if (!is_singular('attachment')) : ?>
		<?php get_template_part('template-parts/post/author-bio'); ?>
	<?php endif; ?>

</article><!-- #post-${ID} -->