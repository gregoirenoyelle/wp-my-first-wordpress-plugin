<?php
/*
Plugin Name: My First plugin
Plugin URI: http://pippinsplugins.com/how-to-begin-writing-your-first-wordpress-plugin
Description: This is my first WordPress Plugin
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Version: 1.0
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages/
Text Domain: my-first-wordpress-plugin
*/

//* If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/******************************
* global variables
******************************/


// Engistrement en Global de l'option pour éviter d'appeler à chaque fois les données dans la table options
// Nom donné avec la fonction mfwp_register_settings
// Voir fichier: /my-first-wordpress-plugin/includes/admin-page.php
$mfwp_options = get_option('mfwp_settings');

/******************************
* Add language support
******************************/

add_action( 'plugins_loaded', 'mfwp_load_textdomain' );
function mfwp_load_textdomain() {
  load_plugin_textdomain( 'my-first-wordpress-plugin', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}


/******************************
* includes
******************************/

include('includes/scripts.php'); // this controls all JS / CSS
include('includes/data-processing.php'); // this controls all saving of data
include('includes/display-functions.php'); // display content functions
include('includes/admin-page.php'); // the plugin options page HTML and save functions
