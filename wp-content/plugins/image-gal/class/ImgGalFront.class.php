<?php

namespace plugins\ImgGal;

class ImgGalFront{

  public static function PH_build_gallery($postId)
  {
    $html_gal = '';

    $attachment_ids = get_post_meta($postId, '_ph_img_gal', true);
    if ( $attachment_ids ) {
      $has_gallery_images = explode(',', $attachment_ids);
  		$has_gallery_images = array_filter($has_gallery_images);

      if( !empty( $has_gallery_images )) {
        foreach($has_gallery_images as $has_gallery_image){
          $image = wp_get_attachment_image($has_gallery_image, array(300,300), false, array('alt' => trim(strip_tags(get_post_meta( $has_gallery_image, '_wp_attachment_image_alt', true )))));
          $html_gal .= '<div>' . $image . '</div>';
        }
      }
    }
    return $html_gal;
  }
}
