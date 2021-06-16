<?php
/**
 * The template used for displaying Portfolio Archive view
 *
 * @package res_lemma
 */
?>

<header class="page-header">
	<?php res_lemma_title( '<h1 class="page-title">', '</h1>' ); ?>

	<?php res_lemma_thumbnail( '<div class="portfolio-featured-image">', '</div>' ); ?>

	<?php res_lemma_content( '<div class="taxonomy-description">', '</div>' ); ?>
</header><!-- .page-header -->

<div class="portfolio-wrapper">
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

	<?php endwhile; ?>
</div><!-- .portfolio-wrapper -->

<?php res_lemma_paging_nav( $post->max_num_pages ); ?>