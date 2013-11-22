<?php
/*
 Plugin Name: Mobble Shortcodes
Plugin URI: http://philipjohn.co.uk/category/plugins/mobble-shortcodes
Description: Deliver mobile-specific content using the functionality in the Mobble plugin.
Version: 0.2
Author: Philip John
Author URI: http://philipjohn.co.uk
License: WTFPL
Text Domain: mobble-shortcodes
*/

/**
 * Mobble_Shortcodes Class
 * Does all the work with nice function names, avoiding conflicts
 * @author philipjohn
 *
 */
class Mobble_Shortcodes {
	
	/**
	 * Easy textdomain access so as to avoid typing it out lots and getting it wrong!
	 * @var string Textdomain for this plugin
	 */
	const textdomain = 'mobble-shortcodes';
	
	/**
	 * Constructor for the Class
	 * Calls the activation hook and creates the many shortcodes
	 */
	function __construct() {
		// Add textdomain
		add_action('init', array($this, 'load_textdomain'));
		
		// Call the activation hook
		register_activation_hook( __FILE__, array($this, 'activation') );
		
		// An array of Mobble functions to create shortcodes for
		$mobbles = array(
				'handheld',
				'mobile',
				'tablet',
				'ios',
				'iphone',
				'ipad',
				'ipod',
				'android',
				'blackberry',
				'opera_mobile',
				'symbian',
				'kindle',
				'windows_mobile',
				'motorola',
				'samsung',
				'samsung_tablet',
				'sony_ericsson',
				'nintendo'
				);
		
		// The shortcodes - a positive and negative for each mobble function
		foreach ($mobbles as $mobble){
			add_shortcode('is_'.$mobble, array($this, 'shortcode')); // positive check
			add_shortcode('is_not_'.$mobble, array($this, 'shortcode')); // negative check
		}
		
	}
	
	/**
	 * Our activation hook
	 * Stops folks activating this plugin without having Mobble active
	 */
	function activation() {
		// Let's not let people activate it without Mobble
		if (is_plugin_inactive('mobble/mobble.php'))
			die(__('Ooops, you must have the Mobble plugin installed before you can use this! Please activate Mobble.', self::textdomain));
	}
	
	function load_textdomain(){
		load_plugin_textdomain(self::textdomain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
	}
	
	/**
	 * Process the shortcodes
	 * @param array $atts Any attributes from the shortcode. Not currently used
	 * @param string $content The content used within the shortcode
	 * @param string $tag The shortcode being used (mobble function)
	 * @return string The content
	 */
	function shortcode($atts, $content, $tag) {
		
		switch ($tag){
			
			case 'is_handheld';
				if (is_handheld())
					return $content;
				break;
				
			case 'is_not_handheld';
				if (!is_handheld())
					return $content;
				break;
				
			case 'is_mobile':
				if (is_mobile())
					return $content;
				break;
				
			case 'is_not_mobile':
				if (!is_mobile())
					return $content;
				break;
				
			case 'is_tablet':
				if (is_tablet())
					return $content;
				break;
				
			case 'is_not_tablet':
				if (!is_tablet())
					return $content;
				break;
				
			case 'is_ios':
				if (is_ios())
					return $content;
				break;
				
			case 'is_not_ios':
				if (!is_ios())
					return $content;
				break;
				
			case 'is_iphone':
				if (is_iphone())
					return $content;
				break;
				
			case 'is_not_iphone':
				if (!is_iphone())
					return $content;
				break;
				
			case 'is_ipad':
				if (is_ipad())
					return $content;
				break;
				
			case 'is_not_ipad':
				if (!is_ipad())
					return $content;
				break;
				
			case 'is_ipod':
				if (is_ipod())
					return $content;
				break;
				
			case 'is_not_ipod':
				if (!is_ipod())
					return $content;
				break;
				
			case 'is_android':
				if (is_android())
					return $content;
				break;
				
			case 'is_not_android':
				if (!is_android())
					return $content;
				break;
				
			case 'is_blackberry':
				if (is_blackberry())
					return $content;
				break;
				
			case 'is_not_blackberry':
				if (!is_blackberry())
					return $content;
				break;
				
			case 'is_opera_mobile':
				if (is_opera_mobile())
					return $content;
				break;
				
			case 'is_not_opera_mobile':
				if (!is_opera_mobile())
					return $content;
				break;
				
			case 'is_symbian':
				if (is_symbian())
					return $content;
				break;
				
			case 'is_not_symbian':
				if (!is_symbian())
					return $content;
				break;
				
			case 'is_kindle':
				if (is_kindle())
					return $content;
				break;
				
			case 'is_not_kindle':
				if (!is_kindle())
					return $content;
				break;
				
			case 'is_windows_mobile':
				if (is_windows_mobile())
					return $content;
				break;
				
			case 'is_not_windows_mobile':
				if (!is_windows_mobile())
					return $content;
				break;
				
			case 'is_motorola':
				if (is_motorola())
					return $content;
				break;
				
			case 'is_not_motorola':
				if (!is_motorola())
					return $content;
				break;
				
			case 'is_samsung':
				if (is_samsung())
					return $content;
				break;
				
			case 'is_not_samsung':
				if (!is_samsung())
					return $content;
				break;
				
			case 'is_samsung_tablet':
				if (is_samsung_tablet())
					return $content;
				break;
				
			case 'is_not_samsung_tablet':
				if (!is_samsung_tablet())
					return $content;
				break;
				
			case 'is_sony_ericsson':
				if (is_sony_ericsson())
					return $content;
				break;
				
			case 'is_not_sony_ericsson':
				if (!is_sony_ericsson())
					return $content;
				break;
				
			case 'is_nintendo':
				if (is_nintendo())
					return $content;
				break;
				
			case 'is_not_nintendo':
				if (!is_nintendo())
					return $content;
				break;
				
			default:
				return '';
				
				
			return '';
		}
	}
}
new Mobble_Shortcodes();