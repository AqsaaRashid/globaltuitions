<section id="work" class="how-it-works">
    <div class="hiw-container">

        <!-- Header -->
        <div class="hiw-header">
            <div>
                <h2>How It Works</h2>
                <p>Very Simple Steps to Success Goals</p>
            </div>

            <a href="#" class="hiw-btn">Enroll Now</a>
        </div>

        <!-- Steps Grid -->
        <div class="hiw-grid">

            <!-- Step 1 -->
            <div class="hiw-card">
    <div class="hiw-number">1</div>
    <div class="hiw-content">
        <h3>Browse Courses</h3>
        <p>Explore a wide range of free courses built for beginners and advanced learners.</p>
    </div>
</div>


            <!-- Step 2 -->
            <div class="hiw-card">
                <div class="hiw-number">2</div>
                <div class="hiw-content">
                    <h3>Choose What You Want to Learn</h3>
                    <p>Select the course that matches your goals and start at your own pace.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="hiw-card">
                <div class="hiw-number">3</div>
                <div class="hiw-content">
                    <h3>Start Learning Instantly</h3>
                    <p>Access lessons, videos, and resources anytime—no registration fees required.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="hiw-card">
                <div class="hiw-number">4</div>
                <div class="hiw-content">
                    <h3>Grow Your Skills</h3>
                    <p>Complete the course, apply what you learn, and move closer to your future goals.</p>
                </div>
            </div>

        </div>

    </div>
</section>
<style>
    /* ===============================
   RESPONSIVE – HOW IT WORKS
   =============================== */

/* LARGE TABLET */
@media (max-width: 1024px) {
    .how-it-works {
        margin-left: 0 !important;
        max-width: 100% !important;
        padding: 40px 16px 48px;
    }

    .hiw-container {
        max-width: 100% !important;
    }
}

/* TABLET */
@media (max-width: 768px) {
    .hiw-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 14px;
    }

    .hiw-btn {
        align-self: flex-start;
    }

    .hiw-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .how-it-works {
        padding: 32px 14px 40px;
    }

    .hiw-header h2 {
        font-size: 20px;
    }

    .hiw-header p {
        font-size: 11px;
    }

    .hiw-card {
        padding: 16px;
        gap: 12px;
    }

    .hiw-number {
        width: 30px;
        height: 30px;
        font-size: 11px;
    }

    .hiw-content h3 {
        font-size: 13px;
    }

    .hiw-content p {
        font-size: 11px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .hiw-header h2 {
        font-size: 18px;
    }

    .hiw-card {
        padding: 14px;
    }
}

</style>