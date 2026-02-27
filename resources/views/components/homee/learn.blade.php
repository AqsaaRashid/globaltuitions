<section id="learn" class="confidence-wrap">
    <div class="confidence-container">

        <!-- LEFT IMAGE -->
        <div class="confidence-left">
            <img src="/images/ab0.png" alt="Learn with confidence" class="confidence-img">
        </div>

        <!-- RIGHT CONTENT -->
        <div class="confidence-right">
            <h2 class="confidence-title">Learn With Confidence</h2>

            <p class="confidence-text">
                We believe quality education should be accessible to everyone, regardless of background or budget.
                Our platform offers free, beginner-friendly courses designed to help learners build real skills and
                grow with confidence.
            </p>

            <p class="confidence-text">
                With simple lessons, practical knowledge, and flexible learning, we’re here to support your journey
                every step of the way.
            </p>

            <!-- FEATURES -->
            <div class="confidence-features">
                <div class="feature-item">
                    <span class="feature-icon"><i class="bi bi-check2"></i></span>
                    <span class="feature-label">Free Access for Everyone</span>
                </div>

                <div class="feature-item">
                    <span class="feature-icon"><i class="bi bi-check2"></i></span>
                    <span class="feature-label">Beginner-Friendly Learning</span>
                </div>

                <div class="feature-item">
                    <span class="feature-icon"><i class="bi bi-check2"></i></span>
                    <span class="feature-label">Practical & Useful Skills</span>
                </div>

                <div class="feature-item">
                    <span class="feature-icon"><i class="bi bi-check2"></i></span>
                    <span class="feature-label">Learn Anytime, Anywhere</span>
                </div>
            </div>

            <!-- SUBSCRIBE BAR -->
            <!-- SUBSCRIBE OUTER WRAPPER (missing in your version) -->
<div class="subscribe-outer">
    <form id="subscribeForm" class="subscribe-bar">
        @csrf
        <input type="email" name="email" class="subscribe-input" placeholder="Enter Email Address for updates" required>
        <button type="submit" class="subscribe-btn">
            Subscribe <i class="bi bi-arrow-right"></i>
        </button>
    </form>
</div>


        </div>

    </div>
    <!-- SUBSCRIBE SUCCESS MODAL -->
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

</section>

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
document.getElementById('subscribeForm').addEventListener('submit', function(e) {
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
        if(data.success){
            document.getElementById('subscribeForm').reset();

            // 🔥 SHOW SUCCESS POPUP
            document.body.style.overflow = 'hidden';
            document.getElementById('subscribeSuccessModal').style.display = 'flex';
        }
    })
    .catch(() => {
        alert("Something went wrong. Please try again.");
    });
});
</script>
<script>
function closeSubscribeSuccess(){
    document.getElementById('subscribeSuccessModal').style.display = 'none';
    document.body.style.overflow = '';
}
</script>
