<?php
/**
 * Template part for displaying the primary navigation menu.
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<nav id="site-navigation" class="main-menu">
	<div class="wrapper">
		<button class="menu-toggle" aria-controls="site-menu" aria-expanded="false">
			<?php esc_html_e( 'Site Navigation', 'res-lemma' ); ?>
		</button>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'site-menu',
			)
		);
		?>
	</div><!-- .wrapper -->
</nav><!-- .menu-1 -->
