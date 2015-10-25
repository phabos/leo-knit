<?php
/*
Plugin Name: Phabos imagegal
Description: Phabos imagegal
Version: 0.1
Author: Phabos
Author URI: https://twitter.com/phabos1
License: GPL2
*/

if (! defined( 'ABSPATH' )) exit;

use plugins\ImgGal\ImgGalAdmin;
use plugins\ImgGal\ImgGalFront;

if (! defined( 'ABSPATH' )) exit;

if (! class_exists( 'ImgGalAdmin' ) && is_admin() ) {
  require_once('class/ImgGalAdmin.class.php');
  new ImgGalAdmin;
}

if (! class_exists( 'ImgGalFront' )) {
  require_once('class/ImgGalFront.class.php');
}
