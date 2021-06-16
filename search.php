<?php
/**
 * The template for displaying search results pages
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
<?php if ( get_header_image() && ! is_single() && ! is_page() ) : ?>
	<div class="header-image" style="background-image: url('<?php header_image(); ?>');"></div>
<?php endif; // End header image check. ?>

<div class="wrapper">

	<section class="content-area">

		<?php
		if ( have_posts() ) :
		?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: %s: the search query */
						printf( esc_html__( 'Search Results for: %s', 'res-lemma' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			res_lemma_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</section><!-- .content-area -->

<?php
get_footer();
