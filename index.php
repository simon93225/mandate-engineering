<?php
get_header();
?>

<main class="min-h-screen bg-brand-navy-deep">
    <!-- Page Hero -->
    <section class="page-hero pt-28 sm:pt-32 md:pt-36 pb-12 md:pb-16">
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <div class="section-marker mb-6 animate-on-scroll">
                <span>LATEST POSTS</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-heading font-extrabold text-white tracking-tight animate-on-scroll">News &amp; Updates</h1>
        </div>
    </section>

    <section class="container mx-auto px-6 pb-24 max-w-4xl">
        <?php if ( have_posts() ) : ?>
            <div class="grid gap-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card p-8 md:p-10 animate-on-scroll'); ?>>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-brand-emerald text-xs font-heading font-bold uppercase tracking-widest"><?php echo get_the_date(); ?></span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-heading font-bold text-white mb-4">
                            <a href="<?php the_permalink(); ?>" class="hover:text-brand-emerald transition-colors"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-slate-400 text-sm leading-relaxed mb-6">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-brand-emerald font-heading font-semibold text-sm hover:underline transition-colors">
                            Read more
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="flex justify-between py-12 font-heading font-semibold text-brand-emerald text-sm">
                <?php previous_posts_link( '&larr; Newer Posts' ); ?>
                <?php next_posts_link( 'Older Posts &rarr;' ); ?>
            </div>

        <?php else : ?>
            <div class="empty-state p-16 text-center animate-on-scroll">
                <h2 class="text-2xl font-heading font-bold text-white mb-3">No content found</h2>
                <p class="text-slate-400">It seems we can't find what you're looking for.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
