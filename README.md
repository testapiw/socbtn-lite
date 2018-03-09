# socbtn-lite
Wordpress plug-in simple social buttons

* Requires at least: 4.9
* Tested up to: 4.9
* Requires PHP: 7.0
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html

![Screen Shot](assets/screenshot-6.png)

* Setting a custom theme and style.
* 3D animation cube.
* Choice of sizes small \ large. Default: large 42px.
* Vertical auto-positioning in the center for sticky left\right modes

## Social networks buttons

* facebook
* twitter
* google
* instagram
* linkedIn
* vk
* pinterest
* tumblr
* livejournal
* viber
* skype
* yahoo

Info about your resource for social networks:<br>

* title - document.title
* href - URl page
* description - meta tag [description]


## Use the shortcode:

**in the editor:**<br>
 [socbtn]

**in HTML markup:**<br>
*       <?php do_shortcode( '[socbtn]' ); ?>

**in the php code:**<br>
 ob_start();<br>
 do_shortcode( '[socbtn]' );<br>
 $socbtn = ob_get_clean();<br>
 
 
## Position
 align to the left or right edge<br>
   [socbtn position=left]<br>
   [socbtn position=right]<br>

## Size
Setting icon sizes to 24px<br>
   [socbtn size=small]<br>
 
## Enabled\Disdabled
By default all the social network buttons are enabled.

* facebook
* twitter
* google
* instagram
* linkedIn
* vk

To select the required set of buttons, use the `button` attribute:<br>
[socbtn button='twitter, facebook, google, instagram, linkedin, vk']

## Installation

* Upload the plugin files to the `/wp-content/plugins/socbtn-lite` directory.
* Activate the plugin.

## Recommendations

In the default installation, WordPress does not include meta tags such as description and keywords.
To generate meta tags, use the following resources:
plugins **Yoast SEO**, WordPress All in One Seo, Platinum SEO Pack...

* **[Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)**
* [WordPress All in One Seo](https://wordpress.org/plugins/all-in-one-seo-pack/)
* [Platinum SEO Pack](https://wordpress.org/plugins/platinum-seo-pack/)


https://codex.wordpress.org/Meta_Tags_in_WordPress.  

## Screenshot

![animation 3D cube](assets/screenshot-6.png)
![position left](assets/screenshot-4.png)
![Screen Shot](assets/screenshot-5.png)
![in the editor](assets/screen-2.png)

### 2.2

Added icons: pinterest, tumblr, livejournal, viber, skype, yahoo

### 2.5

## Added attributes Theme and Style.

## Theme
Theme allows to set the class of the main container.

Example: 
        [socbtn theme=myclass] 
        > <div class="myclass">


## Style
Style attribute allows to set the positioning of the main container.<br>
Style - left, top, right, bottom in px.<br>

Example: <br>
        [socbtn theme=myclass style="left:-80px;top:-40px;"]<br>
*        <div class="myclass" style="left:-80px;top:-40px;">

### 2.6
fix: linkedin button

