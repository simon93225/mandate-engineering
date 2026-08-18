    <!-- Footer -->
    <footer id="contact" class="site-footer text-white pt-20 pb-10 relative">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div>
                    <div class="h-10 relative flex items-center mb-6">
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
                    <p class="text-slate-400 leading-relaxed text-sm">Manufacturing, servicing, and repairing heat-transfer equipment, boilers, steam lines, and custom metalwork since 1998.</p>
                    <div class="mt-6 flex items-center gap-2 text-xs text-brand-emerald font-heading font-bold uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-brand-emerald animate-pulse"></span>
                        Operational since 1998
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-6 uppercase tracking-wider text-xs">Zimbabwe</h4>
                    <p class="text-white font-semibold mb-2 text-sm">Head Office — Harare</p>
                    <p class="text-slate-400 mb-2 text-sm">179 Erith Road, Harare</p>
                    <p class="text-slate-400 mb-2 text-sm">Phone: +263 (0) 242 123 456</p>
                    <p class="text-slate-400 mb-5 text-sm">Email: info@mandateengineering.co.zw</p>
                    <p class="text-white font-semibold mb-2 text-sm">Bulawayo</p>
                    <p class="text-slate-400 text-sm">Contact details available on request.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-6 uppercase tracking-wider text-xs">South Africa</h4>
                    <p class="text-slate-400 mb-3 text-sm">Mandate Engineering South Africa</p>
                    <p class="text-slate-400 mb-3 text-sm">82 Kirkness Street, The Orchards, Pretoria North, South Africa 152</p>
                    <p class="text-slate-400 mb-2 text-sm">Contact: Davison Davison Chikazunga</p>
                    <p class="text-slate-400 text-sm">Tel: 027 728 137 875</p>
                </div>
                <div>
                    <h4 class="font-bold mb-6 uppercase tracking-wider text-xs">Professional Networks</h4>
                    <p class="text-slate-400 mb-6 text-sm leading-relaxed">Connect with our team on LinkedIn and industrial directories for verified engineering credentials.</p>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-heading font-bold bg-brand-emerald/10 text-brand-emerald border border-brand-emerald/20 hover:bg-brand-emerald/20 transition-all duration-300">
                        Get in Touch
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="footer-divider border-t pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
                <p>&copy; <?php echo date('Y'); ?> Mandate Engineering. All rights reserved.</p>
                <nav class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-xs text-slate-400" aria-label="Legal">
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Privacy-Policy.pdf' ); ?>" target="_blank" rel="noopener" class="hover:text-brand-emerald transition-colors">Privacy Policy</a>
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Terms-and-Conditions.pdf' ); ?>" target="_blank" rel="noopener" class="hover:text-brand-emerald transition-colors">Terms &amp; Conditions</a>
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Disclaimer.pdf' ); ?>" target="_blank" rel="noopener" class="hover:text-brand-emerald transition-colors">Disclaimer</a>
                </nav>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
<script>
(function () {
    var LIMIT = 6;
    document.querySelectorAll('.gallery-grid').forEach(function (grid) {
        var limit = parseInt(grid.getAttribute('data-limit') || LIMIT, 10);
        var cards = Array.prototype.slice.call(grid.children);
        if (cards.length <= limit) return;

        cards.slice(limit).forEach(function (card) {
            card.classList.add('is-hidden');
        });

        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'gallery-more-btn';
        btn.setAttribute('aria-expanded', 'false');
        btn.innerHTML =
            '<span class="gallery-more-icon" aria-hidden="true">' +
                '<svg class="gallery-more-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14"/>' +
                '</svg>' +
            '</span>' +
            '<span class="gallery-more-label">View More</span>';

        btn.addEventListener('click', function () {
            var expanded = btn.getAttribute('aria-expanded') === 'true';
            cards.slice(limit).forEach(function (card) {
                card.classList.toggle('is-hidden', expanded);
            });
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.querySelector('.gallery-more-label').textContent = expanded ? 'View More' : 'View Less';
        });

        var wrap = document.createElement('div');
        wrap.className = 'text-center';
        wrap.appendChild(btn);
        grid.parentNode.insertBefore(wrap, grid.nextSibling);
    });

    document.querySelectorAll('.clients-slider').forEach(function (slider) {
        var track = slider.querySelector('.clients-slider-track');
        var slides = Array.prototype.slice.call(track.children);
        if (slides.length === 0) return;

        var prevBtn = slider.querySelector('.clients-nav-prev');
        var nextBtn = slider.querySelector('.clients-nav-next');
        var dotsWrap = slider.querySelector('.clients-dots');
        var autoplayMs = parseInt(slider.getAttribute('data-autoplay') || '3800', 10);
        var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var index = 0;
        var timer = null;

        function perView() {
            if (window.innerWidth >= 1024) return 4;
            if (window.innerWidth >= 768) return 3;
            return 2;
        }

        function pageCount() {
            return Math.max(1, Math.ceil(slides.length / perView()));
        }

        function clampIndex() {
            var maxIndex = slides.length - perView();
            if (index > maxIndex) index = maxIndex;
            if (index < 0) index = 0;
        }

        function goTo(i) {
            index = i;
            clampIndex();
            var slide = slides[index];
            var offset = slide.getBoundingClientRect().left -
                track.getBoundingClientRect().left;
            track.style.transform = 'translateX(' + (-offset) + 'px)';
            updateDots();
        }

        function next() {
            var maxIndex = slides.length - perView();
            if (index >= maxIndex) { goTo(0); return; }
            goTo(index + 1);
        }

        function prev() {
            if (index <= 0) { goTo(slides.length - perView()); return; }
            goTo(index - 1);
        }

        function buildDots() {
            dotsWrap.innerHTML = '';
            var count = pageCount();
            for (var d = 0; d < count; d++) {
                (function (dotIndex) {
                    var dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'clients-dot' + (dotIndex === 0 ? ' is-active' : '');
                    dot.setAttribute('aria-label', 'Go to page ' + (dotIndex + 1));
                    dot.addEventListener('click', function () {
                        goTo(dotIndex * perView());
                        restart();
                    });
                    dotsWrap.appendChild(dot);
                }(d));
            }
        }

        function updateDots() {
            var active = Math.floor(index / perView());
            Array.prototype.forEach.call(dotsWrap.children, function (dot, d) {
                dot.classList.toggle('is-active', d === active);
            });
        }

        function start() {
            if (prefersReduced || autoplayMs <= 0) return;
            stop();
            timer = setInterval(next, autoplayMs);
        }

        function stop() {
            if (timer) { clearInterval(timer); timer = null; }
        }

        function restart() { start(); }

        prevBtn.addEventListener('click', function () { prev(); restart(); });
        nextBtn.addEventListener('click', function () { next(); restart(); });

        slider.addEventListener('mouseenter', stop);
        slider.addEventListener('mouseleave', start);
        slider.addEventListener('touchstart', stop, { passive: true });
        slider.addEventListener('touchend', start, { passive: true });

        buildDots();
        goTo(0);
        start();
    });
}());
</script>
</body>
</html>
