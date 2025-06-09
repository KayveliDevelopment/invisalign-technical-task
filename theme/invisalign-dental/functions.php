<?php
/**
 * Theme Functions
 * Enqueue assets, register theme support, customizer settings, and CPTs.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function yd_enqueue_assets() {
  wp_enqueue_style(
    'yd-main-style',
    get_stylesheet_uri(),
    [],
    filemtime(get_template_directory() . '/style.css')
  );
  wp_enqueue_style(
    'mytheme-google-fonts',
    'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Libre+Franklin:ital,wght@0,400;0,700;1,400&display=swap',
    [],
    null
  );
  $modal_img_url = get_template_directory_uri() . '/images/modal-header-bg.jpg';
  $custom_css = "
  .yd-modal-overlay{
  inset:0;
  width:100vw;
  height:100vh;
  overflow-x:hidden;
  overflow-y:auto
  }
  .yd-modal-content {
  max-width:41.875rem;
  width:calc(100% - 2rem);
  margin:0 auto;
  box-sizing:border-box;
  overflow-x:hidden;
  overflow-y:auto
  }
  .yd-modal-header {
  background-image:url('{$modal_img_url}')
  }";
  wp_add_inline_style('yd-main-style', $custom_css);

  wp_enqueue_script(
    'yd-modal-script',
    get_template_directory_uri() . '/js/modal.js',
    [ 'jquery' ],
    filemtime(get_template_directory() . '/js/modal.js'),
    true
  );
}
add_action('after_switch_theme', function () {
    $plugins_to_activate = [
        'advanced-custom-fields/acf.php',
        'wpforms-lite/wpforms.php'
    ];

    foreach ($plugins_to_activate as $plugin) {
        if (!is_plugin_active($plugin) && file_exists(WP_PLUGIN_DIR . '/' . $plugin)) {
            activate_plugin($plugin);
        }
    }
});
add_action('wp_enqueue_scripts', 'yd_enqueue_assets');
function yd_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', [ 'height' => 80, 'width' => 300, 'flex-height' => true, 'flex-width' => true ]);

  register_nav_menus([
    'header_menu' => __('Header Menu', 'york-dental'),
    'footer_menu' => __('Footer Menu', 'york-dental'),
    'social'      => __('Social Menu', 'york-dental'),
  ]);
}
add_action('after_setup_theme', 'yd_theme_setup');
function yd_customize_register($wp_customize) {
  $wp_customize->add_setting('phone_number', [
    'default' => '01904 937 041',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('phone_number', [
    'label' => __('Phone number', 'york-dental'),
    'section' => 'title_tagline',
    'type' => 'text',
  ]);
  $wp_customize->add_setting('email_address', [
    'default' => 'info@theyorkdentalsuite.co.uk',
    'sanitize_callback' => 'sanitize_email',
  ]);
  $wp_customize->add_control('email_address', [
    'label' => __('Email address', 'york-dental'),
    'section' => 'title_tagline',
    'type' => 'email',
  ]);
  $wp_customize->add_setting('book_button_url', [
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('book_button_url', [
    'label' => __('"Book Now" button URL', 'york-dental'),
    'section' => 'title_tagline',
    'type' => 'url',
  ]);
}
add_action('customize_register', 'yd_customize_register');
function mytheme_customize_footer($wp_customize) {
  $wp_customize->add_section('footer_logos', [
    'title' => __('Footer Logos & Awards', 'mytheme'),
    'priority' => 160,
  ]);
  $logos = [
    'invisalign_logo' => __('Invisalign Diamond logo', 'mytheme'),
    'dental_logo'     => __('Invisalign Dental logo', 'mytheme'),
    'award_image'     => __('“Outstanding Patient” Award', 'mytheme')
  ];
  foreach ($logos as $id => $label) {
    $wp_customize->add_setting($id, ['sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize, $id, [
        'label' => $label,
        'section' => 'footer_logos',
        'settings' => $id,
      ]
    ));
  }
}
add_action('customize_register', 'mytheme_customize_footer');
function mytheme_enqueue_icons() {
  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
    [],
    null
  );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_icons' );
function mytheme_register_testimonials_cpt() {
  register_post_type('testimonial', [
    'labels' => [
      'name' => 'Testimonials',
      'singular_name' => 'Testimonial',
      'add_new_item' => 'Add New Testimonial',
      'edit_item' => 'Edit Testimonial',
      'all_items' => 'All Testimonials',
    ],
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-format-quote',
    'supports' => ['title', 'editor', 'thumbnail'],
  ]);
}
add_action('init', 'mytheme_register_testimonials_cpt');
add_action('acf/init', function() {
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title' => 'Theme Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-settings',
      'capability' => 'edit_posts',
      'redirect' => false,
    ]);
  }
});
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});
add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});