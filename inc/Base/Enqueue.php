<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;
/**
* 
*/
class Enqueue
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' ); 
		wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
	}
}

//sidenote: to enque a file, you need the actual url so use plugin_dir_url()
// to require or include a file use plugin_dir_path()