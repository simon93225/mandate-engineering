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
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Privacy-Policy.pdf' ); ?>" class="legal-doc-link hover:text-brand-emerald transition-colors" data-doc-title="Privacy Policy">Privacy Policy</a>
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Terms-and-Conditions.pdf' ); ?>" class="legal-doc-link hover:text-brand-emerald transition-colors" data-doc-title="Terms and Conditions">Terms &amp; Conditions</a>
                    <a href="<?php echo esc_url( get_template_directory_uri() . '/assets/documents/Disclaimer.pdf' ); ?>" class="legal-doc-link hover:text-brand-emerald transition-colors" data-doc-title="Disclaimer">Disclaimer</a>
                </nav>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

<!-- WhatsApp Floating Chat Widget -->
<div class="whatsapp-widget" id="whatsapp-widget">
    <div class="whatsapp-popup" id="whatsapp-popup" role="dialog" aria-label="WhatsApp chat" aria-hidden="true">
        <div class="whatsapp-popup-header">
            <div class="whatsapp-avatar">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12c0 1.88.52 3.71 1.5 5.31L2 22l4.82-1.48A9.96 9.96 0 0 0 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2z"/></svg>
            </div>
            <div class="whatsapp-popup-info">
                <p class="whatsapp-popup-name">Mandate Engineering</p>
                <p class="whatsapp-popup-status">Typically replies within minutes</p>
            </div>
            <button type="button" class="whatsapp-popup-close" id="whatsapp-close" aria-label="Close chat">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="whatsapp-popup-body">
            <div class="whatsapp-bubble">
                <p>Hi there! 👋</p>
                <p>How can we help you with your cooling, boiler, or heat-transfer needs today?</p>
            </div>
            <a href="https://wa.me/263772967719?text=<?php echo rawurlencode( 'Hello Mandate Engineering, I would like to make an enquiry.' ); ?>" target="_blank" rel="noopener" class="whatsapp-chat-btn">
                <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16 3C9.37 3 4 8.31 4 14.86c0 2.86 1.1 5.48 2.95 7.47L6 26.9l4.83-1.55c1.56.6 3.28.95 5.17.95 6.63 0 12-5.31 12-11.86S22.63 3 16 3zm5.4 16.71c-.24.67-1.38 1.28-1.9 1.33-.51.05-.98.24-3.31-.68-2.78-1.1-4.53-3.94-4.67-4.12-.14-.19-1.12-1.49-1.12-2.85s.71-2.02.96-2.3c.25-.28.55-.35.74-.35h.53c.17 0 .4-.06.62.48.24.58.8 2 .87 2.14.07.14.12.31.02.5-.1.19-.15.31-.29.48-.14.17-.3.38-.43.51-.14.14-.29.29-.13.58.17.29.74 1.22 1.59 1.98 1.09.98 2.01 1.29 2.3 1.43.28.14.45.12.62-.07.17-.19.72-.84.91-1.13.19-.29.38-.24.64-.14.26.1 1.66.78 1.94.92.29.14.48.21.55.33.07.12.07.69-.17 1.36z"/></svg>
                Start Chat
            </a>
        </div>
    </div>
    <button type="button" class="whatsapp-fab" id="whatsapp-fab" aria-label="Chat with us on WhatsApp">
        <svg class="whatsapp-fab-icon" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16 3C9.37 3 4 8.31 4 14.86c0 2.86 1.1 5.48 2.95 7.47L6 26.9l4.83-1.55c1.56.6 3.28.95 5.17.95 6.63 0 12-5.31 12-11.86S22.63 3 16 3zm5.4 16.71c-.24.67-1.38 1.28-1.9 1.33-.51.05-.98.24-3.31-.68-2.78-1.1-4.53-3.94-4.67-4.12-.14-.19-1.12-1.49-1.12-2.85s.71-2.02.96-2.3c.25-.28.55-.35.74-.35h.53c.17 0 .4-.06.62.48.24.58.8 2 .87 2.14.07.14.12.31.02.5-.1.19-.15.31-.29.48-.14.17-.3.38-.43.51-.14.14-.29.29-.13.58.17.29.74 1.22 1.59 1.98 1.09.98 2.01 1.29 2.3 1.43.28.14.45.12.62-.07.17-.19.72-.84.91-1.13.19-.29.38-.24.64-.14.26.1 1.66.78 1.94.92.29.14.48.21.55.33.07.12.07.69-.17 1.36z"/></svg>
        <svg class="whatsapp-fab-close" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
</div>

