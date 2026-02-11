 <header class="main-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h2>Global Tuitions</h2>
                </div>
                <nav class="main-nav" id="mainNav">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#courses">Courses</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="header-actions">

    <div class="search-bar">
        <input type="text" placeholder="Search courses..." id="searchInput">
        <i class="fas fa-search"></i>
    </div>

    <div class="header-btn-group">
        <button class="btn-outline">Sign In</button>
        <button class="btn-primary">Get Started</button>
    </div>

    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="fas fa-bars"></i>
    </button>

</div>

            </div>
        </div>
    </header> <!-- Hero Section -->
    <div class="courses-grid" id="coursesGrid" style="display:none">
    {{-- AJAX results injected here --}}
</div>



<script>
const searchInput = document.getElementById('searchInput');
const coursesGrid = document.getElementById('coursesGrid');

let debounceTimer;

if (searchInput) {
    searchInput.addEventListener('input', function () {
        const query = this.value.trim();

        clearTimeout(debounceTimer);

        // Empty → hide results
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
}
</script>
