<?php

namespace Phabos\metaboxes;

class metaboxDescription {

  public static function run (){
    add_action( 'add_meta_boxes', array(__CLASS__, 'addMetaBoxDescription') );
  }

  public static function addMetaBoxDescription () {
    echo 'Hello';
    die();
  }

}

?>
