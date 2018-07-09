<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' ); 
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' );
	}
}

//sidenote: to enque a file, you need the actual url so use plugin_dir_url()
// to require or include a file use plugin_dir_path()