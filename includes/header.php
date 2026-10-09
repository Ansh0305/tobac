<?php $base = isset($base_path) ? $base_path : ''; ?>
<style>
.tobac-logo {
    width: 185px !important;
    height: auto !important;
    max-width: none !important;
    object-fit: contain;
    display: block;
}

.logo.w-nav-brand {
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

@media (max-width: 991px) {
    .tobac-logo {
        width: 170px !important;
    }
}

@media (max-width: 767px) {
    .tobac-logo {
        width: 155px !important;
    }
}

@media (max-width: 479px) {
    .tobac-logo {
        width: 145px !important;
    }
}

/* =========================================================
   GLOBAL HEADING BOLDNESS
   Matches the bold typography (font-weight: 700) requested
   by the client across all files and pages.
   ========================================================= */
h1, h2, h3, h4,
.heading-style-h1,
.heading-style-h2,
.heading-style-h3,
.heading-style-h4,
.features-two-heading,
.service-six-title-wrap,
.hero-three-title-text {
    font-weight: 700 !important;
}
/* =========================================================
   MOBILE HAMBURGER BUTTON & DROPDOWN STYLING
   ========================================================= */

.menu-button.w-nav-button {
    display: none;
    cursor: pointer;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(221, 185, 105, 0.25);
    border-radius: 10px;
    padding: 10px;
    width: 44px;
    height: 44px;
    box-sizing: border-box;
    transition: all 0.25s ease;
    -webkit-tap-highlight-color: transparent;
}

.tobac-hamburger-icon {
    width: 22px;
    height: 16px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.tobac-ham-line {
    display: block;
    width: 100%;
    height: 2px;
    background-color: #ddb969;
    border-radius: 2px;
    transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.22s ease;
    transform-origin: center;
}

/* Transform to X when menu is opened */
.menu-button.w-nav-button.w--open .tobac-ham-line.line-1,
.menu-button.w-nav-button.is-active .tobac-ham-line.line-1 {
    transform: translateY(7px) rotate(45deg);
}

.menu-button.w-nav-button.w--open .tobac-ham-line.line-2,
.menu-button.w-nav-button.is-active .tobac-ham-line.line-2 {
    opacity: 0;
    transform: scaleX(0);
}

.menu-button.w-nav-button.w--open .tobac-ham-line.line-3,
.menu-button.w-nav-button.is-active .tobac-ham-line.line-3 {
    transform: translateY(-7px) rotate(-45deg);
}

@media (max-width: 991px) {
    .header-grid-two {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
    }

    .menu-button.w-nav-button {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin-left: auto;
    }

    /* Mobile Dropdown Menu Container */
    .navbar .w-nav-menu,
    .navbar .navbar-menu {
        background: rgba(10, 10, 10, 0.98) !important;
        backdrop-filter: blur(24px) !important;
        -webkit-backdrop-filter: blur(24px) !important;
        border-bottom: 1px solid rgba(221, 185, 105, 0.22) !important;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.85) !important;
        padding: 16px 20px 22px !important;
        gap: 0 !important;
        width: 100% !important;
        left: 0 !important;
        right: 0 !important;
        box-sizing: border-box !important;
    }

    .navbar-menu .nav-menu.w-nav-link {
        padding: 14px 16px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
        display: flex !important;
        align-items: center !important;
        text-decoration: none !important;
        transition: all 0.2s ease !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    .navbar-menu .nav-menu.w-nav-link:last-child {
        border-bottom: none !important;
    }

    .navbar-menu .nav-menu.w-nav-link .nav-text {
        font-size: 16px !important;
        font-weight: 500 !important;
        letter-spacing: 0.5px !important;
        color: rgba(255, 255, 255, 0.88) !important;
        transition: color 0.2s ease, transform 0.2s ease !important;
    }

    .navbar-menu .nav-menu.w-nav-link:hover .nav-text,
    .navbar-menu .nav-menu.w-nav-link.w--current .nav-text {
        color: #ddb969 !important;
        transform: translateX(4px) !important;
    }

    .w-nav-overlay {
        top: 100% !important;
        width: 100% !important;
        left: 0 !important;
        right: 0 !important;
    }
}
</style>
<header data-wf--navbar--variant="base" class="navbar-style-one-wrapper">
    <div
        data-w-id="3f38a0f6-a67a-4f3a-70d6-d412337f0ea8"
        data-animation="default"
        data-collapse="medium"
        data-duration="400"
        data-easing="ease"
        data-easing2="ease"
        role="banner"
        class="navbar w-nav"
    >
        <div class="nav-container w-container">
            <div class="w-layout-grid header-grid-two">

                <!-- LOGO -->
                <a href="<?php echo $base; ?>index.php" class="logo w-nav-brand">
                    <img
                        src="<?php echo $base; ?>assets/images/tobaclogo.png"
                        alt="Tobac Enterprises"
                        loading="eager"
                        class="brand tobac-logo"
                    />
                </a>

                <!-- NAVIGATION -->
                <nav role="navigation" class="navbar-menu w-nav-menu">

                    <!-- Home -->
                    <a href="<?php echo $base; ?>index.php" class="nav-menu w-nav-link">
                        <div class="nav-text">Home</div>
                    </a>

                    <!-- About Us -->
                    <a href="<?php echo $base; ?>aboutus.php" class="nav-menu w-nav-link">
                        <div class="nav-text">About Us</div>
                    </a>

                    <!-- Services -->
                    <a href="<?php echo $base; ?>services.php" class="nav-menu w-nav-link">
                        <div class="nav-text">Services</div>
                    </a>

                    <!-- Operations -->
                    <a href="<?php echo $base; ?>operations.php" class="nav-menu w-nav-link">
                        <div class="nav-text">Operations</div>
                    </a>

                    <!-- Sustainability -->
                    <a href="<?php echo $base; ?>sustainability.php" class="nav-menu w-nav-link">
                        <div class="nav-text">Sustainability</div>
                    </a>

                    <!-- Contact -->
                    <a href="<?php echo $base; ?>contact.php" class="nav-menu w-nav-link">
                        <div class="nav-text">Contact</div>
                    </a>

                </nav>

                <!-- MOBILE HAMBURGER BUTTON -->
                <div
                    class="menu-button w-nav-button"
                    aria-label="menu"
                    role="button"
                    tabindex="0"
                    aria-haspopup="menu"
                    aria-expanded="false"
                >
                    <div class="tobac-hamburger-icon">
                        <span class="tobac-ham-line line-1"></span>
                        <span class="tobac-ham-line line-2"></span>
                        <span class="tobac-ham-line line-3"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var navButton = document.querySelector('.navbar .w-nav-button');
    var navMenu = document.querySelector('.navbar .w-nav-menu');
    var navBar = document.querySelector('.navbar.w-nav');
    if (!navButton || !navMenu) return;

    // Toggle helper to guarantee instant smooth menu response
    navButton.addEventListener('click', function(e) {
        setTimeout(function() {
            var isOpen = navButton.classList.contains('w--open') || navMenu.hasAttribute('data-nav-menu-open');
            if (isOpen) {
                navButton.classList.add('is-active');
                navButton.setAttribute('aria-expanded', 'true');
            } else {
                navButton.classList.remove('is-active');
                navButton.setAttribute('aria-expanded', 'false');
            }
        }, 50);
    });

    // Close when clicking a nav link on mobile
    var links = navMenu.querySelectorAll('.w-nav-link');
    links.forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                navButton.classList.remove('is-active');
            }
        });
    });
});
</script>
