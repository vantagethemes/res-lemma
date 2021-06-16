<?php
/**
 * Template part for displaying the logo and site title.
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<div class="site-branding">

	<?php res_lemma_the_custom_logo(); ?>

	<h1 class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</h1>

</div><!-- .site-branding -->
