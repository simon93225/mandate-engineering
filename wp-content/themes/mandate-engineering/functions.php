<?php
/**
 * Mandate Engineering Theme Functions and Definitions
 */

function mandate_engineering_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'mandate-gallery-card', 960, 720, true );
    
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'mandate-engineering' ),
        'footer'  => __( 'Footer Menu', 'mandate-engineering' ),
    ) );
}
add_action( 'after_setup_theme', 'mandate_engineering_setup' );

/**
 * Project portfolio content and its project-type tabs.
 */
function mandate_engineering_register_projects() {
    register_post_type( 'mandate_project', array(
        'labels' => array(
            'name'          => __( 'Projects', 'mandate-engineering' ),
            'singular_name' => __( 'Project', 'mandate-engineering' ),
            'add_new_item'  => __( 'Add New Project', 'mandate-engineering' ),
            'edit_item'     => __( 'Edit Project', 'mandate-engineering' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => array( 'slug' => 'portfolio' ),
        'menu_icon'    => 'dashicons-hammer',
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'show_in_rest' => true,
    ) );

    register_taxonomy( 'mandate_project_type', 'mandate_project', array(
        'labels' => array(
            'name'          => __( 'Project Types', 'mandate-engineering' ),
            'singular_name' => __( 'Project Type', 'mandate-engineering' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'project-type' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'mandate_engineering_register_projects' );

function mandate_engineering_seed_project_types() {
    $project_types = array( 'Heat Exchangers', 'Cooling Systems', 'Boilers & Steam Lines', 'Custom Fabrication' );

    foreach ( $project_types as $project_type ) {
        if ( ! term_exists( $project_type, 'mandate_project_type' ) ) {
            wp_insert_term( $project_type, 'mandate_project_type' );
        }
    }
}
add_action( 'init', 'mandate_engineering_seed_project_types', 20 );

function mandate_engineering_flush_project_rewrites() {
    mandate_engineering_register_projects();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mandate_engineering_flush_project_rewrites' );

/**
 * Creates the core pages once, so their templates are available in WordPress menus.
 */
function mandate_engineering_create_core_pages() {
    if ( get_option( 'mandate_engineering_core_pages_created' ) ) {
        return;
    }

    $pages = array(
        'home' => array(
            'title'    => 'Home',
            'template' => '',
        ),
        'contact' => array(
            'title'    => 'Contact',
            'template' => 'page-contact.php',
        ),
    );

    foreach ( $pages as $slug => $page ) {
        $existing_page = get_page_by_path( $slug );

        if ( $existing_page ) {
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'  => $page['title'],
            'post_name'   => $slug,
            'post_status' => 'publish',
            'post_type'   => 'page',
        ) );

        if ( ! is_wp_error( $page_id ) && $page['template'] ) {
            update_post_meta( $page_id, '_wp_page_template', $page['template'] );
        }
    }

    update_option( 'mandate_engineering_core_pages_created', 1 );
}
add_action( 'admin_init', 'mandate_engineering_create_core_pages' );

/**
 * Ensures the Home page is set as the static front page so the "Home"
 * menu item and logo link resolve to the site root instead of /home/.
 */
function mandate_engineering_ensure_home_front_page() {
    $home_page = get_page_by_path( 'home' );

    if ( ! $home_page || is_wp_error( $home_page ) ) {
        return;
    }

    if ( 'page' !== get_option( 'show_on_front' ) || (int) get_option( 'page_on_front' ) !== (int) $home_page->ID ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_page->ID );
    }
}
add_action( 'admin_init', 'mandate_engineering_ensure_home_front_page', 20 );

function mandate_engineering_create_projects_page() {
    if ( get_page_by_path( 'projects' ) ) {
        return;
    }

    $page_id = wp_insert_post( array(
        'post_title'  => 'Projects',
        'post_name'   => 'projects',
        'post_status' => 'publish',
        'post_type'   => 'page',
    ) );

    if ( ! is_wp_error( $page_id ) ) {
        update_post_meta( $page_id, '_wp_page_template', 'page-projects.php' );
    }
}
add_action( 'admin_init', 'mandate_engineering_create_projects_page' );

/**
 * Creates the four capability pages once.
 */
function mandate_engineering_create_capability_pages() {
    if ( get_option( 'mandate_engineering_capability_pages_created' ) ) {
        return;
    }

    $capabilities = array(
        'cooling-heat-transfer' => array(
            'title'    => 'Cooling & Heat Transfer',
            'template' => 'page-cooling-heat-transfer.php',
        ),
        'specialised-coolers' => array(
            'title'    => 'Specialised Coolers',
            'template' => 'page-specialised-coolers.php',
        ),
        'boilers-steam-insulation' => array(
            'title'    => 'Boilers, Steam & Insulation',
            'template' => 'page-boilers-steam-insulation.php',
        ),
        'process-drying-equipment' => array(
            'title'    => 'Process & Drying Equipment',
            'template' => 'page-process-drying-equipment.php',
        ),
    );

    foreach ( $capabilities as $slug => $page ) {
        $existing_page = get_page_by_path( $slug );

        if ( $existing_page ) {
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'  => $page['title'],
            'post_name'   => $slug,
            'post_status' => 'publish',
            'post_type'   => 'page',
        ) );

        if ( ! is_wp_error( $page_id ) && $page['template'] ) {
            update_post_meta( $page_id, '_wp_page_template', $page['template'] );
        }
    }

    update_option( 'mandate_engineering_capability_pages_created', 1 );
}
add_action( 'init', 'mandate_engineering_create_capability_pages', 20 );

function mandate_engineering_get_projects_page_url() {
    $projects_page = get_page_by_path( 'projects' );

    return $projects_page ? get_permalink( $projects_page ) : home_url( '/projects/' );
}

function mandate_engineering_add_projects_to_primary_menu() {
    $projects_page = get_page_by_path( 'projects' );
    if ( ! $projects_page ) {
        return;
    }

    $locations = get_nav_menu_locations();
    $menu_id   = ! empty( $locations['primary'] ) ? (int) $locations['primary'] : 0;

    if ( ! $menu_id ) {
        $menu = wp_get_nav_menu_object( 'Primary Menu' );
        $menu_id = $menu ? (int) $menu->term_id : wp_create_nav_menu( 'Primary Menu' );

        if ( is_wp_error( $menu_id ) ) {
            return;
        }

        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );

        foreach ( array( 'home' => 'Home', 'contact' => 'Contact' ) as $slug => $title ) {
            $page = get_page_by_path( $slug );
            if ( $page ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
        }
    }

    $items = wp_get_nav_menu_items( $menu_id );
    foreach ( (array) $items as $item ) {
        if ( 'page' === $item->object && (int) $projects_page->ID === (int) $item->object_id ) {
            return;
        }
    }

    wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title'     => 'Projects',
        'menu-item-object-id' => $projects_page->ID,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
    ) );
}
add_action( 'admin_init', 'mandate_engineering_add_projects_to_primary_menu', 40 );

function mandate_engineering_flush_rewrites_once() {
    if ( get_option( 'mandate_engineering_rewrites_flushed_v2' ) ) {
        return;
    }

    flush_rewrite_rules();
    update_option( 'mandate_engineering_rewrites_flushed_v2', 1 );
}
add_action( 'admin_init', 'mandate_engineering_flush_rewrites_once', 30 );

/**
 * Processes public contact enquiries and sends them to the WordPress site administrator.
 */
function mandate_engineering_handle_contact_form() {
    $contact_url = home_url( '/contact/' );

    if ( ! isset( $_POST['mandate_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mandate_contact_nonce'] ) ), 'mandate_contact_form' ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'invalid', $contact_url ) );
        exit;
    }

    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'sent', $contact_url ) );
        exit;
    }

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $service = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( '' === $name || ! is_email( $email ) || '' === $message ) {
        wp_safe_redirect( add_query_arg( 'contact', 'invalid', $contact_url ) );
        exit;
    }

    $subject = sprintf( '[Mandate Engineering] New enquiry from %s', $name );
    $body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nService: {$service}\n\nMessage:\n{$message}";
    $sent    = wp_mail( get_option( 'admin_email' ), $subject, $body, array( "Reply-To: {$name} <{$email}>" ) );

    wp_safe_redirect( add_query_arg( 'contact', $sent ? 'sent' : 'error', $contact_url ) );
    exit;
}
add_action( 'admin_post_nopriv_mandate_contact_form', 'mandate_engineering_handle_contact_form' );
add_action( 'admin_post_mandate_contact_form', 'mandate_engineering_handle_contact_form' );

