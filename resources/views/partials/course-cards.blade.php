@foreach($courses as $title => $courseLevels)
    @php $defaultCourse = $courseLevels->first(); @endphp

    <div class="course-card">
        <div class="course-image"style="background-image:url('{{ asset('images/'.$defaultCourse->image) }}')">
        </div>

        <div class="course-content">
            <div>
                <h3>{{ $title }}</h3>

                <a href="{{ route('show', $defaultCourse->id) }}"
                   class="course-details-link"
                   style="color:#636363">
                    View Course Details
                </a>

                <button class="enroll-btn"
                        style="margin-left:6px"
                        onclick="openEnrollModal('{{ $title }}')">
                    Enroll Now
                </button>

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
<style>
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