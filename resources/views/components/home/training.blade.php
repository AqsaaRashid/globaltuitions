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
