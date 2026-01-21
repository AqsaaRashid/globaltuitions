@foreach($courses as $course)
<div class="course-card">
    
     <div class="course-image"
     style="background-image:url('{{ asset('storage/' . $course->image) }}')">
</div>

    <div class="course-content">
        <div>
            <h3>{{ $course->title }}</h3>
            <a href="{{ route('show', $course->id) }}"
               class="course-details-link" style="color: #636363;">
                View Course Details
            </a>
            <!-- <button class="enroll-btn" 
                    onclick="openEnrollModal('{{ $course->title }}')" style="margin-left:70px !important;">
                Enroll Now
            </button> -->

           

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