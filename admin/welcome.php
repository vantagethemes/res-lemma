<?php
/**
 * Res Lemma Welcome Page.
 *
 * @package res-lemma
 */

/**
 * Create the Res Lemma welcome page.
 */
class res_lemma_Theme_Welcome {

	/**
	 * Start up
	 */
	public function __construct() {
			add_action( 'admin_menu', array( $this, 'add_theme_page' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	/**
	 * Add options page
	 */
	public function add_theme_page() {
			// This page will be under "Settings".
			add_theme_page(
				'Res Lemma Theme Help',
				'Res Lemma Help',
				'manage_options',
				'res-lemma-theme',
				array( $this, 'create_admin_page' )
			);
	}

	/**
	 * Add options page
	 */
	public function enqueue() {
		wp_enqueue_style( 'res-lemma-theme-welcome', get_template_directory_uri() . '/admin/style.css', false, '1.0.0' );
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {


		?>
			<div class="eb-wrap">
				<div class="eb-sidebar">
					<div class="eb-sidebar__header">
						<h2><?php esc_html_e( 'Res Lemma Pro Edition', 'res-lemma' ); ?></h2>
					</div>
					<div class="eb-sidebar__inner">
						<div class="eb-sidebar__plugin">
							<p><?php esc_html_e( 'Res Lemma Pro Edition includes multiple custom page templates, portfolio support, and WooCommerce support.', 'res-lemma' ); ?></p>
							<?php
								echo '<a class="eb-button" href="https://Vantage Themes.net/premium-themes/res-lemma">' . esc_html__( 'Purchase Pro Edition Today', 'res-lemma' ) . '</a>';
							?>
						</div>
					</div>
				</div>
				<div class="eb-content">
					<div class="eb-content__header">
						<h1><?php esc_html_e( 'Res Lemma Theme Help', 'res-lemma' ); ?></h1>
					</div>
					<div class="eb-content__inner">
						<h3><?php esc_html_e( 'Thank you!', 'res-lemma' ); ?></h3>

						<p><?php esc_html_e( 'Thank you for installing the Res Lemma theme. We\'ve created this page to help you get up and running as quickly as possible.', 'res-lemma' ); ?></p>

						<h3><?php esc_html_e( 'What is the Res Lemma Theme?', 'res-lemma' ); ?></h3>

						<p><?php esc_html_e( 'The Res Lemma companion theme is optimised to display Res Lemma in the best way possible. Many themes have a narrow page width that doesn\'t work well with wide blocks such as the Pricing Table block.', 'res-lemma' ); ?></p>

						<p><?php esc_html_e( 'Both the Res Lemma plugin and theme work well independently, but together they are even better.', 'res-lemma' ); ?></p>

						<h3><?php esc_html_e( 'How to use Res Lemma', 'res-lemma' ); ?></h3>

						<p><?php esc_html_e( 'Once you have Gutenberg and the Res Lemma plugin active, creating pages using blocks is simple.', 'res-lemma' ); ?></p>

						<p><?php esc_html_e( 'There are two ways to insert Gutenberg blocks:', 'res-lemma' ); ?></p>

						<p><?php esc_html_e( 'The first way is to click the + sign and then choose a block from the popup that appears. Res Lemma has it\'s own category in the popup so you can easily find them.', 'res-lemma' ); ?></p>


						<p class="eb-tip"><?php esc_html_e( 'Quick Tip: Purchase Res Lemma Pro today and get lifetime theme support and updates.', 'res-lemma' ); ?></p>
					</div>
				</div>

					<div class="eb-block eb-block-last eb-block-odd eb-block-empty">

					</div>
			</div>
			<?php
	}
}

$res_lemma_theme_welcome = new res_lemma_Theme_Welcome();
