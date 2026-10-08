<?php $base = isset($base_path) ? $base_path : ''; ?>
<style>
/* =========================================================
   PREMIUM MODERN FOOTER
   ========================================================= */

.tobac-footer-wrap {
    background-color: #0b0b0b;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    font-family: inherit;
}

.tobac-footer-container {
    max-width: 1240px;
    margin: 0 auto;
    padding: 70px 24px 28px;
    position: relative;
    z-index: 2;
}

/* 4-column main grid */
.tobac-footer-grid {
    display: grid;
    grid-template-columns: 2.2fr 1fr 1.1fr 1.7fr;
    gap: 48px;
    align-items: start;
}

/* Col 1: Brand */
.tobac-footer-brand {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.tobac-footer-logo-link {
    display: inline-block;
    margin-bottom: 22px;
    text-decoration: none;
    transition: opacity 0.25s ease;
}

.tobac-footer-logo-link:hover {
    opacity: 0.85;
}

.tobac-footer-logo {
    width: 210px;
    height: auto;
    display: block;
}

.tobac-footer-tagline {
    color: rgba(255, 255, 255, 0.68);
    font-size: 0.92rem;
    line-height: 1.7;
    margin: 0 0 20px 0;
    max-width: 380px;
    letter-spacing: 0.2px;
}

.tobac-footer-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 999px;
    font-size: 0.76rem;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.75);
    text-transform: uppercase;
}

.tobac-footer-badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #b08940;
    box-shadow: 0 0 8px rgba(176, 137, 64, 0.7);
    display: inline-block;
}

/* Column Headings */
.tobac-footer-title {
    color: #b08940;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    margin: 0 0 20px 0;
    position: relative;
    padding-bottom: 8px;
}

.tobac-footer-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 24px;
    height: 2px;
    background: #b08940;
    opacity: 0.6;
}

/* Navigation lists */
.tobac-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.tobac-footer-links li {
    margin: 0;
    padding: 0;
}

.tobac-footer-links a {
    color: rgba(255, 255, 255, 0.72);
    text-decoration: none;
    font-size: 0.92rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.22s ease;
}

.tobac-footer-links a:hover {
    color: #ddb969;
    transform: translateX(4px);
}

/* Contact rows */
.tobac-footer-contacts {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.tobac-footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    transition: all 0.22s ease;
}

a.tobac-footer-contact-item:hover {
    color: #ffffff;
}

a.tobac-footer-contact-item:hover .tobac-footer-icon-box {
    background: #b08940;
    color: #0b0b0b;
    border-color: #b08940;
    transform: translateY(-2px);
}

a.tobac-footer-contact-item:hover .tobac-footer-contact-val {
    color: #ddb969;
}

.tobac-footer-icon-box {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ddb969;
    transition: all 0.22s ease;
}

.tobac-footer-contact-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.tobac-footer-contact-label {
    font-size: 0.74rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.45);
}

.tobac-footer-contact-val {
    font-size: 0.92rem;
    color: rgba(255, 255, 255, 0.88);
    line-height: 1.45;
    transition: color 0.22s ease;
}

/* Divider & Bottom Bar */
.tobac-footer-bottom {
    margin-top: 55px;
    padding-top: 24px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.tobac-footer-copy {
    margin: 0;
    font-size: 0.84rem;
    color: rgba(255, 255, 255, 0.48);
}

.tobac-footer-legal {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.tobac-footer-legal a {
    color: rgba(255, 255, 255, 0.52);
    text-decoration: none;
    font-size: 0.84rem;
    transition: color 0.22s ease;
}

.tobac-footer-legal a:hover {
    color: #ddb969;
}

.tobac-footer-legal-sep {
    color: rgba(255, 255, 255, 0.18);
    font-size: 0.75rem;
}

/* Responsive adjustments */
@media (max-width: 991px) {
    .tobac-footer-container {
        padding: 55px 20px 24px;
    }
    .tobac-footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 36px 28px;
    }
}

@media (max-width: 600px) {
    .tobac-footer-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
    .tobac-footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        margin-top: 40px;
    }
    .tobac-footer-legal {
        gap: 14px;
    }
}
</style>

