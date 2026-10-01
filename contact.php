<?php include 'includes/inner-header.php'; ?>

<main>
    <section class="features-one" style="padding: 90px 0 70px;">
        <div class="w-layout-blockcontainer container w-container">
            <div class="text-align-center" style="max-width: 850px; margin: 0 auto 56px;">
                <div class="sub-heading">CONTACT</div>
                <h1 class="color-black" style="margin: 18px 0;">Let’s talk about your processing requirements</h1>
                <p>Share a little about your product, volumes and timing. Our team can discuss the right processing and handling approach for your needs.</p>
            </div>
            <div class="w-layout-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; align-items: start;">
                <div>
                    <h2 class="heading-style-h4">Tobac Enterprises</h2>
                    <p>Prakasam District<br />Andhra Pradesh, India</p>
                    <p>For a useful first conversation, include your tobacco type, preferred processing, estimated volume and any quality or packing requirements.</p>
                </div>
                <form method="post" style="display: grid; gap: 18px;">
                    <label for="contact-name">Name</label>
                    <input id="contact-name" name="name" type="text" autocomplete="name" required />
                    <label for="contact-email">Business email</label>
                    <input id="contact-email" name="email" type="email" autocomplete="email" required />
                    <label for="contact-company">Company</label>
                    <input id="contact-company" name="company" type="text" autocomplete="organization" />
                    <label for="contact-message">How can we help?</label>
                    <textarea id="contact-message" name="message" rows="5" required></textarea>
                    <button type="submit" class="button-style-one">Send inquiry</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>