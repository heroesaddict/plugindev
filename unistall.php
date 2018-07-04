<?php 

/*
* Trigger this file in plugin uninstall
*
* @package AlecaddddPlugin
*/

if (!defined('WP_UNISTALL_PLUGIN')) {
    die;
}

//clear DB stored data
//1st method:                                                 // ↓ meaning get all posts
// $books =get_post( array('post_type' => 'book', 'numberposts' => -1));
// foreach($books as $book) {
//     wp_delete_post( $book -> the_ID(), true );
// }

//2nd method:   
//access the DB via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");

















