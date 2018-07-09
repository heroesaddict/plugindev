<?php 
/*************
*@package AlecaddddPlugin
*/
namespace Inc;

//'final' meaning class cannot be extended
final class Init
{   
    
    /**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
    public static function get_services() {
        return [
            Pages\Admin::class, //sidenote: if Pages\Admin--> return only the file just like using 'use'
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
    public static function register_services() {
        foreach ( self::get_services() as $class) { 
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register')) {
                $service->register();
            }
        }
    }
    //sidenote: use self if class not initialize, $this if initialize

    /**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
    private static function instantiate( $class) {
        $service = new $class;
        return $service;  //the same as new Pages\Admin::class or new Admin()
    }

}












