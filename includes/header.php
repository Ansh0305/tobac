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

            </div>
        </div>
    </div>

    <!-- MOBILE / HAMBURGER -->
    <div class="desktop-hamburger-wrapper">

        <div class="hamburger-image-div full-width">
            <img
                src="<?php echo $base; ?>assets/images/tobaclogo.png"
                loading="lazy"
                width="300"
                height="200"
                alt="Tobac Enterprises"
                srcset="
                    <?php echo $base; ?>assets/images/tobaclogo.png 500w,
                    <?php echo $base; ?>assets/images/tobaclogo.png 740w
                "
                sizes="(max-width: 479px) 100vw, 300px"
                class="full-width border-radius-10"
            />
        </div>

        <div
            data-w-id="568b6a26-2b86-02a3-b2f4-c1bfe7c5b5a8"
            class="cross-icon overflow-hidden"
        >
            <div class="cross-line-one">
                <div class="hamberger-line cross-one"></div>
            </div>

            <div class="cross-line-two">
                <div class="hamberger-line cross-two"></div>
            </div>
        </div>

    </div>
</header>
