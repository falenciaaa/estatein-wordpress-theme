<footer class="site-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <?php echo estatein_logo_svg(); ?>
                    Estatein
                </a>
                <div class="footer-email-form">
                    <input type="email" placeholder="Enter Your Email">
                    <button type="button" aria-label="Subscribe">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                    </button>
                </div>
            </div>

            <div class="footer-col">
                <h4>Home</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/#hero')); ?>">Hero Section</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#features')); ?>">Features</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#properties')); ?>">Properties</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#testimonials')); ?>">Testimonials</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#faq')); ?>">FAQ's</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>About Us</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/about-us#story')); ?>">Our Story</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us#works')); ?>">Our Works</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us#how-it-works')); ?>">How It Works</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us#team')); ?>">Our Team</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us#clients')); ?>">Our Clients</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Properties</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/properties#portfolio')); ?>">Portfolio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/properties#categories')); ?>">Categories</a></li>
                </ul>

                <h4 style="margin-top:24px">Services</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/services#valuation')); ?>">Valuation Mastery</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services#marketing')); ?>">Strategic Marketing</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services#negotiation')); ?>">Negotiation Wizardry</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services#closing')); ?>">Closing Success</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services#management')); ?>">Property Management</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/contact-us#form')); ?>">Contact Form</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us#offices')); ?>">Our Offices</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>@2023 Estatein. All Rights Reserved.</p>
            <div class="footer-links">
                <a href="#">Terms &amp; Conditions</a>
            </div>
            <div class="social-links">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="LinkedIn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="Twitter">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="YouTube">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.47a2.78 2.78 0 00-1.95 1.97A29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.97A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#141414"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
