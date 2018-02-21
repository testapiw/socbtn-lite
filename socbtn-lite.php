<?php defined( 'ABSPATH' ) OR die();

/*
Plugin Name: Simple social buttons
Description: (shotrcode [socbtn]) Facebook, Twitter, Google+, LinkedIn, Instagram, VK 
Version: 0.0.1
Author: HalcheSM
Author URI:testapiw@gmail.com
*/

define( 'SOCBTN', '1' );
define( 'SOCBTN_VERSION', '0.0.3' );
define( 'SOCBTN_DIR', plugin_dir_path(__FILE__) );
define( 'SOCBTN_URI', plugin_dir_url(__FILE__) );
define( 'SOCBTN_ASSETS',  SOCBTN_URI . 'assets/' );
define( 'SOCBTN_PLUGIN',  plugin_basename( __FILE__ ) );

add_shortcode( 'socbtn', 'socbtn_html' );

if ( ! function_exists( 'socbtn_html' ) && ! is_admin() ) {
	
	function socbtn_html( $atts ) 
	{

		$atts = shortcode_atts( array(
			'facebook'  => 1,
			'twitter'	=> 1,
			'google' 	=> 1,
			'instagram' => 1,
			'linkedin'  => 1,
			'vk'	    => 1,
			'position'  => ''
		), $atts );

		wp_enqueue_script( 'socbtn-lite', SOCBTN_ASSETS . 'js/socbtn.js', array( 'jquery' ), SOCBTN_VERSION, true );

		wp_enqueue_style( 'socbtn-lite', SOCBTN_ASSETS . 'css/socbtn.css', false, SOCBTN_VERSION );

		$position = '';

		if ( ! empty( $atts[ 'position' ] ) ) {

			$position = $atts[ 'position' ] == 'left' ? ' sticky left' : ' sticky right';
		}

		echo '<div class="social-button'. $position .'">';

		foreach( $atts as $btn => $is_enabled ) {

			if ( 1 == $is_enabled ) {
				echo '<div class="socbtn" data-socbtn="'. $btn .'">'
						. '<div class="icon '. $btn .'"></div>'
						. '<span class="counter"></span>'
					. '</div>';
			}
		}

		echo '</div>';
	
	}
}


$words = [ 
	'касалетка купить' => 'Заголовок #1',
	'касалетка купить' => 'Заголовок #2',
	'касалетка купить' => 'Заголовок #3'
];

$term = urldecode( filter_input(INPUT_GET, 'utm_term', FILTER_SANITIZE_STRING) );

$multiTitle = $words[ $term ];

echo $multiTitle;