<?php

  class Post {

      public static function getDescription( $postId ) {
        return get_post_meta( $postId, 'postDescription', true );
      }

      public static function getThumbnail( $postId, $size = 'full' ) {
        //return get_the_post_thumbnail( $postId, $size, array('class' => 'meta__avatar') );
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        return wp_get_attachment_image_src( $post_thumbnail_id );
      }

      public static function getTags( $postId ) {
        $tagsString = '';
        $t = wp_get_post_tags( $postId );
        foreach($t as $tag){
          $tagsString .= $tag->name.', ';
        }

        return trim($tagsString, ', ');
      }

  }

 ?>
