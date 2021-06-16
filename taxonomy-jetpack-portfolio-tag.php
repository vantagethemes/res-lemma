<?php
/**
 * The template for displaying the Project Tag taxonomy archive page.
 *
 * @package executive
 */

get_header(); ?>

<?php if ( get_header_image() && ! is_single() && ! is_page() ) : ?>
	<div class="header-image" style="background-image: url('<?php header_image(); ?>');"></div>
<?php endif; // End header image check. ?>

<div class="wrapper">

	<div class="content-area">

		<?php
			if ( have_posts() ) {
				get_template_part( 'template-parts/content', 'portfolio-archive' );
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
		?>

	</div><!-- .content-area -->

</div><!-- .wrapper -->

<?php
get_footer();