<!-- Image Viewer Lightbox -->
<div id="image-viewer" class="image-viewer" role="dialog" aria-modal="true" aria-label="Image viewer" aria-hidden="true">
    <div class="image-viewer-backdrop" data-image-viewer-close></div>
    <div class="image-viewer-panel">
        <div class="image-viewer-toolbar">
            <button type="button" class="image-viewer-exit" data-image-viewer-close aria-label="Exit image view">
                <span class="image-viewer-exit-icon" aria-hidden="true">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </span>
                <span>Exit</span>
            </button>
        </div>
        <figure class="image-viewer-figure">
            <img class="image-viewer-img" src="" alt="">
            <figcaption class="image-viewer-caption"></figcaption>
        </figure>
    </div>
</div>

<!-- Document Viewer (legal PDFs shown in-page with Exit, no new tab) -->
<div id="doc-viewer" class="doc-viewer" role="dialog" aria-modal="true" aria-label="Document viewer" aria-hidden="true">
    <div class="doc-viewer-backdrop" data-doc-viewer-close></div>
    <div class="doc-viewer-panel">
        <div class="doc-viewer-toolbar">
            <span class="doc-viewer-title" id="doc-viewer-title"></span>
            <button type="button" class="doc-viewer-exit" data-doc-viewer-close aria-label="Exit document view">
                <span class="doc-viewer-exit-icon" aria-hidden="true">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </span>
                <span>Exit</span>
            </button>
        </div>
        <iframe class="doc-viewer-frame" src="" title="Document preview" loading="lazy"></iframe>
    </div>
</div>

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

    // WhatsApp widget toggle
    var fab = document.getElementById('whatsapp-fab');
    var popup = document.getElementById('whatsapp-popup');
    var close = document.getElementById('whatsapp-close');
    if (fab && popup) {
        function openPopup() {
            popup.classList.add('is-open');
            popup.setAttribute('aria-hidden', 'false');
            fab.classList.add('is-open');
        }
        function closePopup() {
            popup.classList.remove('is-open');
            popup.setAttribute('aria-hidden', 'true');
            fab.classList.remove('is-open');
        }
        fab.addEventListener('click', function () {
            if (popup.classList.contains('is-open')) {
                closePopup();
            } else {
                openPopup();
            }
        });
        if (close) { close.addEventListener('click', closePopup); }
    }

    // Image viewer: open gallery images in an overlay instead of the
    // raw-image view, with an explicit "Exit" button on desktop and mobile.
    var viewer = document.getElementById('image-viewer');
    if (viewer) {
        var viewerImg = viewer.querySelector('.image-viewer-img');
        var viewerCaption = viewer.querySelector('.image-viewer-caption');

        function openViewer(src, alt, caption) {
            viewerImg.src = src;
            viewerImg.alt = alt || '';
            viewerCaption.textContent = caption || '';
            viewer.classList.add('is-open');
            viewer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeViewer() {
            viewer.classList.remove('is-open');
            viewer.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            viewerImg.removeAttribute('src');
        }

        document.querySelectorAll('.gallery-card').forEach(function (card) {
            card.addEventListener('click', function (e) {
                if (e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                e.preventDefault();
                var img = card.querySelector('img');
                var alt = img ? (img.getAttribute('alt') || '') : '';
                openViewer(card.getAttribute('href'), alt, card.getAttribute('aria-label') || alt);
            });
        });

        viewer.querySelectorAll('[data-image-viewer-close]').forEach(function (el) {
            el.addEventListener('click', closeViewer);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && viewer.classList.contains('is-open')) {
                closeViewer();
            }
        });
    }

    // Document viewer: open legal PDFs in an in-page overlay with an Exit
    // button instead of a new browser tab (keeps the site favicon/theme).
    var docViewer = document.getElementById('doc-viewer');
    if (docViewer) {
        var docFrame = docViewer.querySelector('.doc-viewer-frame');
        var docTitle = docViewer.querySelector('.doc-viewer-title');

        function openDoc(src, title) {
            docTitle.textContent = title || 'Document';
            docFrame.setAttribute('src', src);
            docViewer.classList.add('is-open');
            docViewer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeDoc() {
            docViewer.classList.remove('is-open');
            docViewer.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            docFrame.removeAttribute('src');
        }

        document.querySelectorAll('.legal-doc-link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                if (e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                e.preventDefault();
                openDoc(link.getAttribute('href'), link.getAttribute('data-doc-title'));
            });
        });

        docViewer.querySelectorAll('[data-doc-viewer-close]').forEach(function (el) {
            el.addEventListener('click', closeDoc);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && docViewer.classList.contains('is-open')) {
                closeDoc();
            }
        });
    }
}());
</script>
</body>
</html>
