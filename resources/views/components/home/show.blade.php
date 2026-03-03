<section class="course-detail-wrapper pdf-wrapper" id="courseContent">

   <!-- HERO -->
<div class="course-hero hero-snapshot">

    <!-- LEFT SIDE -->
    <div class="hero-left">

<a href="/"
   class="hero-badge pdf-link"
   target="_blank">
    Imperial Tuitions Trainings
</a>
        <h1 class="hero-title">{{ $course->title }}</h1>
      
<div class="hero-description">
    <div class="rich-text">
        {!! $course->description !!}
    </div>
</div>
        <div class="hero-pills">
            @if($course->level)
                <span>
                                <i class="bi bi-bar-chart-steps" style="margin-right:6px;color: #F47B1E"></i>
Level: {{ $course->level }}</span>
            @endif

            @if($course->duration)
                <span>
                                <i class="bi bi-clock" style="margin-right:6px;color: #F47B1E"></i>
 Duration: {{ $course->duration }}</span>
            @endif

            <span>
                        <i class="bi bi-laptop" style="margin-right:6px;color: #F47B1E"></i>
 
                Online / Virtual</span>

            
        </div>

       
<div class="hero-actions hero-btn-group">
            <!-- <button class="btn-solid"
    onclick="handleLaunchCheck()">
    <i class="bi bi-calendar-check-fill" style="margin-right:2px;"></i>
    Check Available Dates
</button> -->

 <button class="btn-solid "
onclick="openEnrollModal('{{ $course->title }}', {{ $course->id }})">
                    <i class="bi bi-pencil-square"></i>

                Register Now
            </button> 



       <button class="btn-inquiry"
    onclick="openInquiryModal(
        '{{ $course->title }}',
        {{ $course->id }},
        '{{ $course->level ?? '' }}',
        '{{ $course->duration ?? '' }}'
        
    )">

 <i class="bi bi-chat-dots-fill"></i>
    Inquiry
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
        <li>
            <i class="bi bi-bar-chart-steps" style="margin-right:6px;color: #F47B1E"></i>
            Level: {{ $course->level }}
        </li>
    @endif

    @if($course->duration)
        <li>
            <i class="bi bi-clock" style="margin-right:6px;color: #F47B1E"></i>
            Duration: {{ $course->duration }}
        </li>
    @endif

    <li>
        <i class="bi bi-laptop" style="margin-right:6px;color: #F47B1E"></i>
        Mode: Online / Virtual
    </li>
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

            <div class="snapshot-card-actions">
                <button type="button" class="btn-inquiry btn-snapshot"
                    onclick="openInquiryModal(
                        '{{ $course->title }}',
                        {{ $course->id }},
                        '{{ $course->level ?? '' }}',
                        '{{ $course->duration ?? '' }}'
                    )">
                    Inquiry
                </button>
                <button type="button" class="btn-primary btn-snapshot" onclick="downloadPDF()">
                    Download PDF
                </button>
                <button type="button" class="btn-primary btn-snapshot" onclick="printCourse()">
                    Print
                </button>
            </div>

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
                <h4 class="topic-title">
                    {{ $loop->iteration }}. {{ $topic->title }}
                </h4>

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
        <!-- @if($course->launches->count())
        
<div class="card">
    <h3 class="sec-title">Upcoming Trainings</h3>

   <div class="launch-list" id="dates">
@foreach($course->launches->sortBy('launch_date') as $launch)
       <div class="launch-row pro"> -->

    <!-- LEFT: DETAILS -->
    <!-- <div class="launch-left">
        <div class="launch-date">
            <span class="day">
                {{ \Carbon\Carbon::parse($launch->launch_date)->format('d') }}
            </span>
            <span class="month">
                {{ \Carbon\Carbon::parse($launch->launch_date)->format('M Y') }}
            </span>
        </div>

        <div class="launch-details">
            <h4 class="launch-title">
                {{ $course->title }}
            </h4>

            <div class="launch-meta">
                <span>
                    <i class="bi bi-laptop" style="color: #F47B1E;"></i> Virtual
                </span>

                @if($course->duration)
                    <span>
                        <i class="bi bi-clock" style="color: #F47B1E;"></i> {{ $course->duration }}
                    </span>
                @endif

                @if($course->level)
                    <span>
                        <i class="bi bi-bar-chart-steps" style="color: #F47B1E;"></i>
                        {{ ucfirst($course->level) }}
                    </span>
                @endif
            </div>
        </div>
    </div> -->

    <!-- RIGHT: ACTIONS -->
    <!-- <div class="launch-actions">
       <button class="btn-solid small"
onclick="openInquiryModal(
    '{{ $course->title }}',
    '{{ $launch->launch_date }}',
    {{ $course->id }},
    {{ $launch->id }},
    '{{ $course->level ?? '' }}',
    '{{ $course->duration ?? '' }}'
)">
    <i class="bi bi-chat-dots-fill"></i>
    Inquiry
</button> -->




       <!-- <button class="btn-solid small"
onclick="openEnrollModal(
    '{{ $course->title }}',
    '{{ $launch->launch_date }}',
    {{ $course->id }},
    {{ $launch->id }}
)">
    <i class="bi bi-pencil-square"></i>
    Register Now
</button>

    </div> -->

</div>

    @endforeach
</div>

</div>
@endif


        <div class="card">
           <!-- CTA BUTTONS -->
            <!-- <div id="launchMessage"
     style="display:none; margin-top:12px; color: #09515D; font-weight:600;">
    <i class="bi bi-info-circle-fill" style="margin-right:6px;"></i>
    This course has not been launched yet. Upcoming dates will be announced soon.
