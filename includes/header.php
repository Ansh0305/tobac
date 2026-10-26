<?php $base = isset($base_path) ? $base_path : '/'; ?>
<script>
(function() {
    try {
        var status = localStorage.getItem('tobac_age_verified');
        var isUnderagePage = window.location.pathname.indexOf('underage') !== -1;
        if (status === 'underage' && !isUnderagePage) {
            window.location.replace('<?php echo isset($base_path) ? $base_path : ""; ?>underage');
            return;
        } else if (status !== 'true' && !isUnderagePage) {
            document.documentElement.classList.add('tobac-age-unverified');

            // Intercept Webflow initialization so animations do NOT start in the background
            var _wf = window.Webflow;
            window._tobacPendingAnimations = null;
            window._tobacPlayAnimations = function() {
                if (typeof window._tobacPendingAnimations === 'function') {
                    window._tobacPendingAnimations();
                    window._tobacPendingAnimations = null;
                }
            };

            function patchWebflow(wf) {
                if (!wf || !wf.define || wf._tobacPatched) return;
                wf._tobacPatched = true;
                var origDefine = wf.define;
                wf.define = function(name, factory, opts) {
                    if (name === 'ix2') {
                        return origDefine.call(wf, name, function(c, d, i) {
                            var ix2Module = factory(c, d, i);
                            if (ix2Module && typeof ix2Module.init === 'function') {
                                var origInit = ix2Module.init;
                                ix2Module.init = function(rawData) {
                                    var currentStatus = null;
                                    try { currentStatus = localStorage.getItem('tobac_age_verified'); } catch(e) {}
                                    if (currentStatus === 'true') {
                                        return origInit.call(ix2Module, rawData);
                                    }
                                    window._tobacPendingAnimations = function() {
                                        origInit.call(ix2Module, rawData);
                                    };
                                };
                            }
                            return ix2Module;
                        }, opts);
                    }
                    return origDefine.apply(wf, arguments);
                };
            }

            if (_wf && _wf.define) {
                patchWebflow(_wf);
            }

            try {
                Object.defineProperty(window, 'Webflow', {
                    configurable: true,
                    enumerable: true,
                    get: function() { return _wf; },
                    set: function(val) {
                        _wf = val;
                        patchWebflow(_wf);
                    }
                });
            } catch(e) {}
        }
    } catch(e) {}
})();
</script>
<style>
html.tobac-age-unverified body {
    overflow: hidden !important;
}

/* Ensure background page content is completely hidden while unverified so nothing loads or flashes behind */
html.tobac-age-unverified body > *:not(#tobac-age-gate):not(script):not(style) {
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none !important;
}

/* Smooth fade-in transition when verified and user enters */
body > *:not(#tobac-age-gate):not(script):not(style) {
    transition: opacity 0.5s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

/* =========================================================
   GLOBAL SCROLLBAR REMOVAL (Clean, Minimalist Look)
   Hides visual scrollbars across Chrome, Safari, Edge & Firefox
   while maintaining full scrolling via mouse, touch & keys.
   ========================================================= */
html,
body,
* {
    -ms-overflow-style: none !important; /* IE and Edge */
    scrollbar-width: none !important;    /* Firefox */
}

::-webkit-scrollbar {
    display: none !important;
    width: 0 !important;
    height: 0 !important;
    background: transparent !important;
}

/* =========================================================
   TOP SCROLL PROGRESS INDICATOR BAR (Option 3)
   A luxury 3px gold gradient progress line at the viewport top
   ========================================================= */
.tobac-scroll-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 3px;
    background: linear-gradient(90deg, #9f7833 0%, #ddb969 45%, #f6b61b 80%, #ffe07a 100%);
    box-shadow: 0 0 10px rgba(221, 185, 105, 0.75), 0 0 3px rgba(246, 182, 27, 0.9);
    z-index: 9999998;
    pointer-events: none;
    border-radius: 0 2px 2px 0;
    transition: width 0.08s ease-out, opacity 0.3s ease;
    opacity: 1;
    will-change: width;
}

html.tobac-age-unverified .tobac-scroll-progress {
    opacity: 0 !important;
}
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
.menu-button.w-nav-button.w--open .tobac-ham-line.line-1 {
    transform: translateY(7px) rotate(45deg);
}

.menu-button.w-nav-button.w--open .tobac-ham-line.line-2 {
    opacity: 0;
    transform: scaleX(0);
}

.menu-button.w-nav-button.w--open .tobac-ham-line.line-3 {
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
<!-- Top Scroll Progress Indicator Bar (Option 3) -->
<div id="tobac-scroll-progress" class="tobac-scroll-progress" aria-hidden="true"></div>
<script>
(function() {
    var bar = null;
    var ticking = false;

    function updateProgress() {
        if (!bar) {
            bar = document.getElementById('tobac-scroll-progress');
            if (!bar) return;
        }
        var winScroll = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop || 0;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = height > 0 ? (winScroll / height) * 100 : 0;
        bar.style.width = Math.min(100, Math.max(0, scrolled)) + '%';
        ticking = false;
    }

    function onScroll() {
        if (!ticking) {
            requestAnimationFrame(updateProgress);
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    document.addEventListener('DOMContentLoaded', updateProgress);
    window.addEventListener('tobac:entered', updateProgress);
})();
</script>
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
                <a href="<?php echo $base; ?>" class="logo w-nav-brand">
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
                    <a href="<?php echo $base; ?>" class="nav-menu w-nav-link">
                        <div class="nav-text">Home</div>
                    </a>

                    <!-- About Us -->
                    <a href="<?php echo $base; ?>aboutus" class="nav-menu w-nav-link">
                        <div class="nav-text">About Us</div>
                    </a>

                    <!-- Services -->
                    <a href="<?php echo $base; ?>services" class="nav-menu w-nav-link">
                        <div class="nav-text">Services</div>
                    </a>

                    <!-- Operations -->
                    <a href="<?php echo $base; ?>operations" class="nav-menu w-nav-link">
                        <div class="nav-text">Operations</div>
                    </a>

                    <!-- Sustainability -->
                    <a href="<?php echo $base; ?>sustainability" class="nav-menu w-nav-link">
                        <div class="nav-text">Sustainability</div>
                    </a>

                    <!-- Contact -->
                    <a href="<?php echo $base; ?>contact" class="nav-menu w-nav-link">
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
    if (!navButton || !navMenu) return;

    // Close when clicking a nav link on mobile
    var links = navMenu.querySelectorAll('.w-nav-link');
    links.forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992 && navButton.classList.contains('w--open')) {
                navButton.click();
            }
        });
    });
});
</script>
