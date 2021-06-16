<?php
/**
 * Template part for displaying the entry headers.
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

$hide = get_post_meta( get_the_ID(), 'res_lemma_hide_entry_header', true );

if ( is_singular() && intval( $hide ) ) {
	return;
}

?>

<header class="entry-header">

	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;

	if ( 'post' === get_post_type() ) :
		?>

		<div class="entry-meta">
			<?php res_lemma_posted_on(); ?>
		</div><!-- .entry-meta -->

	<?php endif; ?>

</header><!-- .entry-header -->
