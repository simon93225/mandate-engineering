<?php
/**
 * Template Name: Contact
 */
get_header();

$form_status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';

// Simple maths captcha: two operands rendered to the visitor, with the
// expected answer bound to a WordPress nonce (never sent in plaintext).
$captcha_a = mt_rand( 1, 9 );
$captcha_b = mt_rand( 1, 9 );
$captcha_answer = $captcha_a + $captcha_b;
$captcha_nonce  = wp_create_nonce( 'mandate_captcha_' . $captcha_answer );
?>

<main class="min-h-screen bg-brand-navy-deep">
    <!-- Page Hero -->
    <section class="page-hero pt-28 sm:pt-32 md:pt-36 pb-16 md:pb-20">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <div class="section-marker justify-center mb-6 animate-on-scroll">
                    <span>GET IN TOUCH</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-heading font-extrabold text-white mb-6 tracking-tight animate-on-scroll">Let's discuss your engineering needs.</h1>
                <p class="text-slate-400 text-lg animate-on-scroll">Tell us about your repair, manufacturing, cooling, steam, or fabrication requirement and our Head Office team will get back to you.</p>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 max-w-3xl pb-24">
        <!-- Form Card -->
        <div class="contact-form-card p-8 md:p-12 animate-on-scroll">
            <h2 class="text-2xl font-heading font-bold text-white mb-8">Contact us</h2>
            <?php if ( 'sent' === $form_status ) : ?>
                <div class="alert-success mb-6 p-4 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Thank you—your enquiry has been sent. We will be in touch soon.
                </div>
            <?php elseif ( 'invalid' === $form_status ) : ?>
                <div class="alert-error mb-6 p-4 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Please complete your name, email address, and message before sending.
                </div>
            <?php elseif ( 'error' === $form_status ) : ?>
                <div class="alert-error mb-6 p-4 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    We could not send your message. Please call or email us directly.
                </div>
            <?php endif; ?>

            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="space-y-6" id="contact-form" novalidate>
                <input type="hidden" name="action" value="mandate_contact_form">
                <?php wp_nonce_field( 'mandate_contact_form', 'mandate_contact_nonce' ); ?>
                <input type="hidden" name="captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>">
                <input type="hidden" name="captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>">
                <input type="hidden" name="captcha_nonce" value="<?php echo esc_attr( $captcha_nonce ); ?>">
                <div class="hidden" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="form-field">
                        <label class="block text-sm font-semibold">Full name *<input required type="text" name="name" class="mt-2 w-full px-4 py-3.5 text-sm" data-required></label>
                    </div>
                    <div class="form-field">
                        <label class="block text-sm font-semibold">Email address *<input required type="email" name="email" class="mt-2 w-full px-4 py-3.5 text-sm" data-required></label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="form-field">
                        <label class="block text-sm font-semibold">Phone number<input type="tel" name="phone" class="mt-2 w-full px-4 py-3.5 text-sm" data-phone></label>
                    </div>
                    <div class="form-field">
                        <label class="block text-sm font-semibold">Service needed<select name="service" class="mt-2 w-full px-4 py-3.5 text-sm"><option value="">Select a service</option><option>Cooling &amp; heat transfer</option><option>Specialised coolers</option><option>Boilers, steam &amp; insulation</option><option>Process &amp; drying equipment</option><option>Other</option></select></label>
                    </div>
                </div>
                <div class="form-field">
                    <label class="block text-sm font-semibold">How can we help? *<textarea required name="message" rows="6" class="mt-2 w-full px-4 py-3.5 text-sm" placeholder="Tell us about the equipment, service, or project you need." data-required></textarea></label>
                </div>
                <div class="form-field">
                    <label class="block text-sm font-semibold" for="captcha">Security check *</label>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 mt-2">
                        <span class="text-slate-300 text-sm font-medium select-none">What is <?php echo esc_html( $captcha_a ); ?> + <?php echo esc_html( $captcha_b ); ?>?</span>
                        <input id="captcha" type="text" name="captcha_answer" inputmode="numeric" autocomplete="off" class="w-full sm:w-32 px-4 py-3.5 text-sm" aria-describedby="captcha-hint" data-captcha>
                        <span id="captcha-hint" class="text-xs text-slate-500">Solve this to prove you are human.</span>
                    </div>
                </div>
                <button type="submit" class="btn-glow w-full md:w-auto px-8 py-3.5 rounded-lg font-heading font-bold bg-brand-emerald text-brand-navy-deep hover:bg-[#169653] transition-all duration-300">Send enquiry</button>
            </form>
        </div>

        <!-- Head Office Info Card -->
        <aside class="mt-8 animate-on-scroll">
            <div class="contact-info-card text-white p-8 md:p-10 text-center">
                <div class="section-marker justify-center mb-4">
                    <span>HEAD OFFICE</span>
                </div>
                <h2 class="text-2xl font-heading font-bold mb-5">Harare, Zimbabwe</h2>
                <p class="text-slate-300 mb-5">179 Erith Road, Harare</p>
                <a href="tel:+263772967719" class="block text-slate-300 hover:text-brand-emerald mb-3 transition-colors">+263 772 967 719</a>
                <a href="mailto:info@mandateengineering.co.zw" class="block text-slate-300 hover:text-brand-emerald transition-colors">info@mandateengineering.co.zw</a>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=179%20Erith%20Road%2C%20Harare%2C%20Zimbabwe" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 mt-7 text-brand-emerald font-heading font-bold hover:underline text-sm">
                    Open in Google Maps
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </aside>
    </section>
