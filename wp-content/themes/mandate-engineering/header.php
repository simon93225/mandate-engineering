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
                <div class="primary-menu">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
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
                    <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>">Projects</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
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
        <div class="mt-4 pt-4 border-t border-white/10">
            <button type="button" class="capabilities-toggle" aria-expanded="true" aria-controls="mobile-capabilities-links">
                <span>Capabilities</span>
                <svg class="capabilities-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div id="mobile-capabilities-links" class="mobile-capabilities-links is-open">
                <a href="<?php echo esc_url( home_url( '/cooling-heat-transfer/' ) ); ?>">Cooling &amp; Heat Transfer</a>
                <a href="<?php echo esc_url( home_url( '/specialised-coolers/' ) ); ?>">Specialised Coolers</a>
                <a href="<?php echo esc_url( home_url( '/boilers-steam-insulation/' ) ); ?>">Boilers, Steam &amp; Insulation</a>
                <a href="<?php echo esc_url( home_url( '/process-drying-equipment/' ) ); ?>">Process &amp; Drying Equipment</a>
            </div>
        </div>
        <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>">Projects</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
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
            var isOpen = function () { return drawer.classList.contains('is-open'); };
            function setOpen(open) {
                btn.classList.toggle('is-active', open);
                drawer.classList.toggle('is-open', open);
                document.body.style.overflow = open ? 'hidden' : '';
                drawer.style.transform = '';
                drawer.classList.remove('is-dragging');
            }
            btn.addEventListener('click', function () {
                setOpen(!isOpen());
            });
            // Close drawer when clicking a link
            drawer.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    setOpen(false);
                });
            });

            // Swipe gestures: drag panel right to reveal the page behind.
            // Vertical scrolling stays native (bounded, no blank overscroll).
            var startX = 0, startY = 0, deltaX = 0, dragging = false,
                axis = null, drawerW = 0;

            drawer.addEventListener('pointerdown', function (e) {
                if (!isOpen()) return;
                startX = e.clientX;
                startY = e.clientY;
                deltaX = 0;
                axis = null;
                dragging = true;
                drawerW = drawer.offsetWidth;
                drawer.classList.add('is-dragging');
                drawer.setPointerCapture(e.pointerId);
            });

            drawer.addEventListener('pointermove', function (e) {
                if (!dragging) return;
                var dx = e.clientX - startX;
                var dy = e.clientY - startY;
                if (axis === null) {
                    if (Math.abs(dx) < 6 && Math.abs(dy) < 6) return;
                    axis = Math.abs(dx) > Math.abs(dy) ? 'x' : 'y';
                }
                if (axis !== 'x') return; // vertical → native scroll only
                // Drag right only (push aside); never left beyond the edge.
                deltaX = Math.max(0, dx);
                drawer.style.transform = 'translateX(' + deltaX + 'px)';
            });

            function endDrag(e) {
                if (!dragging) return;
                dragging = false;
                drawer.classList.remove('is-dragging');
                if (e.pointerId !== undefined) {
                    try { drawer.releasePointerCapture(e.pointerId); } catch (err) {}
                }
                if (axis === 'x' && deltaX > drawerW * 0.35) {
                    // Push fully aside then close.
                    drawer.style.transition = 'transform 0.3s var(--transition-smooth)';
                    drawer.style.transform = 'translateX(100%)';
                    setTimeout(function () {
                        drawer.style.transition = '';
                        setOpen(false);
                    }, 300);
                } else {
                    drawer.style.transition = 'transform 0.3s var(--transition-smooth)';
                    drawer.style.transform = '';
                    setTimeout(function () { drawer.style.transition = ''; }, 300);
                }
            }

            drawer.addEventListener('pointerup', endDrag);
            drawer.addEventListener('pointercancel', endDrag);
        }

        // Mobile Capabilities accordion toggle
        var capToggle = document.querySelector('.capabilities-toggle');
        var capLinks = document.getElementById('mobile-capabilities-links');
        if (capToggle && capLinks) {
            capToggle.addEventListener('click', function () {
                var isOpen = capToggle.getAttribute('aria-expanded') === 'true';
                capToggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
                capLinks.classList.toggle('is-open', !isOpen);
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