/**
 * Returns images attached to the page currently being viewed for the project gallery.
 */
function mandate_engineering_get_gallery_images() {
    if ( ! is_singular() ) {
        return array();
    }

    return get_attached_media( 'image', get_queried_object_id() );
}

/**
 * Returns the heat exchanger workshop gallery (static, pre-optimised images).
 * Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_heat_exchanger_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/heat-exchangers/';
    $files = array(
        '2019_02_25_09_39_IMG_8426.jpg' => 'Heat exchanger manufactured by Mandate Engineering',
        '2019_02_25_11_27_IMG_8420.jpg' => 'Heat exchanger fabrication in our workshop',
        '2019_02_25_14_35_IMG_8419.jpg' => 'Heat exchanger tube bundle and casing',
        '2019_02_26_11_54_IMG_8416.jpg' => 'Heat exchanger under construction',
        '2019_02_26_12_19_IMG_8414.jpg' => 'Heat exchanger assembly in the workshop',
        '2019_03_01_09_38_IMG_8399.jpg' => 'Heat exchanger fabrication work',
        '2019_03_01_09_38_IMG_8400.jpg' => 'Heat exchanger production line',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Returns the transport services gallery (radiators & transmission coolers).
 * Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_transport_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/transport/';
    $files = array(
        '2026-08-17_at_23_14_40_(1)_jpeg.jpg' => 'Radiator and transmission cooler work by Mandate Engineering',
        '2026-08-17_at_23_14_40_(2)_jpeg.jpg' => 'Transport cooling equipment in the workshop',
        '2026-08-17_at_23_14_40_jpeg.jpg'     => 'Radiator manufactured for transport applications',
        '2026-08-17_at_23_14_41_(1)_jpeg.jpg' => 'Transmission cooler assembly',
        '2026-08-17_at_23_14_41_(2)_jpeg.jpg' => 'Radiator core and cooling unit',
        '2026-08-17_at_23_14_41_jpeg.jpg'     => 'Transport radiator in production',
        '2026-08-17_at_23_14_42_(1)_jpeg.jpg' => 'Heavy-duty transport cooler',
        '2026-08-17_at_23_14_42_(2)_jpeg.jpg' => 'Radiator and cooler fabrication',
        '2026-08-17_at_23_14_42_(3)_jpeg.jpg' => 'Transmission and oil cooler work',
        '2026-08-17_at_23_14_42_jpeg.jpg'     => 'Radiator built for transport equipment',
        '2026-08-17_at_23_14_43_jpeg.jpg'     => 'Transport cooling systems in the workshop',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Returns the mining services gallery (GHH, Demagogue & Gryasphere coolers).
 * Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_mining_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/mining/';
    $files = array(
        '2026-08-17_at_23_19_23_(1)_jpeg.jpg' => 'Mining cooler reconditioning by Mandate Engineering',
        '2026-08-17_at_23_19_23_jpeg.jpg'     => 'Mining radiator and cooler in the workshop',
        '2026-08-17_at_23_19_24_(1)_jpeg.jpg' => 'GHH cooler refurbishment work',
        '2026-08-17_at_23_19_24_(2)_jpeg.jpg' => 'Underground mining cooling equipment',
        '2026-08-17_at_23_19_24_jpeg.jpg'     => 'Mining cooler core and casing',
        '2026-08-17_at_23_19_25_(1)_jpeg.jpg' => 'Demagogue cooler service and repair',
        '2026-08-17_at_23_19_25_(2)_jpeg.jpg' => 'Gryasphere cooler for mining applications',
        '2026-08-17_at_23_19_25_(3)_jpeg.jpg' => 'Mining cooler in production',
        '2026-08-17_at_23_19_25_jpeg.jpg'     => 'Mining equipment cooler assembly',
        '2026-08-17_at_23_19_26_(1)_jpeg.jpg' => 'Cooler reconditioned for the mining industry',
        '2026-08-17_at_23_19_26_(2)_jpeg.jpg' => 'Underground loader cooler repair',
        '2026-08-17_at_23_19_26_jpeg.jpg'     => 'Heavy-duty mining cooler',
        '2026-08-17_at_23_19_27_(1)_jpeg.jpg' => 'Mining cooler fabrication and reconditioning',
        '2026-08-17_at_23_19_27_jpeg.jpg'     => 'Cooling units for mining machinery',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Top customers and clients. Each entry: array( 'name', 'industry', 'location' ).
 */
