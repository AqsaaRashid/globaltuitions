<style>
    /* ===============================
   NAVBAR GLOBAL STYLES
   =============================== */

.navbar-wrapper {
    width: 100%;
    background: #f6f8fb;
    padding: 12px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    font-family: 'Inter', sans-serif;
}

.nav-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* ===============================
   LEFT LOGO
   =============================== */

.nav-logo img {
    height: 68px;
}

/* ===============================
   NAV LINKS
   =============================== */

.nav-links {
    display: flex;
    align-items: center;
    gap: 32px;
    font-size: 14px;
    color: #555;
     list-style: none;   /* ← REMOVE BULLET POINTS */
    margin: 0;          /* ← Clean spacing */
    padding: 0; 
}

.nav-links a {
    text-decoration: none;
    color: #6b7280;
    transition: 0.2s ease-in-out;
}

.nav-links a:hover {
    color: #F47B1E;
}

/* Active link (Home) */
.nav-links .active-link {
    background: #F47B1E24;
    color: #F47B1E;
    padding: 12px 12px;
    border-radius: 4px;
    font-weight: 600;
}

/* ===============================
   RIGHT SIDE BUTTONS
   =============================== */

.nav-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

/* Join Button */
.join-btn {
    background: #F47B1E;
    color: #fff;
    padding: 8px 18px;
    font-size: 14px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.2s ease-in-out;
}

.join-btn:hover {
    background: #F47B1E;
}

/* Globe Box */
.lang-box {
    width: 35px;
    height: 35px;
    border: 1px solid #F47B1E;
    background: #fff;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.2s ease-in-out;
}

.lang-box:hover {
    border-color: #F47B1E;
}

.lang-box svg {
    width: 20px;
    height: 20px;
    color: #555;
}



/* herosection */
/* ===============================
   HERO SECTION
   =============================== */

.hero-wrapper {
    width: 100%;
    background: #f6f8fb;          /* same light grey as navbar area */
    padding: 60px 0 80px;
    display: flex;
    justify-content: center;
    /* height:560px !important; */
    
}

.hero-inner {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 24px;
}

/* TEXT BLOCK */

.hero-text-block {
    text-align: center;
    margin-bottom: 40px;
    font-family: 'Inter', system-ui, sans-serif;
}

.hero-title {
    font-size: 30px;
    font-weight: 700;
    color: #1f2933;
    line-height: 1.35;
    margin-bottom: 16px;
}

.hero-subtitle {
    font-size: 14px;
    line-height: 1.6;
    color: #6b7280;
    max-width: 640px;
    margin: 0 auto 28px;
}

/* SEARCH CARD */

.hero-search-card {
    display: flex;
    justify-content: center;
}

.hero-search-inner {
    background: #ffffff;
    box-shadow: 0 12px 25px rgba(15, 23, 42, 0.12);
    border-radius: 4px;
    padding: 4px 18px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    min-width: 380px;
}

.hero-search-input {
    border: none;
    outline: none;
    font-size: 14px;
    color: #4b5563;
    flex: 1;
}

.hero-search-input::placeholder {
    color: #9ca3af;
}

.hero-search-btn {
    width: 44px;
    height: 34px;
    border-radius: 3px;
    border: none;
    background: #09515D;      /* teal like screenshot */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.hero-search-btn:hover {
    filter: brightness(1.05);
}

.hero-search-icon {
    width: 18px;
    height: 18px;
    color: #ffffff;
}

/* IMAGE CARD */

.hero-image-card {
    background: #ffffff;
    border-radius: 6px;
    box-shadow: 0 12px 30px rgba(15, 23, 42, 0.15);
    padding: 10px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;

    /* The REAL MAGIC FOR OVERLAP */
    margin-top: 20px;     /* moves card up into hero */
    margin-bottom: -290px !important;  /* moves card down into next section */
}