</main>

<script>
(function () {
    var form = document.getElementById('contact-form');
    if (!form) return;

    function setError(input, message) {
        var field = input.closest('.form-field') || input.parentElement;
        var err = field.querySelector('.form-error');
        if (!err) {
            err = document.createElement('p');
            err.className = 'form-error text-xs text-amber-400 font-medium mt-1.5';
            field.appendChild(err);
        }
        err.textContent = message;
        input.setAttribute('aria-invalid', 'true');
    }

    function clearError(input) {
        var field = input.closest('.form-field') || input.parentElement;
        var err = field.querySelector('.form-error');
        if (err) { err.remove(); }
        input.removeAttribute('aria-invalid');
    }

    form.addEventListener('submit', function (e) {
        var firstInvalid = null;

        form.querySelectorAll('[data-required]').forEach(function (input) {
            clearError(input);
            if (!input.value.trim()) {
                setError(input, input.name === 'email' ? 'Please enter your email address.' : 'This field is required.');
                if (!firstInvalid) firstInvalid = input;
            } else if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim())) {
                setError(input, 'Please enter a valid email address.');
                if (!firstInvalid) firstInvalid = input;
            }
        });

        var phone = form.querySelector('[data-phone]');
        if (phone && phone.value.trim() && !/^[+0-9\s()-]{7,20}$/.test(phone.value.trim())) {
            clearError(phone);
            setError(phone, 'Please enter a valid phone number.');
            if (!firstInvalid) firstInvalid = phone;
        }

        var captcha = form.querySelector('[data-captcha]');
        var a = parseInt(form.querySelector('[name="captcha_a"]').value, 10) || 0;
        var b = parseInt(form.querySelector('[name="captcha_b"]').value, 10) || 0;
        clearError(captcha);
        if (captcha.value.trim() === '') {
            setError(captcha, 'Please answer the security question.');
            if (!firstInvalid) firstInvalid = captcha;
        } else if (parseInt(captcha.value.trim(), 10) !== a + b) {
            setError(captcha, 'That answer is incorrect. Please try again.');
            if (!firstInvalid) firstInvalid = captcha;
        }

        if (firstInvalid) {
            e.preventDefault();
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
    });
}());
</script>

<?php get_footer(); ?>