function mandate_engineering_get_customers() {
    $base = get_template_directory_uri() . '/assets/images/clients/';
    return array(
        array(
            'name'     => 'Goldstar Sugars',
            'logo'     => $base . 'goldstar.png',
            'industry' => 'Sugar Manufacturing',
            'location' => 'Harare, Zimbabwe',
        ),
        array(
            'name'     => 'Freda Rebecca Gold Mine',
            'logo'     => $base . 'mutapa-gold.png',
            'industry' => 'Gold Mining',
            'location' => 'Bindura, Zimbabwe',
        ),
        array(
            'name'     => 'Tanganda Tea',
            'logo'     => $base . 'tanganda-tea.png',
            'industry' => 'Agriculture & Beverage Processing',
            'location' => 'Mutare, Zimbabwe',
        ),
        array(
            'name'     => 'How Mine',
            'logo'     => $base . 'namib.png',
            'industry' => 'Gold Mining',
            'location' => 'Bulawayo, Zimbabwe',
        ),
        array(
            'name'     => 'Zimplats',
            'logo'     => $base . 'zimplats.png',
            'industry' => 'Platinum Group Metals Mining',
            'location' => 'Selous, Zimbabwe',
        ),
        array(
            'name'     => 'Mimosa Mining Company',
            'logo'     => $base . 'mimosa.png',
            'industry' => 'Platinum Group Metals Mining',
            'location' => 'Zvishavane, Zimbabwe',
        ),
        array(
            'name'     => 'CAFCA',
            'logo'     => $base . 'cafca.png',
            'industry' => 'Cable & Electrical Products',
            'location' => 'Harare, Zimbabwe',
        ),
        array(
            'name'     => 'Shamva Gold Mine',
            'logo'     => $base . 'mutapa-gold.png',
            'industry' => 'Gold Mining',
            'location' => 'Shamva, Zimbabwe',
        ),
        array(
            'name'     => 'Tobacco Processors Zimbabwe',
            'logo'     => $base . 'tpz.png',
            'industry' => 'Tobacco Processing',
            'location' => 'Harare, Zimbabwe',
        ),
        array(
            'name'     => 'ZLT Tobacco',
            'logo'     => $base . 'zlt.png',
            'industry' => 'Tobacco Processing',
            'location' => 'Harare, Zimbabwe',
        ),
        array(
            'name'     => 'ZPC — Zimbabwe Power Company',
            'logo'     => $base . 'zpc.png',
            'industry' => 'Power Generation',
            'location' => 'Harare, Zimbabwe',
        ),
        array(
            'name'     => 'Hwange Colliery Company',
            'logo'     => $base . 'hwange-colliery.png',
            'industry' => 'Coal Mining',
            'location' => 'Hwange, Zimbabwe',
        ),
    );
}

