<?php

  class Post {

      public static function getDescription( $postId ) {
        return get_post_meta( $postId, 'postDescription', true );
      }

  }

 ?>
