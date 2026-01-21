<section id="training" class="training-section">
    <h2>Our Training Moments</h2>
    <p>Explore snapshots of our live online sessions where learning comes alive.</p>

    <!-- Tabs -->
    <div class="training-tabs">
        @foreach($categories as $index => $category)
            <button
                class="tab {{ $index === 0 ? 'active' : '' }}"
                data-tab="{{ $category->slug }}">
                {{ $category->name }}
            </button>
        @endforeach
        <button class="nav-btn" type="button" aria-label="Next" style="margin-left:50px;">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>

    <!-- Image Stack -->
    @foreach($categories as $index => $category)
        <div class="image-carousel {{ $index === 0 ? 'active' : '' }}"
     data-tab="{{ $category->slug }}">

            @foreach($category->images as $i => $img)
                <img src="{{ asset('storage/' . $img->image) }}"
                     class="img img-{{ $i + 1 }}">
            @endforeach

        </div>
    @endforeach
    <!-- Carousel Controls -->
<div class="carousel-controls">
    <button class="carousel-btn prev" aria-label="Previous">
        &lt;
    </button>
    <button class="carousel-btn next" aria-label="Next">
        &gt;
    </button>
</div>

    
</section>
<style>
    /* ===============================
   IMAGE CAROUSEL CONTROLS
   =============================== */

.carousel-controls {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 24px;
}

.carousel-btn {
    width: 36px;
    height: 36px;
    border: 1px solid #cfcfcf;
    background: #fff;
    border-radius: 4px;
    cursor: pointer;
    font-size: 18px;
    line-height: 1;
    transition: all .2s ease;
}

.carousel-btn:hover {
    background: #f47b1e;
    color: #fff;
    border-color: #f47b1e;
}

    /* ===============================
   RESPONSIVE – TRAINING SECTION
   =============================== */

/* LARGE TABLET */
@media (max-width: 1024px) {
    .training-section {
        padding: 0 16px;
    }

    .image-carousel {
        height: 200px;
    }

    .image-carousel .img {
        width: 360px;
    }

    .img-1 { transform: translateX(-150px) scale(0.9); }
    .img-2 { transform: translateX(-80px) scale(0.95); }
    .img-4 { transform: translateX(80px) scale(0.95); }
    .img-5 { transform: translateX(150px) scale(0.9); }
}

/* TABLET */
@media (max-width: 768px) {
    .training-section h2 {
        font-size: 24px;
    }

    .training-section p {
        font-size: 13px;
        margin-bottom: 24px;
    }

    .training-tabs {
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 30px;
    }

    .tab {
        padding: 8px 14px;
        font-size: 12px;
    }

    .image-carousel {
        height: auto;
        position: static;
        display: grid;
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 14px;
    }

    .image-carousel .img {
        position: static;
        width: 100%;
        transform: none !important;
        opacity: 1 !important;
        box-shadow: 0 10px 22px rgba(0,0,0,0.18);
    }
}

/* MOBILE */
/* MOBILE */
@media (max-width: 640px) {

    .training-tabs {
        justify-content: flex-start;   /* ❗ not center */
        overflow: hidden;              /* pagination handled by JS */
    }

    .training-tabs .tab {
        font-size: 12px;
        padding: 8px 10px;
    }

    /* SHOW arrow on mobile */
    .training-tabs .nav-btn {
        display: inline-flex;
        margin-left: auto !important;
    }
}


/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .training-section h2 {
        font-size: 20px;
    }

    .training-section p {
        font-size: 12px;
    }
}
.training-tabs {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
}
.image-carousel {
    display: none !important;   /* ❌ hide ALL by default */
}

.image-carousel.active {
    display: flex !important;   /* ✅ show ONLY active */
}

@media (max-width: 1024px) {

    .image-carousel {
        position: relative;
        height: auto;
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .image-carousel .img {
        position: absolute;
        width: 90%;
        max-width: 420px;
        transform: none !important;
        opacity: 0;
        pointer-events: none;
        transition: opacity .3s ease;
    }

    .image-carousel .img.active-img {
        opacity: 1;
        pointer-events: auto;
        position: relative;
    }
}
/* media */
/* ===============================
   MOBILE: SINGLE IMAGE CAROUSEL
   =============================== */
@media (max-width: 1024px) {

    .image-carousel {
        position: relative;
        height: auto;
        display: block;
    }

    /* Hide ALL images by default */
    .image-carousel .img {
        display: none;
        position: relative;
        width: 100%;
        max-width: 100%;
        transform: none !important;
        opacity: 1 !important;
        box-shadow: 0 10px 22px rgba(0,0,0,0.18);
    }

    /* Show ONLY active image */
    .image-carousel .img.active-img {
        display: block;
    }
}


</style>

<script>
(() => {
    const tabs = document.querySelectorAll('.tab');
    const carousels = document.querySelectorAll('.image-carousel');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');

    let activeCarousel = document.querySelector('.image-carousel.active');

    function isMobile() {
        return window.innerWidth <= 768;
    }

    /* ---------------- TAB SWITCH ---------------- */
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            const target = tab.dataset.tab;

            carousels.forEach(c => {
                c.classList.remove('active');

                // 🔑 Reset positions ALWAYS
                c.querySelectorAll('.img').forEach((img, i) => {
                    img.className = `img img-${i + 1}`;
                });

                if (c.dataset.tab === target) {
                    c.classList.add('active');
                    activeCarousel = c;
                }
            });
        });
    });

    /* ---------------- ROTATION (DESKTOP ONLY) ---------------- */
    function rotate(direction) {
        if (isMobile()) return; // ❌ disable on mobile
        if (!activeCarousel) return;

        const images = [...activeCarousel.querySelectorAll('.img')];
        const total = images.length;

        images.forEach(img => {
            const cls = [...img.classList].find(c => c.startsWith('img-'));
            if (!cls) return;

            const pos = parseInt(cls.split('-')[1]);
            img.classList.remove(cls);

            let next;
            if (direction === 'next') {
                next = pos === total ? 1 : pos + 1;
            } else {
                next = pos === 1 ? total : pos - 1;
            }

            img.classList.add(`img-${next}`);
        });
    }

    nextBtn?.addEventListener('click', () => rotate('next'));
    prevBtn?.addEventListener('click', () => rotate('prev'));

    /* ---------------- ON RESIZE ---------------- */
    window.addEventListener('resize', () => {
        if (isMobile() && activeCarousel) {
            // 🔥 force clean layout on mobile
            activeCarousel.querySelectorAll('.img').forEach((img, i) => {
                img.className = `img img-${i + 1}`;
            });
        }
    });
})();
</script>

