<style>
/* Reset and Base Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family:
    -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue",
    Arial, sans-serif;
  line-height: 1.6;
  color: #333;
  background-color: #fff !important;
  scroll-behavior: smooth;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Buttons - GREEN COLOR SCHEME */
/* Buttons - GREEN COLOR SCHEME */
.btn-primary {
  background-color: #28a745;
  color: #000;
  border: none;
  padding: 12px 28px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn-primary:hover {
  background-color: #218838;
  color: #000;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
}
.btn-outline {
  background-color: transparent;
  color: #28a745;
  border: 2px solid #28a745;
  padding: 10px 26px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn-outline:hover {
  background-color: #28a745;
  color: #000;
}
.btn-details {
  min-width: 120px;
  padding: 10px 20px;
}
.btn-inquiry {
  min-width: 120px;
  padding: 8px 18px;
}
.btn-free-courses {
  background-color: #dc3545;
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  width: 100%;
  margin-top: 20px;
  transition: all 0.3s ease;
}
.btn-free-courses:hover {
  background-color: #c82333;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

/* Header */
.main-header {
  background-color: white;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
  padding: 15px 0;
}

.header-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 30px;
}

.logo h2 {
  color: #28a745;
  font-size: 24px;
  font-weight: 700;
}

.main-nav ul {
  display: flex;
  list-style: none;
  gap: 30px;
}

.main-nav a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
  transition: color 0.3s ease;
}

.main-nav a:hover {
  color: #28a745;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.search-bar {
  position: relative;
  display: flex;
  align-items: center;
}

.search-bar input {
  padding: 10px 40px 10px 15px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  font-size: 14px;
  width: 250px;
  transition: all 0.3s ease;
}

.search-bar input:focus {
  outline: none;
  border-color: #28a745;
}

.search-bar i {
  position: absolute;
  right: 15px;
  color: #999;
}

.mobile-menu-toggle {
  display: none;
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  color: #333;
}

/* Hero Section */
.hero-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.hero-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  align-items: center;
}

.hero-text h1 {
  font-size: 48px;
  font-weight: 700;
  color: #333;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero-text p {
  font-size: 18px;
  color: #666;
  margin-bottom: 30px;
}

.hero-buttons {
  display: flex;
  gap: 15px;
}

.hero-image img {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Offer Section */
.offer-section {
  padding: 80px 0;
  background-color: #fff;
  text-align: center;
}

.offer-section h2 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 15px;
  color: #333;
}

.section-subtitle {
  font-size: 18px;
  color: #666;
  margin-bottom: 50px;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.offer-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-bottom: 40px;
}

.offer-item {
  padding: 30px;
  background-color: #f9f9f9;
  border-radius: 12px;
  transition: all 0.3s ease;
}

.offer-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.offer-item i {
  font-size: 48px;
  color: #28a745;
  margin-bottom: 20px;
}

.offer-item h4 {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 10px;
  color: #333;
}

.offer-item p {
  font-size: 15px;
  color: #666;
  line-height: 1.6;
}

/* Courses Section */
.courses-section {
  padding: 80px 0;
  background-color: #f5f5f5;
}

.courses-section h2 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 40px;
  color: #333;
}

.courses-layout {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 30px;
}

/* Sidebar Filters */
.filters-sidebar {
  background-color: #fff;
  padding: 25px;
  border-radius: 12px;
  position: sticky;
  top: 100px;
  height: fit-content;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.filters-sidebar h4 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 20px;
  color: #333;
}

.filter-group {
  margin-bottom: 30px;
}

.filter-group h5 {
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 12px;
  color: #333;
}

.filter-checkbox,
.filter-radio {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  cursor: pointer;
}

.filter-checkbox input,
.filter-radio input {
  margin-right: 10px;
  cursor: pointer;
  width: 18px;
  height: 18px;
  accent-color: #28a745;
}

.filter-checkbox span,
.filter-radio span {
  font-size: 15px;
  color: #555;
}

/* Course Cards Grid */
.courses-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
}

