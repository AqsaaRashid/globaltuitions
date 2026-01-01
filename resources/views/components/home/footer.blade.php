<footer class="btmg-footer">
    <div class="footer-container">

        <!-- Left Section -->
        <div class="footer-left">
            <img src="images/footer.png" alt="BTMG Trainings Logo" class="footer-logo">
            <p class="footer-text">
                Empowering learners everywhere with quality courses.
                Start your journey today and unlock your true potential.
            </p>

            <div class="footer-social">
    <span>Follow Us:</span>

    <a href="#" class="social-icon fb">
        <i class="fa-brands fa-facebook-f"></i>
    </a>

    <a href="#" class="social-icon ig">
        <i class="fa-brands fa-instagram"></i>
    </a>

    <a href="#" class="social-icon li">
        <i class="fa-brands fa-linkedin-in"></i>
    </a>
</div>

        </div>

        <!-- Middle Section -->
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#courses">Courses</a></li>
                <li><a href="#training">Gallery</a></li>
                <li><a href="#work">How we Work</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
            </ul>
        </div>

        <!-- Right Section -->
<div class="footer-links footer-nav">
            <h4 style="color:#fff">Navigation</h4>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ’s</a></li>
                <li><a href="#">Discover</a></li>
            </ul>
        </div>

    </div>

    <!-- Scroll to Top -->
    <div class="scroll-top">▲</div>
</footer>
<style>
    /* ===============================
   RESPONSIVE – FOOTER
   =============================== */

/* LARGE TABLET */
/* Desktop only offset */
@media (min-width: 769px) {
    .footer-nav {
        margin-left: -130px;
    }
}

@media (max-width: 1024px) {
    .btmg-footer {
        padding: 50px 40px;
    }

    .footer-container {
        gap: 50px;
    }

    .scroll-top {
        right: 40px;
        bottom: 120px;
    }
}

/* TABLET */
@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: left;
    }

    /* Remove negative margin effect on small screens */
    .footer-links[style*="margin-left"] {
        margin-left: 0 !important;
    }

    .footer-text {
        max-width: 100%;
    }

    .footer-social {
        flex-wrap: wrap;
    }

    .scroll-top {
        right: 30px;
        bottom: 30px;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .btmg-footer {
        padding: 40px 20px;
    }

    .footer-logo {
        width: 110px;
    }

    .footer-text {
        font-size: 13px;
    }

    .footer-links h4 {
        font-size: 14px;
        margin-bottom: 14px;
    }

    .footer-links ul li a {
        font-size: 13px;
    }

    .scroll-top {
        width: 38px;
        height: 38px;
        font-size: 13px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .footer-social {
        gap: 10px;
        font-size: 13px;
    }

    .social-icon {
        width: 26px;
        height: 26px;
        font-size: 12px;
    }
}
/* ===============================
   FIX FOOTER NAV LINKS VISIBILITY
   =============================== */

@media (max-width: 768px) {

    .footer-links {
        width: 100%;
        display: block;
        visibility: visible;
        opacity: 1;
        position: relative;
    }

    .footer-links ul {
        display: block;
    }

    .footer-links ul li {
        display: block;
    }
}
/* ===============================
   FORCE SHOW NAVIGATION ON MOBILE
   =============================== */

@media (max-width: 768px) {

    .footer-container > .footer-links[style] {
        margin-left: 0 !important;
    }

}
/* ===============================
   HARD FIX – FORCE NAVIGATION BACK
   =============================== */

@media (max-width: 768px) {

    /* Reset ANY horizontal offset completely */
    .footer-container > .footer-links[style] {
        margin-left: 0 !important;
        transform: none !important;
        left: auto !important;
        right: auto !important;
    }

    /* Force full-width stacking */
    .footer-container > .footer-links {
        grid-column: 1 / -1;
        width: 100%;
        max-width: 100%;
    }
}




</style>