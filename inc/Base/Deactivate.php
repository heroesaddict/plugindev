<?php 
/*************
*@package AlecaddddPlugin
*/
namespace Inc\Base;

//name of class and file should match for psr-4 autoload to work
class Deactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}