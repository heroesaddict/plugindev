<?php 
/*************
*@package AlecaddddPlugin
*/


class AlecadddPluginDeactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}