<?php 
/*************
*@package AlecaddddPlugin
*/
namespace Inc\Base;

//name of class and file should match for psr-4 autoload to work
class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'alecaddd_plugin' ) ) {
			return;
		}

		$default = array();

		update_option( 'alecaddd_plugin', $default );
	}
}