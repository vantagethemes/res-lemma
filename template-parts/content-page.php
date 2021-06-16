<?php
/**
 * Template part for displaying page content in page.php
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
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
