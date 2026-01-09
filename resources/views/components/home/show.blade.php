<section class="course-detail-wrapper" id="courseContent">

   <!-- HERO -->
<div class="course-hero hero-snapshot">

    <!-- LEFT SIDE -->
    <div class="hero-left">

        <span class="hero-badge">BTMG USA Professional Training</span>

        <h1 class="hero-title">{{ $course->title }}</h1>
       @if($course->nextLaunch)
    <span style="color:#09515D;">
        <i class="bi bi-calendar-event" style="margin-right:4px;"></i>
        Starts From
        {{ \Carbon\Carbon::parse($course->nextLaunch->launch_date)->format('d M Y') }}
    </span>
@endif


         <div class="rich-text">
                {!! $course->description !!}
            </div>
        <div class="hero-pills">
            @if($course->level)
                <span>🎯 Level: {{ $course->level }}</span>
            @endif

            @if($course->duration)
                <span>⏱ Duration: {{ $course->duration }}</span>
            @endif

            <span>💻 Online / Virtual</span>

            
        </div>

       
        <div class="hero-actions">
            <button class="btn-solid"
                onclick="openEnrollModal('{{ $course->title }}')">
                Register for the Course
            </button>

            <button class="btn-outline"
                onclick="openInquiryModal('{{ $course->title }}')">
                Inquiry about the Course
            </button>
        </div>

    </div>

    <!-- RIGHT SIDE SNAPSHOT -->
    <div class="hero-right">
        <div class="snapshot-card">

            <h4>Course Snapshot</h4>

            @if($course->price !== null)
                <div class="snapshot-price">
                    ${{ number_format($course->price, 2) }}
                </div>
            @endif

            <ul class="snapshot-list">
                @if($course->level)
                    <li>Level: {{ $course->level }}</li>
                @endif

                @if($course->duration)
                    <li>Duration: {{ $course->duration }}</li>
                @endif

                <li>Mode: Online / Virtual</li>

                @if($course->nextLaunch)
    <li>
        Start Date:
        {{ \Carbon\Carbon::parse($course->nextLaunch->launch_date)->format('d M Y') }}
    </li>
@endif

            </ul>
             @php
            $skills = $course->skills
                ? array_filter(array_map('trim', explode(',', $course->skills)))
                : [];
        @endphp

        @if(count($skills))
            <div class="skills-wrap" style="margin-left:-20px;">
                <h3 class="sec-title"style="    color:#09515D;
">Skills / Prerequisites</h3>
                <div class="skills">
                    @foreach($skills as $skill)
                        <span class="skill-tag" style="    color:#09515D;
">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        @endif


            <button class="btn-solid full"
                onclick="openEnrollModal('{{ $course->title }}')">
                Register Now
            </button>

        </div>
    </div>

