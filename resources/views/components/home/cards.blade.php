<section class="steps-wrapper"style="overflow-x:hidden !important;">
    <div class="steps-container">

        {{-- Step 1 --}}
        <div class="step-card">
            <div class="step-icon">
                <i class="bi bi-check2" ></i>
            </div>
            <p class="step-text">Select a Course</p>
        </div>

        {{-- Step 2 --}}
        <div class="step-card">
            <div class="step-icon">
                <i class="bi bi-star-fill"></i>
            </div>
            <p class="step-text">Gain in Demand Skills</p>
        </div>

        {{-- Step 3 --}}
        <div class="step-card">
            <div class="step-icon">
                <i class="bi bi-award-fill"></i>
            </div>
            <p class="step-text">Earn a Certificate</p>
        </div>

    </div>
</section>
<style>
    /* ===============================
   RESPONSIVE – STEPS SECTION
   =============================== */

/* LARGE TABLET */
@media (max-width: 1024px) {
    .steps-wrapper {
        padding-top: 200px !important;
        margin-top: 200px !important;
    }

    .steps-container {
        gap: 20px;
    }

    .step-card {
        padding: 16px 22px;
        min-width: 190px;
    }

    .step-text {
        font-size: 14px;
    }
}

/* TABLET */
@media (max-width: 768px) {
    .steps-wrapper {
        padding-top: 140px !important;
        padding-left: 16px;
        padding-right: 16px;
    }

    .steps-container {
        flex-wrap: wrap;
        gap: 18px;
    }

    .step-card {
        min-width: 220px;
        justify-content: center;
    }
}

/* MOBILE */
@media (max-width: 640px) {
    .steps-wrapper {
        padding-top: 100px !important;
    }

    .steps-container {
        flex-direction: column;
        align-items: stretch;
        gap: 14px;
    }

    .step-card {
        width: 100%;
        min-width: unset;
        justify-content: flex-start;
        padding: 16px 18px;
    }

    .step-icon {
        width: 36px;
        height: 36px;
    }

    .step-icon i {
        font-size: 16px;
    }

    .step-text {
        font-size: 14px;
    }
}

/* VERY SMALL PHONES */
@media (max-width: 420px) {
    .steps-wrapper {
        padding-top: 80px !important;
    }

    .step-text {
        font-size: 13px;
    }
}

</style>
