<?php
/**
 * Template Name: Mandate Engineering Home
 */
get_header();
?>

    <!-- Hero Section -->
    <section class="hero-section relative min-h-screen flex items-center pt-20 bg-brand-navy-deep text-white blueprint-grid">
        <div class="absolute inset-0 z-0">
            <picture class="block w-full h-full">
                <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg-mobile.jpg' ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg-hd.jpg' ); ?>" alt="Mandate Engineering team at work in the workshop" class="w-full h-full object-cover" style="filter: brightness(0.35) contrast(1.1) saturate(0.9);" fetchpriority="high">
            </picture>
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#0A1A33]/80 via-[#0A1A33]/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0A1A33] via-transparent to-transparent"></div>
        </div>

        <!-- Floating geometric shapes -->
        <div class="hero-geo-shape hero-geo-shape--1"></div>
        <div class="hero-geo-shape hero-geo-shape--2"></div>
        <div class="hero-geo-shape hero-geo-shape--3"></div>

        <div class="hero-content container mx-auto px-6 md:px-10 relative z-10 max-w-6xl">
            <div class="hero-eyebrow inline-flex flex-wrap items-center justify-center gap-3 px-5 py-2.5 mb-8 border border-brand-emerald/30 text-brand-emerald rounded-full uppercase tracking-widest text-xs font-bold bg-brand-emerald/5 backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-brand-emerald animate-pulse"></span>
                ESTABLISHED 1998 • HARARE • BULAWAYO • ZAMBIA
            </div>
            <h1 class="hero-title text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-heading font-extrabold leading-none mb-8 tracking-tight">
                KEEP INDUSTRY <br/><span class="text-brand-emerald" style="text-shadow: 0 0 40px rgba(0, 230, 118, 0.25);">MOVING.</span>
            </h1>
            <p class="hero-copy text-lg md:text-xl lg:text-2xl text-slate-300 mb-12 max-w-3xl leading-relaxed font-light">
                We manufacture, service, and repair cooling and heat-transfer equipment, boilers, steam lines, radiators, and custom metalwork — precision engineering that keeps Zimbabwe's industry running, since 1998.
            </p>
            <div class="hero-actions flex flex-col sm:flex-row gap-4 sm:gap-5">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="button-primary px-8 py-4 rounded-lg font-heading font-bold text-lg bg-brand-emerald text-brand-navy-deep hover:bg-[#169653] transition-all duration-300 text-center">Request a Quote</a>
                <a href="#capabilities" class="button-secondary px-8 py-4 rounded-lg font-heading font-bold text-lg text-white bg-white/5 hover:bg-white/10 transition-all duration-300 flex items-center justify-center gap-3">
                    Explore Capabilities
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Bottom gradient fade -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-brand-navy-deep to-transparent z-10 pointer-events-none"></div>
    </section>

    <!-- Why Choose Us -->
    <section id="about" class="trust-section py-20 md:py-28 relative blueprint-grid-dark">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 md:mb-20 max-w-3xl mx-auto">
                <div class="section-marker justify-center mb-6 animate-on-scroll">
                    <span>01 — WHY CHOOSE US</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll">Why Partner With Us</h2>
                <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                <p class="text-slate-400 text-lg animate-on-scroll">Established in 1998, Mandate Engineering is a fully fledged engineering company serving clients from Harare and Bulawayo to Zambia.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="value-card p-8 rounded-xl animate-on-scroll" style="transition-delay: 0.1s;">
                    <div class="value-card-number w-14 h-14 rounded-xl flex items-center justify-center mb-6">01</div>
                    <h3 class="text-2xl font-heading font-bold text-white mb-4">Rapid Turnaround</h3>
                    <p class="text-slate-400 leading-relaxed">We understand that industrial downtime means lost revenue, so we provide responsive manufacturing, servicing, and repair support.</p>
                </div>
                <div class="value-card p-8 rounded-xl animate-on-scroll" style="transition-delay: 0.2s;">
                    <div class="value-card-number w-14 h-14 rounded-xl flex items-center justify-center mb-6">02</div>
                    <h3 class="text-2xl font-heading font-bold text-white mb-4">Precision Fabrication</h3>
                    <p class="text-slate-400 leading-relaxed">From complex heat exchangers and tube bundles to brass, copper, and bronze work, we deliver precise engineering solutions.</p>
                </div>
                <div class="value-card p-8 rounded-xl animate-on-scroll" style="transition-delay: 0.3s;">
                    <div class="value-card-number w-14 h-14 rounded-xl flex items-center justify-center mb-6">03</div>
                    <h3 class="text-2xl font-heading font-bold text-white mb-4">Built for Durability</h3>
                    <p class="text-slate-400 leading-relaxed">Our servicing and repair work is designed for demanding industrial conditions, including extreme heat, pressure, and continuous operation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Capabilities -->
    <section id="capabilities" class="services-section py-20 md:py-28 relative">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 md:mb-20">
                <div class="section-marker justify-center mb-6 animate-on-scroll">
                    <span>02 — CAPABILITIES</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll">Products &amp; Services</h2>
                <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                <p class="text-slate-400 text-lg max-w-3xl mx-auto animate-on-scroll">Our products and engineering services support air-conditioning, cleaning, construction, transport, home, and industrial processing applications.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="<?php echo esc_url( home_url( '/cooling-heat-transfer/' ) ); ?>" class="service-card p-8 animate-on-scroll block" style="transition-delay: 0.1s;">
                    <div class="w-10 h-10 rounded-lg bg-brand-emerald/10 border border-brand-emerald/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-brand-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-4">Cooling &amp; Heat Transfer</h3>
                    <ul class="text-sm space-y-2.5 list-disc list-inside mb-5">
                        <li>Compressor, water, after-, and oil coolers</li>
                        <li>Cooling-tower water coolers and cooling coils</li>
                        <li>Chillers, condensers, and calorifiers</li>
                    </ul>
                    <span class="inline-flex items-center gap-2 text-brand-emerald text-sm font-heading font-bold">Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/specialised-coolers/' ) ); ?>" class="service-card p-8 animate-on-scroll block" style="transition-delay: 0.2s;">
                    <div class="w-10 h-10 rounded-lg bg-brand-emerald/10 border border-brand-emerald/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-brand-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.066z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-4">Specialised Coolers</h3>
                    <ul class="text-sm space-y-2.5 list-disc list-inside mb-5">
                        <li>GHH and Demagogue coolers</li>
                        <li>36", 48", and 66" Gryasphere coolers</li>
                        <li>Radiators and transmission coolers</li>
                    </ul>
                    <span class="inline-flex items-center gap-2 text-brand-emerald text-sm font-heading font-bold">Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/boilers-steam-insulation/' ) ); ?>" class="service-card p-8 animate-on-scroll block" style="transition-delay: 0.3s;">
                    <div class="w-10 h-10 rounded-lg bg-brand-emerald/10 border border-brand-emerald/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-brand-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-4">Boilers, Steam &amp; Insulation</h3>
                    <ul class="text-sm space-y-2.5 list-disc list-inside mb-5">
                        <li>Boilers and steam lines</li>
                        <li>Reconditioning of all valve types</li>
                        <li>Hot and cold insulation</li>
                    </ul>
                    <span class="inline-flex items-center gap-2 text-brand-emerald text-sm font-heading font-bold">Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/process-drying-equipment/' ) ); ?>" class="service-card p-8 animate-on-scroll block" style="transition-delay: 0.4s;">
                    <div class="w-10 h-10 rounded-lg bg-brand-emerald/10 border border-brand-emerald/20 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-brand-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-4">Process &amp; Drying Equipment</h3>
                    <ul class="text-sm space-y-2.5 list-disc list-inside mb-5">
                        <li>Laundry drying machines and tea driers</li>
                        <li>Cotton ducts and lint-cleaner drums</li>
                        <li>Custom components for processing applications</li>
                    </ul>
                    <span class="inline-flex items-center gap-2 text-brand-emerald text-sm font-heading font-bold">Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Projects Gallery -->
    <section id="work" class="workshop-section py-20 md:py-28 relative blueprint-grid-dark">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 md:mb-20 max-w-3xl mx-auto">
                <div class="section-marker justify-center mb-6 animate-on-scroll">
                    <span>03 — OUR WORK</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll">Inside Our Workshop</h2>
                <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                <p class="text-slate-400 text-lg animate-on-scroll">A look inside our workshops and the engineering work we deliver for our clients.</p>
            </div>
            <div class="text-center mb-12 animate-on-scroll">
                <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>" class="btn-glow inline-flex items-center gap-3 px-8 py-3.5 rounded-lg font-heading font-bold bg-brand-emerald text-brand-navy-deep hover:bg-[#169653] transition-all duration-300">
                    View Projects
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <?php $gallery_images = mandate_engineering_get_featured_workshop_gallery(); ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ( $gallery_images as $image ) : ?>
                    <a href="<?php echo esc_url( $image['full'] ); ?>" class="gallery-card group relative bg-brand-navy-deep" style="aspect-ratio: 4 / 3;" aria-label="<?php echo esc_attr( $image['alt'] ); ?>">
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="w-full h-full object-cover" loading="lazy" sizes="(min-width: 1024px) 31vw, (min-width: 640px) 48vw, 100vw">
                        <span class="gallery-card-overlay absolute inset-0 flex items-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                            <span class="flex items-center gap-2 text-white font-heading font-semibold text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                View project
                            </span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<!-- Customers & Testimonials -->
    <section id="clients" class="clients-section py-20 md:py-28 relative blueprint-grid-dark">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 md:mb-20 max-w-3xl mx-auto">
                <div class="section-marker justify-center mb-6 animate-on-scroll">
                    <span>04 — CLIENTS &amp; TESTIMONIALS</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll">Trusted by Industry Leaders</h2>
                <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                <p class="text-slate-400 text-lg animate-on-scroll">Power generation, agriculture, and industrial clients across Zimbabwe rely on Mandate Engineering for dependable cooling, boiler, and heat-transfer solutions.</p>
            </div>

            <div class="clients-slider mb-16 md:mb-20" data-autoplay="3800">
                <div class="clients-slider-viewport">
                    <div class="clients-slider-track">
                        <?php foreach ( mandate_engineering_get_customers() as $customer ) : ?>
                            <div class="clients-slide">
                                <div class="clients-slide-inner">
                                    <img src="<?php echo esc_url( $customer['logo'] ); ?>" alt="<?php echo esc_attr( $customer['name'] ); ?>" class="max-h-16 w-auto object-contain" loading="lazy">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="button" class="clients-nav clients-nav-prev" aria-label="Previous clients">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="clients-nav clients-nav-next" aria-label="Next clients">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
                <div class="clients-dots" role="tablist" aria-label="Client pages"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <?php foreach ( mandate_engineering_get_testimonials() as $index => $testimonial ) : ?>
                    <?php if ( empty( $testimonial['quote'] ) ) { continue; } ?>
                    <div class="value-card p-8 rounded-xl animate-on-scroll" style="transition-delay: <?php echo esc_attr( 0.1 + $index * 0.1 ); ?>s;">
                        <svg class="w-8 h-8 text-brand-emerald mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M10 7L8 11h3v6H5v-6l2-4h3zm9 0l-2 4h3v6h-6v-6l2-4h3z"/></svg>
                        <p class="text-slate-300 leading-relaxed mb-6">“<?php echo esc_html( $testimonial['quote'] ); ?>”</p>
                        <div>
                            <p class="font-heading font-bold text-white"><?php echo esc_html( $testimonial['name'] ); ?></p>
                            <p class="text-brand-emerald text-sm font-heading font-bold"><?php echo esc_html( $testimonial['role'] ); ?>, <?php echo esc_html( $testimonial['company'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