<footer class="tobac-footer-wrap">
    <div class="tobac-footer-container">

        <div class="tobac-footer-grid">

            <!-- Col 1: Brand & Overview -->
            <div class="tobac-footer-brand">
                <a href="<?php echo $base; ?>index.php" class="tobac-footer-logo-link" aria-label="Tobac Leaf Enterprises">
                    <img
                        loading="lazy"
                        src="<?php echo $base; ?>assets/images/tobaclogo.png"
                        alt="Tobac Leaf Enterprises"
                        class="tobac-footer-logo"
                    />
                </a>

                <p class="tobac-footer-tagline">
                    Industrial tobacco leaf processing, advanced threshing, and sustainable bio-steam infrastructure delivering consistent quality across the tobacco value chain.
                </p>

                <div class="tobac-footer-badge">
                    <span class="tobac-footer-badge-dot"></span>
                    <span>Tangutur Facility • Prakasam District</span>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <div class="tobac-footer-title">Company</div>
                <ul class="tobac-footer-links">
                    <li><a href="<?php echo $base; ?>index.php">Home</a></li>
                    <li><a href="<?php echo $base; ?>aboutus.php">About Us</a></li>
                    <li><a href="<?php echo $base; ?>aboutus.php#leadership">Our Leadership</a></li>
                    <li><a href="<?php echo $base; ?>sustainability.php">Sustainability</a></li>
                    <li><a href="<?php echo $base; ?>blog.php">Blogs</a></li>
                </ul>
            </div>

            <!-- Col 3: Operations & Services -->
            <div>
                <div class="tobac-footer-title">Operations</div>
                <ul class="tobac-footer-links">
                    <li><a href="<?php echo $base; ?>services.php">Core Services</a></li>
                    <li><a href="<?php echo $base; ?>operations.php">Processing Facility</a></li>
                    <li><a href="<?php echo $base; ?>operations.php">Quality &amp; Standards</a></li>
                    <li><a href="<?php echo $base; ?>sustainability.php">Bio-Steam Energy</a></li>
                    <li><a href="<?php echo $base; ?>contact.php">Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact & Facility -->
            <div>
                <div class="tobac-footer-title">Connect With Us</div>
                <div class="tobac-footer-contacts">

                    <!-- Email -->
                    <a href="mailto:info@tabac.com" class="tobac-footer-contact-item">
                        <div class="tobac-footer-icon-box" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div class="tobac-footer-contact-text">
                            <div class="tobac-footer-contact-label">Email Us</div>
                            <div class="tobac-footer-contact-val">info@tabac.com</div>
                        </div>
                    </a>

                    <!-- Phone -->
                    <a href="tel:+918592252000" class="tobac-footer-contact-item">
                        <div class="tobac-footer-icon-box" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="tobac-footer-contact-text">
                            <div class="tobac-footer-contact-label">Call Us</div>
                            <div class="tobac-footer-contact-val">+91 99999 99000</div>
                        </div>
                    </a>

                    <!-- Facility Location -->
                    <div class="tobac-footer-contact-item">
                        <div class="tobac-footer-icon-box" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="tobac-footer-contact-text">
                            <div class="tobac-footer-contact-label">Facility Address</div>
                            <div class="tobac-footer-contact-val">Prakasam District, Andhra Pradesh, India</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Legal Links -->
        <div class="tobac-footer-bottom">
            <p class="tobac-footer-copy">
                &copy; <?php echo date('Y'); ?> Tobac Enterprises. All rights reserved.
            </p>

            <div class="tobac-footer-legal">
                <a href="<?php echo $base; ?>privacy-policy.php">Privacy Policy</a>
                <span class="tobac-footer-legal-sep" aria-hidden="true">&bull;</span>
                <a href="<?php echo $base; ?>terms-conditions.php">Terms &amp; Conditions</a>
                <span class="tobac-footer-legal-sep" aria-hidden="true">&bull;</span>
                <a href="<?php echo $base; ?>cookie-policy.php">Cookie Policy</a>
            </div>
        </div>

    </div>
</footer>
