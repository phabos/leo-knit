<?php

/**
 * Plugin Name:         Api pour load article with angular js
 * Plugin URI:
 * Description:         Permet de charger des articles via angular JS
 * Author:              Phabos
 * Author URI:          --
 *
 * Version:             0.0.1
 */

if( !class_exists( 'PhApiArticle' ) ) {

	/**
     * Main class of the plugin
     */
    class PhApiArticle {

        public static function run() {
            register_activation_hook( __FILE__, array( __CLASS__, 'activate' ) );
            register_deactivation_hook( __FILE__, array( __CLASS__, 'deactivate' ) );
            register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );

            add_filter( 'query_vars', array( __CLASS__, 'add_query_vars' ) );
            add_action( 'parse_request', array( __CLASS__, 'sniff_requests' ) );
            add_action( 'init', array( __CLASS__, 'init' ), 0 );

        }

        public static function init(){
            self::add_rewrite_rules();
        }

        public static function add_query_vars( $vars ){
            $vars[] = '__api';
            return $vars;
        }

        public static function add_rewrite_rules(){
            add_rewrite_rule( '^api/article.json?$', 'index.php?__api=1', 'top' );
        }

        public static function activate() {
            self::add_rewrite_rules();
            flush_rewrite_rules();
        }

        public static function deactivate() {
            flush_rewrite_rules();
        }

        public static function uninstall() {
            // Nothing for now.
        }

        public static function sniff_requests(){
            global $wp;
            if( isset( $wp->query_vars[ '__api' ] ) ) {
                $articles = array();
                sleep(1);
                $offset = isset( $_GET['offset'] ) ? $_GET['offset'] : 0;
                $posts = PostCollection::getPosts( $offset );
                if( count( $posts ) > 0 ) {
                  $i = 0;
                  foreach( $posts as $post ) {
                    $articles[$i]['articleId'] = $i;
                    $articles[$i]['pos'] = $offset * PostCollection::$nbPostPerPage + $i + 1;
                    $articles[$i]['title'] = $post->post_title;
                    $articles[$i]['postId'] = $post->ID;
                    $articles[$i]['description'] = Post::getDescription($post->ID);
                    $articles[$i]['smallthumb'] = Post::getThumbnail( $post->ID, 'medium' )[0];
                    $articles[$i]['date'] = Helper::dateToDatetime($post->post_date)->format('d-m-y');
                    $articles[$i]['tags'] = Post::getTags( $post->ID );
                    $articles[$i]['bigthumb'] = Post::getThumbnail( $post->ID, 'full' )[0];
                    $articles[$i]['content'] = $post->post_content;
                    $articles[$i]['uniqId'] = 'article-id-'.$articles[$i]['pos'];
                    $articles[$i]['gallery'] = plugins\ImgGal\ImgGalFront::PH_build_array_gallery($post->ID);
                    $articles[$i]['pattern'] = get_post_meta( $post->ID, '_ph_pattern', true );
                    $i++;
                  }
                }
                wp_send_json( $articles );
                die();
            }
        }

    }

    PhApiArticle::run();

}
