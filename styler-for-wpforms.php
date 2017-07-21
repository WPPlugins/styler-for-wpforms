<?php
/*
Plugin Name: Styler for WpForms
Plugin URI:  http://wpmonks.com/styler-wpforms
Description: Create beautiful styles for your WpForms
Version:     1.0
Author:      Sushil Kumar
Author URI:  http://wpmonks.com/
License:     GPL2License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

class sk_sfwf_main_class {

	const VERSION = '1.0';
	const SLUG    = 'styler-wpforms';
	const NAME    = 'Styler for WpForms';
	const AUTHOR  = 'Sushil Kumar';
	const PREFIX  = 'sk_sfwf';

	/**
	 *
	 *
	 * @var instance
	 * @since 1.0
	 */
	private static $instance;

	/**
	 * Plugin Directory
	 *
	 * @since 1.0
	 * @var string $dir
	 */
	public static $dir = '';

	/**
	 * Plugin URL
	 *
	 * @since 1.0
	 * @var string $url
	 */
	public static $url = '';

	/**
	 * Main Plugin Instance
	 *
	 * Insures that only one instance of a plugin class exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since 1.0
	 * @static
	 * @static var array $instance
	 * @return sk_sfwf_main_class instance
	 */
	public static function instance() {
		if ( !isset( self::$instance ) && !( self::$instance instanceof sk_sfwf_main_class ) ) {
			self::$dir = plugin_dir_path( __FILE__ );

			self::$url = plugin_dir_url( __FILE__ );

			self::$instance = new sk_sfwf_main_class();

		}

		return self::$instance;
	}

	public function __construct() {

		add_action( 'customize_register', array( $this, 'sfwf_customize_register' ) ) ;
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'sfwf_autosave_form' ) );
		add_action( 'customize_preview_init', array( $this, 'sfwf_live_preview' ) );
		add_action ( 'wpforms_frontend_output_before', array( $this, 'swfw_display_styles_frontend' ), 10, 2 );
	}


	/**
	 * Function to display styles in frontend
	 *
	 * @param [array] $form_data [description]
	 * @param [object] $form      [description]
	 * @return [none]            [no return]
	 */
	function swfw_display_styles_frontend( $form_data, $form ) {
		$style_current_form = get_option( 'sfwf_form_id_'.$form_data['id'] );
	 
			if ( !empty( $style_current_form ) ) {

				$css_form_id = $form_data['id'];
				 $main_class_object = self::instance();
				include 'display/class-styles.php';
			}
		do_action( 'sfwf_after_post_style_display' );
		//return $form;
	}

	/*  enqueue js file that autosaves the form selection in database
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @return null
	 */
	function sfwf_autosave_form() {

		wp_enqueue_script( 'sfwf_auto_save_form', self::$url. '/js/auto-save-form.js', array( 'jquery' ), '', true );

	}

	/**
	 *  shows live preview of css changes
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @return null
	 */
	function sfwf_live_preview() {
		$current_form_id = get_option( 'sfwf_select_form_id' );
		wp_enqueue_script( 'sfwf_show_live_changes', self::$url. '/js/live-preview-changes.js', array( 'jquery', 'customize-preview' ), '', true );
		wp_localize_script( 'sfwf_show_live_changes', 'sfwf_localize_current_form', $current_form_id );

	}

	function sfwf_customize_register( $wp_customize ) {

		$current_form_id = get_option( 'sfwf_select_form_id' );
		$border_types = array( "inherit" => "Inherit", "solid" =>"Solid", "dotted"=> "Dotted", "dashed"=> "Dashed", "double"=> "Double", "groove"=> "Groove", "ridge"=> "Ridge", "inset"=> "Inset", "outset"=> "Outset" );
		$align_pos =array( "left" =>"Left", "center" => "Center", "justify" => "Justify", "right" => "Right", );
		$font_collection = array( 'Default'=>'Default', "Roboto"=>"Roboto", "Open Sans"=>"Open Sans", "Lato"=>"Lato", "Slabo 27px"=>"Slabo 27px", "Oswald"=>"Oswald", "Roboto Condensed"=>"Roboto Condensed", "Source Sans Pro"=>"Source Sans Pro", "Montserrat"=>"Montserrat", "Raleway"=>"Raleway", "PT Sans"=>"PT Sans", "Roboto Slab"=>"Roboto Slab", "Merriweather"=>"Merriweather", "Open Sans Condensed"=>"Open Sans Condensed", "Droid Sans"=>"Droid Sans", "Ubuntu"=>"Ubuntu", "Lora"=>"Lora", "Droid Serif"=>"Droid Serif", "Playfair Display"=>"Playfair Display", "Arimo"=>"Arimo", "PT Serif"=>"PT Serif", "Noto Sans"=>"Noto Sans", "Titillium Web"=>"Titillium Web", "PT Sans Narrow"=>"PT Sans Narrow", "Muli"=>"Muli", "Indie Flower"=>"Indie Flower", "Bitter"=>"Bitter", "Poppins"=>"Poppins", "Fjalla One"=>"Fjalla One", "Inconsolata"=>"Inconsolata", "Hind"=>"Hind", "Dosis"=>"Dosis", "Oxygen"=>"Oxygen", "Anton"=>"Anton", "Cabin"=>"Cabin", "Noto Serif"=>"Noto Serif", "Arvo"=>"Arvo", "Lobster"=>"Lobster", "Crimson Text"=>"Crimson Text", "Yanone Kaffeesatz"=>"Yanone Kaffeesatz", "Nunito"=>"Nunito", "Libre Baskerville"=>"Libre Baskerville", "Bree Serif"=>"Bree Serif", "Catamaran"=>"Catamaran", "Josefin Sans"=>"Josefin Sans", "Merriweather Sans"=>"Merriweather Sans", "Abel"=>"Abel", "Exo 2"=>"Exo 2", "Gloria Hallelujah"=>"Gloria Hallelujah", "Abril Fatface"=>"Abril Fatface", "Fira Sans"=>"Fira Sans", "Pacifico"=>"Pacifico", "Varela Round"=>"Varela Round", "Ubuntu Condensed"=>"Ubuntu Condensed", "Roboto Mono"=>"Roboto Mono", "Quicksand"=>"Quicksand", "Karla"=>"Karla", "Asap"=>"Asap", "Amatic SC"=>"Amatic SC", "Rokkitt"=>"Rokkitt", "Signika"=>"Signika", "Rubik"=>"Rubik", "Archivo Narrow"=>"Archivo Narrow", "Play"=>"Play", "Shadows Into Light"=>"Shadows Into Light", "Questrial"=>"Questrial", "Work Sans"=>"Work Sans", "Cuprum"=>"Cuprum", "Dancing Script"=>"Dancing Script", "Francois One"=>"Francois One", "Alegreya"=>"Alegreya", "PT Sans Caption"=>"PT Sans Caption", "Vollkorn"=>"Vollkorn", "Exo"=>"Exo", "Maven Pro"=>"Maven Pro", "Patua One"=>"Patua One", "Orbitron"=>"Orbitron", "Acme"=>"Acme", "Ropa Sans"=>"Ropa Sans", "Source Code Pro"=>"Source Code Pro", "Pathway Gothic One"=>"Pathway Gothic One", "EB Garamond"=>"EB Garamond", "Crete Round"=>"Crete Round", "Cinzel"=>"Cinzel", "Comfortaa"=>"Comfortaa", "Lobster Two"=>"Lobster Two", "Alegreya Sans"=>"Alegreya Sans", "Josefin Slab"=>"Josefin Slab", "News Cycle"=>"News Cycle", "Architects Daughter"=>"Architects Daughter", "Noticia Text"=>"Noticia Text", "Yellowtail"=>"Yellowtail", "Russo One"=>"Russo One", "Poiret One"=>"Poiret One", "Source Serif Pro"=>"Source Serif Pro", "ABeeZee"=>"ABeeZee", "Monda"=>"Monda", "Satisfy"=>"Satisfy", "Quattrocento Sans"=>"Quattrocento Sans", "Hammersmith One"=>"Hammersmith One" );

		$wp_customize->add_panel( 'sfwf_panel', array(
				'title' => __( 'Styler for WPForms' ),
				'description' => '<p> Craft your Forms</p>', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			) );

		//hidden field to get form id in jquery
		//var_dump($_GET);

		if ( !array_key_exists( 'autofocus', $_GET ) ) {

			$wp_customize->add_setting( 'sfwf_hidden_field_for_form_id' , array(
					'default'     => $current_form_id,
					'transport'   => 'postMessage',
					'type' => 'option'
				) );

			$wp_customize->add_control( 'sfwf_hidden_field_for_form_id', array(
					'type' => 'hidden',
					'priority' => 10, // Within the section.
					'section' => 'sfwf_select_form_section', // Required, core or custom.
					'input_attrs' => array(
						'value' => $current_form_id,
						'id' => 'sfwf_hidden_field_for_form_id'
					),
				) );
		}

		include 'includes/form-select.php';
		//include 'includes/customizer-addons.php';
		include 'includes/general-settings.php';
		do_action( 'sfwf_add_addons_section', $wp_customize, $current_form_id );
		include 'includes/form-wrapper.php';
		include 'includes/form-header.php';
		include 'includes/form-title.php';
		include 'includes/form-description.php';
		// //include 'includes/outer-shadow.php';
		// //include 'includes/inner-shadow.php';
		include 'includes/field-labels.php';
		//include 'includes/field-sub-labels.php';
		//include 'includes/placeholders.php';
		include 'includes/field-descriptions.php';
		include 'includes/text-fields.php';
		include 'includes/dropdown-fields.php';
		include 'includes/radio-inputs.php';
		include 'includes/checkbox-inputs.php';
		include 'includes/paragraph-textarea.php';
		//include 'includes/section-break-title.php';
		//include 'includes/section-break-description.php';
		//include 'includes/list-field.php';
		include 'includes/submit-button.php';
		include 'includes/confirmation-message.php';
		include 'includes/error-message.php';
	} // main customizer function ends here

	/**
	 * Convert saved database values to CSS propetise
	 *
	 * @param [int]   $form_id  [form id to get the saved values for it]
	 * @param [string] $category [settings section for which details must be used]
	 * @return [string]           [CSS code]
	 */
	public function swfw_get_saved_styles( $form_id, $category ) {

		$settings = get_option( 'sfwf_form_id_'.$form_id );



		if ( empty( $settings ) ) {
			return;
		}

		$input_styles = '';
		if ( isset( $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['horizontal-offset'] )?'box-shadow: 0px ':'box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			} else {
				$input_styles.= ';';
			}
		}

		if ( isset(  $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['outer-horizontal-offset'] )?'-moz-box-shadow: 0px ':'-moz-box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			}

			else {
				$input_styles.= ';';
			}
		}

		if ( isset( $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['outer-horizontal-offset'] )?'-webkit-box-shadow: 0px ':'-webkit-box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			}

			else {
				$input_styles.= ';';
			}
		}

		$input_styles.= empty( $settings[$category]['color'] )?'':'color:'. $settings[$category]['color'].';';
		$input_styles.= empty( $settings[$category]['background-color'] )?'':'background-color:'. $settings[$category]['background-color'].';';
		$input_styles.= empty( $settings[$category]['background-color1'] )?'':'background:-webkit-linear-gradient(to left,'. $settings[$category]['background-color'].','.$settings[$category]['background-color1'].');';
		$input_styles.= empty( $settings[$category]['background-color1'] )?'':'background:linear-gradient(to left,'. $settings[$category]['background-color'].','.$settings[$category]['background-color1'].');';

		//$input_styles.= empty( $settings[$category]['padding'] )?'':'padding:'. $settings[$category]['padding'].';';
		$input_styles.= empty( $settings[$category]['width'] )?'':'width:'. $settings[$category]['width'].$this->sfwf_add_px_to_value($settings[$category]['width']).';';
		$input_styles.= empty( $settings[$category]['height'] )?'':'height:'. $settings[$category]['height'].$this->sfwf_add_px_to_value($settings[$category]['height']).';';

		$input_styles.= empty( $settings[$category]['title-position'] )?'':'text-align:'. $settings[$category]['title-position'].';';
		$input_styles.= empty( $settings[$category]['text-align'] )?'':'text-align:'. $settings[$category]['text-align'].';';
		$input_styles.= empty( $settings[$category]['error-position'] )?'':'text-align:'. $settings[$category]['error-position'].';';
		$input_styles.= empty( $settings[$category]['description-position'] )?'':'text-align:'. $settings[$category]['description-position'].';';

		$input_styles.= empty( $settings[$category]['title-color'] )?'':'color:'. $settings[$category]['title-color'].';';
		$input_styles.= empty( $settings[$category]['font-color'] )?'':'color:'. $settings[$category]['font-color'].';';
		$input_styles.= empty( $settings[$category]['description-color'] )?'':'color:'. $settings[$category]['description-color'].';';
		$input_styles.= empty( $settings[$category]['button-color'] )?'':'background-color:'. $settings[$category]['button-color'].';';
		$input_styles.= empty( $settings[$category]['description-color'] )?'':'color:'. $settings[$category]['description-color'].';';

		$input_styles.= empty( $settings[$category]['font-family'] )?'':'font-family:'. $settings[$category]['font-family'].';';
		$input_styles.= empty( $settings[$category]['font-size'] )?'':'font-size:'. $settings[$category]['font-size'].$this->sfwf_add_px_to_value($settings[$category]['font-size'] ).';';
		$input_styles.= empty( $settings[$category]['max-width'] )?'':'max-width:'. $settings[$category]['max-width'].$this->sfwf_add_px_to_value($settings[$category]['max-width']).';';
		$input_styles.= empty( $settings[$category]['maximum-width'] )?'':'max-width:'. $settings[$category]['maximum-width'].$this->sfwf_add_px_to_value($settings[$category]['maximum-width']).';';
		$input_styles.= empty( $settings[$category]['margin'] )?'':'margin:'. $settings[$category]['margin'].';';
		$input_styles.= empty( $settings[$category]['padding'] )?'':'padding:'. $settings[$category]['padding'].';';

		$input_styles.= empty( $settings[$category]['border-size'] )?'':'border-width:'. $settings[$category]['border-size'].$this->sfwf_add_px_to_value($settings[$category]['border-size']).';';
		$input_styles.= empty( $settings[$category]['border-color'] )?'':'border-color:'. $settings[$category]['border-color'].';';
		$input_styles.= empty( $settings[$category]['border-type'] )?'':'border-style:'. $settings[$category]['border-type'].';';
		$input_styles.= empty( $settings[$category]['border-bottom'] )?'':'border-bottom-style:'. $settings[$category]['border-bottom'].';';
		$input_styles.= empty( $settings[$category]['border-bottom-size'] )?'':'border-bottom-width:'. $settings[$category]['border-bottom-size'].$this->sfwf_add_px_to_value($settings[$category]['border-bottom-size']).';';
		$input_styles.= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:'. $settings[$category]['border-bottom-color'].';';



		$input_styles.= empty( $settings[$category]['background-image-url'] )?'':'background: url('. $settings[$category]['background-image-url'].') no-repeat;';
		$input_styles.= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:'. $settings[$category]['border-bottom-color'].';';
		if (isset($settings[$category]['display'])) {
			$input_styles.=  $settings[$category]['display'] ?'display:none;':'display:inherit;';
		}
		if ( !empty( $settings[$category]['border-radius'] ) ) {
			$input_styles .= 'border-radius:'.$settings[$category]['border-radius'].$this->sfwf_add_px_to_value($settings[$category]['border-radius']).';';
			$input_styles .= '-web-border-radius:'.$settings[$category]['border-radius'].$this->sfwf_add_px_to_value($settings[$category]['border-radius']).';';
			$input_styles .= '-moz-border-radius:'.$settings[$category]['border-radius'].$this->sfwf_add_px_to_value($settings[$category]['border-radius']).';';
		}
		$input_styles.= empty( $settings[$category]['custom-css'] )?'':$settings[$category]['custom-css'].';';
		return $input_styles;
	}

	function sfwf_add_px_to_value($value) {

		if (ctype_digit($value)) {
			$value = 'px';
		}

		else {
			$value = '';
		}
		return $value;
	}

} // Class ends here



/**
 * The main function responsible for returning The Highlander Plugin
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * @since 3.0
 * @return {class} Highlander Instance
 */
function sk_sfwf_main_class() {

	return sk_sfwf_main_class::instance();
}
sk_sfwf_main_class();
