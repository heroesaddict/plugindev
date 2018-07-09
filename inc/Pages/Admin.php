<?php 
/*************
*@package AlecaddddPlugin
*/
namespace Inc\Pages;
use \Inc\Base\BaseController;

//everytime a class is use to extend another class, it gets initialize
class Admin extends BaseController
{
    
    public function register() {
        add_action( 'admin_menu', array($this, 'add_admin_pages' ));
    }

    public function add_admin_pages() {
        add_menu_page( 'AlecadddPlugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
    }
    public function admin_index(){
        //require a template
        require_once $this->plugin_path . 'templates/admin.php';
    
    }
}
