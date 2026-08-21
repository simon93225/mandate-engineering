<?php get_header(); ?>

<main class="min-h-screen bg-brand-navy-deep">
    <!-- Page Hero -->
    <section class="page-hero pt-28 sm:pt-32 md:pt-36 pb-16 md:pb-20">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="max-w-3xl">
                <div class="section-marker mb-6 animate-on-scroll">
                    <span>MANDATE ENGINEERING PORTFOLIO</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-heading font-extrabold text-white mb-6 tracking-tight animate-on-scroll">Projects</h1>
                <p class="text-slate-400 text-lg animate-on-scroll">Explore engineering projects completed by our team across heat transfer, cooling, steam systems, and fabrication.</p>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 max-w-6xl pb-24">
        <?php $project_types = get_terms( array( 'taxonomy' => 'mandate_project_type', 'hide_empty' => true ) ); ?>
        <?php if ( ! empty( $project_types ) && ! is_wp_error( $project_types ) ) : ?>
            <div class="flex flex-wrap gap-3 mb-12 animate-on-scroll" data-project-tabs>
                <button type="button" class="project-tab px-5 py-2.5 rounded-full is-active" data-filter="all">All Projects</button>
                <?php foreach ( $project_types as $project_type ) : ?>
                    <button type="button" class="project-tab px-5 py-2.5 rounded-full" data-filter="<?php echo esc_attr( $project_type->slug ); ?>"><?php echo esc_html( $project_type->name ); ?></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7" data-project-grid>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php $terms = get_the_terms( get_the_ID(), 'mandate_project_type' ); ?>
                    <article class="project-card" data-types="<?php echo esc_attr( $terms && ! is_wp_error( $terms ) ? implode( ' ', wp_list_pluck( $terms, 'slug' ) ) : 'uncategorized' ); ?>">
                        <a href="<?php the_permalink(); ?>" class="block bg-brand-navy overflow-hidden relative group" style="aspect-ratio: 16 / 9;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'mandate-gallery-card', array( 'class' => 'w-full h-full object-cover transition duration-500 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center text-slate-500 text-sm">Project image coming soon</div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-navy-deep/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <div class="p-6">
                            <?php if ( $terms && ! is_wp_error( $terms ) ) : ?><p class="text-brand-emerald text-xs font-heading font-bold uppercase tracking-wider mb-2"><?php echo esc_html( implode( ' · ', wp_list_pluck( $terms, 'name' ) ) ); ?></p><?php endif; ?>
                            <h2 class="text-xl font-heading font-bold text-white mb-3"><a href="<?php the_permalink(); ?>" class="hover:text-brand-emerald transition-colors"><?php the_title(); ?></a></h2>
                            <div class="text-slate-400 text-sm"><?php the_excerpt(); ?></div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="empty-state p-16 text-center animate-on-scroll">
                <div class="w-16 h-16 rounded-2xl bg-brand-emerald/10 border border-brand-emerald/20 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-brand-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h2 class="text-2xl font-heading font-bold text-white mb-3">Projects are being added</h2>
                <p class="text-slate-400">Please check back soon to see our latest completed work.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

<script>
document.querySelectorAll('[data-project-tabs]').forEach(function (tabBar) {
    var cards = document.querySelectorAll('[data-project-grid] .project-card');
    tabBar.querySelectorAll('.project-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            var filter = tab.dataset.filter;
            tabBar.querySelectorAll('.project-tab').forEach(function (button) {
                button.classList.remove('is-active');
            });
            tab.classList.add('is-active');
            cards.forEach(function (card) {
                card.style.display = filter === 'all' || card.dataset.types.split(' ').indexOf(filter) !== -1 ? '' : 'none';
            });
        });
    });
});
</script>

<?php get_footer(); ?>
