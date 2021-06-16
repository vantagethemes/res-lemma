<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package res_lemma
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'hero' ); ?>

<?php endwhile; ?>

<?php rewind_posts(); ?>

<div class="wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="entry-content">
					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'res-lemma' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .page-content -->

			<?php endwhile; // end of the loop. ?>

			<div class="portfolio-wrap">

				<?php
					if ( get_query_var( 'paged' ) ) :
						$paged = get_query_var( 'paged' );
					elseif ( get_query_var( 'page' ) ) :
						$paged = get_query_var( 'page' );
					else :
						$paged = 1;
					endif;

					$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '9' );

					$args = array(
						'post_type'      => 'jetpack-portfolio',
						'paged'          => $paged,
						'posts_per_page' => $posts_per_page,
					);

					$project_query = new WP_Query ( $args );

					if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

						while ( $project_query -> have_posts() ) : $project_query -> the_post();

							get_template_part( 'template-parts/content', 'portfolio' );

						endwhile;

						res_lemma_paging_nav( $project_query->max_num_pages );

						wp_reset_postdata();

					else :
				?>

					<section class="no-results not-found">
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'No Project Found', 'res-lemma' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'res_lemma' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

							<?php else : ?>

								<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'res_lemma' ); ?></p>

							<?php endif; ?>
						</div><!-- .page-content -->
					</section><!-- .no-results -->

				<?php endif; ?>

			</div><!-- .portfolio-wrap -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();
