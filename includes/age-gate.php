<?php
// includes/age-gate.php - 18+ Age Verification Modal
$base = isset($base_path) ? $base_path : '';
?>
<!-- Age Verification Modal (18+) -->
<div id="tobac-age-gate" class="tobac-age-overlay" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="tobac-age-heading">
    <div class="tobac-age-card">
        
        <!-- Brand Logo -->
        <div class="tobac-age-brand">
            <img
                src="<?php echo $base; ?>assets/images/tobaclogo.png"
                alt="Tobac Enterprises"
                class="tobac-age-logo"
            />
        </div>

        <!-- 18+ Pill Badge -->
        <div class="tobac-age-badge-wrap">
            <span class="tobac-age-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                    <path d="M7 7h10"/>
                    <path d="M12 7v10"/>
                </svg>
                Age Restricted • 18+
            </span>
        </div>

        <!-- Heading & Question -->
        <h2 id="tobac-age-heading" class="tobac-age-title">Are you 18 years of age or older?</h2>

        <p class="tobac-age-description">
            This website contains commercial information regarding tobacco leaf cultivation, threshing facilities, and wholesale export operations. You must be at least 18 years old to enter.
        </p>

        <!-- Action Buttons -->
        <div class="tobac-age-actions">
            <button type="button" id="tobac-age-btn-yes" class="tobac-age-btn tobac-age-btn-yes">
                <span>Yes, I am 18 or older</span>
                <!-- <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg> -->
            </button>
            <button type="button" id="tobac-age-btn-no" class="tobac-age-btn tobac-age-btn-no">
                <span>No, I am under 18</span>
            </button>
        </div>

        <!-- Legal Disclaimer -->
        <p class="tobac-age-disclaimer">
            By clicking "Yes", you confirm that you are of legal age (18+) to view tobacco-related business material in your jurisdiction.
        </p>
    </div>
</div>

<style>
/* =========================================================
   AGE VERIFICATION MODAL STYLING
   ========================================================= */

.tobac-age-overlay {
    position: fixed;
    inset: 0;
    width: 100vw;
    height: 100vh;
    background: radial-gradient(circle at 50% 40%, #171512 0%, #0c0b0a 65%, #050505 100%);
    z-index: 9999999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    box-sizing: border-box;
    opacity: 1;
    visibility: visible;
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.tobac-age-overlay.tobac-age-closing {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

/* Modal Card */
.tobac-age-card {
    position: relative;
    background: linear-gradient(180deg, #181818 0%, #111111 100%);
    border: 1px solid rgba(221, 185, 105, 0.32);
    border-radius: 22px;
    padding: 44px 38px;
    max-width: 500px;
    width: 100%;
    text-align: center;
    box-shadow: 0 32px 80px rgba(0, 0, 0, 0.9), 0 0 0 1px rgba(255, 255, 255, 0.04);
    box-sizing: border-box;
    animation: tobacAgePop 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes tobacAgePop {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.96);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Brand Logo */
.tobac-age-brand {
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
}

.tobac-age-logo {
    width: 175px;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 4px 14px rgba(0, 0, 0, 0.6));
}

/* Badge */
.tobac-age-badge-wrap {
    margin-bottom: 16px;
}

.tobac-age-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: 'Montserrat', sans-serif;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--yellow, #ddb969);
    background: rgba(221, 185, 105, 0.1);
    border: 1px solid rgba(221, 185, 105, 0.28);
    padding: 6px 14px;
    border-radius: 50px;
}

/* Title & Description */
.tobac-age-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 26px;
    font-weight: 700;
    line-height: 1.25;
    color: #ffffff;
    letter-spacing: -0.4px;
    margin: 0 0 14px 0;
}

.tobac-age-description {
    font-family: 'Inter', sans-serif;
    font-size: 14.5px;
    line-height: 1.55;
    color: rgba(255, 255, 255, 0.76);
    margin: 0 0 26px 0;
}

/* Actions */
.tobac-age-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}

.tobac-age-btn {
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 15px 24px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.22s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    box-sizing: border-box;
    text-transform: uppercase;
    border: none;
}

/* Primary "Yes" Button */
.tobac-age-btn-yes {
    background-color: var(--yellow, #f6b61b);
    color: #111111;
    box-shadow: 0 6px 20px rgba(246, 182, 27, 0.35);
}

.tobac-age-btn-yes:hover {
    background-color: #ffd043;
    transform: translateY(-1px);
    box-shadow: 0 8px 24px rgba(246, 182, 27, 0.45);
}

.tobac-age-btn-yes:active {
    transform: translateY(0);
}

/* Secondary "No" Button */
.tobac-age-btn-no {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.85);
    border: 1px solid rgba(255, 255, 255, 0.16);
}

.tobac-age-btn-no:hover {
    background: rgba(239, 68, 68, 0.14);
    color: #fca5a5;
    border-color: rgba(239, 68, 68, 0.38);
}

/* Disclaimer text */
.tobac-age-disclaimer {
    font-family: 'Inter', sans-serif;
    font-size: 11.5px;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.45);
    margin: 0;
}