</div> -->


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
<div id="enrollModal" class="modal-overlay enroll-modal-overlay">
    <div class="modal-box enroll-modal-box">
        <button type="button" class="enroll-close-btn" onclick="closeEnrollModal()" aria-label="Close">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="enroll-modal-header">
            <h3 id="selectedCourse" class="enroll-modal-title">Enroll</h3>
            <p class="enroll-modal-subtitle">A coordinator will confirm schedule and payment details</p>
            <div class="enroll-info enroll-info-pills" id="enrollInfo" style="display:none;">
                <span class="info-pill">
                    <i class="bi bi-clock"></i>
                    <span id="enrollDuration"></span>
                </span>
                <span class="info-pill" id="enrollLevelWrap" style="display:none;">
                    <i class="bi bi-bar-chart-steps"></i>
                    <span id="enrollLevel"></span>
                </span>
                <span class="info-pill" id="enrollDateWrap" style="display:none;">
                    <i class="bi bi-calendar-event"></i>
                    <span id="enrollDate"></span>
                </span>
            </div>
        </div>

        <div class="enroll-modal-body">
            <form method="POST" action="{{ route('course.enroll') }}" class="enroll-form">
                @csrf
                <input type="hidden" name="course_name" id="courseName">
                <input type="hidden" name="course_id" id="courseId">
                <input type="hidden" name="level" id="selectedLevel">

                <div class="enroll-form-grid">
                    <div class="enroll-field">
                        <label for="enrollName">Full Name</label>
                        <input type="text" name="name" id="enrollName" placeholder="Your full name" required>
                    </div>
                    <div class="enroll-field">
                        <label for="enrollEmail">Email</label>
                        <input type="email" name="email" id="enrollEmail" placeholder="name@email.com" required>
                    </div>
                    <div class="enroll-field">
                        <label for="enrollPhone">Phone <span class="optional">(Optional)</span></label>
                        <input type="tel" name="phone" id="enrollPhone" placeholder="+1 (___) ___-____">
                    </div>
                    <div class="enroll-field">
                        <label for="enrollRegType">Registration Type</label>
                        <select name="registration_type" id="enrollRegType">
                            <option>Individual</option>
                            <option>Corporate</option>
                        </select>
                    </div>
                    <div class="enroll-field">
                        <label for="enrollDate">Preferred Date</label>
                        <input type="date" name="preferred_date" id="enrollDate">
                    </div>
                    <div class="enroll-field">
                        <label for="enrollTime">Preferred Time</label>
                        <input type="time" name="preferred_time" id="enrollTime">
                    </div>
                    <div class="enroll-field enroll-field-full">
                        <label for="enrollMessage">Message <span class="optional">(Optional)</span></label>
                        <textarea name="message" id="enrollMessage" rows="3" placeholder="Any questions, goals, or corporate training details..."></textarea>
                    </div>
                </div>

                <div class="enroll-consent">
                    <label class="enroll-consent-label">
                        <input type="checkbox" required class="enroll-consent-checkbox">
                        <span class="enroll-consent-text">
                            I confirm the information provided is accurate and agree that Imperial Tuitions may use it for educational and enrollment purposes. My data will not be shared with third parties.
                        </span>
                    </label>
                </div>

                <button type="submit" class="enroll-submit-btn">
                    <i class="bi bi-pencil-square"></i>
                    Submit Registration
                </button>
                <p class="enroll-footer">By submitting, you agree to be contacted for scheduling and payment coordination.</p>
            </form>
        </div>
    </div>
</div>

<!-- INQUIRY MODAL -->
<div id="inquiryModal" class="modal-overlay inquiry-modal-overlay">
    <div class="modal-box inquiry-modal-box">
        <button type="button" class="inquiry-close-btn" onclick="closeInquiryModal()" aria-label="Close">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="inquiry-modal-header">
            <h3 id="inquiryTitle" class="inquiry-modal-title">Inquiry</h3>
            <p class="inquiry-modal-subtitle">We’ll get back to you within 24 hours</p>
            <div class="enroll-info inquiry-info-pills" id="inquiryInfo" style="display:none;">
                <span class="info-pill inquiry-pill">
                    <i class="bi bi-clock"></i>
                    <span id="inquiryDuration"></span>
                </span>
                <span class="info-pill inquiry-pill">
                    <i class="bi bi-bar-chart-steps"></i>
                    <span id="inquiryLevelText"></span>
                </span>
            </div>
        </div>

        <div class="inquiry-modal-body">
            <form method="POST" action="{{ route('course.inquiry') }}" class="inquiry-form">
                @csrf
                <input type="hidden" name="course_title" id="inquiryCourseTitle">
                <input type="hidden" name="course_id" id="inquiryCourseId">
                <input type="hidden" name="level" id="inquiryLevel">

                <div class="inquiry-form-grid">
                    <div class="inquiry-field">
                        <label for="inquiryName">Full Name</label>
                        <input type="text" name="name" id="inquiryName" placeholder="John Smith" required>
                    </div>
                    <div class="inquiry-field">
                        <label for="inquiryEmail">Email</label>
                        <input type="email" name="email" id="inquiryEmail" placeholder="john@example.com" required>
                    </div>
                    <div class="inquiry-field inquiry-field-full">
                        <label for="inquiryPhone">Phone <span class="optional">(Optional)</span></label>
                        <input type="tel" name="phone" id="inquiryPhone" placeholder="+1 (555) 000-0000">
                    </div>
                    <div class="inquiry-field inquiry-field-full">
                        <label for="inquiryMessage">Your message</label>
                        <textarea name="message" id="inquiryMessage" rows="3" placeholder="Tell us your questions about this course, schedule, or pricing..." required></textarea>
                    </div>
                </div>

                <div class="inquiry-consent">
                    <label class="inquiry-consent-label">
                        <input type="checkbox" name="consent" required class="inquiry-consent-checkbox">
                        <span class="inquiry-consent-text">
                            I confirm the information provided is accurate and agree that Imperial Tuitions may use it for educational and enrollment purposes. My data will not be shared with third parties.
                        </span>
                    </label>
                </div>

                <button type="submit" class="inquiry-submit-btn">
                    <i class="bi bi-send-fill"></i>
                    Send Inquiry
                </button>
                <p class="inquiry-footer">We usually respond within 24 hours.</p>
            </form>
        </div>
    </div>
