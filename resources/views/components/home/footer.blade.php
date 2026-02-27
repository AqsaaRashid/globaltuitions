<section class="newsletter-cta-section" id="contact">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>Join us to Grow Skills, Together!</h2>
                    <p>Stay informed about new courses and special offers</p>
                </div>
                <div class="newsletter-form">
                  <form id="newsletterForm">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="text" name="name" placeholder="Your name" required>
    <button type="submit" class="btn-primary">Get Notified</button>
    <p class="privacy-note">We respect your privacy. No spam, ever.</p>
</form>

                </div>
            </div>
        </div>
    </section> <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024  Imperial Tuitions. All rights reserved.</p>
        </div>
    </footer>

    <div id="subscribeSuccessModal" class="modal-overlay">
    <div class="success-box">
        <h3 class="success-title">
            Subscription Successful
        </h3>

        <p class="success-text">
            Thank you for subscribing to <strong> Imperial Tuitions</strong>.<br>
            Please check your email for updates and announcements.
        </p>

        <button class="success-btn" onclick="closeSubscribeSuccess()">
            OK
        </button>
    </div>
</div>



<style>
    /* ===============================
   FIX SUBSCRIBE OUTER LEFT MARGIN
   =============================== */

/* Tablet & below */
@media (max-width: 1024px) {
    .subscribe-outer {
        margin-left: 0;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .subscribe-outer {
        margin-left: 0;
        max-width: 100%;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .subscribe-outer {
        margin-left: 0;
        padding: 6px;
    }
}

</style>
<script>
document.getElementById('newsletterForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("{{ route('subscribe.store') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            this.reset();

            // 🔥 SHOW SUCCESS POPUP
            document.body.style.overflow = 'hidden';
            document.getElementById('subscribeSuccessModal').style.display = 'flex';
        }
    })
    .catch(() => {
        alert("Something went wrong. Please try again.");
    });
});

function closeSubscribeSuccess(){
    document.getElementById('subscribeSuccessModal').style.display = 'none';
    document.body.style.overflow = '';
}
</script>

