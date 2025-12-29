<section id="home"class="hero-wrapper">
    <div class="hero-inner">

        {{-- Top Text Block --}}
        <div class="hero-text-block">
            <h1 class="hero-title">
                Learn New Skills Completely Free and<br>
                Accelerate Your Personal Growth.
            </h1>

            <p class="hero-subtitle">
                Learn from high-quality courses without paying a single rupee.
                Upgrade your skills at your own pace, anytime, anywhere.
                Start learning today and move closer to your goals.
            </p>

            {{-- Search Bar --}}
            <div class="hero-search-card">
                <div class="hero-search-inner">
                    <input
    type="text"
    id="courseSearch"
    class="hero-search-input"
    placeholder="Discover your course"
/>

                    <button class="hero-search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             fill="none"
                             class="hero-search-icon">
                            <circle cx="11" cy="11" r="6"></circle>
                            <line x1="16" y1="16" x2="21" y2="21"></line>
                        </svg>
                    </button>

                </div>
            </div>
        </div>
<div class="courses-grid" id="coursesGrid" style="display:none">
    @include('partials.course-cards', ['courses' => $courses])
</div>

       {{-- Bottom Image Card --}}
<div class="hero-image-card">

    <div class="hero-image-wrapper">
        <img src="/images/btmgvideo.png"
             alt="Online learning session on laptop"
             class="hero-image">

        <!-- Play button overlay -->
        <div class="play-btn">
            <div class="play-btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="currentColor"
                     class="play-icon">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </div>
        </div>
    </div>

</div>


    </div>
</section>
<script>
const searchInput = document.getElementById('courseSearch');
const coursesGrid = document.getElementById('coursesGrid');

let debounceTimer;

searchInput.addEventListener('input', function () {
    const query = this.value.trim();

    clearTimeout(debounceTimer);

    // If input is empty → hide results
    if (query.length === 0) {
        coursesGrid.style.display = 'none';
        coursesGrid.innerHTML = '';
        return;
    }

    debounceTimer = setTimeout(() => {
        fetch(`/search-courses?q=${encodeURIComponent(query)}`)
            .then(res => res.text())
            .then(html => {
                coursesGrid.innerHTML = html;
                coursesGrid.style.display = 'grid';
            });
    }, 300);
});
</script>

