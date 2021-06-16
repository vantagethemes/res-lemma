<?php
/**
 * The template for displaying WooCommerce pages.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility
 *
 * @package     res-lemma
 * @copyright   Copyright (c) 2021, Vantage Themes
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
<?php if ( get_header_image() && ! is_single() && ! is_page() ) : ?>
    <div class="header-image" style="background-image: url('<?php header_image(); ?>');"></div>
<?php endif; // End header image check. ?>

<div class="wrapper">

	<div class="content-area">

		<?php woocommerce_content(); ?>

	</div><!-- .content-area -->

<?php
get_footer();
