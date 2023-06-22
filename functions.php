<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twenty_twenty_one_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('twentytwentyone', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'twentytwentyone'),
				'footer'  => __('Secondary menu', 'twentytwentyone'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$background_color = get_theme_mod('background_color', 'D1E4DD');
		if (127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
			add_theme_support('dark-editor-style');
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'twentytwentyone'),
					'shortName' => esc_html_x('XS', 'Font size', 'twentytwentyone'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'twentytwentyone'),
					'shortName' => esc_html_x('S', 'Font size', 'twentytwentyone'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'twentytwentyone'),
					'shortName' => esc_html_x('M', 'Font size', 'twentytwentyone'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'twentytwentyone'),
					'shortName' => esc_html_x('L', 'Font size', 'twentytwentyone'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'twentytwentyone'),
					'shortName' => esc_html_x('XL', 'Font size', 'twentytwentyone'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'twentytwentyone'),
					'shortName' => esc_html_x('XXL', 'Font size', 'twentytwentyone'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'twentytwentyone'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'twentytwentyone'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'twentytwentyone'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'twentytwentyone'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'twentytwentyone'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'twentytwentyone'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'twentytwentyone'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'twentytwentyone'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'twentytwentyone'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'twentytwentyone'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'twentytwentyone'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'twentytwentyone'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if (is_customize_preview()) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support('starter-content', twenty_twenty_one_get_starter_content());
		}

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');
	}
}
add_action('after_setup_theme', 'twenty_twenty_one_setup');

