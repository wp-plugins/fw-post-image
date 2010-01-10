=== fw-post-image ===
Contributors: Fairweb (Myriam Faulkner)
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10322212
Tags: post image, image, photo, thumbnail
Requires at least: 2.9
Tested up to: 2.9.1
Stable tag: '/trunk'

Filters the_post_thumbnail() function. If no post thumbnail is defined, get the first image belonging to post or first image found in post content.

== Description ==
This plugin does not work with Wordpress version prior to 2.9 !
Since Wordpress 2.9, you can choose which image will represent a post and will be displayed as thumbnail. This plugin allows backward compatibility for your former posts.
It filters on `the_post_thumbnail()` function. If no post thumbnail is defined, the plugin will get the first image belonging to post. If it still doesn't find any image, it will scan for the first image found post content.

The image will be displayed according to the arguments (size and attributes) set when calling `the_post_thumbnail()`.

== Installation ==

1. Upload the `fw-post-image` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Make sure your template supports post image by adding `add_theme_support('post-thumbnails');` in the functions.php file of your theme.
4. Put the template tag `the_post_thumbnail($size, $attr)` in the loop in your template where you want the post image to appear. For example :
`<?php the_post_thumbnail('thumbnail', 'class=alignleft'); ?>`

== Frequently Asked Questions ==

= The plugin does not work =

1. Make sure you are running Wordpress 2.9 or above
3. Make sure your template supports post image by adding `add_theme_support('post-thumbnails');` in the functions.php file of your theme.
4. Put the template tag `the_post_thumbnail($size, $attr)` in the loop in your template where you want the post image to appear. For example :
`<?php the_post_thumbnail('thumbnail', 'class=alignleft'); ?>`

== Screenshots ==
1. This is an example for displaying post thumbnails on the index page of your theme.

== Changelog ==
= 1.2 =
* Prevent error on getimagesize (line 92) when scanning post content for an image and finding an image which does not exist.
= 1.1 =
* Changed filter name for post_thumbnail_html (previously post_image_html)
* Changed action name for begin_fetch_post_thumbnail_html(previously begin_fetch_post_image_html)
* Changed action name for end_fetch_post_thumbnail_html(previously end_fetch_post_image_html)
= 1.0 =
* First plugin release (the 1.0 release should not work anymore)