</div>


    <!-- BODY -->
    <div class="course-body">

       

        <div class="card">
            <h3 class="sec-title">What you will learn ?</h3>

            @if($course->topics->count())
                <div class="topics">
                    @foreach($course->topics as $topic)
                        <div class="topic-item">
                            <h4 class="topic-title">{{ $topic->title }}</h4>
                            @if($topic->description)
                                <div class="topic-desc rich-text">
                                    {!! $topic->description !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="muted">No topics added yet.</p>
            @endif
        </div>

        <div class="card">
           <!-- CTA BUTTONS -->
            

            <div class="cta-buttons">
                 <button class="btn-primary"style="color: #fff;"
                        onclick="downloadPDF()">
                     Download PDF
                </button>

                <button class="btn-primary"style="color: #09515D;"
                        onclick="printCourse()">
                    Print
                </button>

               

                <a href="{{ route('index') }}" class="btn-secondary" style="color: #09515D;">
                    ← Back to Courses
                </a>
            </div>
        </div>
        
                </div>

    </div>
</section>

<!-- ENROLL MODAL -->
 <!-- ENROLL MODAL -->
<div id="enrollModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeEnrollModal()">×</span>

        <h3 id="selectedCourse" class="modal-title" style="text-align:center !important;">Enroll</h3>
<div class="registration-card">
    <h2 class="reg-title">Student Registration</h2>
    <p class="reg-subtitle">
        Fill the form below. A BTMG USA coordinator will confirm schedule and payment details.
    </p>

    <form method="POST" action="{{ route('course.enroll') }}">
        @csrf
        <input type="hidden" name="course_name" id="courseName">

        <div class="reg-grid">
            <div class="reg-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="reg-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="name@email.com" required>
            </div>

            <div class="reg-group">
                <label>Phone (Optional)</label>
                <input type="tel" name="phone" placeholder="+1 (___) ___-____">
            </div>

            <div class="reg-group">
                <label>Registration Type</label>
                <select name="registration_type">
                    <option>Individual</option>
                    <option>Corporate</option>
                </select>
            </div>

            <div class="reg-group full">
                <label>Message (Optional)</label>
                <textarea
                    name="message"
                    placeholder="Any questions, goals, or corporate training request details..."
                    rows="4"></textarea>
            </div>
        </div>

        <div class="consent-box">
            <label class="consent-label">
                <input type="checkbox" required>
                <span>
                    <strong>Consent & Disclaimer</strong><br>
                    I confirm that all information provided is accurate.<br>
                    I agree that my information will be used by
                    <span class="highlight">Softc Solutions</span>
                    solely for educational and enrollment purposes.<br>
                    I understand that my data will not be shared with any third-party organizations.
                </span>
            </label>
        </div>

        <button type="submit" class="reg-submit">
            Submit Registration
        </button>

        <p class="reg-footer">
            By submitting, you agree to be contacted by BTMG USA for scheduling and payment coordination.
        </p>
    </form>
</div>

    </div>
</div>

<!-- INQUIRY MODAL -->
<div id="inquiryModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeInquiryModal()">×</span>

        <h3 class="modal-title" style="text-align:center">Inquiry</h3>

        <div class="registration-card">
            <h2 class="reg-title">Course Inquiry</h2>
            <p class="reg-subtitle">
                Share your questions and our BTMG USA team will get back to you.
            </p>

            <form method="POST" action="{{ route('course.inquiry') }}">
                @csrf

                <!-- KEEP THIS EXACT -->
                <input type="hidden" name="course_title" value="{{ $course->title }}">

                <div class="reg-grid">
                    <div class="reg-group">
                        <label>Full Name</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="reg-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="reg-group">
                        <label>Phone (Optional)</label>
                        <input type="tel" name="phone">
                    </div>

                    <!-- EMPTY GRID SLOT (keeps 2-column layout clean) -->
                    <div></div>

                    <div class="reg-group full">
                        <label>Message</label>
                        <textarea
                            name="message"
                            rows="4"
                            placeholder="Your inquiry message..."
                            required></textarea>
                    </div>
                </div>
                 <div class="consent-box">
            <label class="consent-label">
                <input type="checkbox" required>
                <span>
                    <strong>Consent & Disclaimer</strong><br>
                    I confirm that all information provided is accurate.<br>
                    I agree that my information will be used by
                    <span class="highlight">Softc Solutions</span>
                    solely for educational and enrollment purposes.<br>
                    I understand that my data will not be shared with any third-party organizations.
                </span>
            </label>
        </div>

                <button type="submit" class="reg-submit">
                    Submit Inquiry
                </button>

                <p class="reg-footer">
                    We usually respond within 24 hours.
                </p>
            </form>
        </div>
    </div>
</div>

<style>

/* ===== LAYOUT ===== */
.course-detail-wrapper{
    max-width:1200px;
    margin:0 auto;
    padding:40px 16px;
}

/* ===== HERO ===== */
.course-hero{
    background:#09515D;
    border-radius:18px;
    padding:36px;
    display:grid;
    grid-template-columns:1.1fr 1fr;
    gap:36px;
    color:#fff;
}

.course-hero-img{
    min-height:360px;
    border-radius:14px;
    background-size:cover;
    background-position:center;
    position:relative;
}

.course-hero-img::after{
    content:'';
    position:absolute;
    inset:0;
    border-radius:14px;
    background:linear-gradient(
        180deg,
        rgba(15,23,42,.15),
        rgba(15,23,42,.65)
    );
}
/* ===== LEVEL SWITCHER ===== */
.level-switcher{
    margin:12px 0 22px;
    display:flex;
    gap:10px;
    align-items:center;
}

.level-switcher label{
    font-size:13px;
    font-weight:700;

}

.level-switcher select{
    padding:8px 12px;
    border-radius:4px;
    border:none;
    font-size:13px;
    background-color: #F47B1E;
    color: #fff;

}

#levelMessage{
    font-size:12px;
    color:#fca5a5;
    font-weight:600;
}



.course-title{
    font-size:36px;
    font-weight:900;
    margin-bottom:14px;
}

.course-meta{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:22px;
}

.meta-pill{
    font-size:13px;
    padding:7px 12px;
    border-radius:999px;
    background:rgba(255,255,255,.12);
    font-weight:600;
}

