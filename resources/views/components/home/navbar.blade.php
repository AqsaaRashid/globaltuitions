
<nav class="navbar-wrapper">
    <div class="nav-container">
<!-- Mobile Menu Toggle -->
<div class="nav-toggle" onclick="toggleNav()" style="margin-right:-250px !important; color:#09515D !important;">
    <span></span>
    <span></span>
    <span></span>
</div>

        {{-- Logo --}}
        <div class="nav-logo">
            <img src="/images/btmg-logo.png" alt="BTMG Trainings">
        </div>

        {{-- Navigation Links --}}
        <ul class="nav-links">
            <li><a href="#" class="active-link">Home</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#learn">About Platform</a></li>
            <li><a href="#trust">Why Choose Us</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
<li>
    <a href="javascript:void(0)" onclick="openContactModal()">Contact Us</a>
</li>
        </ul>

        {{-- Right Buttons --}}
        <div class="nav-right">
            <a href="#" class="join-btn">Join Us</a>

            <div class="lang-box">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 3C7.031 3 3 7.031 3 12s4.031 
                             9 9 9 9-4.031 9-9-4.031-9-9-9zm0 
                             0c-2.757 0-5 4.031-5 9s2.243 9 
                             5 9m0-18c2.757 0 5 4.031 5 9s-2.243 
                             9-5 9m-9-9h18" />
                </svg>
            </div>
        </div>
    </div>
</nav>
<!-- Contact Modal -->
<div id="contactModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeContactModal()">×</span>

        <h3 class="modal-title">Contact Us</h3>
        <p class="modal-subtitle">We’ll get back to you shortly</p>

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <input type="tel" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="form-group">
                <textarea name="message" placeholder="Your Message..." rows="4" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</div>

<style>
       /* ===============================
   ENROLL MODAL – BRAND ALIGNED
   =============================== */
   .level-select{
    margin-top:6px;
    padding:6px 10px;
    border-radius:6px;
    border:1px solid #e5e7eb;
    font-size:13px;
    cursor:pointer;
}

.single-level{
    font-size:13px;
    color:#6b7280;
    margin-top:6px;
}

.course-details-link{
    display:inline-block;
    font-size:13px;
    color:#09515D;
    font-weight:600;
    text-decoration:none;
}
.course-details-link:hover{
    color:#F47B1E;
    text-decoration:underline;
}


.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.55);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    font-family: Inter, system-ui, sans-serif;
}

/* MODAL CARD */
.modal-box {
    background: #ffffff;
    width: 100%;
    max-width: 440px;
    padding: 26px 26px 28px;
    border-radius: 4px;                 /* matches your UI */
    position: relative;
    box-shadow: 0 18px 40px rgba(15,23,42,0.25);
    animation: fadeInUp 0.25s ease;
}

/* CLOSE */
.close-btn {
    position: absolute;
    right: 14px;
    top: 10px;
    font-size: 22px;
    color: #6b7280;
    cursor: pointer;
    transition: color .2s ease;
}
.close-btn:hover {
    color: #F47B1E;
}

/* HEADER */
.modal-title {
    font-size: 18px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 4px;
}

.modal-subtitle {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 18px;
}

/* FORM */
.form-group {
    margin-bottom: 12px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px 12px;
    font-size: 13px;
    border-radius: 4px;
    border: 1px solid #e5e7eb;
    color: #111827;
    outline: none;
    transition: all .2s ease;
    background: #fff;
}

.form-group textarea {
    resize: vertical;
    min-height: 90px;
}

/* FOCUS */
.form-group input:focus,
.form-group textarea:focus {
    border-color: #F47B1E;
    box-shadow: 0 0 0 2px rgba(244,123,30,0.15);
}

/* SUBMIT */
.submit-btn {
    width: 100%;
    margin-top: 8px;
    padding: 12px;
    background: #09515D;          /* brand teal */
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s ease;
}

.submit-btn:hover {
    background: #F47B1E;          /* brand orange on hover */
}

/* ANIMATION */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(16px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
/* responsive */
/* ===============================
   RESPONSIVE NAVBAR FIXES
   =============================== */

/* TABLET */
@media (max-width: 1024px) {
    .nav-container {
        padding: 0 16px;
    }

    .nav-links {
        gap: 20px;
        font-size: 13px;
    }

    .nav-logo img {
        height: 58px;
    }
}

/* SMALL TABLET */
@media (max-width: 768px) {
    .nav-container {
        flex-wrap: wrap;
        row-gap: 14px;
    }

    .nav-links {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
        gap: 18px;
        text-align: center;
    }

    .nav-right {
        width: 100%;
        justify-content: center;
        gap: 14px;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .navbar-wrapper {
        padding: 14px 0;
    }

    .nav-container {
        flex-direction: column;
        align-items: center;
        gap: 14px;
    }

    .nav-logo img {
        height: 52px;
    }

    .nav-links {
        flex-direction: column;
        gap: 12px;
        width: 100%;
    }

    .nav-links li {
        width: 100%;
        text-align: center;
    }

    .nav-links a {
        display: inline-block;
        width: 100%;
        padding: 10px 0;
    }

    .nav-right {
        flex-direction: column;
        gap: 10px;
    }

    .join-btn {
        width: 100%;
        text-align: center;
        padding: 10px 0;
    }

    .lang-box {
        width: 38px;
        height: 38px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .nav-links {
        font-size: 13px;
    }

    .nav-logo img {
        height: 48px;
    }
}
/* ===============================
   MOBILE DRAWER TOGGLER
   =============================== */

/* HIDE TOGGLER ON DESKTOP */
.nav-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
}

.nav-toggle span {
    width: 22px;
    height: 2px;
    background: #111827;
    display: block;
}

/* MOBILE ONLY */
@media (max-width: 768px) {

    .nav-toggle {
        display: flex;
    }

    /* Drawer base */
    .nav-links {
        position: fixed;
        top: 0;
        right: -100%;
        height: 100vh;
        width: 260px;
        background: #ffffff;
        flex-direction: column;
        align-items: flex-start;
        padding: 90px 24px 24px;
        gap: 16px;
        box-shadow: -12px 0 30px rgba(15,23,42,.12);
        transition: right .3s ease;
        z-index: 9998;
    }

    /* Show drawer */
    .nav-links.open {
        right: 0;
    }

    .nav-links li {
        width: 100%;
    }

    .nav-links a {
        width: 100%;
        padding: 10px 0;
        font-size: 14px;
    }

    /* Overlay when open */
    body.nav-open::after {
        content: '';
        position: fixed;
        inset: 0;
        background: rgba(15,23,42,.45);
        z-index: 9997;
    }

    /* Keep logo + buttons aligned */
    .nav-container {
        justify-content: space-between;
    }
}


</style>
<script>
function openContactModal() {
    document.getElementById('contactModal').style.display = 'flex';
}

function closeContactModal() {
    document.getElementById('contactModal').style.display = 'none';
}

// Close on outside click
window.addEventListener('click', function(e) {
    const modal = document.getElementById('contactModal');
    if (e.target === modal) {
        closeContactModal();
    }
});
</script>
<script>
function toggleNav() {
    const nav = document.querySelector('.nav-links');
    nav.classList.toggle('open');
    document.body.classList.toggle('nav-open');
}

/* Close drawer on link click (mobile UX) */
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        document.querySelector('.nav-links').classList.remove('open');
        document.body.classList.remove('nav-open');
    });
});
</script>