/**
 * Client testimonials. Each entry: array( 'quote', 'name', 'role', 'company' ).
 */
function mandate_engineering_get_testimonials() {
    return array(
        array(
            'quote'   => 'From heat exchangers to steam insulation, the team handled our requirements with precision and professionalism. [Draft — replace with real quote]',
            'name'    => 'Client Representative',
            'role'    => 'Plant Manager',
            'company' => 'ZPC',
        ),
    );
}

/**
 * Returns the insulation gallery (lagging & cladding of ducts and steam pipes,
 * hot and cold insulation). Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_insulation_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/insulation/';
    $files = array(
        '2026-08-17_at_23_36_30_(1)_jpeg.jpg' => 'Lagging and cladding of steam pipes',
        '2026-08-17_at_23_36_30_jpeg.jpg'     => 'Insulation work on industrial ducts',
        '2026-08-17_at_23_36_31_(1)_jpeg.jpg' => 'Cold insulation application on pipes',
        '2026-08-17_at_23_36_31_(2)_jpeg.jpg' => 'Lagging and cladding of ducts',
        '2026-08-17_at_23_36_31_(3)_jpeg.jpg' => 'Steam pipe lagging and cladding work',
        '2026-08-17_at_23_36_31_jpeg.jpg'     => 'Hot and cold insulation in the workshop',
        '2026-08-17_at_23_36_32_(1)_jpeg.jpg' => 'Cladding of steam lines and ducts',
        '2026-08-17_at_23_36_32_(2)_jpeg.jpg' => 'Insulation lagging on industrial piping',
        '2026-08-17_at_23_36_32_(3)_jpeg.jpg' => 'Duct lagging and cladding installation',
        '2026-08-17_at_23_36_32_jpeg.jpg'     => 'Cold insulation of chilled lines',
        '2026-08-17_at_23_36_33_(1)_jpeg.jpg' => 'Pipe insulation and metal cladding',
        '2026-08-17_at_23_36_33_(2)_jpeg.jpg' => 'Lagging and cladding of large ducts',
        '2026-08-17_at_23_36_33_jpeg.jpg'     => 'Steam line insulation and cladding',
        '2026-08-17_at_23_36_34_(1)_jpeg.jpg' => 'Cold insulation on process piping',
        '2026-08-17_at_23_36_34_(2)_jpeg.jpg' => 'Industrial insulation finishing work',
        '2026-08-17_at_23_36_34_jpeg.jpg'     => 'Lagging and cladding of pipes and ducts',
        '2026-08-17_at_23_36_35_(1)_jpeg.jpg' => 'Insulation cladding in progress',
        '2026-08-17_at_23_36_35_(2)_jpeg.jpg' => 'Completed lagging and cladding project',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Returns the cooling coils gallery. Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_coils_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/coils/';
    $files = array(
        '2026-08-17_at_23_37_09_(1)_jpeg.jpg' => 'Cooling coil manufactured by Mandate Engineering',
        '2026-08-17_at_23_37_09_jpeg.jpg'     => 'Cooling coil assembly in the workshop',
        '2026-08-17_at_23_37_10_(1)_jpeg.jpg' => 'Cooling coil fabrication work',
        '2026-08-17_at_23_37_10_(2)_jpeg.jpg' => 'Cooling coil built for process applications',
        '2026-08-17_at_23_37_10_(3)_jpeg.jpg' => 'Cooling coil under construction',
        '2026-08-17_at_23_37_10_jpeg.jpg'     => 'Cooling coil production',
        '2026-08-17_at_23_37_11_(1)_jpeg.jpg' => 'Cooling coil core and finning',
        '2026-08-17_at_23_37_11_(2)_jpeg.jpg' => 'Cooling coil for industrial cooling',
        '2026-08-17_at_23_37_11_jpeg.jpg'     => 'Cooling coil completed in the workshop',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Returns the condensers & evaporators gallery. Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_condensers_gallery() {
    $base = get_template_directory_uri() . '/assets/images/gallery/condensers/';
    $files = array(
        '2026-08-17_at_23_37_23_(1)_jpeg.jpg' => 'Condenser manufactured by Mandate Engineering',
        '2026-08-17_at_23_37_23_(2)_jpeg.jpg' => 'Condenser and evaporator fabrication in the workshop',
        '2026-08-17_at_23_37_23_jpeg.jpg'     => 'Condenser unit under construction',
        '2026-08-17_at_23_37_24_(1)_jpeg.jpg' => 'Evaporator built for process cooling',
        '2026-08-17_at_23_37_24_(2)_jpeg.jpg' => 'Condenser assembly work',
        '2026-08-17_at_23_37_24_(3)_jpeg.jpg' => 'Condenser and evaporator in production',
        '2026-08-17_at_23_37_24_jpeg.jpg'     => 'Evaporator fabrication work',
        '2026-08-17_at_23_37_25_jpeg.jpg'     => 'Condenser completed in the workshop',
    );

    $gallery = array();
    foreach ( $files as $file => $alt ) {
        $gallery[] = array(
            'url'  => $base . $file,
            'full' => $base . $file,
            'alt'  => $alt,
        );
    }

    return $gallery;
}

/**
 * Returns the three featured workshop images picked from across all
 * service galleries (one per product line). Each entry: array( 'url', 'full', 'alt' ).
 */
