<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'res_lemma_paging_nav' ) ) :
/**
 * Display navigation to next/previous projects in Portfolio page template.
 *
 * @return void
 */
function res_lemma_paging_nav( $max_num_pages = '' ) {
	// Get max_num_pages if not provided
	if ( '' == $max_num_pages ) {
		$max_num_pages = $GLOBALS['wp_query']->max_num_pages;
	}
	// Don't print empty markup if there's only one page.
	if ( $max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'res-lemma' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link( '', $max_num_pages ) ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Previous', 'res-lemma' ), $max_num_pages ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link( '', $max_num_pages ) ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Next', 'res-lemma' ), $max_num_pages ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function res_lemma_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( is_singular() && ! comments_open() ) {
		$classes[] = 'comments-closed';
	}

	if ( absint( get_post_meta( get_the_ID(), 'res_lemma_hide_entry_header', true ) ) ) {
		$classes[] = 'hide-entry-header';
	}

	if ( function_exists( 'gutenberg_init' ) ) {
		$classes[] = 'gutenberg-active';
	}

	if ( is_page_template( 'template-parts/portfolio-page.php' ) ) {
		$classes[] = 'portfolio';
	}

	return $classes;
}
add_filter( 'body_class', 'res_lemma_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function res_lemma_pingback_header() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}

}
add_action( 'wp_head', 'res_lemma_pingback_header' );

/**
 * Replaces the excerpt "Read More" text by a link.
 */
function new_excerpt_more() {
	global $post;
	return '&hellip; <p><a class="moretag" href="' . get_permalink( $post->ID ) . '">' . esc_html__( 'Read the full article', 'res-lemma' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/**
 * Footer credit
 */
function res_lemma_footer_text() {
	printf( esc_html__( '%1$s by %2$s', 'res-lemma' ), 'Powered', '<a href="https://wordpress.org/">WordPress</a>' ); ?>

	<span class="sep">&middot;</span>

	<?php
	printf(
		esc_html__( '%1$s by %2$s', 'res-lemma' ),
		'Res Lemma',
		'<a href="' . esc_url( 'https://vantagethemes.com' ) . '">Vantage Themes</a>'
	);
}