.hero-image {
    width: 100%;
    height: auto;
    border-radius: 4px;
    display: block;
}
/* IMAGE WRAPPER (needed for overlay positioning) */
.hero-image-wrapper {
    position: relative;
    width: 100%;
}

/* PLAY BUTTON OUTER WRAPPER */
.play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* OUTER TRANSPARENT RING */
.play-btn::before {
    content: "";
    width: 110px;                /* Outer circle size */
    height: 110px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.45); /* soft translucent ring */
    position: absolute;
}

/* INNER WHITE CIRCLE */
.play-btn-circle {
    width: 75px;                 /* inner circle size */
    height: 75px;
    background: #ffffff;
    border-radius: 50%;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 10px 20px rgba(15,23,42,0.18);
    cursor: pointer;
    transition: 0.2s ease;
}

/* Hover Effect */
.play-btn-circle:hover {
    transform: scale(1.06);
}

/* PLAY ICON */
.play-icon {
    width: 34px;
    height: 34px;
    color: #f37b1f; /* exact orange */
}


/* BASIC RESPONSIVE TWEAKS */

@media (max-width: 768px) {
    .hero-wrapper {
        padding: 40px 0 50px;
    }

    .hero-title {
        font-size: 22px;
    }

    .hero-subtitle {
        font-size: 13px;
    }

    .hero-search-inner {
        width: 100%;
        min-width: 0;
    }
}


/* cards */
/* WRAPPER */
/* WRAPPER */
.steps-wrapper {
    padding: 40px 0;
    display: flex;
    padding-top: 260px !important;
    justify-content: center;
}

.steps-container {
    display: flex;
    gap: 26px;
    justify-content: center;
    align-items: center;
}

/* CARD */
.step-card {
    background: #ffffff;
    padding: 18px 28px;
    border-radius: 4px;
    box-shadow: 12px 8px 25px rgba(15,23,42,0.08);
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 210px;
}

/* ICON CIRCLE */
.step-icon {
    width: 38px;
    height: 38px;
    background: #F47B1E24;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* BOOTSTRAP ICON STYLE */
.step-icon i {
    font-size: 18px;
    color: #F47B1E; /* brand orange */
    font-weight: bold;
}

/* TEXT */
.step-text {
    font-size: 15px;
    font-weight: 600;
    color: #111827;
    margin: 0;
}
/* courses */

.courses-wrapper {
    padding: 20px 0;
    text-align: center;
    font-family: Inter, sans-serif;
     margin-right:40px ;

}

.courses-title {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 6px;
}

.courses-subtitle {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 32px;
}

.courses-grid {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
    box-sizing: border-box;
    
    
}

/* ===============================
   FORCE 3 COURSES PER ROW
   =============================== */



/* CARD */
.course-card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.10);
    background: #fff;
    max-width: 250px !important;
    display: flex;
    flex-direction: column;
    height: 100%;
}


/* TOP IMAGE ONLY 40px'*/
.course-image {
    height: 140px;
    background-size: cover;
    background-position: center;
}

/* BOTTOM WHITE CONTENT */
.course-content {
    padding: 14px 16px;
    display: flex;
    flex-direction: column;
    text-align: left;
    flex: 1;
      min-width: 0;  
}


.course-content h3 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 6px;
    line-height: 1.3;

    display: -webkit-box;
    -webkit-line-clamp: 2;   /* 👈 max 2 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.course-content p {
    font-size: 12px;
    color: #6b7280;
    margin: 2px 0 0;
    text-decoration: underline;
}

/* BUTTON */
.enroll-btn {
    background: #F47B1E;
    color: #fff;
    border: none;
    padding: 6px 14px;
    font-size: 12px;
    border-radius: 4px;
    cursor: pointer;
    white-space: nowrap;

    margin-top: auto;   /* 👈 MOST IMPORTANT LINE */
    align-self: flex-start;
}


