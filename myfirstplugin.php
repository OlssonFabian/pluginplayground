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

function mfp_myfirstshortcode($user_atts = [], $content = null, $tag =''){
    $default_atts = [
        'posts' => 3,
        'title' => __('latest news', 'myfirstplugin'),
    ];

    $atts = shortcode_atts($default_atts, $user_atts, $tag);

    $query = new WP_Query([
        'posts_per_page' => $atts['posts'],
        ]);

        return

        $html = "<h2> {$atts['title']} </h2>";

    if ($query->have_posts()){
        $html .= "<ul>";
        while ($query->have_posts()){
            $query->the_post();
            $html .= "<li>";
            $html .= get_the_title();
            $html .= " in ";
            $html .= get_the_category_list(', ');
            $html .= " by ";
            $html .= get_the_author();
            $html .= " at ";
            $html .= human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
            $html .= "</li>";
        }
        wp_reset_postdata();
        $html .="</ul>";
    } else {
        $html .= $html . "no latest posts at this current time";
    }
    return $html;
}

function mfp_init() {
    add_shortcode('myfirstshortcode', 'mfp_myfirstshortcode');
}

add_action('init', 'mfp_init');