/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'twentytwentyone'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 1.0.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('twenty_twenty_one_content_width', 750);
}
add_action('after_setup_theme', 'twenty_twenty_one_content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twenty_twenty_one_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	}

	// RTL styles.
	wp_style_add_data('twenty-twenty-one-style', 'rtl', 'replace');

	// Print styles.
	wp_enqueue_style('twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	// Main navigation scripts.
	if (has_nav_menu('primary')) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array('twenty-twenty-one-ie11-polyfills'),
			wp_get_theme()->get('Version'),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array('twenty-twenty-one-ie11-polyfills'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts');

/**
 * Enqueue block editor script.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script()
{

	wp_enqueue_script('twentytwentyone-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'twentytwentyone_block_editor_script');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix()
{

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}), !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix');

/** Enqueue non-latin language styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages()
{
	$custom_css = twenty_twenty_one_get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('twenty-twenty-one-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init()
{
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri('/assets/js/customize-preview.js'),
		array('customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_preview_init', 'twentytwentyone_customize_preview_init');

/**
 * Enqueue scripts for the customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts()
{

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts');

/**
 * Calculate classes for the main <html> element.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes()
{
	$classes = apply_filters('twentytwentyone_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class()
{
?>
	<script>
		if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
			document.body.classList.add('is-IE');
		}
	</script>
	<?php
}
add_action('wp_footer', 'twentytwentyone_add_ie_class');

function time_ago_date($the_date)
{

	return human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . 'پیش';
}
add_filter('get_the_date', 'time_ago_date', 10, 1);

function time_ago_comment_date($the_date)
{

	return human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ' . 'پیش';
}
add_filter('get_comment_date', 'time_ago_comment_date', 10, 1);



function custom_get_the_date($post)
{
	return human_time_diff(get_the_time('U', $post), current_time('timestamp')) . ' ' . 'پیش';
}

function wpb_custom_query($query)
{
	if (($query->is_home() && $query->is_main_query()) || $query->is_archive()) {
		$query->set('orderby', 'date');
		$query->set('order', 'ASC');
	}
}
//add_action('pre_get_posts', 'wpb_custom_query');

add_filter('document_title_parts', 'my_document_title_parts');
function my_document_title_parts($title)
{ // $title is an *array*
	if (is_category()) {
		$title['title'] = bloginfo('name') . ' ' . 'دسته بندی' . ' ' . single_cat_title('', false);
	}

	return $title;
}

add_action('init', 'define_ajax_url');
function define_ajax_url()
{
	add_rewrite_tag('%rewrite_custom_ajax%', '([^&/]+)');
	add_rewrite_rule('ajax/?([^/]*)', 'index.php?rewrite_custom_ajax=$matches[1]', 'top');
}
// url  http://site.com/ajax/get_post_detail

add_action('template_redirect', 'get_post_detail');
function get_post_detail()
{
	global $wp_query;

	# Don't do anything unless this is an AJAX request
	$method = $wp_query->get('rewrite_custom_ajax');
	if (!$method) {
		return;
	}

	# Check method name
	if ($method == "get_post_detail") {
		$json_input=json_encode($_POST);
		$header =isset($_POST["header"]) ? $_POST["header"]:'{}';
			$body =isset($_POST["body"]) ? $_POST["body"]:'[]';
				$client_id =isset($_POST["client_id"]) ? $_POST["client_id"]:'not client_id';

				$c_header=json_decode(str_replace("\\","",$header),JSON_UNESCAPED_UNICODE);
				$c_body=json_decode(str_replace("\\","",$body),JSON_UNESCAPED_UNICODE);

				$c_header=isset($c_header["Table"])?$c_header["Table"][0]:[];

				//inty  نوع صورتحساب
				//inp  الگوی صورتحساب
				//ins موضوع صورتحساب

				// sstid  شناسه کالا
				//
		        
				// = > header
				// trading_type,                   tty  
				// tarikh,                         indatim
				// sh_faktor,                   inno
				// IdPayType,                    setm 
				// mablagh_nesiye,                ins
				// sh_gomrok,                      scln
				// txt_made_17,                 tax17
				// shenase_seller,                crn
				// code_gomrok,                      scc
				//IdBuyerType                       tob
				//tb.CodeMelli,                     bid
				//tb.CodeEghtesadi,                  tinb
				//tb.CodePosti                       bpc

				// IdKala,CodeKala   sstid
				// amount,            am
				// vahed,            mu
				// arz,              cut
				// mablagh_arz,        exr
				// mablagh,           fee
				// takhfif,           dis
				// maliyat,          vra    
				// other_title,      odt    
				// other_mablagh,     odr   
				// other_title_1,      olt
				// other_mablagh_1,    olr
				// shenase,             bsrn

				$headerDto=[];
                $bodyDto=[];

				for($x=0;$x<count($c_body);$x++)
				{
					$bodyDto[$x]["Sstid"]=isset($c_body[$x]["CodeKala"])?$c_body[$x]["CodeKala"]:0;
					$bodyDto[$x]["Am"]=isset($c_body[$x]["amount"])?$c_body[$x]["amount"]:0;
					$bodyDto[$x]["Mu"]=isset($c_body[$x]["vahed"])?$c_body[$x]["vahed"]:0;
					$bodyDto[$x]["Cut"]=isset($c_body[$x]["arz"])?$c_body[$x]["arz"]:0;
					$bodyDto[$x]["Exr"]=isset($c_body[$x]["mablagh_arz"])?$c_body[$x]["mablagh_arz"]:0;
					$bodyDto[$x]["Fee"]=isset($c_body[$x]["mablagh"])?$c_body[$x]["mablagh"]:0;
					$bodyDto[$x]["Dis"]=isset($c_body[$x]["takhfif"])?$c_body[$x]["takhfif"]:0;
					$bodyDto[$x]["Vra"]=isset($c_body[$x]["maliyat"])?$c_body[$x]["maliyat"]:0;
					$bodyDto[$x]["Odt"]=isset($c_body[$x]["other_title"])?$c_body[$x]["other_title"]:'';
					$bodyDto[$x]["Odr"]=isset($c_body[$x]["other_mablagh"])?$c_body[$x]["other_mablagh"]:0;
					$bodyDto[$x]["Olt"]=isset($c_body[$x]["other_title_1"])?$c_body[$x]["other_title_1"]:'';
					$bodyDto[$x]["Olr"]=isset($c_body[$x]["other_mablagh_1"])?$c_body[$x]["other_mablagh_1"]:0;
					$bodyDto[$x]["Bsrn"]=isset($c_body[$x]["shenase"])?$c_body[$x]["shenase"]:0;
				}


				$headerDto["Tty"]=isset($c_header["trading_type"])?$c_header["trading_type"]:0;
				$headerDto["Inno"]=isset($c_header["sh_faktor"])?$c_header["sh_faktor"]:0;
				$headerDto["Setm"]=isset($c_header["IdPayType"])?$c_header["IdPayType"]:0;
				$headerDto["Ins"]=isset($c_header["mablagh_nesiye"])?$c_header["mablagh_nesiye"]:0;
				$headerDto["Scln"]=isset($c_header["sh_gomrok"])?$c_header["sh_gomrok"]:0;
				$headerDto["Tax17"]=isset($c_header["txt_made_17"])?$c_header["txt_made_17"]:0;
				$headerDto["Crn"]=isset($c_header["shenase_seller"])?$c_header["shenase_seller"]:0;
				$headerDto["Scc"]=isset($c_header["code_gomrok"])?$c_header["code_gomrok"]:0;
				$headerDto["Tob"]=isset($c_header["IdBuyerType"])?$c_header["IdBuyerType"]:0;
				$headerDto["Bid"]=isset($c_header["CodeMelli"])?$c_header["CodeMelli"]:0;
				$headerDto["Tinb"]=isset($c_header["CodeEghtesadi"])?$c_header["CodeEghtesadi"]:0;
				$headerDto["Bpc"]=isset($c_header["CodePosti"])?$c_header["CodePosti"]:0;
				
		$array = [
			//'json_input'=> $c_header,
			'status' =>1,
			'header' =>json_encode( $headerDto, JSON_UNESCAPED_UNICODE ),
			'body' =>  json_encode( $bodyDto, JSON_UNESCAPED_UNICODE ) ,
			'test' => 'سلام'
		]; 

		$args = array(
			'post_type' => 'paya',
			'post_status' => 'publish',
			'meta_key' => 'client_id',
			'meta_value' => $client_id,
		);
		$the_query = new WP_Query($args);
		$count = $the_query->post_count;

		$counter=0;

		while ($the_query->have_posts()) :
			$the_query->the_post();
             $cnt= get_field("counter");
			 if(is_numeric($cnt))
			 {
				$counter=$cnt;
			 }

			 $cnt_ghabli = get_post_meta(get_the_ID(), 'counter_count', true);

			 if(!is_numeric($cnt_ghabli))
			 {
				$cnt_ghabli=0;
			 }

			 if($cnt_ghabli > $counter && $counter >0)
			 {
				$array['status']=0;
			 }
			 $array['counter']=$counter;
			 $array['counter_count']=$cnt_ghabli;

			 update_post_meta(get_the_ID(), "counter_count", $cnt_ghabli + 1);
		endwhile;



		if($count==0)
		{
			$array['status']=0;
		}


		header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
	    echo	json_encode( $array, JSON_UNESCAPED_UNICODE );
		die;
		//wp_send_json( $array, 200,0 );
		//wp_send_json_success($array, 200);
		//wp_send_json_error
	}
}

function do_export_posts() 
{
	if (current_user_can('manage_options') && isset($_GET['export_posts'])) {
		$type = 'post';
		if (isset($_GET['post_type'])) {
			$type = $_GET['post_type'];
		}
		$post_status = 'all';
		if (isset($_GET['post_status'])) {
			$post_status = $_GET['post_status'];
		}
		$arg = array(
			'post_type' => $type,
			'post_status' => $post_status,
			'posts_per_page' => -1,
		);

		$post_list = get_posts($arg);
		if ($post_list) {
			header('Content-Encoding: UTF-8');
			header('Content-type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename="wp.csv"');
			header('Pragma: no-cache');
			header('Expires: 0');
			$file = fopen('php://output', 'w');
			fputs($file, "\xEF\xBB\xBF"); // UTF-8

			global $post;
			foreach ($post_list as $post) {
				setup_postdata($post);
				fputcsv($file, array(get_the_title(), get_the_author(), get_the_permalink()));
			}
			exit();
		}
	}
}
///add_action('init', 'do_export_posts');

function add_export_publish_posts_button()
{
	if (current_user_can('manage_options')) {

		/*$screen = get_current_screen();
        if ( isset( $screen->parent_file )
                && ( 'edit.php' == $screen->parent_file ) ) {*/
	?>
		<input class="button button-primary" type="submit" id="export_posts" name="export_posts" value="خروجی CSV">
		<script type="text/javascript">
			jQuery(function($) {
				$('#export_posts').insertAfter('#post-query-submit');
			});
		</script>
<?php
		//}

	}
}


//add_action('restrict_manage_posts', 'add_export_publish_posts_button');

function paya_post_type()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('حافظه مالیاتی', 'plural'),
        'singular_name' => _x(' حافظه مالیاتی', 'singular'),
        'menu_name' => _x('حافظه مالیاتی', 'admin menu'),
        'name_admin_bar' => _x('حافظه مالیاتی', 'admin bar'),
        'add_new' => _x('ثبت حافظه مالیاتی جدید', 'add new'),
        'add_new_item' => "ثبت  حافظه مالیاتی جدید",
        'new_item' => " حافظه مالیاتی جدید",
        'edit_item' => "ویرایش  حافظه مالیاتی",
        'view_item' => "مشاهده  حافظه مالیاتی",
        'all_items' => "همه  حافظه مالیاتی ها",
        'search_items' => "جستجوی  حافظه مالیاتی",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'paya'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('paya', $args);
}
add_action('init', 'paya_post_type');