function mandate_engineering_get_featured_workshop_gallery() {
    $gallery_uri = get_template_directory_uri() . '/assets/images/gallery/';
    return array(
        array(
            'url'  => $gallery_uri . 'heat-exchangers/2019_02_25_14_35_IMG_8419.jpg',
            'full' => $gallery_uri . 'heat-exchangers/2019_02_25_14_35_IMG_8419.jpg',
            'alt'  => 'Heat exchanger tube bundle and casing',
        ),
        array(
            'url'  => $gallery_uri . 'transport/2026-08-17_at_23_14_43_jpeg.jpg',
            'full' => $gallery_uri . 'transport/2026-08-17_at_23_14_43_jpeg.jpg',
            'alt'  => 'Transport cooling systems in the workshop',
        ),
        array(
            'url'  => $gallery_uri . 'mining/2026-08-17_at_23_19_25_(1)_jpeg.jpg',
            'full' => $gallery_uri . 'mining/2026-08-17_at_23_19_25_(1)_jpeg.jpg',
            'alt'  => 'Demagogue cooler service and repair',
        ),
    );
}

function mandate_engineering_scripts() {
    // Google Fonts: Outfit (headings) + Inter (body)
    wp_enqueue_style(
        'mandate-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style( 'mandate-style', get_stylesheet_uri(), array( 'mandate-google-fonts' ), '2.0.0' );
}
add_action( 'wp_enqueue_scripts', 'mandate_engineering_scripts' );

/**
 * Returns the meta description for the page currently being viewed.
 */
function mandate_engineering_get_meta_description() {
    $description = '';

    if ( is_front_page() ) {
        $description = 'Mandate Engineering is a Zimbabwe-based engineering company manufacturing, servicing, and repairing heat-transfer equipment, boilers, steam lines, coolers, radiators, and custom metalwork since 1998.';
    } elseif ( is_singular() ) {
        $post = get_queried_object();
        if ( $post && ! empty( $post->post_excerpt ) ) {
            $description = $post->post_excerpt;
        } elseif ( $post && ! empty( $post->post_content ) ) {
            $description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ), 30, '' );
        }
    } elseif ( is_archive() ) {
        $description = 'A look at the cooling, heat-transfer, boiler, steam, and fabrication projects completed by Mandate Engineering.';
    }

    if ( '' === $description ) {
        $description = 'Mandate Engineering provides manufacturing, servicing, and repair of heat-transfer equipment, boilers, steam lines, and custom metalwork across Zimbabwe since 1998.';
    }

    return $description;
}

