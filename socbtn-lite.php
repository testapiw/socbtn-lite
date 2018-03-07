<?php defined( 'ABSPATH' ) OR die();

/*
Plugin Name: Simple social buttons
Description: (shotrcode [socbtn]) Facebook, Twitter, Google+, LinkedIn, Instagram, VK 
Version: 0.2.5
Author: HalcheSM
Author URI: https://wordpress.org/plugins/simple-social-networking-buttons/
*/

define( 'SOCBTN', '1' );
define( 'SOCBTN_VERSION', '0.2.5' );
define( 'SOCBTN_DIR', plugin_dir_path(__FILE__) );
define( 'SOCBTN_URI', plugin_dir_url(__FILE__) );
define( 'SOCBTN_ASSETS',  SOCBTN_URI . 'assets/' );
define( 'SOCBTN_PLUGIN',  plugin_basename( __FILE__ ) );

add_shortcode( 'socbtn', 'socbtn_html' );

$count_socbtn = 0;

if ( ! function_exists( 'socbtn_html' ) && ! is_admin() ) {
	
	function socbtn_html( $atts ) 
	{
		global $count_socbtn;
		
		$allowed = array(
			'facebook', 'twitter', 'google', 'instagram', 'linkedin', 'vk', 
			'pinterest', 'tumblr', 'livejournal', 'viber', 'skype', 'yahoo'
		);
		
		$atts = shortcode_atts( array(
			'button'	=> 'twitter, facebook, google, instagram, linkedin, vk',
			'position'  => '',
			'size'		=> '',
			'theme'		=> '',
			'style'		=> ''
		), $atts );

		$style = sb_style( $atts[ 'style' ] );

		$count_socbtn++;

		$buttons = array_intersect ( explode(',', str_replace(' ', '', esc_attr( $atts[ 'button' ] ) ) ), $allowed );

		$is_3dcube = '3dcube' == $atts[ 'theme' ];

		wp_enqueue_script( 'socbtn-lite', SOCBTN_ASSETS . 'js/socbtn.js', array( 'jquery' ), SOCBTN_VERSION, true );

		wp_enqueue_style( 'socbtn-lite', SOCBTN_ASSETS . 'css/socbtn.css', false, SOCBTN_VERSION );
		
		if ( $is_3dcube ) wp_enqueue_style( 'socbtn-lite-3d', SOCBTN_ASSETS . 'css/fx3d.css', false, SOCBTN_VERSION );

		$class = '';

		if ( ! empty( $atts[ 'position' ] ) ) {

			$class .= $atts[ 'position' ] == 'left' ? ' sticky left ' : ' sticky right ';
		}
		
		if ( ! empty( $atts[ 'size' ] ) ) {

			$class .= $atts[ 'size' ] == 'small' ? ' small ' : '';
		}

		$theme = $is_3dcube ? 'cube' : esc_attr( $atts[ 'theme' ] );

		echo '<div class="' . $theme . '" '. $style .'><div class="social-button'. $class .'" data-id="'. $count_socbtn .'">';

		$i = 0;

		foreach( $buttons as $btn ) {
				
				echo '<div class="socbtn" data-socbtn="'. $btn .'">'
						. '<div class="icon '. $btn .'"></div>'
						. '<span class="counter"></span>'
					. '</div>';

				if ( $i == 5 && $is_3dcube == true ) break;

				$i++;
		}

		echo '</div></div>';
		
	}


	function sb_style( $attr_style )
	{
		$props = array( 'left', 'top', 'right', 'bottom' );

		$style = '';

		foreach( $props as $prop ) {

			if ( preg_match('|'. $prop .':\s?(.*?);|', $attr_style, $match) ) {
		
				if ( isset( $match[1] ) ) $style .= $prop . ':' . (int)$match[1] . 'px;';
			}
			
		}
		
		return ! empty( $style ) ? 'style="' . $style . '"' : '';
	}

}
