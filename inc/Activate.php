<?php 
/*************
*@package AlecaddddPlugin
*/
namespace Inc;

//name of class and file should match for psr-4 autoload to work
class Activate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}