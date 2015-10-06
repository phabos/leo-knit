<?php
/*
Plugin Name: Metabox Plugin
Description: Ajout de metabox
Version: 0.1
Author: Phabos
License: GPL2
*/

namespace Phabos\metaboxes;

require_once(__DIR__ . '/inc/metabox-description.php');

class Metabox {

  public static function run () {
    if ( is_admin() ) {
      metaboxDescription::run();
    }
  }

}

Metabox::run();

?>
