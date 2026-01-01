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
        <div class="image-carousel"
             data-tab="{{ $category->slug }}"style="{{ $index === 0 ? '' : 'display:none' }}">

            @foreach($category->images as $i => $img)
                <img src="{{ asset('images/' . $img->image) }}"
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
        grid-template-columns: repeat(2, 1fr);
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


</style>
<script>
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {

        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const target = tab.dataset.tab;

        document.querySelectorAll('.image-carousel').forEach(carousel => {
            carousel.style.display =
                carousel.dataset.tab === target ? 'block' : 'none';
        });
    });
});
</script>


<script>
(() => {
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');

    if (!nextBtn || !prevBtn) return;

    function rotate(direction = 'next') {
        const activeCarousel = document.querySelector(
            '.image-carousel:not([style*="display:none"])'
        );
        if (!activeCarousel) return;

        const images = Array.from(activeCarousel.querySelectorAll('.img'));
        if (images.length <= 1) return;

        images.forEach(img => {
            const cls = [...img.classList].find(c => c.startsWith('img-'));
            if (!cls) return;

            const num = parseInt(cls.split('-')[1]);
            img.classList.remove(cls);

            let next;
            if (direction === 'next') {
                next = num === images.length ? 1 : num + 1;
            } else {
                next = num === 1 ? images.length : num - 1;
            }

            img.classList.add(`img-${next}`);
        });
    }

    nextBtn.addEventListener('click', () => rotate('next'));
    prevBtn.addEventListener('click', () => rotate('prev'));
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