/* ===== SKILLS ===== */
.skills-wrap{
    background:rgba(255,255,255,.06);
    padding:16px;
    border-radius:12px;
    margin-bottom:26px;
}

.skills{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
}

.skill-tag{
    background:rgba(244,123,30,.18);
    color:#ffedd5;
    font-size:12px;
    padding:6px 10px;
    border-radius:999px;
    font-weight:700;
}
/*  */
/* ===== CTA BUTTONS – SEGMENTED / SaaS STYLE ===== */
.cta-buttons{
    display:flex;
    align-items:center;
    gap:18px;
    margin-top:30px;
    flex-wrap:wrap;
}

/* PRIMARY – ENROLL */
.cta-buttons .btn-primary:first-child{
    padding:14px 30px;
    font-size:14px;
    font-weight:900;
    border-radius:4px;
    background:#F47B1E;
    color:#fff;
    border:none;
    box-shadow:0 12px 28px rgba(244,123,30,.45);
    transition:.25s ease;
}

.cta-buttons .btn-primary:first-child:hover{
    transform:translateY(-2px);
    box-shadow:0 18px 40px rgba(244,123,30,.55);
}

/* SECONDARY ACTIONS – TEXT BUTTONS */
.cta-buttons .btn-primary{
    background:none;
    border:none;
    padding:0;
    font-size:13px;
    font-weight:700;
    color: #cbd5e1;
    cursor:pointer;
    position:relative;
}

/* underline on hover */
.cta-buttons .btn-primary::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-4px;
    width:0;
    height:2px;
    background:#F47B1E;
    transition:.25s;
}
.cta-buttons .btn-secondary::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-4px;
    width:0;
    height:2px;
    background:#F47B1E;
    transition:.25s;
}
.cta-buttons .btn-secondary:hover::after{
    width:100%;
}

.cta-buttons .btn-primary:hover{
    color:#fff;
}

.cta-buttons .btn-primary:hover::after{
    width:100%;
}

/* BACK LINK – NAV STYLE */
.btn-secondary{
    margin-left:auto;
    padding:0;
    font-size:13px;
    font-weight:700;
    color:#94a3b8;
    padding:10px 16px;
    border-radius:999px;
    background:#eef7f6;
    color:#09515D;
    border:1px solid #cbd5e1;
    transition:all .25s ease;
}

.btn-secondary:hover{
    background:#09515D;
    color: #fff !important;
    transform:translateX(-2px);
}

/* MOBILE */
@media(max-width:700px){
    .cta-buttons{
        flex-direction:column;
        align-items:flex-start;
        gap:14px;
    }

    .btn-secondary{
        margin-left:0;
    }
}
/* ===============================
   CTA BUTTONS – RESPONSIVE FIX
   =============================== */

/* Tablet */
@media (max-width: 900px){
    .cta-buttons{
        flex-wrap: wrap;
        gap:12px;
    }

    .cta-buttons .btn-primary{
        white-space: nowrap;
    }
}

/* Mobile */
@media (max-width: 640px){
    .cta-buttons{
        flex-direction: column;
        align-items: stretch;
        gap:14px;
    }

    /* Download + Print */
    .cta-buttons .btn-primary{
        width:100%;
        text-align:center;
        padding:14px 0;
        font-size:14px;
    }

    /* Back to Courses */
    .cta-buttons .btn-secondary{
        width:100%;
        text-align:center;
        justify-content:center;
        margin-left:0;
    }
}


/* ===== BODY ===== */
.course-body{
    margin-top:32px;
}

.card{
    background:#fff;
    border-radius:16px;
    padding:24px;
    margin-bottom:22px;
    box-shadow:0 12px 28px rgba(15,23,42,.08);
}

.sec-title{
    font-size:18px;
    font-weight:800;
    margin-bottom:14px;
}

/* ===== RICH TEXT ===== */
.rich-text{
    font-size:15px;
    line-height:1.75;
    color:#374151;
    max-width:780px;
}

