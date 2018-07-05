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
//or

// if ( ! function_exists( 'add_action')) {
//     echo 'Hey, you can\'t access this file, you silly human!';
//     exit;
// };


defined( 'ABSPATH' ) or die('Hey, you can\'t access this file, you silly human!');
if (file_exists(dirname(__FILE__)) . '/vendor/autoload.php'); {
    require_once(dirname(__FILE__)) . '/vendor/autoload.php';
    //echo dirname(__FILE__) . '/vendor/autoload.php';
}

//requiring once the Activate file/class
use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if ( !class_exists( 'AlecadddPlugin')) {

    class AlecadddPlugin
    {
        //public-can be access everywhere
        //protected-can be access within a class and extended class
        //private-can be access only within a class
        //static-can be access without instantiating the class
        //methods
        // function __construct()
        // {
        //                              // ↓ is the class itself then calling the method
        //     add_action( 'init', array($this, 'custom_post_type'));
        // }
        public $plugin;

		function __construct() {
            $this->plugin = plugin_basename( __FILE__ );
		}

        function register() {
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue'));
            //if ywe want to enqueue it in the frontend, use this:
            //add_action( 'wp_enqueue_scripts', array($this, 'enqueue'));

            add_action( 'admin_menu', array($this, 'add_admin_pages' ));
            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
            //                            ↑↑↑ uses double quote to concatenate autmomatically the variable 
            //double quotes escape variables in php  
        }
        public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}

        public function add_admin_pages() {
            add_menu_page( 'AlecadddPlugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
        }
        public function admin_index(){
            //require a template
            require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
       
        }

        protected function create_post_type() {
            add_action( 'init', array( $this, 'custom_post_type' ) );
        }

        function custom_post_type() {
            register_post_type( 'book', ['public' => true, 'label'=> 'Books' ]);
        }

        function enqueue() {
            wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ));
            wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ));
        }

        function activate() {
            // require_once plugin_dir_path( __FILE__ ) . 'inc/alecaddd-plugin-activate.php';
            Activate::activate();
        }

    }


        $alecadddPlugin = new AlecadddPlugin('Just checking if it goes through Just checking if it goes through');
        $alecadddPlugin->register();
        Adminpages::activate();

    //activation  

    // require_once plugin_dir_path( __FILE__) . 'inc/alecaddd-plugin-activate.php';
    register_activation_hook( __FILE__,                      array( $alecadddPlugin, 'activate') );

    //deactivation
    // require_once plugin_dir_path( __FILE__) . 'inc/alecaddd-plugin-deactivate.php';
    //                          ↓ is alecaddd-plugin.php    ( ↓ class on another php file, ↓ method )
    register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate') );

}




