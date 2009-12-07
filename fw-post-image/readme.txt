=== fw-post-image ===
Contributors: Fairweb (Myriam Faulkner)
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10322212
Tags: post image, image, photo, thumbnail
Requires at least: 2.9
Tested up to: 2.9
Stable tag: '/trunk'

Filters the_post_image() function. If no post image is defined, get the first image belonging to post or first image found in post content.

== Description ==
This plugin does not work with Wordpress version prior to 2.9 !
Since Wordpress 2.9, you can choose which image will represent a post and will be displayed as thumbnail. This plugin allows backward compatibility for your former posts.
It filters on `the_post_image()` function. If no post image is defined, the plugin will get the first image belonging to post. If it still doesn't find any image, it will scan for the first image found post content.

The image will be displayed according to the arguments (size and attributes) set when calling `the_post_image()`.

== Installation ==

1. Upload the `fw-post-image` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Make sure your template supports post image by adding `add_theme_support('post-thumbnails');` in the functions.php file of your theme.
4. Put the template tag `the_post_image($size, $attr)` in the loop in your template where you want the post image to appear. For example :
`<?php the_post_image('thumbnail', 'class=alignleft'); ?>`

== Frequently Asked Questions ==

= The plugin does not work =

1. Make sure you are running Wordpress 2.9 or above
3. Make sure your template supports post image by adding `add_theme_support('post-thumbnails');` in the functions.php file of your theme.
4. Put the template tag `the_post_image($size, $attr)` in the loop in your template where you want the post image to appear. For example :
`<?php the_post_image('thumbnail', 'class=alignleft'); ?>`

== Screenshots ==


== Changelog ==

= 1.0 =
* First plugin release