</div>
<!-- SUCCESS MODAL -->
<div id="successModal" class="modal-overlay">
    <div class="success-box">
        <h3 class="success-title">Message Sent Successfully</h3>

        <p class="success-text">
            Thank you for reaching out to <strong> Imperial Tuitions</strong>.<br>
            Our team will contact you shortly.
        </p>

        <button class="success-btn" onclick="closeSuccessModal()">OK</button>
    </div>
</div>

<style>
/* ===============================
   SUCCESS POPUP – COMPACT & CLEAN
   =============================== */

#successModal{
    z-index:10000;
}

.success-box{
    background:#ffffff;
    width:380px;
    max-width:92vw;
    padding:28px 26px 26px;
    border-radius:16px;
    text-align:center;

    box-shadow:
        0 30px 60px rgba(15,23,42,.25);

    animation: fadeInUp .35s ease;

    border-top:6px solid #0f766e;
}

/* TITLE */
.success-title{
    font-size:18px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:8px;
}

/* TEXT */
.success-text{
    font-size:14px;
    color:#475569;
    line-height:1.6;
    margin-bottom:20px;
}

/* BUTTON */
.success-btn{
    width:100%;
    padding:12px;
    background:#0f766e;
    color:#fff;
    font-size:14px;
    font-weight:700;
    border:none;
    border-radius:999px;
    cursor:pointer;
    transition:.2s ease;
}

.success-btn:hover{
    background:#f59e0b;
}

/* ===============================
   INQUIRY MODAL – PROFESSIONAL STYLE
   =============================== */
