@if(session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:10px;margin-bottom:10px;border-radius:4px">
        {{ session('success') }}
    </div>
@endif

<section id="courses" class="courses-wrapper">
    <h2 class="courses-title">Skill Up Fast</h2>
    <p class="courses-subtitle">
        Master practical skills that help you grow personally and professionally.
    </p>
    <div class="course-filters">
    <select id="categoryFilter" class="category-btn">
<option value="all">▦ All Categories</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button id="freeFilterBtn" class="category-btn free-btn">
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
    No free courses available for this category.
</div>


   
    <div class="courses-grid">
        @foreach($courses as $title => $courseLevels)
    @php
        $defaultCourse = $courseLevels->first();
    @endphp

<div class="course-card"
     data-category="{{ $defaultCourse->training_category_id ?? 'none' }}"
     data-free="{{ ($defaultCourse->price == 0) ? 'yes' : 'no' }}">

        
        <div class="course-image"style="background-image:url('{{ asset('images/'.$defaultCourse->image) }}')">
        </div>

        <div class="course-content">
            <div>
                <h3>{{ $title }}</h3>
                <a href="{{ route('show', $defaultCourse->id) }}"
                   class="course-details-link" style="color: #636363;">
                    View Course Details
                </a>
                <button class="enroll-btn" style="margin-left:20px !important;"
                onclick="openEnrollModal('{{ $title }}')">
                Enroll Now
            </button>

                <!-- LEVEL SELECT -->
                @if($courseLevels->count() > 1)
                    <select class="level-select"
                        onchange="location.href=this.value">
                        @foreach($courseLevels as $c)
                            <option value="{{ route('show', $c->id) }}">
                                {{ $c->level }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <p class="single-level">
                        Level: {{ $defaultCourse->level }}
                    </p>
                @endif

                
            </div>

            
        </div>
    </div>
@endforeach

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
                <input type="tel" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="form-group">
                <input type="date" name="preferred_date" required>
            </div>

            <div class="form-group">
                <input type="time" name="preferred_time" required>
            </div>

            <div class="form-group">
                <textarea name="message" placeholder="Any additional information..." rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Enrollment</button>
        </form>
    </div>
</div>

<style>
   
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
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
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
let freeOnly = false;

document.getElementById('freeFilterBtn').addEventListener('click', function () {
    freeOnly = !freeOnly;
    this.classList.toggle('active', freeOnly);
    applyFilters();
});

document.getElementById('categoryFilter').addEventListener('change', function () {
    freeOnly = false; // 👈 reset free filter
    document.getElementById('freeFilterBtn').classList.remove('active');
    applyFilters();
});

function applyFilters(){
    const selectedCategory = document.getElementById('categoryFilter').value;
    const cards = document.querySelectorAll('.course-card');
    const message = document.getElementById('noCoursesMessage');

    let visibleCount = 0;

    cards.forEach(card => {
        const cardCategory = card.dataset.category;
        const isFree = card.dataset.free === 'yes';

        let show = true;

        if (selectedCategory !== 'all' && cardCategory !== selectedCategory) {
            show = false;
        }

        if (freeOnly && !isFree) {
            show = false;
        }

        card.style.display = show ? 'block' : 'none';

        if (show) visibleCount++;
    });

    // 🔔 SHOW MESSAGE IF NOTHING VISIBLE
    if (freeOnly && visibleCount === 0) {
        message.style.display = 'block';
    } else {
        message.style.display = 'none';
    }
}

</script>
