@if(session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:10px;margin-bottom:10px;border-radius:4px">
        {{ session('success') }}
    </div>
@endif

<section id="courses" class="courses-wrapper" style="overflow-x:hidden !important;">

    <h2 class="courses-title">Skill Up Fast</h2>
    <p class="courses-subtitle">
        Master practical skills that help you grow personally and professionally.
    </p>

    <div class="courses-layout">

    <div class="filters-sidebar" >
<h4 style="margin-top:20px;font-style:italic;font-weight:800;letter-spacing:0.6px;">
    <i class="bi bi-grid-3x3-gap-fill" style="margin-right:8px;color: #09515D;"></i>
    Categories
</h4>

    <label class="check-item">
        <input type="radio" name="category" value="all" checked onchange="setCategory('all')">
        <span>All Categories</span>
    </label>

    @foreach($categories as $category)
    <label class="check-item">
        <input type="radio" name="category" value="{{ $category->id }}"
               onchange="setCategory('{{ $category->id }}')">
        <span>{{ $category->name }}</span>
    </label>
    @endforeach
<h4 style="margin-top:20px;font-style:italic;font-weight:800;letter-spacing:0.6px;">
    <i class="bi bi-stack" style="margin-right:3px;color:#09515D;font-size:15px;"></i>
    Levels
</h4>


<label class="check-item">
    <input type="radio" name="level" value="all" checked onchange="setLevel('all')">
    <span>All Levels</span>
</label>

<label class="check-item">
    <input type="radio" name="level" value="beginner" onchange="setLevel(this.value)">
    <span>Beginner</span>
</label>

<label class="check-item">
    <input type="radio" name="level" value="intermediate" onchange="setLevel(this.value)">
    <span>Intermediate</span>
</label>

<label class="check-item">
    <input type="radio" name="level" value="advanced" onchange="setLevel(this.value)">
    <span>Advanced</span>
</label>


   <button id="freeFilterBtn" class="free-checkbox" type="button">
    <i class="bi bi-gift"></i> Free Courses
</button>

</div>

   

<div id="noCoursesMessage"
     style="
        display:none;
        text-align:center;
        padding:40px 20px;
        color:#6b7280;
        font-size:16px;
        font-weight:500;
     ">
    <i class="bi bi-info-circle"></i>
    <span id="noCoursesText">
        No courses availaible for this category.
    </span>
</div>



   
<div class="courses-content">
    <div class="courses-grid">
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
     data-category="{{ $course->training_category_id ?? 'none' }}"
     data-level="{{ strtolower($course->level) }}"
     data-free="{{ ($course->price == 0) ? 'yes' : 'no' }}"
     data-launch="{{ $launchDate }}">


    <div class="course-image"style="background-image:url('{{ asset('images/'.$course->image) }}')">
    </div>

    <div class="course-content">
        <div>
            <h3>{{ $course->title }}</h3>
            <a href="{{ route('show', $course->id) }}"
               class="course-details-link" style="color: #636363;">
                View Course Details
            </a>
            <!-- <button class="enroll-btn" 
                    onclick="openEnrollModal('{{ $course->title }}')">
                Enroll Now
            </button> -->

           

        </div>
    </div>
</div>
@endforeach



        
        

            
    </div>
    </div>
</div>
</section>
<!-- Enroll Modal -->
<div id="enrollModal" class="modal-overlay">
    <div class="modal-box">
        <span class="close-btn" onclick="closeEnrollModal()">×</span>

        <h3 id="selectedCourse">Enroll</h3>

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
                <input type="tel" name="phone" placeholder="Phone Number(Optional)">
            </div>

            

            
            <div class="form-group">
                <textarea name="message" placeholder="Any additional information..." rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Enrollment</button>
        </form>
    </div>
</div>

<style>
    .courses-content{
    flex:1;
    display:flex;
    flex-direction:column;
}

   
#noCoursesMessage{
    display:none;
    text-align:center;
    padding:40px 20px;
    color:#6b7280;
    font-size:16px;
    font-weight:500;
}
#noCoursesMessage i{
    display:block;
    font-size:24px;
    margin-bottom:8px;
    color:#09515D;
}

.course-filters{
    display:flex;
    justify-content:flex-end;
    gap:12px;
    margin-bottom:30px;
    margin-right:100px !important;
}

.category-btn{
    padding:12px 16px;
    background:#09515D;
    color:#fff;
    border:1px solid #09515D;
    border-radius:4px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:all .2s ease;

}

.category-btn:hover{
    background: #F47B1E;
}

