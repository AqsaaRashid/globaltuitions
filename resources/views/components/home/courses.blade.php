
   
    <!-- Courses Section with Sidebar -->
    <section class="courses-section" id="courses">
        <div class="container">
            <h2>Courses</h2>
            <div class="courses-layout"> <!-- Sidebar Filters -->
                <aside class="filters-sidebar" id="filtersSidebar">
                    <h4>Filters</h4>
                    <div class="filter-group">
                         
    <h5>Filter by Category:</h5>

<label class="filter-radio">
  <input type="radio" name="category" value="all" checked onchange="setCategory(this.value)">
  <span>All Categories</span>
</label>

@foreach($categories as $category)
<label class="filter-radio">
  <input type="radio"
         name="category"
         value="{{ $category->id }}"
         onchange="setCategory(this.value)">
  <span>{{ $category->name }}</span>
</label>
@endforeach

<h5>Filter by Level:</h5>

  <label class="filter-radio">
<input type="radio" name="level" value="all" checked onchange="setLevel('all')">
    <span>All Levels</span>
  </label>

  <label class="filter-radio">
<input type="radio" name="level" value="beginner" onchange="setLevel(this.value)">
    <span>Beginner</span>
  </label>

  <label class="filter-radio">
<input type="radio" name="level" value="intermediate" onchange="setLevel(this.value)">
    <span>Intermediate</span>
  </label>

  <label class="filter-radio">
<input type="radio" name="level" value="advanced" onchange="setLevel(this.value)">
    <span>Advanced</span>
  </label>
</div>

                    <button class="btn-free-courses">Free Courses</button>
                </aside> <!-- Course Cards Grid -->

                <div id="noCoursesMessage"
     style="display:none;text-align:center;padding:40px 20px;color:#6b7280;font-size:16px;font-weight:500;">
    <i class="bi bi-info-circle"></i>
    <span id="noCoursesText">No courses available.</span>
</div>

               <div class="courses-grid" id="coursesGrid">

@foreach($courses as $course)
@php
    $launchDate = '';
    if ($course->nextLaunch && $course->nextLaunch->launch_date) {
        $launchDate = \Carbon\Carbon::parse(
            $course->nextLaunch->launch_date
        )->toDateString();
    }
@endphp

<div class="course-card"
     data-level="{{ strtolower($course->level) }}"
     data-category="{{ $course->training_category_id }}"
     data-free="{{ $course->price == 0 ? 'yes' : 'no' }}"
     data-launch="{{ $launchDate }}">

    <h4>{{ $course->title }}</h4>

    <p>{!! Str::limit(strip_tags($course->description), 160) !!}</p>

    <p class="level-text">
        <strong>{{ ucfirst($course->level) }}</strong>
    </p>

    <p class="course-info">
        Duration: {{ $course->duration ?? 'N/A' }}
        |
        Charges:
        @if($course->price == 0)
            Free
        @else
            £{{ number_format($course->price, 2) }}
        @endif
    </p>

    <p class="course-info">Mode: Online / Virtual</p>

    <div class="course-actions">
        <a href="{{ route('show', $course->id) }}"
           class="btn-primary btn-details" style="text-decoration:none;">
            Details
        </a>

        <button class="btn-outline btn-inquiry"
            onclick="openInquiryModal(
                '{{ $course->title }}',
                {{ $course->id }},
                '{{ $course->level ?? '' }}',
                '{{ $course->duration ?? '' }}'
            )">
            Inquiry
        </button>
    </div>
</div>

@endforeach

</div>

            </div>
        </div>
    </section> <!-- Newsletter CTA Section -->
    
    
<!-- INQUIRY MODAL -->
<div id="inquiryModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeInquiryModal()">×</span>
        <div class="enroll-header">

 <h3 id="inquiryTitle" class="modal-title">
    Inquiry
</h3>

<div class="enroll-info" id="inquiryInfo" style="display:none; justify-content:center;">
    <span class="info-pill">
        <i class="bi bi-clock"></i>
        <span id="inquiryDuration"></span>
    </span>

    <span class="info-pill">
        <i class="bi bi-bar-chart-steps"></i>
        <span id="inquiryLevelText"></span>
    </span>

    
</div>
        </div>

        <div class="registration-card">
            <h2 class="reg-title">Course Inquiry</h2>
            <p class="reg-subtitle">
                Share your questions and our  Imperial Tuitions team will get back to you.
            </p>

            <form method="POST" action="{{ route('course.inquiry') }}">
                @csrf

       <!-- KEEP THIS EXACT -->
<input type="hidden" name="course_title" id="inquiryCourseTitle">
<input type="hidden" name="course_id" id="inquiryCourseId"> <!-- NEW -->
<!-- <input type="hidden" name="launch_date" id="inquiryLaunchDate">
<input type="hidden" name="launch_id" id="inquiryLaunchId">  -->
<input type="hidden" name="level" id="inquiryLevel">



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
                    <span class="highlight"> Imperial Tuitions</span>
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

<!-- stylesheet -->
 <style>

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

    width:95%;
    max-width:900px;

    max-height:90vh;        /* important */
    border-radius:14px;
    position:relative;

    display:flex;
    flex-direction:column;

    overflow:hidden;
}
.registration-card{
    flex:1;
    overflow-y:auto;
    padding:30px;
}
.enroll-header{
    padding:20px 30px 10px 30px;
    border-bottom:1px solid #e5e7eb;
}

