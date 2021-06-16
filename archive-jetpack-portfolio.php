<?php
/**
 * The template for displaying the Portfolio archive page.
 *
 * @package executive
 */

get_header(); ?>

<?php if ( get_header_image() ) : ?>
	<div class="header-image" style="background-image: url('<?php header_image(); ?>');"></div>
<?php endif; // End header image check. ?>

<div class="wrapper">

	<div class="content-area">

		<?php
			if ( have_posts() ) {
				get_template_part( 'content', 'portfolio-archive' );
			} else {
				get_template_part( 'content', 'none' );
			}
		?>

	</div><!-- .content-area -->

</div><!-- .wrapper -->

<?php
get_footer();
