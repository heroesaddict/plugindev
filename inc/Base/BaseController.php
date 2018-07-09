<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;
class BaseController
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;
	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/alecaddd-plugin.php'; //alecaddd-plugin/alecaddd-plugin.php
	}
}


//note: steps in using the Basecontroller class:
//1.    use \Inc\Base\BaseController;
//2.    //extend it in a class example: class Admin extends BaseController
//3. then use the variable. example: $this->plugin_path
