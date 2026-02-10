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
     data-level="{{ strtolower($course->level) }}"
     data-category="{{ $course->training_category_id }}"
     data-free="{{ $course->price == 0 ? 'yes' : 'no' }}"
     data-launch="{{ $launchDate }}">

    {{-- IMAGE (same as courses section) --}}
    <div class="course-image"
         style="background-image:url('{{ asset('storage/' . $course->image) }}')">
    </div>

    <div class="course-content">
        <h4>{{ $course->title }}</h4>

        <p>
            {!! Str::limit(strip_tags($course->description), 160) !!}
        </p>

        <p class="level-text">
            <strong>{{ ucfirst($course->level) }}</strong>
        </p>

        <p class="course-info">
            Duration: {{ $course->duration ?? 'N/A' }}
            |
            Charges:
            @if($course->price == 0)
                Free
            @else
                £{{ number_format($course->price, 2) }}
            @endif
        </p>

        <p class="course-info">Mode: Online / Virtual</p>

        <div class="course-actions">
            <a href="{{ route('show', $course->id) }}"
               class="btn-primary btn-details"
               style="text-decoration:none;">
                Details
            </a>

            <button class="btn-outline btn-inquiry"
                onclick="openInquiryModal(
                    '{{ $course->title }}',
                    {{ $course->id }},
                    '{{ $course->level ?? '' }}',
                    '{{ $course->duration ?? '' }}'
                )">
                Inquiry
            </button>
        </div>
    </div>
</div>
@endforeach


<style>
    /* CARD STRUCTURE FIX */
.course-card {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* CONTENT SHOULD GROW */
.course-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

/* DESCRIPTION FLEX FIX */
.course-content p {
    margin-bottom: 10px;
}

/* PUSH BUTTONS TO BOTTOM */
.course-actions {
    margin-top: auto;
    display: flex;
    gap: 12px;
}

/* BUTTON CONSISTENCY */
.course-actions a,
.course-actions button {
    min-width: 110px;
    text-align: center;
}

/* MOBILE STACK (optional but clean) */
@media (max-width: 640px) {
    .course-actions {
        flex-direction: column;
    }

    .course-actions a,
    .course-actions button {
        width: 100%;
    }
}

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

</style>