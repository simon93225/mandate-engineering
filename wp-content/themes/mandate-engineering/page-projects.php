<?php
/**
 * Template Name: Projects
 */
get_header();

$product_galleries = array(
    array(
        'title'    => 'Heat Exchangers',
        'subtitle' => 'Heat exchangers manufactured in our workshops for industrial heat transfer.',
        'gallery'  => mandate_engineering_get_heat_exchanger_gallery(),
    ),
    array(
        'title'    => 'Radiators &amp; Transmission Coolers',
        'subtitle' => 'Radiators and transmission coolers built and serviced for transport and heavy equipment.',
        'gallery'  => mandate_engineering_get_transport_gallery(),
    ),
    array(
        'title'    => 'Mining Coolers — GHH, Demagogue &amp; Gryasphere',
        'subtitle' => 'Coolers and radiators reconditioned and rebuilt for underground mining equipment.',
        'gallery'  => mandate_engineering_get_mining_gallery(),
    ),
    array(
        'title'    => 'Cooling Coils',
        'subtitle' => 'Cooling coils fabricated in our workshops for industrial and process cooling applications.',
        'gallery'  => mandate_engineering_get_coils_gallery(),
    ),
    array(
        'title'    => 'Condensers &amp; Evaporators',
        'subtitle' => 'Condensers and evaporators fabricated in our workshops for refrigeration and process cooling.',
        'gallery'  => mandate_engineering_get_condensers_gallery(),
    ),
    array(
        'title'    => 'Lagging &amp; Cladding — Insulation',
        'subtitle' => 'Lagging and cladding of ducts and steam pipes, plus hot and cold insulation for industrial plants.',
        'gallery'  => mandate_engineering_get_insulation_gallery(),
    ),
);
?>

<main class="min-h-screen bg-brand-navy-deep">
    <!-- Page Hero -->
    <section class="page-hero pt-28 sm:pt-32 md:pt-36 pb-16 md:pb-20">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="max-w-3xl">
                <div class="section-marker mb-6 animate-on-scroll">
                    <span>MANDATE ENGINEERING PORTFOLIO</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-heading font-extrabold text-white mb-6 tracking-tight animate-on-scroll">Projects</h1>
                <p class="text-slate-400 text-lg animate-on-scroll">Explore the products and services we build, recondition, and deliver for our clients across heat transfer, cooling, steam systems, and fabrication.</p>
            </div>
        </div>
    </section>

    <?php $group_index = 0; ?>
    <?php foreach ( $product_galleries as $product ) : ?>
        <?php if ( empty( $product['gallery'] ) ) { continue; } ?>
        <section class="py-20 <?php echo 0 === $group_index % 2 ? 'bg-brand-navy blueprint-grid-dark' : 'bg-brand-navy-deep blueprint-grid-dark'; ?>">
            <div class="container mx-auto px-6 max-w-5xl">
                <div class="text-center mb-16">
                    <div class="section-marker justify-center mb-6 animate-on-scroll">
                        <span>OUR WORK</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll"><?php echo $product['title']; ?></h2>
                    <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                    <p class="text-slate-400 text-lg animate-on-scroll"><?php echo $product['subtitle']; ?></p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 gallery-grid" data-limit="6">
                    <?php foreach ( $product['gallery'] as $image ) : ?>
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
        <?php $group_index++; ?>
    <?php endforeach; ?>

    <?php $workshop_gallery = mandate_engineering_get_workshop_gallery(); ?>
    <?php if ( ! empty( $workshop_gallery ) ) : ?>
        <section class="py-20 bg-brand-navy blueprint-grid-dark">
            <div class="container mx-auto px-6 max-w-5xl">
                <div class="text-center mb-16">
                    <div class="section-marker justify-center mb-6 animate-on-scroll">
                        <span>INSIDE OUR WORKSHOP</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-white mb-5 tracking-tight animate-on-scroll">Workshop Gallery</h2>
                    <div class="accent-line w-24 h-[3px] mx-auto mb-6 animate-on-scroll"></div>
                    <p class="text-slate-400 text-lg animate-on-scroll">A closer look at recent fabrication, reconditioning, and installation work carried out in our workshops.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 gallery-grid">
                    <?php foreach ( $workshop_gallery as $image ) : ?>
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
    <?php endif; ?>
</main>

<?php get_footer(); ?>