<?php get_header(); ?>

<main class="min-h-screen bg-brand-navy-deep">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Page Hero -->
        <section class="page-hero pt-28 sm:pt-32 md:pt-36 pb-12 md:pb-16">
            <div class="container mx-auto px-6 max-w-5xl relative z-10">
                <a href="<?php echo esc_url( mandate_engineering_get_projects_page_url() ); ?>" class="inline-flex items-center gap-2 text-brand-emerald font-heading font-semibold text-sm mb-8 hover:underline transition-colors animate-on-scroll">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                    All Projects
                </a>
                <?php $terms = get_the_terms( get_the_ID(), 'mandate_project_type' ); ?>
                <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                    <p class="text-brand-emerald text-xs font-heading font-bold uppercase tracking-widest mb-4 animate-on-scroll"><?php echo esc_html( implode( ' · ', wp_list_pluck( $terms, 'name' ) ) ); ?></p>
                <?php endif; ?>
                <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white tracking-tight animate-on-scroll"><?php the_title(); ?></h1>
            </div>
        </section>

        <article class="container mx-auto px-6 max-w-5xl pb-24">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="single-project-image mb-12 animate-on-scroll">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto', 'fetchpriority' => 'high' ) ); ?>
                </div>
            <?php endif; ?>
            <div class="prose prose-lg prose-dark max-w-none animate-on-scroll">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
