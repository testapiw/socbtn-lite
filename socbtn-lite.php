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
			'linkedIn'  => 1,
			'vk'	    => 1
		), $atts );

		wp_enqueue_script( 'socbtn-lite', SOCBTN_ASSETS . 'js/socbtn.js', array( 'jquery' ), SOCBTN_VERSION, true );

		wp_enqueue_style( 'socbtn-lite', SOCBTN_ASSETS . 'css/socbtn.css', false, SOCBTN_VERSION );

		echo '<div class="social-button">';

		if ( isset($atts[ 'facebook' ] ) && $atts[ 'facebook' ] ) : ?>
		<div class="socbtn" data-socbtn="facebook">
			<div class="icon facebook"></div>
			<span class="counter"></span>
		</div>
		<?php endif; ?>
		<?php if ( isset($atts[ 'twitter' ] ) && $atts[ 'twitter' ] ) : ?>
		<div class="socbtn" data-socbtn="twitter">
			<div class="icon twitter"></div>
			<span class="counter"></span>
		</div>
		<?php endif; ?>
		<?php if ( isset($atts[ 'instagram' ] ) && $atts[ 'instagram' ]  ) : ?>
		<div class="socbtn" data-socbtn="instagram">
			<div class="icon instagram"></div>
			<!--img src="<?php //echo SOCBTN_ASSETS; ?>css/soc_icon/instagram-hover.svg"//-->
			<span class="counter"></span>
		</div>
		<?php endif; ?>

		<?php if ( isset($atts[ 'google' ] ) && $atts[ 'google' ]  ) : ?>
		<div  class="socbtn" data-socbtn="google">
			<div class="icon google"></div>
			<span class="counter"></span>
		</div>
		<?php endif; ?>
	
		<?php if ( isset($atts[ 'linkedIn' ] ) && $atts[ 'linkedIn' ]  ) : ?>
		<div  class="socbtn" data-socbtn="linkedIn">
			<div class="icon linkedin"></div>
			<span class="counter"></span>
		</div>
		<?php endif; ?>

		<?php if ( isset($atts[ 'vk' ] ) && $atts[ 'vk' ]  ) : ?>
		<div  class="socbtn" data-socbtn="vk">
			<div class="icon vk"></div>
			<span class="counter"></span>
		</div>
		<?php endif;

		echo '</div>';
	
	}
}
