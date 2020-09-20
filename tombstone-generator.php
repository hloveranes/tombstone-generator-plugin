<?php
/**
* Plugin Name: Tombstone Generator
* Plugin URI: https://github.com/devy-lis/Tombstone-Generator
* Description: Create a wonderful tombstone with Tombstone Generator
* Version: 1.1.2
* Author: devy-lis
* Author URI: https://github.com/devy-lis
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

Copyright 2005-2015 devy-lis.
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
        // echo test;
        // echo TGen\test;

        // this is global
        // new PDO();
        parent::__construct();
    }
    
}

$base = new TombBase;

