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
function wsstt_enqueue_style()
{
    wp_enqueue_style('wsstt-style', plugins_url('css/wsstt-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'wsstt_enqueue_style');

// Including js
function wsstt_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('wsstt-plugin-script', plugins_url('js/wsstt-plugin.js', __FILE__), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wsstt_enqueue_scripts');

// Including Plugin Settings Activation
function wsstt_scroll_script()
{
?>
    <script>
        jQuery(document).ready(function() {
            jQuery.scrollUp();
        });
    </script>
<?php
}
add_action('wp_footer', 'wsstt_scroll_script');

// Plugin Customization Settings
// add_action('customize_register', 'wsstt_scroll_to_top');
//     function wsstt_scroll_to_top($wp_customize){
//         $wp_customize->add_section('wsstt_scroll_top_section', array(
//             'title' => __('Scroll To Top', 'wsstt'),
//             'description' => 'A simple scroll to top button for your website.',
//         ));
//         $wp_customize->add_setting('wsstt_default_color', array(
//             'default' => '#262626',
//         ));
//         $wp_customize->add_control('wsstt_default_color', array(
//             'label' => 'Background color',
//             'section' => 'wsstt_scroll_top_section',
//             'type' => 'color',
//         ));
       

//     }

// Plugin Customization Settings
add_action('customize_register', 'wsstt_scroll_to_top');
function wsstt_scroll_to_top($wp_customize){
    // Add a section
    $wp_customize->add_section('wsstt_scroll_top_section', array(
        'title'       => __('Scroll To Top', 'wsstt'),
        'description' => 'A simple scroll to top button for your website.',
    ));

    // Add a setting
    $wp_customize->add_setting('wsstt_default_color', array(
        'default'   => '#119e44',
        'transport' => 'refresh', // Use 'refresh' to reload the page after change
    ));

    // Add a control and link it to the setting
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wsstt_default_color', array(
        'label'    => 'Background color',
        'section'  => 'wsstt_scroll_top_section',
        'type'     => 'color',
    )));
    //Adding Border Style
   
    $wp_customize->add_setting('wsstt_border_style', array(
        'default'   => '5px',
        'description' => 'If you want to add a border to the button, you can do so here.', 
    ));

    $wp_customize->add_control( 'wsstt_border_style', array(
        'label'    => 'Border Radius',
        'section'  => 'wsstt_scroll_top_section',
        'type'     => 'text', // Simple text control for border radius
    ));
    //Adding width & Height Style
   
    $wp_customize->add_setting('wsstt_width_style', array(
        'default'   => '38px',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('wsstt_height_style', array(
        'default'   => '38px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('wsstt_width_style', array(
        'label'    => 'Button Width',
        'section'  => 'wsstt_scroll_top_section',
        'type'     => 'text', // Simple text control for border radius
    ));
    $wp_customize->add_control('wsstt_height_style', array(
        
        'label'    => 'Button Height',
        'section'  => 'wsstt_scroll_top_section',
        'type'     => 'text', // Simple text control for border radius
    ));
}

// Theme CSS Customization
    function wsstt_theme_color_cus() {
        ?>
        <style>
            #scrollUp {
                background-color: <?php print get_theme_mod('wsstt_default_color'); ?>;
                border-radius: <?php print get_theme_mod('wsstt_border_style'); ?>;
                width: <?php print get_theme_mod('wsstt_width_style'); ?>;
                height: <?php print get_theme_mod('wsstt_height_style'); ?>;
            
            }
        </style>
        <?php
}
add_action('wp_head', 'wsstt_theme_color_cus');


?>