<?php
/**
 * The template for displaying archive pages
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
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

	<div class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			res_lemma_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div><!-- .content-area -->

<?php
get_footer();
