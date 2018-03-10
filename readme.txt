=== Plugin Name ===
Contributors: HalcheSM
Donate link: https://github.com/testapiw/socbtn-lite.git
Tags: social button
Requires at least: 4.9
Tested up to: 4.9
Stable tag: 4.9
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple WordPress plug-in social networking buttons

== Description ==

* Setting a custom theme and style.
* 3D animation cube.
* Choice of sizes small \ large. Default: large 42px.
* Vertical auto-positioning in the center for sticky left\right modes.

= Social networks buttons =

* facebook
* twitter
* google
* instagram
* linkedIn
* pinterest
* tumblr
* livejournal
* viber
* skype
* yahoo
* vk
* ok
* yandex
* mail.ru

= Info about your resource for social networks =

* **title** - og:title or document.title
* **href** - og:url or URl page
* **description** - og:description or meta tag [description]
* **image** - og:image or og:image:secure_url

Meta Tags Properties **og:** can be set by plugins  **Yoast SEO**, WordPress All in One Seo, Platinum SEO Pack.

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

= Size =
Setting icon sizes to 24px
   [socbtn size=small]

= Theme =
        do_shortcode( '[socbtn theme=3dcube]' );

= Style =
        > do_shortcode( '[socbtn theme=3dcube style="left:-80px;top:-40px;"]' );
        > <div class="cube" style="left:-80px;top:-40px;">
        
= Enabled\Disdabled =

By default all the social network buttons are enabled.

* facebook
* twitter
* google
* instagram
* linkedIn
* vk

To select the required set of buttons, use the `button` attribute:
*    [socbtn button='viber, skype, yahoo, twitter, facebook']
            	
== Installation ==

* Upload the plugin files to the `/wp-content/plugins/socbtn-lite` directory.
* Activate the plugin.

== Recommendations ==

In the default installation, WordPress does not include meta tags such as description and keywords.
To generate meta tags, use the following resources:
plugins **Yoast SEO**, WordPress All in One Seo, Platinum SEO Pack...

* **[Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)**
* [WordPress All in One Seo](https://wordpress.org/plugins/all-in-one-seo-pack/)
* [Platinum SEO Pack](https://wordpress.org/plugins/platinum-seo-pack/)

https://codex.wordpress.org/Meta_Tags_in_WordPress.  

== Screenshots ==

1. In HTML markup.
2. Vertical sticky.
3. Icon sizes to 24px.
4. View in the editor.
5. In the editor.
5. Animation 3d Cube.

== Changelog ==

= 2.0 =

Vertical auto-positioning in the center for sticky modes
Add atributes size

= 2.1 =

fix linkedin icon

= 2.2 =

Added icons: pinterest, tumblr, livejournal, viber, skype, yahoo

= 2.5 =

Added attributes Theme and Style.
Theme allows to set the class of the main container.

Example: 
        [socbtn theme=myclass] 
        > <div class="myclass">


Style attribute allows to set the positioning of the main container.
Style - left, top, right, bottom in px.

Example: 
        [socbtn theme=myclass style="left:-80px;top:-40px;"]
        > <div class="myclass" style="left:-80px;top:-40px;">

= 2.6 =
fix: linkedin button

= 2.7 =
Added icons: ok, yandex, mailru