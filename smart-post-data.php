<?php

/**
* @package SmartPostDataPlugin

*/
/*
Plugin Name: Smart Post Data Plugin
Description: This is a plugin to show the data of the post in the header.
Version: 1.0.0
Author: Maarten Kampmeijer
Author URI: https://github.com/IcemanHHW/
License: GPLv2 or later
Text Domain: smart-post-data-plugin
*/

/*
Smart Post Data Plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or
any later version.

Smart Post Data Plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Smart Date Plugin.
*/

defined( 'ABSPATH' ) or die( 'This is a very secure plugin!' );

class Smart_Post_Data{

    function __construct()
    {
        add_action( 'init', array( $this, 'spd_title' ) );
        add_action( 'init', array( $this, 'spd_date' ) );
        add_shortcode( 'spd_blog_title', array( $this, 'spd_title' ) );
        add_shortcode( 'spd_blog_date', array( $this, 'spd_date' ) );
        register_activation_hook( __FILE__, array( $this, 'spd_install' ) );
        register_deactivation_hook( __FILE__, array( $this, 'spd_uninstall' ) );
    }

    function spd_title() {

        return get_the_title();

    }
    function spd_date() {

        return get_the_date();

    }

    function spd_install() {
        flush_rewrite_rules();
    }

    function spd_uninstall() {
        flush_rewrite_rules();
    }


}

new Smart_Post_Data();
