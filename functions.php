<?php

require_once get_template_directory() . '/inc/form-handlers.php';

function estatein_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    register_nav_menus([
        'primary' => __('Primary Menu', 'estatein'),
        'footer'  => __('Footer Menu', 'estatein'),
    ]);
}
add_action('after_setup_theme', 'estatein_setup');

function estatein_scripts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap', [], null);
    wp_enqueue_style('estatein-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.0');
    wp_enqueue_script('estatein-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'estatein_scripts');

function estatein_register_property_cpt() {
    register_post_type('property', [
        'labels' => [
            'name'               => 'Properties',
            'singular_name'      => 'Property',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Property',
            'edit_item'          => 'Edit Property',
            'new_item'           => 'New Property',
            'view_item'          => 'View Property',
            'search_items'       => 'Search Properties',
            'not_found'          => 'No properties found',
            'not_found_in_trash' => 'No properties found in Trash',
        ],
        'public'            => true,
        'has_archive'       => true,
        'rewrite'           => ['slug' => 'properties'],
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'         => 'dashicons-building',
        'show_in_rest'      => true,
    ]);
}
add_action('init', 'estatein_register_property_cpt');

function estatein_register_testimonial_cpt() {
    register_post_type('testimonial', [
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor', 'thumbnail'],
        'menu_icon'    => 'dashicons-format-quote',
        'show_in_rest' => true,
    ]);
}
add_action('init', 'estatein_register_testimonial_cpt');

function estatein_register_team_cpt() {
    register_post_type('team_member', [
        'labels' => [
            'name'          => 'Team Members',
            'singular_name' => 'Team Member',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'thumbnail'],
        'menu_icon'    => 'dashicons-groups',
        'show_in_rest' => true,
    ]);
}
add_action('init', 'estatein_register_team_cpt');

function estatein_register_faq_cpt() {
    register_post_type('faq', [
        'labels' => [
            'name'          => 'FAQs',
            'singular_name' => 'FAQ',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor'],
        'menu_icon'    => 'dashicons-editor-help',
        'show_in_rest' => true,
    ]);
}
add_action('init', 'estatein_register_faq_cpt');

function estatein_get_field($key, $post_id = null) {
    if (function_exists('get_field')) {
        return get_field($key, $post_id);
    }
    return get_post_meta($post_id ?: get_the_ID(), $key, true);
}

function estatein_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key'    => 'group_property',
        'title'  => 'Property Details',
        'fields' => [
            ['key' => 'field_price',      'label' => 'Price',       'name' => 'price',       'type' => 'text'],
            ['key' => 'field_bedrooms',   'label' => 'Bedrooms',    'name' => 'bedrooms',    'type' => 'number'],
            ['key' => 'field_bathrooms',  'label' => 'Bathrooms',   'name' => 'bathrooms',   'type' => 'number'],
            ['key' => 'field_area',       'label' => 'Area (sqft)', 'name' => 'area',        'type' => 'text'],
            ['key' => 'field_location',   'label' => 'Location',    'name' => 'location',    'type' => 'text'],
            ['key' => 'field_type',       'label' => 'Type',        'name' => 'property_type', 'type' => 'select',
             'choices' => ['Villa' => 'Villa', 'Apartment' => 'Apartment', 'Cottage' => 'Cottage', 'Townhouse' => 'Townhouse']],
            ['key' => 'field_category_label', 'label' => 'Category Label', 'name' => 'category_label', 'type' => 'text'],
            ['key' => 'field_featured',   'label' => 'Featured',    'name' => 'featured',    'type' => 'true_false'],
            ['key' => 'field_amenities',  'label' => 'Amenities',   'name' => 'amenities',   'type' => 'textarea'],
            ['key' => 'field_transfer_tax','label' => 'Transfer Tax','name' => 'transfer_tax','type' => 'text'],
            ['key' => 'field_legal_fees', 'label' => 'Legal Fees',  'name' => 'legal_fees',  'type' => 'text'],
            ['key' => 'field_inspection', 'label' => 'Home Inspection','name' => 'inspection','type' => 'text'],
            ['key' => 'field_insurance',  'label' => 'Insurance',   'name' => 'insurance',   'type' => 'text'],
            ['key' => 'field_prop_tax',   'label' => 'Monthly Tax', 'name' => 'monthly_tax', 'type' => 'text'],
            ['key' => 'field_hoa',        'label' => 'HOA Fee',     'name' => 'hoa_fee',     'type' => 'text'],
            ['key' => 'field_down_payment','label' => 'Down Payment','name' => 'down_payment','type' => 'text'],
        ],
        'location' => [[ ['param' => 'post_type', 'operator' => '==', 'value' => 'property'] ]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_testimonial',
        'title'  => 'Testimonial Details',
        'fields' => [
            ['key' => 'field_author_name',     'label' => 'Author Name',     'name' => 'author_name',     'type' => 'text'],
            ['key' => 'field_author_location', 'label' => 'Author Location', 'name' => 'author_location', 'type' => 'text'],
            ['key' => 'field_rating',          'label' => 'Rating',          'name' => 'rating',          'type' => 'number'],
        ],
        'location' => [[ ['param' => 'post_type', 'operator' => '==', 'value' => 'testimonial'] ]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_team',
        'title'  => 'Team Member Details',
        'fields' => [
            ['key' => 'field_role',         'label' => 'Role',         'name' => 'role',         'type' => 'text'],
            ['key' => 'field_twitter_url',  'label' => 'Twitter URL',  'name' => 'twitter_url',  'type' => 'url'],
            ['key' => 'field_linkedin_url', 'label' => 'LinkedIn URL', 'name' => 'linkedin_url', 'type' => 'url'],
        ],
        'location' => [[ ['param' => 'post_type', 'operator' => '==', 'value' => 'team_member'] ]],
    ]);
}
add_action('acf/init', 'estatein_acf_fields');

function estatein_stars($rating = 5) {
    $html = '<div class="stars">';
    for ($i = 0; $i < $rating; $i++) {
        $html .= '★';
    }
    $html .= '</div>';
    return $html;
}

function estatein_logo_svg() {
    return '<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 2L4 10v20h8v-8h8v8h8V10L16 2z" fill="#703BF7"/>
        <path d="M12 18h8M12 14h8" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
    </svg>';
}
