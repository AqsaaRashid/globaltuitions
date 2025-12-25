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
                    <span class="meta-pill">Duration: {{ $course->duration }}</span>
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

<style>

/* ===== LAYOUT ===== */
.course-detail-wrapper{
    max-width:1200px;
    margin:0 auto;
    padding:40px 16px;
}

/* ===== HERO ===== */
.course-hero{
    background:#0f172a;
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
    padding:6px 10px;
    border-radius:6px;
    border:none;
    font-size:13px;
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

/* ===== CTA BUTTONS ===== */
.cta-buttons{
    display:flex;
    gap:12px;
    margin-top:22px;
    flex-wrap:wrap;
}

.btn-primary{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:4px 12px;          /* tight vertical + horizontal */
    font-size:12px;            /* 8px is TOO small for UX */
    font-weight:800;
    line-height:1;             /* removes extra vertical space */

    border-radius:4px;
    background:#F47B1E;
    color:#fff;
    border:none;
    cursor:pointer;
    transition:all .25s ease;
}


.btn-primary:hover{
    background:#d46210;
    transform:translateY(-2px);
}

.btn-secondary{
    padding:14px 26px;
    font-size:14px;
    font-weight:800;
    border-radius:10px;
    background:transparent;
    color:#ffffff;
    border:2px solid rgba(255,255,255,.5);
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:all .25s ease;
}

.btn-secondary:hover{
    background:#ffffff;
    color:#0f172a;
    border-color:#ffffff;
    transform:translateY(-2px);
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

@media(max-width:520px){
    .cta-buttons{
        flex-direction:column;
    }
    .btn-primary,
    .btn-secondary{
        width:100%;
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
