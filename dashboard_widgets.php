<?php
/*
Plugin name: WP Clean Dashboard
Version: 0.1.1
Description: Remove All Of The Defaut Wordpress Widgets
Author: WJ Carey
Author URI: https://wjcarey.io
Plugin URI: https://github.com/wjcarey/wordpress-admin-contact-card
License: Apache License 2.0
*/
require_once( plugin_dir_path( __FILE__ ) . '/remove_widgets.php' );

class Admin_Dashboard_Remove_Widgets {
 
    function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'remove_dashboard_widgets' ) );
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
 
    function remove_dashboard_widgets() {
        global $remove_defaults_widgets;
     
        foreach ( $remove_defaults_widgets as $widget_id => $options ) {
            remove_meta_box( $widget_id, $options['page'], $options['context'] );
        }
    }
}

$adrw = new Admin_Dashboard_Remove_Widgets();