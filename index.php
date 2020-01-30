<?php
/**
 * Plugin Name: Boighor Elementor Plugin
 * Description: Custom Elementor extension for Boighor Theme.
 * Plugin URI:  https://wpcamel.com/
 * Version:     1.0.0
 * Author:      Murad Hossain
 * Author URI:  https://wpcamel.com/
 * Text Domain: boighor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class boighor_Elementor_Extention {


	const VERSION = '1.0.0';

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	const MINIMUM_PHP_VERSION = '5.6';

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {

		load_plugin_textdomain( 'boighor' );

	}


	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
	}


	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'boighor' ),
			'<strong>' . esc_html__( 'boighor Elementor Extension', 'boighor' ) . '</strong>',
			'<strong>' . esc_html__( 'boighor', 'boighor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'boighor' ),
			'<strong>' . esc_html__( 'boighor Elementor Extension', 'boighor' ) . '</strong>',
			'<strong>' . esc_html__( 'boighor', 'boighor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'boighor' ),
			'<strong>' . esc_html__( 'boighor Elementor Extension', 'boighor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'boighor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/boighor-slider.php' );
		require_once( __DIR__ . '/widgets/boighor-best-sell-products.php' );
		require_once( __DIR__ . '/widgets/newsletter.php' );
		require_once( __DIR__ . '/widgets/boighor-allproducts.php' );
		require_once( __DIR__ . '/widgets/boighor-blog.php' );
		require_once( __DIR__ . '/widgets/best-seller.php' );
		require_once( __DIR__ . '/widgets/boighor-contact-page.php' );
		require_once( __DIR__ . '/widgets/boighor-about.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Main_Slider_section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \boighor_best_sell_product_section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newsletter_section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Allproducts_section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \boighor_blog_area() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \best_sell_section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \boighor_contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \boighor_about() );
	}

}

boighor_Elementor_Extention::instance();
