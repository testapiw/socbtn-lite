# socbtn-lite
Wordpress plug-in simple social buttons

![Screen Shot](assets/screen-1.png)

## Use the shortcode:

**in the editor:**<br>
[socbtn]

**in HTML markup:**<br>
<?php do_shortcode( '[socbtn]' ); ?>

**in the php code:**<br>
 ob_start();<br>
 do_shortcode( '[socbtn]' );<br>
 $socbtn = ob_get_clean();<br>
 
 
## Position
 align to the left or right edge<br>
   [socbtn position=left]<br>
   [socbtn position=right]<br>

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

## Screnshot

![in the editor](assets/screen-2.png)
![view in the editor](assets/screen-3.png)
![position left](assets/screenshot-4.png)
