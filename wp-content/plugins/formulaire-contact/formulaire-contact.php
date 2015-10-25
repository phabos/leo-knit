<?php
/*
Plugin Name: Phabos Contact Form
Description: Phabos Contact Form
Version: 0.1
Author: Phabos
Author URI: https://twitter.com/phabos1
License: GPL2
*/

use plugins\FormulaireContact\FormulaireContact;

if (! defined( 'ABSPATH' )) exit;

if (! class_exists('FormulaireContact') && !is_admin()) {
  require_once('class/FormulaireContact.class.php');
  new FormulaireContact;
}