/**
 * Outputs SEO meta tags: description, canonical, Open Graph and Twitter Card.
 */
function mandate_engineering_seo_meta() {
    $title       = wp_get_document_title();
    $description = mandate_engineering_get_meta_description();
    $url         = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
    $image       = get_stylesheet_directory_uri() . '/assets/images/hero-bg-hd.jpg';

    if ( is_singular() && has_post_thumbnail() ) {
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        if ( $thumbnail ) {
            $image = $thumbnail[0];
        }
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">
    <link rel="canonical" href="<?php echo esc_url( $url ); ?>">

    <meta property="og:type" content="<?php echo is_singular( 'mandate_project' ) ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
    <meta property="og:locale" content="en_ZW">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
    <?php
}
add_action( 'wp_head', 'mandate_engineering_seo_meta', 5 );

/**
 * Outputs Organization structured data (JSON-LD) for rich results.
 */
function mandate_engineering_schema_org() {
    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'Organization',
        'name'          => 'Mandate Engineering',
        'url'           => home_url( '/' ),
        'logo'          => get_stylesheet_directory_uri() . '/assets/favicon.svg',
        'foundingDate'  => '1998',
        'email'         => 'info@mandateengineering.co.zw',
        'telephone'     => '+263242123456',
        'description'   => mandate_engineering_get_meta_description(),
        'address'       => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '179 Erith Road',
            'addressLocality' => 'Harare',
            'addressCountry'  => 'ZW',
        ),
        'areaServed'    => array(
            array( '@type' => 'Country', 'name' => 'Zimbabwe' ),
            array( '@type' => 'Country', 'name' => 'Zambia' ),
            array( '@type' => 'Country', 'name' => 'South Africa' ),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'mandate_engineering_schema_org', 6 );

/**
 * Provides a robots.txt via the WordPress virtual endpoint and
 * points crawlers at the built-in XML sitemap.
 */
function mandate_engineering_robots_txt( $output, $public ) {
    if ( ! $public ) {
        return $output;
    }

    $lines = array(
        'User-agent: *',
        'Disallow: /wp-admin/',
        'Disallow: /wp-includes/',
        'Disallow: /?s=',
        'Disallow: /xmlrpc.php',
        '',
        'Sitemap: ' . home_url( '/wp-sitemap.xml' ),
        '',
    );

    return implode( "\n", $lines );
}
add_filter( 'robots_txt', 'mandate_engineering_robots_txt', 10, 2 );

/**
 * WordPress security hardening.
 */

// Disable XML-RPC entirely (blocks brute-force amplification vectors).
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', function ( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );

// Hide which field was wrong on the login form (no user enumeration via errors).
add_filter( 'login_errors', function () {
    return __( 'Invalid username or password.', 'mandate-engineering' );
} );

// Block the classic ?author=ID user-enumeration trick.
add_action( 'template_redirect', function () {
    if ( isset( $_GET['author'] ) && preg_match( '/^\d+$/', $_GET['author'] ) ) {
        wp_safe_redirect( home_url( '/' ), 301 );
        exit;
    }
} );

// Block unauthenticated access to the REST users endpoint (/wp-json/wp/v2/users).
add_filter( 'rest_authentication_errors', function ( $result ) {
    if ( ! is_user_logged_in() && false !== strpos( $_SERVER['REQUEST_URI'], '/wp/v2/users' ) ) {
        return new WP_Error( 'rest_forbidden', __( 'Sorry, you are not allowed to do that.', 'mandate-engineering' ), array( 'status' => 403 ) );
    }
    return $result;
} );

// Prevent search engines from indexing the login/admin screens.
add_action( 'login_head', function () {
    echo '<meta name="robots" content="noindex, nofollow">' . "\n";
} );
add_action( 'admin_head', function () {
    echo '<meta name="robots" content="noindex, nofollow">' . "\n";
} );

/**
 * Injects Tailwind v3 Play CDN script and config into <head>.
 */
function mandate_engineering_tailwind_cdn() {
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'brand-emerald': '#2ECC71',
                    'brand-emerald-dim': '#169653',
                    'brand-navy-deep': '#0A1A33',
                    'brand-navy': '#112E5A',
                    'brand-navy-mid': '#1A3A6B',
                    'brand-navy-light': '#23457E',
                    'brand-amber': '#FFB300',
                    'brand-blue-accent': '#629FD8',
                },
                fontFamily: {
                    heading: ['Outfit', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    body: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                },
            },
        },
    }
    </script>
    <?php
}
add_action( 'wp_head', 'mandate_engineering_tailwind_cdn', 1 );