.course-card {
  background-color: white;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.course-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

.course-card h4 {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 12px;
  color: #333;
}

.course-card > p {
  font-size: 14px;
  color: #666;
  margin-bottom: 15px;
  line-height: 1.5;
  flex-grow: 1;
}

.level-text {
  font-size: 16px;
  font-weight: 700;
  color: #333;
  margin-bottom: 12px;
}

.course-info {
  font-size: 13px;
  color: #777;
  margin-bottom: 5px;
}

.course-actions {
  display: flex;
  gap: 10px;
  margin-top: 15px;
}

.course-card.hidden {
  display: none;
}


/* ==========================================
   COURSE CARD STRUCTURE FIX (PRO LAYOUT)
   ========================================== */

.course-card{
  display:flex;
  flex-direction:column;
  height:100%;
  min-height:360px; /* keeps cards aligned */
}

/* TITLE */
.course-card h4{
  margin-bottom:10px;
  min-height:52px; /* keeps titles aligned */
}

/* DESCRIPTION FIXED HEIGHT */
.course-card > p:first-of-type{
  min-height:72px;
  max-height:72px;
  overflow:hidden;
  margin-bottom:15px;
}

/* LEVEL */
.level-text{
  margin-bottom:-60px !important;
}

/* PRICE + DURATION */
.course-info{
  margin-bottom:-44px !important;
}

/* REMOVE EXTRA GAP BEFORE BUTTONS */
.course-card .course-info:last-of-type{
  margin-bottom:-30px !important;
}

/* PUSH BUTTONS TO BOTTOM */
.course-actions{
  margin-top:auto;
  display:flex;
  gap:10px;
}

/* MOBILE SAFE */
@media (max-width:768px){
  .course-card{
    min-height:auto;
  }

  .course-card > p:first-of-type{
    min-height:auto;
    max-height:none;
  }
  .level-text{
  margin-bottom:4px !important;
}

/* PRICE + DURATION */
.course-info{
  margin-bottom:4px !important;
}

/* REMOVE EXTRA GAP BEFORE BUTTONS */
.course-card .course-info:last-of-type{
  margin-bottom:4px !important;
}

}


/* Newsletter CTA Section */
.newsletter-cta-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #28a745 0%, #218838 100%);
  color: white;
}
.newsletter-content {
  display: grid;
  grid-template-columns: 60% 40%;
  gap: 40px;
  align-items: center;
}
.newsletter-text h2 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 15px;
}
.newsletter-text p {
  font-size: 18px;
  opacity: 0.95;
}
.newsletter-form form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}
.newsletter-form input {
  padding: 15px;
  border: 2px solid rgba(255, 255, 255, 0.3);
  border-radius: 8px;
  font-size: 15px;
  background-color: white;
  color: #333;
}
.newsletter-form input::placeholder {
  color: #999;
}
.newsletter-form input:focus {
  outline: none;
  border-color: white;
  background-color: white;
}
.newsletter-form .btn-primary {
  background-color: white;
  color: #000;
  align-self: flex-start;
}
.newsletter-form .btn-primary:hover {
  background-color: #f0f0f0;
  color: #000;
}
.newsletter-form .btn-primary:hover {
  background-color: #f0f0f0;
  color: #000;
}
.privacy-note {
  font-size: 13px;
  opacity: 0.8;
  margin-top: 5px;
}

/* Footer */
.main-footer {
  background-color: #333;
  color: white;
  text-align: center;
  padding: 30px 0;
}

.main-footer p {
  font-size: 14px;
}

