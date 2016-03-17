<?php
/**
 * require different files - to increase readabiity
 * Comment the Function the you don't need
 */
require_once locate_template('/functions/zero_setup.php');        //Enable support for Post Thumbnails
require_once locate_template('/functions/head_cleanup.php');      //head cleanup (remove rsd, uri links, junk css, ect)
require_once locate_template('/functions/more_cleanup.php');      //more cleanup (remove rsd, uri links, junk css, ect)
require_once locate_template('/functions/enqueue_css.php');       //CSS
require_once locate_template('/functions/enqueue_scripts.php');   //JS
require_once locate_template('/functions/helpers.php');           //Helpers Functions

require_once locate_template('/functions/admin_menu_custom.php');   //Clean Up Dashboard

if ( ! class_exists( 'Kirki' ) ) {
	return false;
} else {
	Kirki::add_config( 'befive', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
		) );
	Kirki::add_panel( 'test_panel', array(
		'priority'    => 1,
		'title'       => __( 'Test Customizer Live Preview Option Value', 'befive' ),
		'description' => __( 'TM Customizer Test Menu', 'befive' ),
		) );
	Kirki::add_section( 'test_section', array(
		'title'       => __( 'Test Section', 'befive' ),
		'priority'    => 10,
		'panel'       => 'test_panel',
		'description' => __( 'One or Two. See test output in the front page.' ),
		) );
	Kirki::add_field( 'befive', array(
	'type'         => 'select',
	'settings'     => 'befive_test',
	'label'        => __( 'Try to change the value', 'befive' ),
	'section'      => 'test_section',
	'default'     => 'one',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'one' => esc_attr__( 'Choice One', 'befive' ),
		'two' => esc_attr__( 'Choice Two', 'befive' ),
		),
	) );
}

//
new BeFive_LivePreview_ThemeOption_Test();
BeFive_LivePreview_ThemeOption_Test::be_test_functions();
class BeFive_LivePreview_ThemeOption_Test {
	/**
	 * vars
	 */
	public static $test_after_setup_theme;
	public static $test_functions;
	public static $test_init;
	public static $test_wp_loaded;
	public static $template_include;
	public static $test_wp_head;

	/**
	 * Magic method
	 */
	public function __construct() {
		add_action( 'after_setup_theme', ['BeFive_LivePreview_ThemeOption_Test', 'be_test_after_setup_theme'] );
		add_action( 'init', ['BeFive_LivePreview_ThemeOption_Test', 'be_test_init'] );
		add_action( 'wp_loaded', ['BeFive_LivePreview_ThemeOption_Test', 'be_test_wp_loaded'] );
		add_filter( 'template_include',['BeFive_LivePreview_ThemeOption_Test', 'be_test_template_include'], 99 );
		add_action( 'wp_head', ['BeFive_LivePreview_ThemeOption_Test', 'be_test_wp_head'] );
	}
	/**
	 * hooks functions
	 */
	public static function be_test_after_setup_theme () {
		self::$test_after_setup_theme = get_theme_mod('befive_test', FALSE);
	}
	public static function be_test_functions () {
		self::$test_functions = get_theme_mod('befive_test', FALSE);
	}
	public static function be_test_init () {
		self::$test_init = get_theme_mod('befive_test', FALSE);
	}
	public static function be_test_wp_loaded () {
		self::$test_wp_loaded = get_theme_mod('befive_test', FALSE);
	}
	public static function be_test_template_include ($template) {
		self::$template_include = get_theme_mod('befive_test', FALSE);
		return $template;
	}
	public static function be_test_wp_head() {
		self::$test_wp_head = get_theme_mod('befive_test', FALSE);
	}
}

