<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="announcement-bar">
    <span>✨</span> Discover Your Dream Property with Estatein
    <a href="<?php echo esc_url(home_url('/')); ?>">Learn More</a>
    <button class="close-bar" aria-label="Close">×</button>
</div>

<header class="site-header">
    <nav class="nav-wrapper">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <?php echo estatein_logo_svg(); ?>
            Estatein
        </a>

        <button class="menu-toggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="primary-nav">
            <li><a href="<?php echo esc_url(home_url('/')); ?>" <?php echo is_front_page() ? 'class="current-menu-item"' : ''; ?>>Home</a></li>
            <li><a href="<?php echo esc_url(home_url('/about-us')); ?>" <?php echo is_page('about-us') ? 'class="current-menu-item"' : ''; ?>>About Us</a></li>
            <li><a href="<?php echo esc_url(home_url('/properties')); ?>" <?php echo (is_page('properties') || is_singular('property')) ? 'class="current-menu-item"' : ''; ?>>Properties</a></li>
            <li><a href="<?php echo esc_url(home_url('/services')); ?>" <?php echo is_page('services') ? 'class="current-menu-item"' : ''; ?>>Services</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="nav-cta" <?php echo is_page('contact-us') ? 'class="current-menu-item"' : ''; ?>>Contact Us</a></li>
        </ul>
    </nav>
</header>
