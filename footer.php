<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

		</div><!-- .wrapper -->
	</div><!-- .site-content -->

	<?php get_sidebar(); ?>

	<footer class="site-footer">
		<div class="wrapper">
			<div class="copyright">
				<div class="site-info">
					<?php res_lemma_footer_text(); ?>
				</div>
			</div>
		</div><!-- .wrapper -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</div><!-- .site-wrapper -->

</body>
</html>
