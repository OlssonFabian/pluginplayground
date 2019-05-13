<?php
/**
* Plugin Name: My First Plugin
* Plugin URI: http://fabianolsson.se
* Description: this you do and then dis lol
* Version: 0.01
* Author: fo
* License: wtfpl
* License URI: http://wtfpl.net
* Text Domain: myfirstplugin
* Domain Path: languages/
*/

function mfp_myfirstshortcode(){
    return "LOOK SUPER PLUGIN WOW";
}

function mfp_init() {
    add_shortcode('myfirstshortcode', 'mfp_myfirstshortcode');

    add_shortcode('mysecondshortcode', function(){
        return "AMAZING PLUGINS LULZ";
    });
}

add_action('init', 'mfp_init');