/* Body lock when modal active */
body.tobac-age-locked {
    overflow: hidden !important;
    height: 100vh !important;
}

@media (max-width: 540px) {
    .tobac-age-card {
        padding: 34px 22px;
        border-radius: 18px;
    }

    .tobac-age-title {
        font-size: 22px;
    }

    .tobac-age-description {
        font-size: 13.5px;
        margin-bottom: 22px;
    }

    .tobac-age-btn {
        padding: 13px 20px;
        font-size: 13px;
    }

    .tobac-age-logo {
        width: 155px;
    }
}
</style>

<script>
(function() {
    var STORAGE_KEY = 'tobac_age_verified';
    var isUnderagePage = window.location.pathname.indexOf('underage') !== -1;
    var gate = document.getElementById('tobac-age-gate');
    var btnYes = document.getElementById('tobac-age-btn-yes');
    var btnNo = document.getElementById('tobac-age-btn-no');

    var verifiedStatus = null;
    try {
        verifiedStatus = localStorage.getItem(STORAGE_KEY);
    } catch(e) {}

    // 1. If user previously selected Underage and is not already on underage.php, redirect immediately
    if (verifiedStatus === 'underage' && !isUnderagePage) {
        window.location.replace('<?php echo $base; ?>underage');
        return;
    }

    // 2. If on the underage page itself, never display the modal
    if (isUnderagePage) {
        return;
    }

    // 3. If not verified yet, show the modal
    if (verifiedStatus !== 'true') {
        if (gate) {
            gate.style.display = 'flex';
            document.body.classList.add('tobac-age-locked');
        }
    }

    // 4. Handle "Yes, I am 18 or older"
    if (btnYes) {
        btnYes.addEventListener('click', function() {
            try {
                localStorage.setItem(STORAGE_KEY, 'true');
                sessionStorage.setItem(STORAGE_KEY, 'true');
            } catch(e) {}

            // Immediately reveal the page content so it transitions in smoothly
            document.documentElement.classList.remove('tobac-age-unverified');
            document.body.classList.remove('tobac-age-locked');

            if (gate) {
                gate.classList.add('tobac-age-closing');
                setTimeout(function() {
                    gate.style.display = 'none';
                }, 400);
            }

            // Trigger the entrance animations right as the user enters!
            requestAnimationFrame(function() {
                if (typeof window._tobacPlayAnimations === 'function') {
                    window._tobacPlayAnimations();
                }
                window.dispatchEvent(new Event('resize'));
                window.dispatchEvent(new CustomEvent('tobac:entered'));
            });
        });
    }

    // 5. Handle "No, I am under 18"
    if (btnNo) {
        btnNo.addEventListener('click', function() {
            try {
                localStorage.setItem(STORAGE_KEY, 'underage');
                sessionStorage.setItem(STORAGE_KEY, 'underage');
            } catch(e) {}

            window.location.href = '<?php echo $base; ?>underage';
        });
    }
})();
</script>
