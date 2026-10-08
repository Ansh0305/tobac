<?php $base = isset($base_path) ? $base_path : ''; ?>
<style>
/* =========================================================
   PREMIUM DARK LUXE GLASSMORPHISM FOOTER
   ========================================================= */

.tobac-footer-wrap {
    background-color: #070707;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    font-family: inherit;
}

/* Atmospheric Ambient Lighting under Glass */
.tobac-footer-glow-1 {
    position: absolute;
    top: -40px;
    right: 8%;
    width: 440px;
    height: 360px;
    background: radial-gradient(circle, rgba(176, 137, 64, 0.14) 0%, rgba(176, 137, 64, 0.03) 55%, transparent 70%);
    pointer-events: none;
    z-index: 1;
    filter: blur(40px);
}

.tobac-footer-glow-2 {
    position: absolute;
    bottom: -20px;
    left: 8%;
    width: 380px;
    height: 280px;
    background: radial-gradient(circle, rgba(221, 185, 105, 0.09) 0%, rgba(221, 185, 105, 0.02) 50%, transparent 70%);
    pointer-events: none;
    z-index: 1;
    filter: blur(45px);
}

.tobac-footer-container {
    max-width: 1560px;
    margin: 0 auto;
    padding: 65px 48px 30px;
    position: relative;
    z-index: 2;
}

/* 4-column main grid */
.tobac-footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1.1fr 1.6fr;
    gap: 56px;
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
    margin: 0 0 22px 0;
    max-width: 370px;
    letter-spacing: 0.2px;
}

/* Frosted Glass Pill Badge */
.tobac-footer-badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.035);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.09);
    border-radius: 999px;
    font-size: 0.76rem;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.12);
    transition: all 0.25s ease;
}

.tobac-footer-badge:hover {
    background: rgba(255, 255, 255, 0.055);
    border-color: rgba(221, 185, 105, 0.25);
}

.tobac-footer-badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #b08940;
    box-shadow: 0 0 8px rgba(176, 137, 64, 0.85);
    display: inline-block;
}

/* Column Headings */
.tobac-footer-title {
    color: #ddb969;
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
    opacity: 0.7;
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

/* Frosted Glass Contact Card */
.tobac-footer-glass-card {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 24px 22px;
    box-shadow: 
        0 20px 40px -15px rgba(0, 0, 0, 0.55),
        inset 0 1px 0 rgba(255, 255, 255, 0.12),
        inset 0 0 16px rgba(255, 255, 255, 0.015);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.tobac-footer-glass-card:hover {
    border-color: rgba(221, 185, 105, 0.25);
    background: rgba(255, 255, 255, 0.045);
    box-shadow: 
        0 25px 50px -15px rgba(0, 0, 0, 0.65),
        0 0 35px rgba(176, 137, 64, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.18);
    transform: translateY(-2px);
}

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
    color: #070707;
    border-color: #b08940;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(176, 137, 64, 0.4);
}

a.tobac-footer-contact-item:hover .tobac-footer-contact-val {
    color: #ddb969;
}

/* Frosted Icon Box */
.tobac-footer-icon-box {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 9px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.14);
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
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.45);
}

.tobac-footer-contact-val {
    font-size: 0.90rem;
    color: rgba(255, 255, 255, 0.88);
    line-height: 1.45;
    transition: color 0.22s ease;
}

/* Frosted Bottom Dock */
.tobac-footer-bottom {
    margin-top: 48px;
    padding: 18px 30px;
    background: rgba(255, 255, 255, 0.025);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 14px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.tobac-footer-copy {
    margin: 0;
    font-size: 0.84rem;
    color: rgba(255, 255, 255, 0.52);
}

.tobac-footer-legal {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.tobac-footer-legal a {
    color: rgba(255, 255, 255, 0.55);
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
@media (max-width: 1200px) {
    .tobac-footer-container {
        padding: 55px 32px 28px;
    }
    .tobac-footer-grid {
        gap: 40px;
    }
}

@media (max-width: 991px) {
    .tobac-footer-container {
        padding: 50px 24px 26px;
    }
    .tobac-footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 36px 28px;
    }
}

@media (max-width: 600px) {
    .tobac-footer-container {
        padding: 42px 18px 24px;
    }
    .tobac-footer-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
    .tobac-footer-glass-card {
        padding: 20px 18px;
    }
    .tobac-footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        margin-top: 32px;
        padding: 16px 18px;
    }
    .tobac-footer-legal {
        gap: 14px;
    }
}
</style>

<footer class="tobac-footer-wrap">
    <!-- Atmospheric Ambient Glows behind frosted elements -->
    <div class="tobac-footer-glow-1" aria-hidden="true"></div>
    <div class="tobac-footer-glow-2" aria-hidden="true"></div>

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

            <!-- Col 4: Frosted Glass Contact & Facility Card -->
            <div class="tobac-footer-glass-card">
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

        <!-- Frosted Bottom Dock: Copyright & Legal Links -->
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
