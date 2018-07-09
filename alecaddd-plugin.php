<?php 
/*************
*@package AlecaddddPlugin
*/

/*
Plugin Name: Alecaddd Plugin
Plugin URI: https://alecaddd.com
Description: This is my first attempt at writing a custom plugin base from alessandro castellani's youtube tutorial.
Version: 0.1.0
Author: Alessandro Castellani
Author URI: http://alecaddd.com
License: GPLv2 or later
Text Domain: alecaddd plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//           ↓ is define in wp_load.php in a wordpress installation
defined( 'ABSPATH' ) or die('Hey, you can\'t access this file, you silly human!');
if (file_exists(dirname(__FILE__)) . '/vendor/autoload.php'); {
    require_once(dirname(__FILE__)) . '/vendor/autoload.php';
    //echo dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_alecaddd_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_alecaddd_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecaddd_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_alecaddd_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init')) {
    Inc\Init::register_services();
}





