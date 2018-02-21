=== Plugin Name ===
Contributors: HalcheSM
Donate link: https://github.com/testapiw/socbtn-lite.git
Tags: social button
Requires at least: 4.9
Tested up to: 4.9
Stable tag: 4.9
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple WordPress plug-in social networking buttons

== Description ==

= Use the shortcode: =

    * in the editor: 
        > [socbtn]

    * in HTML markup:
        > <?php do_shortcode( '[socbtn]' ); ?>

    * in the php code:
        > ob_start();
        > do_shortcode( '[socbtn]' );
        > $socbtn = ob_get_clean();

= Position =

    align to the left or right edge
    
    [socbtn position=left]

    [socbtn position=right]

By default all the social network buttons are enabled.

* facebook = 1
* twitter = 1
* google = 1
* instagram = 1
* linkedIn = 1
* vk = 1

To hide the buttons of social networks, use the attribute equal to zero.
*    [socbtn facebook="0" twitter="0" google="0" linkedIn="0"]
            	
== Installation ==

* Upload the plugin files to the `/wp-content/plugins/socbtn-lite` directory.
* Activate the plugin.

== Screenshots ==

1. /assets/screen-1.png.
2. /assets/screen-2.png.
3. /assets/screen-3.png.


