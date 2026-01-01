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
</section>
<style>
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
@media (max-width: 640px) {
    .training-section {
        margin: 40px auto;
    }

    .training-section h2 {
        font-size: 22px;
    }

    .training-tabs {
        justify-content: center;
    }

    .image-carousel {
        grid-template-columns: 1fr;
        gap: 16px;
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
