<?php
 
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

define('ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/');
 
final class rfpp_elementor_setup {

    const VERSION = '1.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';
 
    private static $_instance = null;
 
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
 
    public function __construct() {
        add_action( 'init', [ $this, 'init' ] );
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
       
        // Scroll Animations Control
        $this->scroll_animation_controls();

        // Add Category actions
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
 
        // Add Icons
        add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'add_icons' ] );

        // Add Plugin actions
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        // Add Widget Scripts
        add_action('elementor/frontend/after_register_scripts', [ $this, 'elementor_frontend_scripts' ]);

    }

    public function add_icons( $tabs = array() ) {

        $tabs['themify'] = array(
            'name'          => 'themify',
            'label'         => esc_html__( 'Themify Icons', 'reframe-plugin' ),
            'labelIcon'     => 'themify',
            'prefix'        => 'ti-',
            'displayPrefix' => 'tixx',
            'url'           =>  plugin_dir_url( __FILE__ ) . 'assets/icons/themify/themify.css',
            'fetchJson'     =>  plugin_dir_url( __FILE__ ) . 'assets/icons/themify/themify.json',
            'ver'           => '1.0',
        );

        $tabs['etline'] = array(
            'name'          => 'etline',
            'label'         => esc_html__( 'ET-Line Icons', 'reframe-plugin' ),
            'labelIcon'     => 'etline',
            'prefix'        => '',
            'displayPrefix' => '',
            'url'           =>  plugin_dir_url( __FILE__ ) . 'assets/icons/etline/etline.css',
            'fetchJson'     =>  plugin_dir_url( __FILE__ ) . 'assets/icons/etline/etline.json',
            'ver'           => '1.0',
        );

        return $tabs;
    }
     
    public function i18n() {
        load_plugin_textdomain( 'reframe-plugin' );
    }
     
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'artisansweb-elementor-add-on' ),
            '<strong>' . esc_html__( 'Elementor', 'artisansweb-elementor-add-on' ) . '</strong>'
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
     
    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'artisansweb-elementor-add-on' ),
            '<strong>' . esc_html__( 'Elementor', 'artisansweb-elementor-add-on' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
     
    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'artisansweb-elementor-add-on' ),
            '<strong>' . esc_html__( 'PHP 7.0', 'artisansweb-elementor-add-on' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }


    public function elementor_frontend_scripts() {
		wp_enqueue_script( 'rfpp-plugin-frontend-widgets-scripts',  plugin_dir_url( __FILE__ ) . 'assets/js/front-end-widgets.js', array('jquery'), false, true);
	}

    public function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'reframe',
            [
                'title' => __( 'Reframe', 'reframe-plugin' ),
                'icon' => 'fa fa-plug',
            ]
        );
    
    }

    public function scroll_animation_controls() {

        // Add custom widget controls
        require_once( __DIR__ . '/controls/scroll-animations.php' );
        
    }
     
    public function init_widgets() {

        require_once( __DIR__ . '/controls/scroll-animations.php' );
 
        // Include widget files
        require_once( __DIR__ . '/widgets/seperator.php' );
        require_once( __DIR__ . '/widgets/tagline.php' );
        require_once( __DIR__ . '/widgets/card-grid.php' );
        require_once( __DIR__ . '/widgets/accordion.php' );
        require_once( __DIR__ . '/widgets/timeline.php' );
        require_once( __DIR__ . '/widgets/progress-bar.php' );
        require_once( __DIR__ . '/widgets/testimonial-carousel.php' );
        require_once( __DIR__ . '/widgets/pricing.php' );
        require_once( __DIR__ . '/widgets/pricing-extended.php' );
        require_once( __DIR__ . '/widgets/portfolio.php' );
        require_once( __DIR__ . '/widgets/contact-form.php' );
        require_once( __DIR__ . '/widgets/icon-list.php' );
        require_once( __DIR__ . '/widgets/pills.php' );
        require_once( __DIR__ . '/widgets/button.php' );
        require_once( __DIR__ . '/widgets/card.php' );
        require_once( __DIR__ . '/widgets/card-cta.php' );
        require_once( __DIR__ . '/widgets/carousel.php' );
        require_once( __DIR__ . '/widgets/tabs.php' );
        require_once( __DIR__ . '/widgets/video.php' );
        require_once( __DIR__ . '/widgets/audio.php' );
        require_once( __DIR__ . '/widgets/one-page-menu.php' );
        require_once( __DIR__ . '/widgets/scroll-indicator.php' );
        require_once( __DIR__ . '/widgets/image-grid.php' );
 
        // Register widgets
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_seperator() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_tagline() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_card_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_accordion() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_timeline() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_progress_bar() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_testimonial_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_pricing() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_pricing_extended() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_portfolio() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_contact_form() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_icon_list() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_pills() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_button() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_card() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_card_cta() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_tabs() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_video() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_audio() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_one_page_menu() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_scroll_indicator() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \rfpp_widget_image_grid() );
       
    }
    
}
rfpp_elementor_setup::instance();

