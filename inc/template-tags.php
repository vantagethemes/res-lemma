<?php
/**
 * Custom template tags for this theme
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'res_lemma_the_custom_logo' ) ) :
	/**
	 * Output the custom logo if it exists.
	 */
	function res_lemma_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		}

	}
endif;

if ( ! function_exists( 'res_lemma_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function res_lemma_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: link to date archives */
			esc_html_x( '%s', 'post date', 'res-lemma' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'res_lemma_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function res_lemma_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			echo '<footer class="entry-footer">';

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'res-lemma' ) );

			if ( $categories_list ) {
				/* translators: %s: list of categories */
				printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'res-lemma' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'res-lemma' ) );
			if ( $tags_list ) {

				/* translators: %s: tags list */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'res-lemma' ) . '</span>', $tags_list ); // WPCS: XSS OK.

			}

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">' . esc_html__( 'Discussion: ', 'res-lemma' );
				comments_popup_link( esc_html__( 'Leave a comment', 'res-lemma' ), esc_html__( '1 Comment', 'res-lemma' ), esc_html_x( '% Comments', 'number of comments', 'res-lemma' ), 'comments-link' );
				echo '</span>';
			}

			echo '</footer><!-- .entry-footer -->';

		}

	}
endif;

if ( ! function_exists( 'res_lemma_the_post_navigation' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function res_lemma_the_post_navigation() {
		if ( ! is_single() ) {
			return;
		}
		$args = array(
			'prev_text' => __( 'Previous Post: <span>%title</span>', 'res-lemma' ),
			'next_text' => __( 'Next Post: <span>%title</span>', 'res-lemma' ),
		);

		the_post_navigation( $args );
	}
endif;


if ( ! function_exists( 'res_lemma_the_posts_navigation' ) ) :
	/**
	 * Displays the navigation to next/previous set of posts, when applicable.
	 */
	function res_lemma_the_posts_navigation() {
		$args = array(
			'prev_text'          => esc_html__( '&larr; Older Posts', 'res-lemma' ),
			'next_text'          => esc_html__( 'Newer Posts &rarr;', 'res-lemma' ),
			'screen_reader_text' => esc_html__( 'Posts Navigation', 'res-lemma' ),
		);

		the_posts_navigation( $args );
	}
endif;

if ( ! function_exists( 'res_lemma_thumbnail' ) ) :
	/**
	 * Output the thumbnail if it exists.
	 *
	 * @param string $size Thunbnail size to output.
	 */
	function res_lemma_thumbnail( $size = '' ) {

		if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">

				<?php if ( ! is_single() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( null, $size ); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail( null, $size ); ?>
				<?php endif; ?>

			</div><!-- .post-thumbnail -->
			<?php
		}

	}
endif;
