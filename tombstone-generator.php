<?php
/**
* Plugin Name: Tombstone Generator
* Plugin URI: https://github.com/1000th-devy/Tombstone-Generator
* Description: Create a wonderful tombstone with Tombstone Generator
* Version: 1.1.2
* Author: 1000th-devy
* Author URI: https://github.com/1000th-devy
* License: GPLv2 or later
* Text Domain: tombstone-generator
* 
* @package Tombstone Generator
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 1000th-devy.
*/

if ( ! defined( 'ABSPATH' )){
    die(); // Die if accessed directly
}

require_once 'tcore/core.php';
use TGen\TombCore;

    // class TombBase extends TGen\TombCore{
class TombBase extends TombCore{

    // run a parent constructor
    public function __construct(){
        parent::__construct();
        register_activation_hook(__FILE__, array($this, 'create_db_table'));
        register_activation_hook(__FILE__, array($this, 'tombstone_generator_files'));
    }


    // create table for tombstone
    public function create_db_table($wpdb){
        global $wpdb;
        global $tombstone_generator_version;
        // set plugin version
        $tombstone_generator_version = '1.0';
        
        // assign a table name
        $table_name = $wpdb->prefix . "tombstone"; 
        
        $charset_collate = $wpdb->get_charset_collate();
        
        
        $sql = "CREATE TABLE $table_name (
            id int(255) NOT NULL AUTO_INCREMENT,
            frame_link varchar(255),
            material_link varchar(255),
            decoration_link varchar(255),
            scripture varchar(255),
            sample_product_link varchar(255),
            created_at datetime,
            PRIMARY KEY (id)
          ) $charset_collate;";

        // require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
        // added version for future upgrade
        add_option( 'tombstone_generator_version', $tombstone_generator_version );


        $installed_ver = get_option( "tombstone_generator_version" );

        if ( $installed_ver != $tombstone_generator_version ) {
            $sql = "CREATE TABLE $table_name (
                id int(255) NOT NULL AUTO_INCREMENT,
                frame_link varchar(255),
                material_link varchar(255),
                decoration_link varchar(255),
                scripture varchar(255),
                sample_product_link varchar(255),
                created_at datetime,
                PRIMARY KEY (id)
              ) $charset_collate;";
            // require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            // dbDelta( $sql );
        
            update_option( 'tombstone_generator_version', '2.0' );
            
        }
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }


    function tombstone_generator_files() {
    
        $upload = wp_upload_dir()['basedir'];
        $upload_dir_tomb = $upload . '/tombfiles';

        if (! is_dir($upload_dir_tomb)) {
            mkdir( $upload_dir_tomb, 0755 );
            $upload_dir_img = $upload_dir_tomb . '/imgs';

            if (! is_dir($upload_dir_img)) {
                mkdir( $upload_dir_img, 0755 );
            }
        }
    }


    
}

$base = new TombBase;