@keyframes inquiryModalIn {
    from {
        opacity: 0;
        transform: scale(0.96) translateY(-10px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.inquiry-modal-overlay {
    background: rgba(9, 81, 93, 0.5);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    padding: 24px;
    align-items: center;
    justify-content: center;
}

.inquiry-modal-overlay[style*="flex"] .inquiry-modal-box {
    animation: inquiryModalIn 0.3s ease-out;
}

.inquiry-modal-box {
    width: 100%;
    max-width: 520px;
    max-height: 90vh;
    height: auto;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 24px 48px rgba(9, 81, 93, 0.2), 0 0 0 1px rgba(9, 81, 93, 0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.inquiry-modal-box .inquiry-close-btn {
    top: 10px;
    right: 12px;
    width: 34px;
    height: 34px;
    font-size: 16px;
}

.inquiry-close-btn {
    position: absolute;
    right: 16px;
    top: 16px;
    width: 40px;
    height: 40px;
    border: none;
    background: #f1f5f9;
    color: #64748b;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    z-index: 2;
    transition: background 0.2s, color 0.2s, transform 0.2s;
}

.inquiry-close-btn:hover {
    background: #e2e8f0;
    color: #0f172a;
    transform: scale(1.05);
}

.inquiry-modal-header {
    background: linear-gradient(180deg, #09515D 0%, #0a6573 100%);
    color: #fff;
    padding: 14px 20px 12px;
    text-align: center;
    position: relative;
    flex-shrink: 0;
}

.inquiry-modal-title {
    font-size: 28px;
    font-weight: 800;
    margin: 0 0 2px;
    letter-spacing: -0.02em;
    color: #fff;
    line-height: 1.3;
}

.inquiry-modal-subtitle {
    font-size: 12px;
    opacity: 0.9;
    margin: 0 0 10px;
    font-weight: 500;
}

.inquiry-info-pills {
    justify-content: center;
    gap: 8px;
    margin-top: 0;
}

.inquiry-modal-header .info-pill {
    padding: 4px 10px;
    font-size: 11px;
    background: rgba(255, 255, 255, 0.2) !important;
    color: #fff !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
}

.inquiry-modal-header .bi {
    color: #fff !important;
}

.inquiry-modal-body {
    padding: 18px 20px 20px;
    overflow: visible;
    flex: 1;
    min-height: 0;
}

.inquiry-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.inquiry-field {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.inquiry-field-full {
    grid-column: 1 / -1;
}

.inquiry-field label {
    font-size: 12px;
    font-weight: 700;
    color: #0f172a;
}

.inquiry-field .optional {
    font-weight: 500;
    color: #64748b;
}

.inquiry-field input,
.inquiry-field textarea {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    color: #0f172a;
    background: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.inquiry-field input::placeholder,
.inquiry-field textarea::placeholder {
    color: #94a3b8;
}

.inquiry-field input:focus,
.inquiry-field textarea:focus {
    outline: none;
    border-color: #09515D;
    box-shadow: 0 0 0 3px rgba(9, 81, 93, 0.15);
}

.inquiry-field textarea {
    resize: vertical;
    min-height: 68px;
}

.inquiry-consent {
    margin-top: 12px;
    padding: 10px 12px;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.inquiry-consent-label {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    cursor: pointer;
    font-size: 12px;
    color: #475569;
    line-height: 1.4;
}

.inquiry-consent-checkbox {
    margin-top: 2px;
    width: 16px;
    height: 16px;
    flex-shrink: 0;
    accent-color: #09515D;
}

.inquiry-submit-btn {
    margin-top: 14px;
    width: 100%;
    padding: 12px 20px;
    background: #09515D;
    color: #fff;
    font-size: 15px;
    font-weight: 800;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(9, 81, 93, 0.35);
}

.inquiry-submit-btn:hover {
    background: #0a6573;
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(9, 81, 93, 0.4);
}

.inquiry-submit-btn:active {
    transform: translateY(0);
}

.inquiry-submit-btn i {
    font-size: 18px;
}

.inquiry-footer {
    margin-top: 8px;
    text-align: center;
    font-size: 12px;
    color: #64748b;
}

@media (max-width: 560px) {
    .inquiry-modal-box {
        max-height: 95vh;
    }
    .inquiry-modal-header {
        padding: 12px 16px 10px;
    }
    .inquiry-modal-body {
        padding: 14px 16px 16px;
    }
    .inquiry-form-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
}

/* ===============================
   ENROLL MODAL – same as inquiry (compact, no scroll)
   =============================== */
@keyframes enrollModalIn {
    from {
        opacity: 0;
        transform: scale(0.96) translateY(-10px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.enroll-modal-overlay {
    background: rgba(9, 81, 93, 0.5);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    padding: 24px;
    align-items: center;
    justify-content: center;
}

.enroll-modal-overlay[style*="flex"] .enroll-modal-box {
    animation: enrollModalIn 0.3s ease-out;
}

.enroll-modal-box {
    width: 100%;
    max-width: 540px;
    max-height: 90vh;
    height: auto;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 24px 48px rgba(9, 81, 93, 0.2), 0 0 0 1px rgba(9, 81, 93, 0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.enroll-close-btn {
    position: absolute;
    right: 16px;
    top: 10px;
    width: 34px;
    height: 34px;
    border: none;
    background: #f1f5f9;
    color: #64748b;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    z-index: 2;
    transition: background 0.2s, color 0.2s, transform 0.2s;
}

.enroll-close-btn:hover {
    background: #e2e8f0;
    color: #0f172a;
    transform: scale(1.05);
}

.enroll-modal-header {
    background: linear-gradient(180deg, #09515D 0%, #0a6573 100%);
    color: #fff;
    padding: 14px 20px 12px;
    text-align: center;
    position: relative;
    flex-shrink: 0;
}

.enroll-modal-title {
    font-size: 28px;
    font-weight: 800;
    margin: 0 0 2px;
    letter-spacing: -0.02em;
    color: #fff;
    line-height: 1.3;
}

.enroll-modal-subtitle {
    font-size: 12px;
    opacity: 0.9;
    margin: 0 0 10px;
    font-weight: 500;
}

.enroll-modal-header .enroll-info-pills {
    justify-content: center;
    gap: 8px;
    margin-top: 0;
}

.enroll-modal-header .info-pill {
    padding: 4px 10px;
    font-size: 11px;
    background: rgba(255, 255, 255, 0.2) !important;
    color: #fff !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
}

.enroll-modal-header .bi {
    color: #fff !important;
}

.enroll-modal-body {
    padding: 18px 20px 20px;
    overflow: visible;
    flex: 1;
    min-height: 0;
}

.enroll-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.enroll-field {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.enroll-field-full {
    grid-column: 1 / -1;
}

.enroll-field label {
    font-size: 12px;
    font-weight: 700;
    color: #0f172a;
}

.enroll-field .optional {
    font-weight: 500;
    color: #64748b;
}

.enroll-field input,
.enroll-field select,
.enroll-field textarea {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    color: #0f172a;
    background: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.enroll-field input::placeholder,
.enroll-field textarea::placeholder {
    color: #94a3b8;
}

.enroll-field input:focus,
.enroll-field select:focus,
.enroll-field textarea:focus {
    outline: none;
    border-color: #09515D;
    box-shadow: 0 0 0 3px rgba(9, 81, 93, 0.15);
}

.enroll-field textarea {
    resize: vertical;
    min-height: 68px;
}

.enroll-consent {
    margin-top: 12px;
    padding: 10px 12px;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.enroll-consent-label {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    cursor: pointer;
    font-size: 12px;
    color: #475569;
    line-height: 1.4;
}

.enroll-consent-checkbox {
    margin-top: 2px;
    width: 16px;
    height: 16px;
    flex-shrink: 0;
    accent-color: #09515D;
}

.enroll-submit-btn {
    margin-top: 14px;
    width: 100%;
    padding: 12px 20px;
    background: #09515D;
    color: #fff;
    font-size: 15px;
    font-weight: 800;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(9, 81, 93, 0.35);
}

.enroll-submit-btn:hover {
    background: #0a6573;
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(9, 81, 93, 0.4);
}

.enroll-submit-btn i {
    font-size: 16px;
}

.enroll-footer {
    margin-top: 8px;
    text-align: center;
    font-size: 12px;
    color: #64748b;
}

@media (max-width: 560px) {
    .enroll-modal-header {
        padding: 12px 16px 10px;
    }
    .enroll-modal-body {
        padding: 14px 16px 16px;
    }
    .enroll-form-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
}

/* ===== LAYOUT ===== */
.course-detail-wrapper{
    max-width:min(1600px, 96vw);
    margin:0 auto;
    padding:32px 24px;
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
    padding:18px;
    border-radius:12px;
    margin-bottom:26px;
}

.skills{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}

.skill-tag{
    background:rgba(244,123,30,.18);
    color:#ffedd5;
    font-size:13px;
    padding:7px 12px;
    border-radius:999px;
    font-weight:700;
}
/*  */
/* ===== CTA BUTTONS – SEGMENTED / SaaS STYLE ===== */
.cta-buttons{
    display:flex;
    align-items:center;
    gap:20px;
    margin-top:32px;
    flex-wrap:wrap;
}

/* PRIMARY – ENROLL */
.cta-buttons .btn-primary:first-child{
    padding:16px 34px;
    font-size:16px;
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
    font-size:14px;
    font-weight:700;
    color: #cbd5e1;
    cursor:pointer;
    position:relative;
}
.hero-description{
    min-height: 240px;
    max-height: 260px;
    overflow-y: auto;
    margin-bottom: 22px;
}
/* smooth scrollbar */
.hero-description::-webkit-scrollbar{
    width: 6px;
}
.hero-description::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:6px;
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
    font-size:14px;
    font-weight:700;
    color:#94a3b8;
    padding:12px 20px;
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
    margin-top:36px;
}

.card{
    background:#fff;
    border-radius:18px;
    padding:32px 28px;
    margin-bottom:26px;
    box-shadow:0 12px 28px rgba(15,23,42,.08);
}

.sec-title{
    font-size: clamp(1.75rem, 2.5vw + 1.5rem, 42px);
    font-weight:800;
    margin-bottom:16px;
}

/* ===== RICH TEXT ===== */
.rich-text{
    font-size:17px;
    line-height:1.8;
    color:#374151;
    max-width:100%;
}

/* ===== TOPICS ===== */
.topics{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.topic-item{
    background:#f9fafb;
    border:1px solid #e5e7eb;
    padding:20px;
    border-radius:14px;
}

.topic-title{
    font-size:18px;
    font-weight:800;
    margin-bottom:10px;
}

.muted{
    color:#6b7280;
    font-size:17px;
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
    max-width:95vw;

    max-height:90vh;     /* allow modal to fit screen */
    height:auto;         /* remove fixed height */

    padding:0;
    border-radius:14px;
    position:relative;

    display:flex;
    flex-direction:column;

    overflow-y:auto;     /* scroll inside modal if needed */
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
    .course-detail-wrapper {
        padding: 28px 20px;
    }

    .hero-snapshot {
        padding: 36px 32px;
        gap: 32px;
    }

    .hero-title {
        font-size: clamp(1.5rem, 4vw + 1rem, 36px);
    }

    .course-hero {
        padding: 28px;
        gap: 28px;
    }

    .course-hero-img {
        min-height: 320px;
    }

    .snapshot-card {
        padding: 26px 22px;
    }

    .snapshot-price {
        font-size: 34px;
    }

    .card {
        padding: 26px 22px;
    }

    .sec-title,
    .snapshot-card h4 {
        font-size: clamp(1.5rem, 4vw + 1rem, 36px);
    }

    .rich-text {
        font-size: 16px;
    }
}

/* TABLET */
@media (max-width: 900px) {
    .course-hero {
        grid-template-columns: 1fr;
    }

    .hero-snapshot {
        grid-template-columns: 1fr;
        padding: 28px 24px;
        gap: 28px;
    }

    .hero-snapshot .snapshot-card {
        margin-top: 0;
    }

    .course-hero-img {
        min-height: 280px;
    }

    .hero-title,
    .sec-title,
    .snapshot-card h4 {
        font-size: clamp(1.4rem, 4vw + 1rem, 32px);
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

    .hero-description {
        min-height: 200px;
        max-height: 220px;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .course-detail-wrapper {
        padding: 20px 16px;
    }

    .hero-snapshot {
        padding: 22px 18px;
        gap: 22px;
        border-radius: 16px;
    }

    .course-hero {
        padding: 22px;
        border-radius: 14px;
    }

    .course-hero-img {
        min-height: 220px;
    }

    .hero-pills span {
        font-size: 12px;
        padding: 7px 12px;
    }

    .hero-description {
        min-height: 180px;
        max-height: 200px;
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
        padding: 14px 0;
        font-size: 15px;
    }

    .cta-buttons .btn-primary {
        font-size: 13px;
    }

    .btn-secondary {
        font-size: 13px;
        padding: 10px 16px;
    }

    .card {
        padding: 20px 18px;
        border-radius: 14px;
    }

    .hero-title,
    .sec-title,
    .snapshot-card h4 {
        font-size: clamp(1.25rem, 5vw + 1rem, 28px);
    }

    .rich-text {
        font-size: 16px;
    }

    .topic-item {
        padding: 16px;
    }

    .topic-title {
        font-size: 16px;
    }

    .snapshot-card {
        padding: 22px 18px;
    }

    .snapshot-price {
        font-size: 32px;
    }

    .snapshot-list li {
        font-size: 16px;
    }

    .snapshot-card-actions .btn-snapshot {
        padding: 10px 14px;
        font-size: 14px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .course-detail-wrapper {
        padding: 16px 12px;
    }

    .hero-title,
    .sec-title,
    .snapshot-card h4 {
        font-size: 22px;
    }

    .course-hero-img {
        min-height: 200px;
    }

    .meta-pill {
        font-size: 11px;
    }

    .topic-title {
        font-size: 15px;
    }

    .topic-desc {
        font-size: 14px;
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
.hero-left{
    display: flex;
    flex-direction: column;
    height: 100%;
}
/* MOBILE */
@media(max-width:640px){
    .reg-grid{
        grid-template-columns:1fr;
    }
}
.hero-snapshot{
    background: linear-gradient(180deg,#eef7f6,#ffffff);
    border-radius:20px;
    padding:48px 44px;
    display:grid;
    grid-template-columns:1.2fr .8fr;
    gap:44px;
    align-items: stretch;
}

.hero-right {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

/* LEFT */
.hero-badge{
    display:inline-flex;
    align-items:center;
    background:#fde8d8;
    color:#F47B1E;
    font-size:13px;
    font-weight:700;
    padding:8px 16px;
    border-radius:999px;
    margin-bottom:14px;
    line-height:1;
    width:fit-content;
}
.snapshot-card {
    pointer-events: none;
}


/* ===============================
   SNAPSHOT ACTION BUTTONS – PRO
   =============================== */

.snapshot-card-actions {
    pointer-events: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 18px;
    padding-top: 18px;
    border-top: 1px solid #e5e7eb;
}

/* Shared Button Base */
.snapshot-card-actions .btn-snapshot {
    width: 100%;
    padding: 14px 16px;
    font-size: 18px;
    font-weight: 700;
    border-radius: 10px;
    cursor: pointer;
    border: none;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    transition: all .25s ease;
}

/* Primary (Inquiry) */
.snapshot-card-actions .btn-inquiry.btn-snapshot {
    background: #28a745;
    color: #000;
    box-shadow: 0 6px 18px rgba(40,167,69,.25);
}

.snapshot-card-actions .btn-inquiry.btn-snapshot:hover {
    background: #218838;
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(40,167,69,.35);
}

/* Secondary (Download / Print) */
.snapshot-card-actions .btn-primary.btn-snapshot {
    background: #ffffff;
    color: #000;
    border: 1px solid #e5e7eb;
}

.snapshot-card-actions .btn-primary.btn-snapshot:hover {
    background: #f8fafc;
    border-color: #28a745;
    transform: translateY(-2px);
}

/* Icon styling */
.snapshot-card-actions .btn-snapshot i {
    font-size: 16px;
    transition: transform .2s ease;
}

.snapshot-card-actions .btn-snapshot:hover i {
    transform: translateX(2px);
}

.snapshot-card-actions .btn-inquiry.btn-snapshot {
    background: var(--green-main);
    color: var(--black);
}

.snapshot-card-actions .btn-primary.btn-snapshot {
    background: #eef7f6;
    color: #09515D;
    border: 1px solid rgba(40,167,69,.4);
}

.snapshot-card-actions .btn-primary.btn-snapshot:hover {
    background: var(--green-main);
    color: var(--black);
}


.hero-title{
    font-size:clamp(1.75rem, 2.5vw + 1.5rem, 42px);
    font-weight:900;
    margin-bottom:20px;
    color:#09515D;
    line-height:1.2;
}

.hero-pills{
    display:flex;
    flex-wrap:wrap;
    gap:14px;
    margin-bottom:24px;
    color:#09515D;
}

.hero-pills span{
    background:#ffffff;
    border:1px solid #e5e7eb;
    padding:9px 16px;
    border-radius:999px;
    font-size:14px;
    font-weight:600;
    color:#09515D;
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
    background: #09515D;
    color:#fff;
    padding:16px 30px;
    font-size:17px;
    font-weight:800;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
.btn-solid i{
    color: #000 !important;
}

.btn-solid:hover i{ 
    color: #000 !important;

    transform:translateY(-2px);


}


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

/* RIGHT CARD – compact so bottom aligns with left column */
.snapshot-card{
    background: #ffffff;
    border-radius:18px;
    padding:22px 24px;
    margin-top:0;
    box-shadow:0 14px 36px rgba(15,23,42,.12);
}

.snapshot-card h4{
    font-size: clamp(1.75rem, 2.5vw + 1.5rem, 42px);
    font-weight:800;
    margin-bottom:10px;
    color:#09515D;
}

.snapshot-price{
    font-size:34px;
    font-weight:900;
    color: #09515D;
    margin-bottom:10px;
}

.snapshot-list{
    list-style:none;
    padding:0;
    margin:0 0 14px;
}

.snapshot-list li{
    font-size:17px;
    font-weight:600;
    color:#334155;
    margin-bottom:6px;
}

.snapshot-card .full{
    width:100%;
}

/* compact skills inside snapshot so card height aligns with left */
.snapshot-card .skills-wrap {
    padding: 12px;
    margin-bottom: 12px;
    margin-left: 0 !important;
}
.snapshot-card .skills-wrap .sec-title {
    font-size: 1rem;
    margin-bottom: 8px;
}
.snapshot-card .skill-tag {
    font-size: 12px;
    padding: 5px 10px;
}

/* MOBILE */
@media(max-width:900px){
    .hero-snapshot{
        grid-template-columns:1fr;
        padding:28px;
    }
    .hero-right {
        justify-content: flex-start;
    }
    .snapshot-card{
      margin-top:0px !important;
    }
}
/* lastt */
/* ===== LAUNCH LIST ===== */
.launch-list{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.launch-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:#09515D;
    border-radius:8px;
    padding:12px 16px;
    gap:14px;
}

.launch-meta{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}

.launch-meta .pill{
    background:#ffffff;
    color:#09515D;
    font-size:12px;
    font-weight:700;
    padding:6px 12px;
    border-radius:6px;
    border:1px solid #e5e7eb;
}

/* CTA inside launch row */
.btn-solid.small{
    padding:8px 18px;
    font-size:12px;
    border-radius:4px;
    white-space:nowrap;
}

/* Mobile */
@media(max-width:640px){
    .launch-row{
        flex-direction:column;
        align-items:flex-start;
        border-radius:16px;
    }

    .btn-solid.small{
        width:100%;
        text-align:center;
    }
}
/* ===== ENROLL HEADER (MODAL) ===== */
.enroll-header{
    padding:18px 24px;
    border-bottom:1px solid #e5e7eb;
    text-align:center;
}

.enroll-header .modal-title{
    font-size:22px;
    font-weight:900;
    color:#09515D;
    margin-bottom:10px;
}

.enroll-info{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.info-pill{
    display:flex;
    align-items:center;
    gap:6px;
    background:#eef7f6;
    color:#09515D;
    font-size:12px;
    font-weight:700;
    padding:6px 14px;
    border-radius:999px;
    border:1px solid #cbd5e1;
}
   /* upcom */
   /* ===== UPCOMING TRAININGS – PRO VERSION ===== */
.launch-row.pro{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    padding:18px 22px;
    background:#ffffff;
    border:1px solid #e5e7eb;
    border-radius:14px;
    box-shadow:0 10px 24px rgba(15,23,42,.06);
}

.launch-left{
    display:flex;
    gap:18px;
    align-items:center;
}

/* DATE BLOCK */
.launch-date{
    min-width:70px;
    text-align:center;
    background:#eef7f6;
    border-radius:12px;
    padding:10px 8px;
}

.launch-date .day{
    display:block;
    font-size:28px;
    font-weight:900;
    color:#09515D;
    line-height:1;
}

.launch-date .month{
    font-size:14px;
    font-weight:700;
    color:#64748b;
}

/* DETAILS */
.launch-title{
    font-size:18px;
    font-weight:800;
    margin-bottom:6px;
    color:#0f172a;
}

.launch-meta{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    font-size:16px;
    color:#475569;
}

.launch-meta span{
    display:flex;
    align-items:center;
    gap:6px;
}

/* ACTIONS */
.launch-actions{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

/* MOBILE */
@media(max-width:640px){
    .launch-row.pro{
        flex-direction:column;
        align-items:flex-start;
    }

    .launch-actions{
        width:100%;
    }

    .launch-actions button{
        width:100%;
    }
}
/* ===== PDF MODE FIX ===== */
body.pdf-mode *{
    animation: none !important;
    transition: none !important;
}

body.pdf-mode .modal-overlay,
body.pdf-mode .btn-solid,
body.pdf-mode .btn-outline,
body.pdf-mode .cta-buttons{
    display:none !important;
}

body.pdf-mode{
    overflow: visible !important;
}

body.pdf-mode .course-hero,
body.pdf-mode .card,
body.pdf-mode .snapshot-card,
body.pdf-mode .launch-row{
    box-shadow:none !important;
    background:#fff !important;
}

body.pdf-mode .hero-snapshot{
    background:#fff !important;
}
/* ===============================
   PDF SAFE LAYOUT (CRITICAL)
   =============================== */

body.pdf-mode .pdf-wrapper{
    max-width: 100% !important;
    width: 100% !important;
    padding: 20px !important;
    margin: 0 !important;
    overflow: visible !important;
}

body.pdf-mode{
    width: 100% !important;
    overflow: visible !important;
}

/* force single column */
body.pdf-mode .course-hero,
body.pdf-mode .hero-snapshot{
    display: block !important;
}

/* prevent cutting */
body.pdf-mode *{
    box-sizing: border-box !important;
}

/* keep cards intact */
body.pdf-mode .card,
body.pdf-mode .launch-row,
body.pdf-mode .launch-row.pro,
body.pdf-mode .topic-item{
    page-break-inside: avoid !important;
}

/* remove visuals that break PDF */
body.pdf-mode .hero-actions,
body.pdf-mode .cta-buttons,
body.pdf-mode button,
body.pdf-mode .modal-overlay{
    display: none !important;
}

/* neutralize shadows & gradients */
body.pdf-mode *{
    box-shadow: none !important;
    background-image: none !important;
}


/* ===============================
   HARD PDF OVERRIDES
   =============================== */
body.pdf-mode {
    background:#fff !important;
}

body.pdf-mode * {
    box-shadow: none !important;
    text-shadow: none !important;
    animation: none !important;
    transition: none !important;
}

/* remove hero gradient */
body.pdf-mode .course-hero,
body.pdf-mode .hero-snapshot {
    background: #fff !important;
    color: #000 !important;
}

/* convert grid → block */
body.pdf-mode .course-hero,
body.pdf-mode .hero-snapshot {
    display: block !important;
}

/* snapshot card */
body.pdf-mode .snapshot-card {
    margin-top: 20px !important;
    border: 1px solid #e5e7eb !important;
}

/* cards */
body.pdf-mode .card {
    border: 1px solid #e5e7eb !important;
    page-break-inside: avoid;
}

/* launch rows */
body.pdf-mode .launch-row,
body.pdf-mode .launch-row.pro {
    border: 1px solid #e5e7eb !important;
    page-break-inside: avoid;
}

/* hide ALL buttons */
body.pdf-mode button,
body.pdf-mode .btn-solid,
body.pdf-mode .btn-outline,
body.pdf-mode .cta-buttons,
body.pdf-mode .hero-actions {
    display: none !important;
}

/* remove modals completely */
body.pdf-mode .modal-overlay {
    display: none !important;
}
/* ===============================
   PDF SAFE LAYOUT (CRITICAL)
   =============================== */

body.pdf-mode .pdf-wrapper{
    max-width: 100% !important;
    width: 100% !important;
    padding: 20px !important;
    margin: 0 !important;
    overflow: visible !important;
}

body.pdf-mode{
    width: 100% !important;
    overflow: visible !important;
}

/* force single column */
body.pdf-mode .course-hero,
body.pdf-mode .hero-snapshot{
    display: block !important;
}

/* prevent cutting */
body.pdf-mode *{
    box-sizing: border-box !important;
}

/* keep cards intact */
body.pdf-mode .card,
body.pdf-mode .launch-row,
body.pdf-mode .launch-row.pro,
body.pdf-mode .topic-item{
    page-break-inside: avoid !important;
}

/* remove visuals that break PDF */
body.pdf-mode .hero-actions,
body.pdf-mode .cta-buttons,
body.pdf-mode button,
body.pdf-mode .modal-overlay{
    display: none !important;
}

/* neutralize shadows & gradients */
body.pdf-mode *{
    box-shadow: none !important;
    background-image: none !important;
}
/* ===============================
   PROFESSIONAL INQUIRY BUTTON
  
   =============================== */
   /* Normal view – looks like text */
/* NORMAL VIEW – 100% SAME LOOK */
.pdf-link,
.pdf-link:visited,
.pdf-link:hover,
.pdf-link:active{
    color: inherit !important;
    background-color: #28a745 !important;      /* 👈 keeps original color */
    text-decoration: none !important;
    cursor: default;
}

/* PDF MODE – clickable but SAME color */
body.pdf-mode .pdf-link{
    cursor: pointer;
}
/* ONLY PDF MODE – clickable */

.btn-inquiry{
    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:14px 26px;
    font-size:18px;
    font-weight:800;

    color: #fff;
    background: #09515D;

    border:2px solid #09515D;
    border-radius:10px;

    cursor:pointer;
    transition:all .25s ease;

    box-shadow:
        0 6px 18px rgba(9,81,93,.12);
}

/* icon */
.btn-inquiry i{
    font-size:16px;
    color:#F47B1E;
}

/* hover */
.btn-inquiry:hover{
    background:#09515D;
    color:#ffffff;

    transform:translateY(-2px);

    box-shadow:
        0 12px 30px rgba(9,81,93,.25);
}

.btn-inquiry:hover i{
    color:#ffffff;
}

/* active click */
.btn-inquiry:active{
    transform:translateY(0);
    box-shadow:
        0 6px 16px rgba(9,81,93,.18);
}
@media (max-width: 640px){
    .btn-inquiry{
        width:100%;
        justify-content:center;
        padding:16px 0;
        font-size:15px;
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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

 <script>
function openEnrollModal(courseTitle, courseId = null){
    document.body.style.overflow = 'hidden';
    document.getElementById('enrollModal').style.display = 'flex';

    // Title
    document.getElementById('selectedCourse').innerText =
        'Enroll in "' + courseTitle + '"';

    // Hidden fields
    document.getElementById('courseName').value = courseTitle;
    document.getElementById('courseId').value = courseId;

    document.getElementById('enrollInfo').style.display = 'flex';

    // Duration
    const duration = @json($course->duration);
    if (duration) {
        document.getElementById('enrollDuration').innerText = duration;
    }

    // Level
    const level = @json($course->level);
    if (level) {
        document.getElementById('enrollLevel').innerText =
            level.charAt(0).toUpperCase() + level.slice(1);

        document.getElementById('enrollLevelWrap').style.display = 'flex';
        document.getElementById('selectedLevel').value = level;
    }
}
</script>

<script>
function closeEnrollModal(){
    document.body.style.overflow = '';
    document.getElementById('enrollModal').style.display='none';
}

/* PRINT */
function printCourse(){
    window.print();
}

// pdf
function downloadPDF(){
    const element = document.getElementById('courseContent');

    document.body.classList.add('pdf-mode');

    const opt = {
        margin: [0.5, 0.4, 0.6, 0.4], // top right bottom left
        filename: '{{ Str::slug($course->title) }}.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 1.2,              // 🔥 DO NOT increase
            useCORS: true,
            backgroundColor: '#ffffff',
            scrollX: 0,
            scrollY: 0,
            windowWidth: element.scrollWidth
        },
        jsPDF: {
            unit: 'in',
            format: 'a4',
            orientation: 'portrait'
        },
        pagebreak: {
            mode: ['css', 'legacy']
        }
    };

    html2pdf()
        .set(opt)
        .from(element)
        .save()
        .then(() => {
            document.body.classList.remove('pdf-mode');
        });
}


</script>


<script>
function openInquiryModal(courseTitle, courseId = null, level = '', duration = ''){
    document.body.style.overflow = 'hidden';
    document.getElementById('inquiryModal').style.display = 'flex';

    document.getElementById('inquiryTitle').innerText =
        'Inquiry about "' + courseTitle + '"';

    document.getElementById('inquiryCourseTitle').value = courseTitle;
    document.getElementById('inquiryCourseId').value = courseId;

    document.getElementById('inquiryInfo').style.display = 'flex';

    if(duration){
        document.getElementById('inquiryDuration').innerText = duration;
    }

    if(level){
        document.getElementById('inquiryLevelText').innerText =
            level.charAt(0).toUpperCase() + level.slice(1);
        document.getElementById('inquiryLevel').value = level;
    }
}
</script>
<script>


function closeInquiryModal(){
    document.body.style.overflow = '';
    document.getElementById('inquiryModal').style.display = 'none';
}
</script>


<script>
function handleLaunchCheck() {
    const datesSection = document.getElementById('dates');
    const messageBox = document.getElementById('launchMessage');

    if (datesSection && datesSection.children.length > 0) {
        datesSection.scrollIntoView({ behavior: 'smooth' });
        if (messageBox) messageBox.style.display = 'none';
    } else {
        if (messageBox) {
            messageBox.style.display = 'block';
            messageBox.scrollIntoView({ behavior: 'smooth' });
        }
    }
}
</script>
<script>
function closeSuccessModal(){
    document.getElementById('successModal').style.display = 'none';
    document.body.style.overflow = '';
}

@if(session('popup_success'))
document.addEventListener('DOMContentLoaded', function () {

    // Close any open modals
    ['contactModal','enrollModal','inquiryModal'].forEach(id => {
        const modal = document.getElementById(id);
        if(modal) modal.style.display = 'none';
    });

    // Inject dynamic text
    document.querySelector('.success-title').innerText =
        @json(session('popup_title'));

    document.querySelector('.success-text').innerText =
        @json(session('popup_message'));

    // Show success popup
    document.getElementById('successModal').style.display = 'flex';
});
@endif
</script>
