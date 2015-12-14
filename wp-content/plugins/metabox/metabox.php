<?php
/*
Plugin Name: Phabos metabox
Description: Phabos metabox
Version: 0.1
Author: Phabos
Author URI: https://twitter.com/phabos1
License: GPL2
*/

use plugins\MetaboxAdmin\MetaboxAdmin;

if (! defined( 'ABSPATH' )) exit;

if (! class_exists( 'MetaboxAdmin' ) && is_admin() ) {
  require_once('class/MetaboxAdmin.class.php');
  new MetaboxAdmin;
}
