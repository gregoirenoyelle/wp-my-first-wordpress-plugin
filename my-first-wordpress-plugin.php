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
Domain Path: /languages
Text Domain: my-first-wordpress-plugin
*/


/******************************
* global variables
******************************/

// Préfixe utilisé dans toute l'extension
$mfwp_prefix = 'mfwp_';
$mfwp_plugin_name = 'My First WordPress Plugin';

// Engistrement en Global de l'option pour éviter d'appeler à chaque fois les données dans la table options
// Nom donné avec la fonction mfwp_register_settings
// Voir fichier: /my-first-wordpress-plugin/includes/admin-page.php
$mfwp_options = get_option('mfwp_settings');

/******************************
* includes
******************************/

include('includes/scripts.php'); // this controls all JS / CSS
include('includes/data-processing.php'); // this controls all saving of data
include('includes/display-functions.php'); // display content functions
include('includes/admin-page.php'); // the plugin options page HTML and save functions
