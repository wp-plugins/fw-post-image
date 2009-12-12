<?php
/**
 * @package fw-post-image
 * @author Myriam Faulkner
 * @version 1.1
 */
class fw_post_image {
    public $html;
    public $post_id;
    public $post_image_id;
    public $size;
    public $attr;

    public function fw_post_image()  {
	
	} // end construct

    public function get_post_image ($html,$post_id, $post_image_id, $size, $attr) {
$this->html = $html;
        $this->post_id = $post_id;
        $this->post_image_id = $post_image_id;
        $this->size = $size;
        $this->attr = $attr;
        
    if ($this->html == '') {
         $this->post_image_id = $this->get_post_image_id ();
         if ($this->post_image_id) {
           do_action( 'begin_fetch_post_thumbnail_html', $this->post_id, $this->post_image_id, $this->size ); // for "Just In Time" filtering of all of wp_get_attachment_image()'s filters
		$this->html = wp_get_attachment_image( $this->post_image_id, $this->size, false, $this->attr );
		do_action( 'end_fetch_post_thumbnail_html', $this->post_id, $this->post_image_id, $this->size );
    
    } else {
        $this->html = $this->get_image_in_content ();
    }
    }
    return $this->html;
}

public function get_post_image_id () {
	$images = get_children(
	array(
		'post_parent' => $this->post_id,
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'numberposts' => 1
		)
	);
	if ($images) {
            
        foreach ($images as $img) {
        $img_id = $img->ID;
        }
        
        return $img->ID;
        } else {
           return NULL;
        }
}

public function get_image_in_content () {

	$my_post = get_post($this->post_id);

	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $my_post->post_content, $matches );

	if ( isset( $matches ) ) $image = $matches[1][0];

	if ( $matches[1][0] ) {

            // determine alt attribute
            $altpattern = '/alt=([\'"])?(.*?)\\1/';
            preg_match($altpattern, $matches[0][0], $m);
            $alt = $m[2];

            // get the attributes
            $default_attr = array(
			'src'	=> $image,
			'class'	=> "attachment-$size",
			'alt'	=> $alt
		);
            $this->attr = wp_parse_args($this->attr, $default_attr);

		$attr = array_map( 'esc_attr', $this->attr );
		$attributes = '';
		foreach ( $this->attr as $name => $value ) {
			$attributes .= " $name=" . '"' . $value . '"';
		}

           $imgwh = getimagesize($image);
           $imgsize = image_constrain_size_for_editor($imgwh[0], $imgwh[1], $this->size);
           $wh = image_hwstring($imgsize[0], $imgsize[1]);
           
           $this->html = ' <img '.$attributes.' '.$wh.' />';
		
                return $this->html;
        }
	else {
		return NULL;
        }
}
}
?>