/* BACKGROUND IMAGES (ONLY IMAGE AREA) */
.excel-bg   { background-image: url('/images/co1.png'); }
.angular-bg { background-image: url('/images/co2.png'); }
.js-bg      { background-image: url('/images/co3.png'); }
.python-bg  { background-image: url('/images/co4.png'); }
.bootstrap-bg   { background-image: url('/images/co5.png'); }
.data-bg { background-image: url('/images/co6.png'); }
.micro-bg      { background-image: url('/images/co7.png'); }
.mern-bg  { background-image: url('/images/co8.png'); }
/* ===============================
   HARD FIX: ALIGN "VIEW COURSE DETAILS"
   =============================== */
/* media */
/* ===============================
   RESPONSIVE COURSES GRID FIX
   =============================== */

/* Large screens (default stays 4) */
@media (min-width: 1200px){
    .courses-grid{
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}

/* Laptops */
@media (max-width: 1199px){
    .courses-grid{
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .courses-wrapper{
        margin-right: 0; /* override */
    }
}

/* Tablets */
@media (max-width: 900px){
    .courses-grid{
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .courses-wrapper{
        padding-left: 16px;
        padding-right: 16px;
        margin-right: 0;
    }
}

/* Mobile */
@media (max-width: 600px){
    .courses-grid{
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .course-card{
        max-width: 100% !important;
    }

    .courses-wrapper{
        padding-left: 14px;
        padding-right: 14px;
        margin-right: 0;
    }
}

/*  */
.course-card{
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* CONTENT AREA */
.course-content{
    position: relative;
    padding: 14px 16px 40px; /* bottom space for link */
    flex: 1;
    text-align: left;
    
    min-width: 0;   

}

/* INNER WRAPPER */
.course-content > div{
    height: 100%;
}

/* TITLE — FIXED HEIGHT */
.course-content h3{
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 6px;

    /* height: 42px;               */
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* VIEW COURSE DETAILS — LOCK POSITION */
.course-details-link{
    position: absolute;
    bottom: 14px;
    left: 16px;

    font-size: 13px;
    font-weight: 600;
    color: #09515D;
    text-decoration: none;
}

.course-details-link:hover{
    color: #F47B1E;
    text-decoration: underline;
}

/* learn */
.confidence-wrap{
    background:#ffffff;
    padding: 45px 0;
    font-family: Inter, system-ui, sans-serif;
}

.confidence-container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: 42px;
    align-items: start;
}


/* LEFT IMAGE */
.confidence-img{
    width: 100%;
    height: 385px;
    object-fit: cover;
    border-radius: 2px;
    display:block;
}

/* RIGHT CONTENT */
.confidence-title{
    font-size: 26px;
    font-weight: 700;
    color:#111827;
    margin: 8px 0 10px;
}

.confidence-text{
    font-size: 12px;
    line-height: 1.6;
    color:#6b7280;
    margin: 0 0 10px;
    max-width: 470px;
}

/* FEATURES (2 columns like screenshot) */
.confidence-features{
    margin-top: 14px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 26px;
    max-width: 520px;
}

.feature-item{
    display:flex;
    align-items:center;
    gap:10px;
}

.feature-icon{
    width: 26px;
    height: 26px;
    background: rgba(244,123,30,0.14);
    border-radius: 999px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex: 0 0 26px;
}

.feature-icon i{
    font-size: 14px;
    color: #F47B1E;
    font-weight: 700;
}

.feature-label{
    font-size: 11px;
    color:#111827;
    font-weight: 600;
}

/* SUBSCRIBE BAR */
/* .subscribe-bar{
    margin-top: 32px;
    background:#ffffff;
    border-radius: 4px;
    box-shadow: 0 10px 25px rgba(15,23,42,0.10);
    padding: 10px;
    display:flex;
    align-items:center;
    gap: 10px;
    max-width: 620px;
} */
/* OUTER LIGHT CONTAINER (THIS WAS MISSING) */
.subscribe-outer{
    margin-top: 28px;
    background: #F5F7F9;        /* light grey like demo */
    border-radius: 6px;
    padding: 8px;
    margin-left: -120px;        /* pulls it left like demo */
    max-width: 650px;
}

/* INNER WHITE BAR (already mostly correct) */
.subscribe-bar{
    background:#ffffff;
    border-radius: 4px;
    box-shadow: 0 10px 25px rgba(15,23,42,0.10);
    padding: 10px;
    display:flex;
    align-items:center;
    gap: 10px;
}


.subscribe-input{
    border: none;
    outline: none;
    font-size: 12px;
    padding: 10px 12px;
    flex: 1;
    color:#374151;
}

.subscribe-input::placeholder{
    color:#9ca3af;
}

.subscribe-btn{
    background: #09515D; /* same teal button */
    border: none;
    color:#fff;
    font-size: 12px;
    font-weight: 600;
    padding: 10px 16px;
    border-radius: 4px;
    display:flex;
    align-items:center;
    gap: 8px;
    cursor:pointer;
    white-space: nowrap;
}

.subscribe-btn:hover{
    filter: brightness(1.05);
}

/* RESPONSIVE */
@media (max-width: 900px){
    .confidence-container{
        grid-template-columns: 1fr;
        gap: 22px;
    }
    .confidence-img{
        height: 240px;
    }
    .confidence-features{
        grid-template-columns: 1fr;
    }
}

/* how it works */
.how-it-works {
    background: #0b5560;
    padding: 40px 0 48px;
    font-family: Inter, system-ui, sans-serif;
    max-width: 1140px !important;
    margin-left: 100px !important;

}

.hiw-container {
    max-width: 900px !important;
    margin: 0 auto;
    padding: 0 24px;
}

/* HEADER */
.hiw-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 26px;
}

.hiw-header h2 {
    color: #ffffff;
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 4px;
}

.hiw-header p {
    color: rgba(255,255,255,0.7);
    font-size: 12px;
    margin: 0;
}

.hiw-btn {
    background: #ff8a1f;
    color: #ffffff;
    padding: 8px 18px;
    font-size: 12px;
    font-weight: 600;
    border-radius: 4px;
    text-decoration: none;
}

/* GRID */
.hiw-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px 22px;
}
.hiw-card:hover {
    background: #ff8a1f;
}

/* text becomes white */
.hiw-card:hover .hiw-content h3,
.hiw-card:hover .hiw-content p {
    color: #ffffff;
}

/* number circle becomes white-transparent */
.hiw-card:hover .hiw-number {
    background: rgba(255,255,255,0.25);
    color: #ffffff;
    border:1px solid #fff;
}


/* CARD */



.hiw-card {
    background: #ffffff;
    border-radius: 4px;
    padding: 18px 20px;
    display: flex;
    gap: 14px;
    align-items: flex-start;
    transition: all 0.25s ease;
}

/* number circle default */
.hiw-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255,138,31,0.15); /* light peach */
    color: #ff8a1f;                    /* orange number */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    flex-shrink: 0;
    transition: all 0.25s ease;
}

/* text default */
.hiw-content h3 {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 4px;
    transition: color 0.25s ease;
}

.hiw-content p {
    font-size: 12px;
    color: #475569;
    margin: 0;
    line-height: 1.45;
    transition: color 0.25s ease;
}


/* RESPONSIVE */
@media (max-width: 768px) {
    .hiw-grid {
        grid-template-columns: 1fr;
    }
}


/* trust */



/* SECTION */
.trust-section {
    max-width: 1600px !important;
    margin: 80px auto;
    padding: 0 20px;
}

/* HEADER */
.trust-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.trust-header h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 6px;
}