/* ===== TOPICS ===== */
.topics{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.topic-item{
    background:#f9fafb;
    border:1px solid #e5e7eb;
    padding:16px;
    border-radius:12px;
}

.topic-title{
    font-size:15px;
    font-weight:800;
    margin-bottom:8px;
}

.muted{
    color:#6b7280;
    font-size:14px;
}

/* ===== MODAL ===== */
.modal-overlay{
    position:fixed;
    inset:0;
    background:rgba(15,23,42,.6);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}

.modal-box{
    background:#fff;
    width:900px;
    height:600px;

    max-width:95vw;
    max-height:90vh;

    padding:0;               /* important */
    border-radius:14px;
    position:relative;

    display:flex;
    flex-direction:column;

    overflow:hidden;         /* clean edges */
}


.close-btn{
    position:absolute;
    right:14px;
    top:10px;
    font-size:22px;
    cursor:pointer;
}

/* ===== FORM ===== */
.form-group{margin-bottom:12px;}
.form-group input,
.form-group textarea{
    width:100%;
    padding:10px 12px;
    border:1px solid #e5e7eb;
    border-radius:6px;
}

.submit-btn{
    width:100%;
    padding:12px;
    background:#09515D;
    color:#fff;
    font-weight:700;
    border:none;
    border-radius:6px;
}

.submit-btn:hover{background:#F47B1E;}

@media(max-width:900px){
    .course-hero{grid-template-columns:1fr;}
}
/* responsiveness */
/* ===============================
   RESPONSIVE – COURSE DETAIL PAGE
   =============================== */

/* LARGE TABLET */
@media (max-width: 1024px) {
    .course-title {
        font-size: 30px;
    }

    .course-hero {
        padding: 28px;
        gap: 28px;
    }

    .course-hero-img {
        min-height: 320px;
    }
}

/* TABLET */
@media (max-width: 900px) {
    .course-hero {
        grid-template-columns: 1fr;
    }

    .course-hero-img {
        min-height: 280px;
    }

    .course-title {
        font-size: 28px;
    }

    .course-meta {
        gap: 8px;
    }

    .meta-pill {
        font-size: 12px;
        padding: 6px 10px;
    }

    .level-switcher {
        flex-wrap: wrap;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .course-detail-wrapper {
        padding: 30px 14px;
    }

    .course-hero {
        padding: 22px;
        border-radius: 14px;
    }

    .course-hero-img {
        min-height: 220px;
    }

    .course-title {
        font-size: 24px;
    }

    .skills-wrap {
        padding: 14px;
    }

    .skill-tag {
        font-size: 11px;
        padding: 5px 8px;
    }

    .cta-buttons {
        margin-top: 24px;
    }

    .cta-buttons .btn-primary:first-child {
        width: 100%;
        text-align: center;
        padding: 12px 0;
    }

    .cta-buttons .btn-primary {
        font-size: 12px;
    }

    .btn-secondary {
        font-size: 12px;
    }

    .card {
        padding: 18px;
    }

    .sec-title {
        font-size: 16px;
    }

    .rich-text {
        font-size: 14px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .course-title {
        font-size: 22px;
    }

    .course-hero-img {
        min-height: 200px;
    }

    .meta-pill {
        font-size: 11px;
    }

    .topic-title {
        font-size: 14px;
    }

    .topic-desc {
        font-size: 13px;
    }
}
@media (max-width: 768px){
    .modal-box{
        width:95vw;
        height:90vh;
    }

    .registration-card{
        padding:20px;
    }

    .reg-grid{
        grid-template-columns:1fr;
    }
}

/* registration */
.registration-card{
    background: linear-gradient(#fff, #fff) padding-box,
                linear-gradient(135deg,#f59e0b,#22c1c3) border-box;
    border:2px solid transparent;
    border-radius:14px;

    padding:28px;
    font-family: Inter, system-ui, sans-serif;

    width:100%;
    height:100%;

    overflow-y:auto;   /* 👈 scroll INSIDE if needed */
}


.reg-title{
    font-size:24px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:6px;
}

.reg-subtitle{
    font-size:13px;
    color:#64748b;
    margin-bottom:22px;
}

.reg-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

.reg-group label{
    font-size:13px;
    font-weight:600;
    color:#0f172a;
    display:block;
    margin-bottom:6px;
}

.reg-group input,
.reg-group select,
.reg-group textarea{
    width:100%;
    padding:12px 14px;
    border-radius:10px;
    border:1px solid #cbd5e1;
    font-size:14px;
    outline:none;
}

.reg-group input:focus,
.reg-group textarea:focus,
.reg-group select:focus{
    border-color:#22c1c3;
    box-shadow:0 0 0 3px rgba(34,193,195,.15);
}

.reg-group.full{
    grid-column:1 / -1;
}

.consent-box{
    margin-top:18px;
    padding:14px;
    border:1px solid #e5e7eb;
    border-radius:10px;
    background:#fff;
}

.consent-label{
    display:flex;
    gap:12px;
    font-size:13px;
    color:#111827;
    line-height:1.5;
}

.consent-label input{
    margin-top:4px;
}

.highlight{
    color:#ef4444;
    font-weight:700;
}

.reg-submit{
    margin-top:18px;
    width:100%;
    padding:14px;
    background:#0f766e;
    color:#fff;
    font-size:15px;
    font-weight:800;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

.reg-submit:hover{
    background:#f59e0b;
}

.reg-footer{
    margin-top:10px;
    font-size:12px;
    color:#64748b;
    text-align:center;
}

/* MOBILE */
@media(max-width:640px){
    .reg-grid{
        grid-template-columns:1fr;
    }
}
.hero-snapshot{
    background: linear-gradient(180deg,#eef7f6,#ffffff);
    border-radius:18px;
    padding:42px;
    display:grid;
    grid-template-columns:1.2fr .8fr;
    gap:36px;
}

/* LEFT */
.hero-badge{
    display:inline-block;
    background:#fde8d8;
    color: #F47B1E;
    font-size:12px;
    font-weight:700;
    padding:6px 10px;
    border-radius:999px;
    margin-bottom:14px;
}

.hero-title{
    font-size:34px;
    font-weight:900;
    margin-bottom:18px;
     color:#09515D;

}

.hero-pills{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-bottom:22px;
        color:#09515D;

}

.hero-pills span{
    background:#ffffff;
    border:1px solid #e5e7eb;
    padding:7px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
        color: #09515D;

}
/* ===============================
   HERO ACTION BUTTONS – RESPONSIVE
   =============================== */

/* Tablet */
@media (max-width: 900px){
    .hero-actions{
        flex-wrap: wrap;
        gap:12px;
    }

    .hero-actions .btn-solid,
    .hero-actions .btn-outline{
        padding:12px 22px;
        font-size:14px;
    }
}

/* Mobile */
@media (max-width: 640px){
    .hero-actions{
        flex-direction: column;
        align-items: stretch;
        gap:14px;
    }

    .hero-actions .btn-solid,
    .hero-actions .btn-outline{
        width:100%;
        text-align:center;
        padding:14px 0;
        font-size:15px;
    }
}


/* ACTIONS */
.hero-actions{
    display:flex;
    gap:14px;
    margin-top:22px;
        color:#09515D;

}

.btn-solid{
    background: #0f766e;
    color:#fff;
    padding:14px 26px;
    font-size:14px;
    font-weight:800;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

.btn-solid:hover{ background: #F47B1E; }

.btn-outline{
    background:#fff;
    border:2px solid #0f766e;
    color:#09515D;
    padding:14px 26px;
    font-size:14px;
    font-weight:800;
    border-radius:8px;
    cursor:pointer;
}

/* RIGHT CARD */
.snapshot-card{
    background: #ffffff;
    border-radius:16px;
    padding:26px;
    box-shadow:0 14px 36px rgba(15,23,42,.12);
}

.snapshot-card h4{
    font-size:18px;
    font-weight:800;
    margin-bottom:12px;
    color:#09515D;
}

.snapshot-price{
    font-size:34px;
    font-weight:900;
    color: #09515D;
    margin-bottom:14px;
}

.snapshot-list{
    list-style:none;
    padding:0;
    margin:0 0 22px;
}

.snapshot-list li{
    font-size:13px;
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
}

.snapshot-card .full{
    width:100%;
}

/* MOBILE */
@media(max-width:900px){
    .hero-snapshot{
        grid-template-columns:1fr;
        padding:28px;
    }
}


</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
function openEnrollModal(courseTitle){
    document.body.style.overflow = 'hidden';
    document.getElementById('enrollModal').style.display='flex';
    document.getElementById('courseName').value = courseTitle;
    document.getElementById('selectedCourse').innerText = 'Enroll in ' + courseTitle;
}

function closeEnrollModal(){
    document.body.style.overflow = '';
    document.getElementById('enrollModal').style.display='none';
}

/* PRINT */
function printCourse(){
    window.print();
}

function downloadPDF(){
    const element = document.getElementById('courseContent');

    const opt = {
        margin:       0.5,
        filename:     '{{ Str::slug($course->title) }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  {
            scale: 2,
            useCORS: true
        },
        jsPDF:        {
            unit: 'in',
            format: 'a4',
            orientation: 'portrait'
        }
    };

    html2pdf().set(opt).from(element).save();
}



</script>
<script>
function openInquiryModal(courseTitle){
    document.body.style.overflow = 'hidden';
    document.getElementById('inquiryModal').style.display = 'flex';
}

function closeInquiryModal(){
    document.body.style.overflow = '';
    document.getElementById('inquiryModal').style.display = 'none';
}
</script>
