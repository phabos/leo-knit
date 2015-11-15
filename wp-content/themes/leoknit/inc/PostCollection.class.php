<?php

  class PostCollection {

    static public $nbPostPerPage = 2;

      public static function getPosts( $offset = 0 ) {
        $args = array(
        	'posts_per_page'   => self::$nbPostPerPage,
        	'offset'           => $offset * self::$nbPostPerPage,
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