/* Responsive Design */
@media (max-width: 968px) {
  .courses-layout {
    display: flex !important;
    flex-direction: column !important;
  }
  .filters-sidebar {
    position: relative !important;
    top: 0 !important;
    width: 100% !important;
    margin-bottom: 30px !important;
  }
  .courses-grid {
    width: 100% !important;
  }
  .hero-content {
    grid-template-columns: 1fr;
  }
  .hero-text h1 {
    font-size: 36px;
  }
  .newsletter-content {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 768px) {
  /* Header Navigation */
  .main-nav {
    display: none;
    position: absolute;
    top: 70px;
    left: 0;
    right: 0;
    background-color: white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    z-index: 999;
  }
  .main-nav.active {
    display: block;
  }
  .main-nav ul {
    flex-direction: column;
    gap: 15px;
  }
  .mobile-menu-toggle {
    display: block;
  }
  .search-bar input {
    width: 150px;
  }
  .search-bar input:focus {
    width: 200px;
  }
  .header-actions .btn-outline,
  .header-actions .btn-primary {
    display: none;
  } /* Hero Section */
  .hero-text h1 {
    font-size: 32px;
  }
  .hero-buttons {
    flex-direction: column;
  } /* Offer Section */
  .offer-grid {
    grid-template-columns: 1fr;
  } /* Courses Section - CRITICAL FIX FOR MOBILE */
  .courses-section {
    overflow: visible !important;
  }
  .courses-layout {
    display: flex !important;
    flex-direction: column !important;
    grid-template-columns: none !important;
  }
  .filters-sidebar {
    position: static !important;
    position: relative !important;
    top: auto !important;
    width: 100% !important;
    margin-bottom: 30px !important;
    z-index: 1 !important;
  }
  .courses-grid {
    display: grid !important;
    grid-template-columns: 1fr !important;
    width: 100% !important;
    position: relative !important;
    z-index: 2 !important;
  } /* Newsletter Section */
  .newsletter-content {
    grid-template-columns: 1fr;
    text-align: left;
  }
  .newsletter-text {
    margin-bottom: 30px;
  }
  .newsletter-form .btn-primary {
    width: 100%;
    align-self: stretch;
  }
}
@media (max-width: 480px) {
  .hero-text h1 {
    font-size: 28px;
  }
  .offer-section h2,
  .courses-section h2,
  .newsletter-text h2 {
    font-size: 28px;
  }
  .course-actions {
    flex-direction: column;
  }
  .btn-details,
  .btn-inquiry {
    width: 100%;
  }
  .filters-sidebar {
    padding: 20px;
    position: static !important;
  }
  .course-card {
    width: 100%;
  }
  .newsletter-text h2 {
    font-size: 24px;
  }
} /* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ==========================================
   COLOR OVERRIDE ONLY – GREEN / BLACK / WHITE
   DO NOT CHANGE ANY STRUCTURE OR STYLES
   ========================================== */

:root{
  --green-main:#28a745;
  --green-dark:#218838;
  --black:#000000;
  --white:#ffffff;
}

/* ===== HERO ===== */
.course-hero,
.hero-snapshot{
  background:#ffffff !important;
  color:var(--black) !important;
}

.hero-title,
.course-title,
.sec-title,
.snapshot-card h4,
.launch-title{
  color:var(--black) !important;
}

/* ===== BADGE ===== */
.hero-badge{
  background:rgba(40,167,69,.15) !important;
  color:var(--green-main) !important;
}

/* ===== ICON COLORS ===== */
.bi{
  color:var(--green-main) !important;
}

/* ===== PILLS ===== */
.hero-pills span,
.meta-pill,
.info-pill{
  background:#ffffff !important;
  border-color:rgba(40,167,69,.4) !important;
  color:var(--black) !important;
}

/* ===== SKILLS ===== */
.skills-wrap{
  background:rgba(40,167,69,.08) !important;
}
.skill-tag{
  background:rgba(40,167,69,.15) !important;
  color:var(--black) !important;
}

/* ===== SNAPSHOT ===== */
.snapshot-price{
  color:var(--green-main) !important;
}

/* ===== BUTTONS – PRIMARY ===== */
.btn-primary,
.btn-solid,
.reg-submit,
.submit-btn,
.success-btn,
.btn-inquiry{
  background:var(--green-main) !important;
  border-color:var(--green-main) !important;
  color:var(--black) !important;
}

.btn-primary:hover,
.btn-solid:hover,
.reg-submit:hover,
.submit-btn:hover,
.success-btn:hover,
.btn-inquiry:hover{
  background:var(--green-dark) !important;
  color:var(--black) !important;
}

/* ===== BUTTONS – OUTLINE ===== */
.btn-outline,
.btn-secondary{
  background:#ffffff !important;
  border-color:var(--green-main) !important;
  color:var(--green-main) !important;
}

.btn-outline:hover,
.btn-secondary:hover{
  background:var(--green-main) !important;
  color:var(--black) !important;
}

/* ===== CTA UNDERLINES ===== */
.cta-buttons .btn-primary::after,
.cta-buttons .btn-secondary::after{
  background:var(--green-main) !important;
}

/* ===== MODALS ===== */
.modal-overlay{
  background:rgba(0,0,0,.6) !important;
}

.enroll-header .modal-title,
.reg-title{
  color:var(--black) !important;
}

/* ===== FORMS ===== */
.reg-group label{
  color:var(--black) !important;
}

.reg-group input:focus,
.reg-group textarea:focus,
.reg-group select:focus{
  border-color:var(--green-main) !important;
  box-shadow:0 0 0 3px rgba(40,167,69,.2) !important;
}

/* ===== SUCCESS MODAL ===== */
.success-box{
  border-top-color:var(--green-main) !important;
}
.success-title{
  color:var(--black) !important;
}
.success-text{
  color:#333 !important;
}

/* ===== LAUNCH ROW ===== */
.launch-row,
.launch-row.pro{
  background:#ffffff !important;
  border-color:rgba(40,167,69,.3) !important;
}

/* ===== PDF MODE ===== */
body.pdf-mode .course-hero,
body.pdf-mode .hero-snapshot{
  background:#ffffff !important;
  color:#000 !important;
}

/* ==========================================
   SMART BUTTON HOVER SWITCH
   Only one green at a time
   ========================================== */

/* When outline button is hovered */
.course-actions:has(.btn-outline:hover) .btn-primary {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}

/* Optional: keep green when primary hovered */
.course-actions:has(.btn-primary:hover) .btn-outline {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}
/* ==========================================
   HERO BUTTON SMART SWITCH
   Only one green at a time
   ========================================== */

/* When outline (Contact Us) is hovered */
.hero-buttons:has(.btn-outline:hover) .btn-primary {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}

/* When primary (Browse Courses) is hovered */
.hero-buttons:has(.btn-primary:hover) .btn-outline {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}
/* ==========================================
   HEADER BUTTON SMART SWITCH
   ========================================== */

/* When Sign In (outline) is hovered */
.header-btn-group:has(.btn-outline:hover) .btn-primary {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}

/* When Get Started (primary) is hovered */
.header-btn-group:has(.btn-primary:hover) .btn-outline {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #28a745 !important;
}
.newsletter-form .btn-primary {
  background: #ffffff !important;
  color: #28a745 !important;
  border: 2px solid #ffffff !important;
  transition: all .3s ease;
}

.newsletter-form .btn-primary:hover {
  background: #28a745 !important;
  color: #ffffff !important;
  border: 2px solid #ffffff !important;
  transform: translateY(-2px);
}

/* =====================================================
   FINAL CLEAN GREEN THEME OVERRIDE (NO ORANGE ANYWHERE)
   ===================================================== */

:root{
  --green-main:#28a745;
  --green-dark:#218838;
  --black:#000000;
  --white:#ffffff;
}

/* ===== REMOVE ALL ORANGE / TEAL ===== */
*{
  border-color: inherit;
}

/* Remove any inline orange colors */
[style*="#F47B1E"],
[style*="#09515D"]{
  color: var(--green-main) !important;
  background: transparent !important;
}

/* ===== HERO ===== */
.course-hero,
.hero-snapshot{
  background:#ffffff !important;
  color:var(--black) !important;
}

.hero-title{
  color:var(--black) !important;
}

/* ===== BADGE (NO BACKGROUND) ===== */
.hero-badge{
  background: transparent !important;
  color: var(--green-main) !important;
  border: 1px solid var(--green-main) !important;
}

/* ===== ICONS ===== */
.bi{
  color: var(--green-main) !important;
}

/* ===== PILLS ===== */
.hero-pills span,
.meta-pill,
.info-pill{
  background:#ffffff !important;
  border:1px solid rgba(40,167,69,.4) !important;
  color:var(--black) !important;
}

/* ===== SNAPSHOT CARD ===== */
.snapshot-card{
  border:1px solid rgba(40,167,69,.25) !important;
}

/* ===== SKILLS ===== */
.skills-wrap{
  background: rgba(40,167,69,.06) !important;
}

.skill-tag{
  background: rgba(40,167,69,.12) !important;
  color: var(--black) !important;
}

/* ===== PRIMARY BUTTONS ===== */
.btn-primary,
.btn-solid,
.reg-submit,
.submit-btn,
.success-btn,
.btn-inquiry{
  background: var(--green-main) !important;
  border-color: var(--green-main) !important;
  color: var(--black) !important;
}

.btn-primary:hover,
.btn-solid:hover,
.reg-submit:hover,
.submit-btn:hover,
.success-btn:hover,
.btn-inquiry:hover{
  background: var(--green-dark) !important;
  color: var(--black) !important;
}

/* ===== OUTLINE BUTTONS ===== */
.btn-outline,
.btn-secondary{
  background: transparent !important;
  border: 2px solid var(--green-main) !important;
  color: var(--green-main) !important;
}

.btn-outline:hover,
.btn-secondary:hover{
  background: var(--green-main) !important;
  color: var(--black) !important;
}

/* ===== INQUIRY BUTTON ICON FIX ===== */
.btn-inquiry i{
  color: var(--black) !important;
}

/* ===== PRINT BUTTON (TEXT ONLY GREEN) ===== */
.cta-buttons button[onclick="printCourse()"]{
  background: transparent !important;
  border: none !important;
  color: var(--green-main) !important;
  box-shadow: none !important;
}

/* ===== REMOVE SHADOW COLOR TINTS ===== */
.btn-solid,
.btn-primary{
  box-shadow: 0 6px 18px rgba(40,167,69,.15) !important;
}

/* ===== SUCCESS MODAL ===== */
.success-box{
  border-top: 4px solid var(--green-main) !important;
}

.success-title{
  color: var(--black) !important;
}

/* ===== LAUNCH ROW ===== */
.launch-row,
.launch-row.pro{
  background:#ffffff !important;
  border:1px solid rgba(40,167,69,.25) !important;
}

/* ===== PDF MODE CLEAN ===== */
body.pdf-mode *{
  background-image: none !important;
  box-shadow: none !important;
}

body.pdf-mode .course-hero{
  background:#ffffff !important;
}
/* ==================================================
   HERO REGISTER / INQUIRY SMART SWITCH
   ================================================== */

/* DEFAULT STATE */
.hero-btn-group .btn-solid{
  background:#28a745 !important;
  color:#000 !important;
  border:2px solid #28a745 !important;
}

.hero-btn-group .btn-inquiry{
  background:#ffffff !important;
  color:#28a745 !important;
  border:2px solid #28a745 !important;
}

/* ICON COLORS */
.hero-btn-group .btn-solid i{
  color:#000 !important;
}

.hero-btn-group .btn-inquiry i{
  color:#28a745 !important;
}

/* ============================= */
/* WHEN INQUIRY IS HOVERED */
/* ============================= */
.hero-btn-group:has(.btn-inquiry:hover) .btn-inquiry{
  background:#28a745 !important;
  color:#000 !important;
}

.hero-btn-group:has(.btn-inquiry:hover) .btn-inquiry i{
  color:#000 !important;
}

.hero-btn-group:has(.btn-inquiry:hover) .btn-solid{
  background:#ffffff !important;
  color:#28a745 !important;
  border:2px solid #28a745 !important;
}

.hero-btn-group:has(.btn-inquiry:hover) .btn-solid i{
  color:#28a745 !important;
}

/* ============================= */
/* WHEN REGISTER IS HOVERED */
/* ============================= */
.hero-btn-group .btn-solid:hover{
  background:#218838 !important;
  color:#000 !important;
}

/* FIX: Prevent card stretching when filtered */
.courses-grid{
  align-items: start;   /* stop vertical stretch */
}

.course-card{
  height: auto !important;
}

</style>