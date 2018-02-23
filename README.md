# socbtn-lite
Wordpress plug-in simple social buttons

* Requires at least: 4.9
* Tested up to: 4.9
* Requires PHP: 7.0
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html

![Screen Shot](assets/screen-1.png)

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

* facebook = 1
* twitter = 1
* google = 1
* instagram = 1
* linkedIn = 1
* vk = 1

To hide the buttons of social networks, use the attribute equal to zero.<br>
[socbtn facebook=0 twitter=0 google=0 linkedIn=0]

## Installation

* Upload the plugin files to the `/wp-content/plugins/socbtn-lite` directory.
* Activate the plugin.

## Screenshot

![position left](assets/screenshot-4.png)
![Screen Shot](assets/screenshot-5.png)
![in the editor](assets/screen-2.png)
![view in the editor](assets/screen-3.png)


### 2.2

Added icons: pinterest, tumblr, livejournal, viber, skype, yahoo