.trust-header p {
    font-size: 14px;
    color: #6b7280;
}

.btn-orange {
    background: #F47B1E;
    color: #fff;
    padding: 12px 20px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
}

/* CONTENT */
.trust-content {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 30px;
}

/* IMAGE */
.trust-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
}

/* CARDS GRID */
.trust-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

/* CARD BASE */
.trust-card {
    background: #ffffff;
    border: 1px solid #CECECE;
    border-radius: 4px;
    padding: 24px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.trust-card .icon {
    font-size: 18px;
    margin-bottom: 14px;
    color: #111827;
}

.trust-card h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.trust-card p {
    font-size: 14px;
    line-height: 1.6;
    color: #6b7280;
}

/* ACTIVE CARD (FIRST ONE) */
.trust-card.active {
    background: #f97316;
    border-color: #f97316;
}

.trust-card.active h4,
.trust-card.active p{
    color: #ffffff;
}
.trust-card.active .icon {
    color :#000;
    background-color:#fff;
    border-radius:50%;
    width:40px;
    height:40px;
}

/* HOVER — ALL BECOME LIKE FIRST CARD */
.trust-card:hover {
    background:  #F47B1E;
    border-color: #F47B1E;
    transform: translateY(-3px);
}

.trust-card:hover h4,
.trust-card:hover p
{
    color: #ffffff !important;
}


.trust-card:hover .icon{
    color :#000;
    background-color:#fff;
    border-radius:50%;
    width:40px;
    height:40px;
    padding:10px;
    

}

/* testimonials */
:root{
  --teal: #09515D;     /* dark teal like screenshot */
  --orange: #F47B1E;   /* hover orange */
  --muted: #6b7280;    /* subtitle text */
  --border: #e5e7eb;   /* light gray border */
}

.wrap{
      max-width: 1200px;
      margin: 60px auto;
      padding: 0 18px;
    }

    /* ===== Header row ===== */
    .sec-head{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:16px;
      margin-bottom:16px;
    }
    .sec-title{
      font-size:30px;
      font-weight:700;
      line-height:1.1;
      letter-spacing:-0.02em;
    }
    .sec-sub{
      margin-top:6px;
      font-size:12px;
      color:var(--muted);
    }

    .nav-btn{
      width:34px;
      height:34px;
      border:1px solid var(--border);
      background:#fff;
      border-radius:2px;            /* square-ish like screenshot */
      display:grid;
      place-items:center;
      cursor:pointer;
      transition:transform .2s ease;
    }
    .nav-btn i{ font-size:16px; color:#4b5563; }
    .nav-btn:hover{ transform:translateY(-1px); }

    /* ===== Cards row ===== */
    .cards{
      display:grid;
      grid-template-columns: repeat(4, 1fr);
      gap:18px;
      align-items:stretch;
    }

    .t-card{
      position:relative;
      background:var(--teal);          /* ALL teal initially (your requirement) */
      border-radius:2px;              /* sharp corners like image */
      min-height: 340px;     /* matches demo proportion */
      padding: 26px 24px 22px;
      box-shadow: 0 2px 0 rgba(0,0,0,0.08);
      transition: background .22s ease, transform .22s ease, box-shadow .22s ease;
      transform-origin: left center;  /* helps match “bigger” feel */
    }

    /* hover = orange + bigger */
    .t-card:hover{
      background:var(--orange);
      transform: translateY(-6px) scale(1.06);
      box-shadow: 0 10px 18px rgba(0,0,0,0.22);
      z-index:2;
    }

    /* quote mark */
    .quote{
      position:absolute;
      top:16px;
      left:18px;
      color:#fff;
      font-size:28px;
      font-weight:700;
      line-height:1;
      opacity:0.95;
    }

    .t-text{
      margin-top:26px;                 /* spacing under quote */
      font-size:11px;                  /* tight like screenshot */
      line-height:1.55;
      color:#eaf3f4;
      max-width: 92%;
    }

    /* bottom profile */
    .profile{
      position:absolute;
      left:18px;
      bottom:14px;
      display:flex;
      align-items:center;
      gap:10px;
    }

    .avatar{
  width:22px;
  height:22px;
  border-radius:50%;
  border:2px solid rgba(255,255,255,0.95);
  overflow:hidden;              /* 🔑 important */
  background:#ddd;
  flex-shrink:0;
}

.avatar img{
  width:100%;
  height:100%;
  object-fit:cover;             /* keeps face centered */
  display:block;
}


    .who{
      display:flex;
      flex-direction:column;
      gap:2px;
      color:#fff;
    }
    .who .name{
      font-size:10px;
      font-weight:700;
      letter-spacing:0.01em;
      line-height:1.1;
    }
    .who .role{
      font-size:9px;
      opacity:0.9;
      line-height:1.1;
    }

    /* responsive: keep row feel on smaller screens */
    @media (max-width: 1100px){
      .cards{ grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px){
      .cards{ grid-template-columns: 1fr; }
      .t-card{ min-height: 170px; }
    }

/* footer */
.btmg-footer {
    background: #135864;
    padding: 60px 80px;
    color: #ffffff;
    font-family: 'Inter', sans-serif;
    position: relative;
}

.footer-container {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 80px;
    align-items: start;
}

.footer-logo {
    width: 130px;
    margin-bottom: 20px;
}

.footer-text {
    font-size: 14px;
    line-height: 1.7;
    max-width: 340px;
    color: #e4f1f2;
    margin-bottom: 25px;
}

.footer-social {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
}

.footer-social span {
    margin-right: 10px;
    font-weight: 500 !important;
}

.social-icon {
    width: 28px;
    height: 28px;
    background: #F47B1E;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    text-decoration: none;
    font-weight: 600;
}

.footer-links h4 {
    font-size: 15px;
    margin-bottom: 18px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links ul li {
    margin-bottom: 12px;
}

.footer-links ul li a {
    text-decoration: none;
    color: #e4f1f2;
    font-size: 14px;
}

.scroll-top {
    position: absolute;
    right: 125px;
    bottom: 170px;
    width: 42px;
    height: 42px;
    background: #F47B1E;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    cursor: pointer;
}

/* training */
.training-section {
    max-width: 1200px;
    margin: 60px auto;
    text-align: center;
    font-family: Inter, sans-serif;
}

.training-section h2 {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 6px;
}

.training-section p {
    font-size: 14px;
    color: #777;
    margin-bottom: 30px;
}

/* Tabs */
.training-tabs {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 40px;
}

.tab {
    padding: 8px 18px;
    font-size: 13px;
    border-radius: 4px;
    border: 1px solid #cfcfcf;
    background: #fff;
    cursor: pointer;
}

.tab.active {
    background: #f47b1e;
    color: #fff;
    border-color: #f47b1e;
}

.tab.arrow {
    width: 34px;
    padding: 8px 0;
}
.image-carousel {
    display: none;
}

.image-carousel.active {
    display: flex;
}

/* Carousel */
.image-carousel {
    position: relative;
    height: 220px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-carousel .img {
    position: absolute;
    width: 420px;
    border-radius: 4px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    background: #000;
}

/* Layering (exact depth effect) */
.img-1 { transform: translateX(-180px) scale(0.9); z-index: 1; opacity: .7; }
.img-2 { transform: translateX(-100px) scale(0.95); z-index: 2; opacity: .85; }
.img-3 { transform: translateX(0) scale(1); z-index: 3; }
.img-4 { transform: translateX(80px) scale(0.95); z-index: 2; opacity: .85; }
.img-5 { transform: translateX(180px) scale(0.9); z-index: 1; opacity: .7; }

/* Controls */
.carousel-controls {
    margin-top: 35px;
    display: flex;
    justify-content: center;
    gap: 12px;
}

.carousel-controls button {
    width: 36px;
    height: 36px;
    border: 1px solid #cfcfcf;
    background: #fff;
    border-radius: 4px;
    cursor: pointer;
}

</style>