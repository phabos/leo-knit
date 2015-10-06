<?php

  class Post {

      public $title = '';
      public $image = '';
      public $description = '';
      public $publishDate = '';

      public static function getPosts() {
        $args = array(
        	'posts_per_page'   => 12,
        	'offset'           => 0,
        	'orderby'          => 'date',
        	'order'            => 'DESC',
        	'post_type'        => 'post',
        	'post_status'      => 'publish',
        	'suppress_filters' => true
        );
        $posts = get_posts( $args );
        return $posts;
      }

  }

 ?>