.free-btn.active{
    background: #F47B1E;   /* green when active */
    border-color: #F47B1E;
}

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
.course-card {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.course-content {
    flex-grow: 1;
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

/* corsess respon */
/* ===============================
   RESPONSIVE – COURSES SECTION
   =============================== */

/* LARGE LAPTOP / SMALL DESKTOP */
@media (max-width: 1200px) {
    .courses-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .course-filters {
        margin-right: 40px !important;
    }
}

/* TABLET */
@media (max-width: 992px) {
    .courses-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .courses-title {
        font-size: 26px;
    }

    .course-filters {
        justify-content: center;
        margin-right: 0 !important;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }
}

/* SMALL TABLET */
@media (max-width: 768px) {
    .courses-wrapper {
        padding: 30px 16px;
    }

    .courses-subtitle {
        font-size: 13px;
        margin-bottom: 26px;
    }

    .courses-grid {
        gap: 18px;
                margin-left: 0px !important;

    }
    .course-card{
        margin-left: 0px !important;
    }

    .course-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .enroll-btn {
        align-self: flex-start;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .courses-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
                margin-left: 0px !important;

    }

    .courses-title {
        font-size: 24px;
    }

    .course-image {
        height: 160px;
    }

    .course-content h3 {
        font-size: 15px;
    }

    .enroll-btn {
        font-size: 12px;
        padding: 7px 16px;
    }
    .course-card{
        margin-left: 0px !important;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .course-card{
        margin-left: 0px !important;
    }
    .courses-title {
        font-size: 22px;
    }

    .courses-subtitle {
        font-size: 12px;
    }

    .course-image {
        height: 150px;
    }
}

/* ===============================
   COURSES LAYOUT (LIKE IMAGE)
   =============================== */

.courses-layout{
    display:flex;
    gap:30px;
}

/* SIDEBAR */
.filters-sidebar{
    width:240px;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:6px;
    padding:18px;
    height:fit-content;

    position: sticky;
    top: 100px;               /* distance from top */
    align-self: flex-start;   /* IMPORTANT for flex layouts */

    margin-left: 100px !important;
}


.filters-sidebar h4{
    font-size:15px;
    font-weight:700;
    color:#111827;
    margin-bottom:10px;
}

/* CHECK ITEMS */
.check-item{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
    color:#374151;
    margin-bottom:8px;
    cursor:pointer;
}

.check-item input{
    accent-color:#09515D;
}

/* FREE BUTTON */
.free-checkbox{
    margin-top:18px;
    width:100%;
    padding:10px;
    background:#09515D;
    color:#fff;
    border:none;
    border-radius:4px;
    font-weight:600;
    cursor:pointer;
}

.free-checkbox.active{
    background:#F47B1E;
}

/* CONTENT */
.courses-content{
    flex:1;
}

/* MOBILE */
@media(max-width:992px){
    .courses-layout{
        flex-direction:column;
    }

    .filters-sidebar{
        width:100%;
    }
}

/* ===============================
   TABLET & BELOW
   =============================== */
@media (max-width: 992px){
    .courses-layout{
        flex-direction: column;
    }

    .filters-sidebar{
        width:100%;
        position: static;
        top:auto;
        margin-left:0 !important;
        display:grid;
        grid-template-columns: repeat(2, 1fr);
        gap:12px;
    }

    .filters-sidebar h4{
        grid-column: 1 / -1;
    }

    .free-checkbox{
        grid-column: 1 / -1;
    }
}
/* ===============================
   MOBILE ONLY
   =============================== */
@media (max-width: 640px){
    .filters-sidebar{
        grid-template-columns: 1fr;
        padding:14px;
    }

    .check-item{
        font-size:13px;
    }

    .free-checkbox{
        font-size:13px;
        padding:10px;
    }
}
/* Tablet */
@media (max-width: 992px){
    .courses-grid{
        grid-template-columns: repeat(2, 1fr);
        margin-left: 0px !important;
    }
}

/* Mobile */
@media (max-width: 640px){
    .courses-grid{
        grid-template-columns: 1fr;
                margin-left: 0px !important;

    }
}
/* ===============================
   SIDEBAR – PRODUCT-GRADE UI (COMPACT HEIGHT)
   =============================== */

.filters-sidebar{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 20px;                 /* compact */
    border: 1px solid #e5e7eb;
    box-shadow:
        0 1px 2px rgba(15,23,42,0.04),
        0 12px 32px rgba(15,23,42,0.08);
    position: sticky;
    top: 90px;
}

/* SECTION HEADINGS */
/* FORCE LEFT ALIGN FOR SIDEBAR HEADINGS */
.filters-sidebar h4{
    text-align: left !important;
    display: flex;
    align-items: center;
    justify-content: flex-start;
}


/* SPACE BETWEEN SECTIONS */
.filters-sidebar h4:not(:first-child){
    margin-top: 20px;                   /* reduced */
}

/* RADIO ROW */
.check-item{
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    padding: 8px 12px;                  /* reduced height */
    border-radius: 8px;
    margin-bottom: 6px;                 /* reduced */
    transition: all .18s ease;
}

/* HOVER */
.check-item:hover{
    background: #f1f5f9;
    border-color: #09515D;
    transform: translateX(2px);
}

/* RADIO */
.check-item input{
    accent-color: #09515D;
}

/* TEXT */
.check-item span{
    font-size: 14px;
    font-weight: 500;
    color: #1f2937;
}

/* CHECKED STATE */
.check-item input:checked + span{
    color: #09515D;
    font-weight: 700;
}

/* FREE COURSE TOGGLE */
.free-checkbox{
    margin-top: 16px;                   /* reduced */
    padding: 10px 14px;                 /* reduced */
    border-radius: 10px;
    background: linear-gradient(135deg, #0f172a, #09515D);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: .3px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    box-shadow: 0 10px 24px rgba(15,23,42,0.25);
    transition: all .2s ease;
}

/* FREE HOVER */
.free-checkbox:hover{
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(15,23,42,0.35);
}

/* FREE ACTIVE */
.free-checkbox.active{
    background: linear-gradient(135deg, #F47B1E, #ff9f45);
    box-shadow: 0 12px 26px rgba(244,123,30,0.45);
}

/* MOBILE RESET */
@media(max-width:992px){
    .filters-sidebar{
        border-radius: 10px;
        box-shadow: none;
        padding: 16px 18px;
    }
}
/* ===============================
   FIX SIDEBAR HEIGHT (IMPORTANT)
   =============================== */

/* STOP flex stretching */
.courses-layout{
    align-items: flex-start;
}

/* FORCE sidebar to its content height only */
.filters-sidebar{
    height: fit-content;
    align-self: flex-start;
}

</style>
<script>
function openEnrollModal(courseTitle) {
    document.getElementById('enrollModal').style.display = 'flex';
    document.getElementById('courseName').value = courseTitle;
    document.getElementById('selectedCourse').innerText = 'Enroll in ' + courseTitle;
}

function closeEnrollModal() {
    document.getElementById('enrollModal').style.display = 'none';
}

// Close on outside click
window.onclick = function(e) {
    const modal = document.getElementById('enrollModal');
    if (e.target === modal) {
        closeEnrollModal();
    }
}
</script>



<script>
let selectedCategory = 'all';
let freeOnly = false;

// CATEGORY (radio)
function setCategory(val){
    selectedCategory = val;

    // AUTO-SELECT "ALL LEVELS"
    selectedLevel = 'all';
    document.querySelector('input[name="level"][value="all"]').checked = true;

    // reset free filter
    freeOnly = false;
    freeBtn.classList.remove('active');

    applySidebarFilters();
}




const freeBtn = document.getElementById('freeFilterBtn');

freeBtn.addEventListener('click', function () {
    freeOnly = true;                // always ON
    freeBtn.classList.add('active');
    applySidebarFilters();
});

function applySidebarFilters(){
    const cards = document.querySelectorAll('.course-card');
    const messageBox = document.getElementById('noCoursesMessage');
    const messageText = document.getElementById('noCoursesText');

    let visibleCount = 0;

    cards.forEach(card => {
        const cardCategory = card.dataset.category;
        const cardLevel = card.dataset.level;
const isFree = card.dataset.free === 'yes';
const launchDate = card.dataset.launch; // yyyy-mm-dd
const today = new Date().toISOString().split('T')[0];

        let show = true;

        // CATEGORY FILTER
        if(selectedCategory !== 'all' && cardCategory !== selectedCategory){
            show = false;
        }

        // LEVEL FILTER
if (selectedLevel !== 'all' && cardLevel !== selectedLevel) {
    show = false;
}



        
// FREE FILTER LOGIC (UPCOMING + TODAY ONLY)


// Case 1: Free filter NOT active → HIDE all free courses
if (!freeOnly && isFree) {
    show = false;
}

// Case 2: Free filter active → show ONLY upcoming/today free courses
if (freeOnly) {

    // must be free
    if (!isFree) {
        show = false;
    }

    // must have launch date AND must be today or future
    if (!launchDate) {
    show = false;
} else {
    const launch = new Date(launchDate);
    const now = new Date(today);

    if (launch < now) {
        show = false;
    }
}

}


card.style.display = show ? '' : 'none';

        if(show) visibleCount++;
    });

    // MESSAGE LOGIC
    if(visibleCount === 0){
        messageBox.style.display = 'block';

      if (freeOnly) {
    messageText.innerText = 'No upcoming free courses available yet.';
}

        else if(selectedLevels.length > 0 && selectedCategory !== 'all'){
            messageText.innerText = 'No courses found for this category and level.';
        }
        else if(selectedLevels.length > 0){
            messageText.innerText = 'No courses found for the selected level.';
        }
        else {
            messageText.innerText = 'No courses found for the selected filters.';
        }

    } else {
        messageBox.style.display = 'none';
    }
}
</script>

<script>
let selectedLevel = 'all';
function setLevel(level){
    selectedLevel = level;

    // reset free filter
    freeOnly = false;
    freeBtn.classList.remove('active');

    applySidebarFilters();
}

</script>
