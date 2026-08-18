<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/favicon.svg' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="font-body antialiased text-white bg-brand-navy-deep min-h-screen">
    <!-- Header with Glassmorphic Navigation -->
    <header id="site-header" class="site-header fixed top-0 w-full z-50 py-5 transition-all duration-500">
        <div class="container mx-auto px-6 md:px-10 flex justify-between items-center">
            <a href="<?php echo home_url(); ?>" class="logo-link flex items-center gap-3 relative z-[60]">
                <div class="h-10 relative flex items-center justify-center">
                    <svg viewBox="0 0 465 120" class="logo-svg h-full w-auto" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 10 110 L 100 10 L 125 10 L 35 110 Z" fill="#169653" />
                        <path d="M 35 110 L 112.5 25 L 190 110 L 155 110 L 112.5 65 L 65 110 Z" fill="#76D799" />
                        <path d="M 145 10 L 180 10 L 232.5 70 L 285 10 L 320 10 L 232.5 110 Z" fill="#112E5A" />
                        <polygon points="185,10 280,10 232.5,65" fill="#112E5A" />
                        <polygon points="193,15 272,15 232.5,58" fill="#629FD8" />
                        <path d="M 455 110 L 365 10 L 340 10 L 430 110 Z" fill="#169653" />
                        <path d="M 430 110 L 352.5 25 L 275 110 L 310 110 L 352.5 65 L 400 110 Z" fill="#2ECC71" />
                    </svg>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-2 font-medium">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'primary-menu',
                        'fallback_cb'    => false,
                    ) );
                    ?>
                <?php else : ?>
                    <div class="primary-menu">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
                        <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>">Projects</a>
                    </div>
                <?php endif; ?>
                <div class="services-menu">
                    <button type="button" class="services-menu-trigger" aria-haspopup="true">
                        Capabilities
                        <svg class="w-3.5 h-3.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="services-submenu">
                        <a href="<?php echo esc_url( home_url( '/cooling-heat-transfer/' ) ); ?>">Cooling &amp; Heat Transfer</a>
                        <a href="<?php echo esc_url( home_url( '/specialised-coolers/' ) ); ?>">Specialised Coolers</a>
                        <a href="<?php echo esc_url( home_url( '/boilers-steam-insulation/' ) ); ?>">Boilers, Steam &amp; Insulation</a>
                        <a href="<?php echo esc_url( home_url( '/process-drying-equipment/' ) ); ?>">Process &amp; Drying Equipment</a>
                    </div>
                </div>
                <div class="flex items-center gap-4 ml-4">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-glow px-6 py-2.5 rounded-lg font-heading font-bold text-sm bg-brand-emerald text-brand-navy-deep hover:bg-[#169653] transition-all duration-300">Request Quote</a>
                </div>
            </nav>

            <!-- Mobile Hamburger Button -->
            <button type="button" id="mobile-menu-btn" class="hamburger-btn lg:hidden" aria-label="Toggle navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Mobile Drawer -->
    <div id="mobile-drawer" class="mobile-drawer">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>">Projects</a>
        <div class="mt-4 pt-4 border-t border-white/10">
            <p class="px-4 py-2 text-xs font-heading font-bold uppercase tracking-widest text-brand-emerald mb-2">Capabilities</p>
            <a href="<?php echo esc_url( home_url( '/cooling-heat-transfer/' ) ); ?>">Cooling &amp; Heat Transfer</a>
            <a href="<?php echo esc_url( home_url( '/specialised-coolers/' ) ); ?>">Specialised Coolers</a>
            <a href="<?php echo esc_url( home_url( '/boilers-steam-insulation/' ) ); ?>">Boilers, Steam &amp; Insulation</a>
            <a href="<?php echo esc_url( home_url( '/process-drying-equipment/' ) ); ?>">Process &amp; Drying Equipment</a>
        </div>
        <div class="mobile-cta mt-6">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-block px-8 py-3.5 rounded-lg font-heading font-bold bg-brand-emerald text-brand-navy-deep hover:bg-[#169653] transition-colors">Request a Quote</a>
        </div>
    </div>

    <script>
    (function () {
        // Flag that JS is active so scroll animations can fail open.
        document.documentElement.classList.add('js');

        // Header scroll effect
        var header = document.getElementById('site-header');
        if (header) {
            function updateHeader() {
                header.classList.toggle('is-scrolled', window.scrollY > 24);
            }
            updateHeader();
            window.addEventListener('scroll', updateHeader, { passive: true });
        }

        // Mobile menu toggle
        var btn = document.getElementById('mobile-menu-btn');
        var drawer = document.getElementById('mobile-drawer');
        if (btn && drawer) {
            btn.addEventListener('click', function () {
                btn.classList.toggle('is-active');
                drawer.classList.toggle('is-open');
                document.body.style.overflow = drawer.classList.contains('is-open') ? 'hidden' : '';
            });
            // Close drawer when clicking a link
            drawer.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    btn.classList.remove('is-active');
                    drawer.classList.remove('is-open');
                    document.body.style.overflow = '';
                });
            });
        }

        // Scroll-triggered animations via IntersectionObserver
        function initScrollAnimations() {
            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

                document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
                    observer.observe(el);
                });
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initScrollAnimations);
        } else {
            initScrollAnimations();
        }
    }());
    </script>
