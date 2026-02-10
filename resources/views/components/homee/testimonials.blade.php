<div id="testimonials" class="wrap">

    <div class="sec-head">
      <div>
        <div class="sec-title">What Our Learners Say</div>
        <div class="sec-sub">Stories from Students Who Gained Skills and Confidence</div>
      </div>

      <button class="navv-btn" type="button" aria-label="Next">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>

    <div class="cards">
      <div class="t-card">
        <div class="quote">“</div>
        <p class="t-text">
          This course exceeded my expectations! The material was well-structured, and I can immediately apply what I learned in my career.
        </p>

        <div class="profile">
          <div class="avatar">
            <img src="images/pp1.jpeg" alt="John Doe">
          </div>
          <div class="who">
            <div class="name">John Doe</div>
            <div class="role">Software Engineer</div>
          </div>
        </div>
      </div>

      <div class="t-card">
        <div class="quote">“</div>
        <p class="t-text">
          A fantastic learning experience! The course provided real-world examples that helped me understand complex concepts easily.
        </p>

        <div class="profile">
          <div class="avatar">
            <img src="images/pp2.jpeg" alt="Jane Doe">
          </div>
          <div class="who">
            <div class="name">Jane Doe</div>
            <div class="role">Data Scientist</div>
          </div>
        </div>
      </div>
      <div class="t-card">
        <div class="quote">“</div>
        <p class="t-text">
          A fantastic learning experience! The course provided real-world examples that helped me understand complex concepts easily.
        </p>

        <div class="profile">
          <div class="avatar">
            <img src="images/pp3.jpeg" alt="Jane Doe">
          </div>
          <div class="who">
            <div class="name">Jane Doe</div>
            <div class="role">Data Scientist</div>
          </div>
        </div>
      </div>

      <div class="t-card">
        <div class="quote">“</div>
        <p class="t-text">
          I was amazed at how much I could learn in such a short time. The course made complicated topics easy to understand.
        </p>

        <div class="profile">
          <div class="avatar">
            <img src="images/pp4.jpeg" alt="Mike Smith">
          </div>
          <div class="who">
            <div class="name">Mike Smith</div>
            <div class="role">Marketing Specialist</div>
          </div>
        </div>
      </div>

      <div class="t-card">
        <div class="quote">“</div>
        <p class="t-text">
          This was the most engaging online course I've ever taken. The lessons were clear and the content was very relevant to my goals.
        </p>

        <div class="profile">
          <div class="avatar">
            <img src="images/pp1.jpeg" alt="Susan Lee">
          </div>
          <div class="who">
            <div class="name">Susan Lee</div>
            <div class="role">Product Manager</div>
          </div>
        </div>
      </div>
    </div>

</div>
<style>
  .navv-btn{
      width:34px;
      height:34px;
      border:1px solid var(--border);
      background:#fff;
      border-radius:2px;            /* square-ish like screenshot */
      display:grid;
      place-items:center;
      cursor:pointer;
      transition:transform .2s ease;
    }
    .navv-btn i{ font-size:16px; color:#4b5563; }
    .navv-btn:hover{ transform:translateY(-1px); }

  .cards {
    display: flex;
    gap: 24px;
    overflow-x: auto;      /* ✅ allow horizontal scroll */
    overflow-y: hidden;
    scroll-behavior: smooth;
}

/* hide scrollbar (clean UI) */
.cards::-webkit-scrollbar {
    display: none;
}
.cards {
    -ms-overflow-style: none;
    scrollbar-width: none;
}


/* Each card keeps its normal size */
.t-card {
    flex: 0 0 280px;   /* fixed width */
}


/* RESPONSIVE */
@media (max-width: 1024px) {
    .t-card {
        flex: 0 0 calc(50% - 12px); /* 2 per row */
    }
}

@media (max-width: 600px) {
    .t-card {
        flex: 0 0 100%; /* 1 per row */
    }
}

</style>
<script>
(() => {
    const container = document.querySelector('.cards');
    const btn = document.querySelector('.navv-btn');

    if (!container || !btn) return;

    btn.addEventListener('click', () => {
        const maxScroll =
            container.scrollWidth - container.clientWidth;

        // 🚫 If nothing hidden, do nothing
        if (maxScroll <= 0) return;

        const card = container.querySelector('.t-card');
        const gap = 24;
        const moveBy = card.offsetWidth + gap;

        // 👉 Move or loop
        if (container.scrollLeft + moveBy >= maxScroll) {
            container.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            container.scrollBy({ left: moveBy, behavior: 'smooth' });
        }
    });
})();
</script>
