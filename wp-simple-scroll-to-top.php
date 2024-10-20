<?php
/*
* Plugin Name:          Wp Simple Scroll to Top
* Plugin URI:           https://wordpress.org/plugins/wp-simple-scroll-to-top/
* Description:          A simple scroll to top button for your website.
* Version:              1.0.0
* requires at least:    5.2
* requires PHP:         7.2
* Author:               MD Mahmudul Hasan
* Author URI:           https://mahmudulhasan13.com/
* License:              GPL v2 or later
* License URI:          https://www.gnu.org/licenses/gpl-2.0.html
* update_url:           https://github.com/antor9732
* text-domain:          wsstt
*/

// Including css 
function wsstt_enqueue_style(){
    wp_enqueue_style('wsstt-style',plugins_url('css/wsstt-style.css',__FILE__));
}
add_action('wp_enqueue_scripts', 'wsstt_enqueue_style');

// Including js
function wsstt_enqueue_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('wsstt-plugin-script', plugins_url('js/wsstt-plugin.js', __FILE__), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wsstt_enqueue_scripts');

// Including Plugin Settings Activation
function wsstt_scroll_script(){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery.scrollUp();
        });
    </script>
    <?php
}
add_action('wp_footer', 'wsstt_scroll_script');

?>
