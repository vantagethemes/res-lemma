<?php
/**
 * Template part for displaying posts
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<article <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content( esc_html__( 'Continue reading &rarr;', 'res-lemma' ) );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'res-lemma' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php res_lemma_entry_footer(); ?>

</article><!-- #post-## -->
