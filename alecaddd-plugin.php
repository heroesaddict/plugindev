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

/* prevent public users to access your php files through url */
// if ( ! defined('ABSPATH') ) {
//     die;
// };

//or

defined( 'ABSPATH' ) or die('Hey, you can\'t access this file, you silly human!');

//or

// if ( ! function_exists( 'add_action')) {
//     echo 'Hey, you can\'t access this file, you silly human!';
//     exit;
// };


class AlecadddPlugin
{
    //methods
    function __construct()
    {
                                 // ↓ is the class itself then calling the method
        add_action( 'init', array($this, 'custom_post_type'));
    }

    function activate() {
        //echo 'The plugin was activated';
        
        //generate a CPT
        $this->custom_post_type();

        //flush the rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        //echo 'The plugin was deactivated';
        // flush the rewrite rules
        flush_rewrite_rules();
    }

    function uninstall() {
        //delete CPT
        //delete all the plugin data from the DB
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label'=> 'Books' ]);
    }


}

if ( class_exists( 'AlecadddPlugin')) {
    $alecadddPlugin = new AlecadddPlugin('Just checking if it goes through Just checking if it goes through ');
}

//activation                 ↓ is alecaddd-plugin.php         ( ↓ instantiated obj, ↓ method )
register_activation_hook( __FILE__,                      array( $alecadddPlugin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array( $alecadddPlugin, 'deactivate') );


//uninstall





