<?php /**
 * @package fw-post-image
 * @author Myriam Faulkner
 * @version 1.2
 */
/*
Plugin Name: fw-post-image
Plugin URI: http://www.fairweb.fr/en/plugins-wordpress/fw-post-image/
Description: If no post image is defined, get first image belonging to post or first image found post content. WP 2.9 > only.
Author: Myriam Faulkner
Version: 1.2
Author URI: http://www.fairweb.fr/
*/

/*  Copyright 2009  Myriam Faulkner  (email : web@fairweb.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 */
require_once(WP_PLUGIN_DIR .'/fw-post-image/fw-post-image.class.php');
    $fw_pimg = new fw_post_image();
    add_filter( 'post_thumbnail_html', array(&$fw_pimg, 'get_post_image'),1,5 );
?>