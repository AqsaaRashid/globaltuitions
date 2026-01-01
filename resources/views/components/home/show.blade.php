<section class="course-detail-wrapper" id="courseContent">

    <!-- HERO -->
    <div class="course-hero">

        <div class="course-hero-img"style="background-image:url('{{ asset('images/'.$course->image) }}')">
        </div>

        <div class="course-hero-content">
            <h1 class="course-title">{{ $course->title }}</h1>

            <div class="course-meta">
                @if($course->level)
                    <span class="meta-pill">Level: {{ $course->level }}</span>
                @endif
             @if($course->duration)
    <span class="meta-pill">
        Duration: {{ $course->duration }}
    </span>
@endif

@if($course->launch?->launch_date)
    <span class="meta-pill">
        Starts From:
        {{ \Carbon\Carbon::parse($course->launch->launch_date)->format('d M Y') }}
    </span>
@endif

                @if($course->price !== null)
                    <span class="meta-pill">
                        Price: ${{ number_format($course->price,2) }}
                    </span>
                @endif
            </div>
            <div class="level-switcher">
    <label>Switch Level:</label>

    <select onchange="switchCourseLevel(this)">
        <option value="">Select Level</option>
        <option value="Beginner" {{ $course->level == 'Beginner' ? 'selected' : '' }}>
            Beginner
        </option>
        <option value="Intermediate" {{ $course->level == 'Intermediate' ? 'selected' : '' }}>
            Intermediate
        </option>
        <option value="Advanced" {{ $course->level == 'Advanced' ? 'selected' : '' }}>
            Advanced
        </option>
    </select>

    <span id="levelMessage" class="level-msg"></span>
</div>


            @php
                $skills = $course->skills
                    ? array_filter(array_map('trim', explode(',', $course->skills)))
                    : [];
            @endphp

            @if(count($skills))
                <div class="skills-wrap">
                    <h3 class="sec-title">Skills / Prerequisites</h3>
                    <div class="skills">
                        @foreach($skills as $skill)
                            <span class="skill-tag">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- CTA BUTTONS -->
            <div class="cta-buttons">
                <button class="btn-primary"
                        onclick="openEnrollModal('{{ $course->title }}')">
                    Enroll Now
                </button>
                <button class="btn-primary"
        onclick="openInquiryModal('{{ $course->title }}')">
    Inquiry
</button>


                <button class="btn-primary"
                        onclick="printCourse()">
                    Print
                </button>

                <button class="btn-primary"
                        onclick="downloadPDF()">
                     Download PDF
                </button>

                <a href="{{ route('index') }}" class="btn-secondary">
                    ← Back to Courses
                </a>
            </div>
        </div>

    </div>

    <!-- BODY -->
    <div class="course-body">

        <div class="card">
<h3 class="sec-title">{{ $course->title }}</h3>
            <div class="rich-text">
                {!! $course->description !!}
            </div>
        </div>

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

    </div>
</section>

<!-- ENROLL MODAL -->
<div id="enrollModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeEnrollModal()">×</span>

        <h3 id="selectedCourse" class="modal-title">Enroll</h3>

        <form method="POST" action="{{ route('course.enroll') }}">
            @csrf
            <input type="hidden" name="course_name" id="courseName">

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
                <input type="date" name="preferred_date" required>
            </div>

            <div class="form-group">
                <input type="time" name="preferred_time" required>
            </div>

            <div class="form-group">
                <textarea name="message"
                          placeholder="Any additional information..."
                          rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">
                Submit Enrollment
            </button>
        </form>
    </div>
</div>
<!-- INQUIRY MODAL -->
<div id="inquiryModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeInquiryModal()">×</span>

        <h3 class="modal-title">Course Inquiry</h3>

        <form method="POST" action="{{ route('course.inquiry') }}">
            @csrf

            <input type="hidden" name="course_title" value="{{ $course->title }}">

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
                <textarea name="message"
                          placeholder="Your inquiry message..."
                          rows="4"
                          required></textarea>
            </div>

            <button type="submit" class="submit-btn">
                Submit Inquiry
            </button>
        </form>
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
    color:#cbd5e1;
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

.cta-buttons .btn-primary:hover{
    color:#fff;
}

.cta-buttons .btn-primary:hover::after{
    width:100%;
}

/* BACK LINK – NAV STYLE */
.btn-secondary{
    margin-left:auto;
    background:none;
    border:none;
    padding:0;
    font-size:13px;
    font-weight:700;
    color:#94a3b8;
    text-decoration:none;
}

.btn-secondary:hover{
    color:#fff;
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
    max-width:440px;
    width:100%;
    padding:26px;
    border-radius:10px;
    position:relative;
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
function switchCourseLevel(select){
    const level = select.value;
    const currentLevel = @json($course->level);
    const title = @json($course->title);

    document.getElementById('levelMessage').innerText = '';

    if (!level || level === currentLevel) return;

    fetch(`{{ route('course.switch.level') }}?title=${encodeURIComponent(title)}&level=${level}`)
        .then(res => res.json())
        .then(data => {
            if (data.found) {
                window.location.href = data.url;
            } else {
                document.getElementById('levelMessage').innerText =
                    data.message;
            }
        })
        .catch(() => {
            document.getElementById('levelMessage').innerText =
                'Something went wrong';
        });
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