.enroll-info{
    display:flex;
    gap:12px;
    flex-wrap:wrap;   /* prevents breaking */
    margin-top:10px;
}

.info-pill{
    background:#f3f4f6;
    padding:6px 12px;
    border-radius:30px;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:6px;
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
</style>



    <script>
    function scrollToCourses() {
  const coursesSection = document.getElementById("courses");
  if (coursesSection) {
    const headerOffset = 80;
    const elementPosition = coursesSection.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
    window.scrollTo({ top: offsetPosition, behavior: "smooth" });
  }
}
const mobileMenuToggle = document.getElementById("mobileMenuToggle");
const mainNav = document.getElementById("mainNav");
if (mobileMenuToggle) {
  mobileMenuToggle.addEventListener("click", () => {
    mainNav.classList.toggle("active");
  });
}
let selectedCategory = 'all';
let selectedLevel = 'all';
let freeOnly = false;

const freeBtn = document.querySelector('.btn-free-courses');

document.addEventListener('DOMContentLoaded', () => {
    applySidebarFilters();
});

// -----------------------------
// RESET FREE FILTER
// -----------------------------
function resetFreeFilterIfActive() {
    if (freeOnly) {
        freeOnly = false;
        freeBtn.classList.remove('active');
    }
}

// -----------------------------
// CATEGORY (radio)
// -----------------------------
function setCategory(value){
    resetFreeFilterIfActive();
    selectedCategory = value;
    applySidebarFilters();
}

// -----------------------------
// LEVEL (radio)
// -----------------------------
function setLevel(level){
    resetFreeFilterIfActive();
    selectedLevel = level;
    applySidebarFilters();
}

// -----------------------------
// FREE BUTTON (OVERRIDES ALL)
// -----------------------------
freeBtn.addEventListener('click', function () {
    freeOnly = !freeOnly;
    freeBtn.classList.toggle('active', freeOnly);

    if (freeOnly) {
        selectedCategory = 'all';
        selectedLevel = 'all';

        const catAll = document.querySelector('input[name="category"][value="all"]');
        const lvlAll = document.querySelector('input[name="level"][value="all"]');

        if (catAll) catAll.checked = true;
        if (lvlAll) lvlAll.checked = true;
    }

    applySidebarFilters();
});

// -----------------------------
// CORE FILTER LOGIC (UNCHANGED)
// -----------------------------
function applySidebarFilters(){
    const cards = document.querySelectorAll('.course-card');
    const messageBox = document.getElementById('noCoursesMessage');
    const messageText = document.getElementById('noCoursesText');

    let visibleCount = 0;

    cards.forEach(card => {
        const cardCategory = card.dataset.category;
        const cardLevel = card.dataset.level;
        const isFree = card.dataset.free === 'yes';

        let show = true;

        // FREE OVERRIDE
        if (freeOnly) {
            show = isFree;
        } else {
            if (selectedCategory !== 'all' && cardCategory !== selectedCategory) {
                show = false;
            }

            if (selectedLevel !== 'all' && cardLevel !== selectedLevel) {
                show = false;
            }
        }

        card.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });

    // EMPTY STATE
    if (visibleCount === 0) {
        messageBox.style.display = 'block';

        if (freeOnly) {
            messageText.innerText = 'No free courses available.';
        } else if (selectedCategory !== 'all' && selectedLevel !== 'all') {
            messageText.innerText = 'No courses found for this category and level.';
        } else if (selectedCategory !== 'all') {
            messageText.innerText = 'No courses available for this category.';
        } else if (selectedLevel !== 'all') {
            messageText.innerText = 'No courses found for the selected level.';
        } else {
            messageText.innerText = 'No courses found.';
        }
    } else {
        messageBox.style.display = 'none';
    }
}
</script>

<!-- script -->
 <script>
function openInquiryModal(title, id, level, duration) {
    // Set hidden inputs
    document.getElementById('inquiryCourseTitle').value = title;
    document.getElementById('inquiryCourseId').value = id;
    document.getElementById('inquiryLevel').value = level;

    // Set modal heading
    document.getElementById('inquiryTitle').innerText = 'Inquiry for ' + title;

    // Optional info pills
    if (duration || level) {
        document.getElementById('inquiryInfo').style.display = 'flex';
        document.getElementById('inquiryDuration').innerText = duration || '';
        document.getElementById('inquiryLevelText').innerText = level || '';
    }

    // Show modal
    document.getElementById('inquiryModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeInquiryModal() {
    document.getElementById('inquiryModal').style.display = 'none';
    document.body.style.overflow = '';
}

// Close modal on outside click
window.addEventListener('click', function (e) {
    const modal = document.getElementById('inquiryModal');
    if (e.target === modal) {
        closeInquiryModal();
    }
});
</script>

<script>
@if(session('popup_success'))
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('successModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';

        document.querySelector('.success-title').innerText =
            "{{ session('popup_title') }}";

        document.querySelector('.success-text').innerText =
            "{{ session('popup_message') }}";
    });
@endif

function closeSuccessModal(){
    document.getElementById('successModal').style.display = 'none';
    document.body.style.overflow = '';
}
</script>
