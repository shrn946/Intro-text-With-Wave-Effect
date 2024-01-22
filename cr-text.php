<?php
/*
Plugin Name: Intro text With Wave Effect
Description: Integrates GSAP text effect scripts into your WordPress site.[custom_splash_section text="BEST <span>TRENDS !</span>" font_size="100px"]

Version: 1.0
Author: Your Name
*/

// Enqueue GSAP scripts
function enqueue_gsap_scripts() {
    // Enqueue GSAP library
    wp_enqueue_script('gsap', 'https://unpkg.co/gsap@3/dist/gsap.min.js', array(), null, true);

    // Enqueue your custom style.css file
    wp_enqueue_style('gsap-style', plugin_dir_url(__FILE__) . 'style.css');

    // Enqueue your custom script.js file
    wp_enqueue_script('gsap-script', plugin_dir_url(__FILE__) . 'script.js', array('gsap'), null, true);
}

// Hook into WordPress to enqueue scripts
add_action('wp_enqueue_scripts', 'enqueue_gsap_scripts');



function custom_splash_section($atts) {
    $atts = shortcode_atts(
        array(
            'text' => 'The web is <span>complicated</span>.',
            'font_size' => '24px',
        ),
        $atts,
        'custom_splash_section'
    );

    ob_start(); ?>

    <section class="splash">
        <h1 class="wi" style="font-size:color <?php echo esc_attr($atts['font_size']); ?>"><?php echo wp_kses_post($atts['text']); ?></h1>
        <div class="splash__bg">
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
            <span class="js-circle"></span>
        </div>
    </section>

    <?php
    return ob_get_clean();
}

// Register shortcode
function register_custom_shortcodes() {
    add_shortcode('custom_splash_section', 'custom_splash_section');
}
add_action('init', 'register_custom_shortcodes');
