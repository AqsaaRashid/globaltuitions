<section id="trust" class="trust-section">
    <div class="trust-header">
        <div>
            <h2>Why Learners Trust Us</h2>
            <p>Discover the value we bring to your learning journey.</p>
        </div>
        <a href="#courses" class="btn-orange">Explore Courses</a>
    </div>

    <div class="trust-content">
        <!-- LEFT IMAGE -->
        <div class="trust-image">
            <img src="images/lap.png" alt="">
        </div>

        <!-- RIGHT CARDS -->
        <div class="trust-cards">
            <div class="trust-card">
            <div class="icon">
    <i class="bi bi-stars"></i>
</div>
               <h4>Career-Driven Courses</h4>
<p>
    Our courses are designed to support career growth with structured learning
    paths and industry-relevant content, emphasizing practical skills and
    real-world applications to help learners progress with confidence.
</p>


            </div>

            <div class="trust-card">
            <div class="icon">
    <i class="bi bi-stars"></i>
</div>
               <h4>Guided Learning Experience</h4>
<p>
    Each course is carefully structured to guide learners step by step,
    ensuring clarity, steady progress, and a strong understanding of key
    concepts throughout the learning journey.
</p>

            </div>

            <div class="trust-card">
            <div class="icon">
    <i class="bi bi-stars"></i>
</div>
                <h4>Practical, Real Skills</h4>
                <p>
                    Every lesson focuses on real-world knowledge and hands-on
                    skills that you can instantly apply in your personal growth,
                    career, or daily life.
                </p>
            </div>

            <div class="trust-card">
            <div class="icon">
    <i class="bi bi-stars"></i>
</div>
                <h4>Learn Smarter, Not Harder</h4>
<p>
    Well-structured content and flexible access help you focus on what matters
    most—building skills efficiently and confidently.
</p>

            </div>
        </div>
    </div>
</section>
<style>
    /* ===============================
   RESPONSIVE – TRUST SECTION
   =============================== */

/* LARGE TABLET */
@media (max-width: 1024px) {
    .trust-section {
        margin: 60px auto;
        padding: 0 16px;
    }

    .trust-content {
        grid-template-columns: 1fr;
        gap: 32px;
    }

    .trust-image img {
        max-height: 360px;
    }
}

/* TABLET */
@media (max-width: 768px) {
    .trust-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .trust-header h2 {
        font-size: 26px;
    }

    .trust-header p {
        font-size: 13px;
    }

    .btn-orange {
        align-self: flex-start;
        padding: 10px 18px;
        font-size: 13px;
    }

    .trust-cards {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .trust-section {
        margin: 40px auto;
    }

    .trust-header h2 {
        font-size: 22px;
    }

    .trust-card {
        padding: 18px;
    }

    .trust-card h4 {
        font-size: 15px;
    }

    .trust-card p {
        font-size: 13px;
    }

    .trust-card .icon {
        font-size: 16px;
        margin-bottom: 10px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .trust-header h2 {
        font-size: 20px;
    }

    .trust-header p {
        font-size: 12px;
    }

    .trust-card {
        padding: 16px;
    }
}

</style>