<script>
(() => {

    const tabs = document.querySelectorAll('.tab');
    const carousels = document.querySelectorAll('.image-carousel');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');

    let activeCarousel = document.querySelector('.image-carousel.active');
    let currentIndex = 0;

    function isMobileOrTablet() {
        return window.innerWidth <= 1024;
    }

    function showSingleImage(carousel, index) {
        const images = carousel.querySelectorAll('.img');
        images.forEach((img, i) => {
            img.classList.remove('active-img');
            if (i === index) img.classList.add('active-img');
        });
    }

    // ---------- TAB SWITCH ----------
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {

            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            const target = tab.dataset.tab;

            carousels.forEach(c => {
                c.classList.remove('active');
                c.querySelectorAll('.img').forEach(img => {
                    img.classList.remove('active-img');
                });

                if (c.dataset.tab === target) {
                    c.classList.add('active');
                    activeCarousel = c;
                    currentIndex = 0;

                    if (isMobileOrTablet()) {
                        showSingleImage(activeCarousel, currentIndex);
                    }
                }
            });
        });
    });

    // ---------- NEXT / PREV ----------
    function navigate(direction) {
        if (!activeCarousel) return;

        const images = activeCarousel.querySelectorAll('.img');
        if (!images.length) return;

        if (isMobileOrTablet()) {
            currentIndex =
                direction === 'next'
                    ? (currentIndex + 1) % images.length
                    : (currentIndex - 1 + images.length) % images.length;

            showSingleImage(activeCarousel, currentIndex);
        }
        else {
            // 🖥 Desktop: keep your existing stack behavior
            images.forEach(img => {
                const cls = [...img.classList].find(c => c.startsWith('img-'));
                if (!cls) return;

                const pos = parseInt(cls.split('-')[1]);
                img.classList.remove(cls);

                let next =
                    direction === 'next'
                        ? (pos === images.length ? 1 : pos + 1)
                        : (pos === 1 ? images.length : pos - 1);

                img.classList.add(`img-${next}`);
            });
        }
    }

    nextBtn.addEventListener('click', () => navigate('next'));
    prevBtn.addEventListener('click', () => navigate('prev'));

    // ---------- INITIAL LOAD ----------
    if (isMobileOrTablet() && activeCarousel) {
        showSingleImage(activeCarousel, currentIndex);
    }

    window.addEventListener('resize', () => {
        currentIndex = 0;
        if (isMobileOrTablet() && activeCarousel) {
            showSingleImage(activeCarousel, currentIndex);
        }
    });

})();
</script>

<script>
(() => {
    const tabsContainer = document.querySelector('.training-tabs');
    const tabs = Array.from(tabsContainer.querySelectorAll('.tab'));
    const arrow = tabsContainer.querySelector('.nav-btn');

    if (!tabs.length || !arrow) return;

    function getPageSize() {
        if (window.innerWidth <= 640) return 3;   // 📱 mobile
        if (window.innerWidth <= 1024) return 4;  // 📱 tablet
        return 5;                                 // 🖥 desktop
    }

    let pageIndex = 0;

    function renderTabs() {
        const PAGE_SIZE = getPageSize();
        const totalPages = Math.ceil(tabs.length / PAGE_SIZE);

        const start = pageIndex * PAGE_SIZE;
        const end = start + PAGE_SIZE;

        tabs.forEach((tab, index) => {
            tab.style.display =
                index >= start && index < end ? 'inline-flex' : 'none';
        });

        if (pageIndex >= totalPages) pageIndex = 0;
    }

    // Initial render
    renderTabs();

    // Arrow click
    arrow.addEventListener('click', () => {
        const PAGE_SIZE = getPageSize();
        const totalPages = Math.ceil(tabs.length / PAGE_SIZE);

        pageIndex = (pageIndex + 1) % totalPages;
        renderTabs();
    });

    // Recalculate on resize
    window.addEventListener('resize', () => {
        pageIndex = 0;
        renderTabs();
    });
})();
</script>
