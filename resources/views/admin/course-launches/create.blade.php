{{-- resources/views/admin/course-launches/create.blade.php --}}

@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-semibold text-white mb-6">Add Course Launch Date</h2>

<form method="POST" action="{{ route('admin.course-launches.store') }}"
      class="bg-white p-6 rounded-lg space-y-4 max-w-xl">

    @csrf

    <div>
        <label class="block text-sm font-semibold" style="color:#000;">Course</label>
        <select name="course_id" class="w-full border rounded px-3 py-2" style="color:#000;">
            <option value="" style="color:#000;">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" style="color:#000;">
    {{ $course->title }} ({{ ucfirst($course->level) }})
</option>

            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-semibold"style="color:#000;">Launch Date</label>
        <input type="date" name="launch_date"
               class="w-full border rounded px-3 py-2" style="color:#000;">
    </div>

    <button class="bg-yellow-500 px-6 py-2 rounded font-semibold">
        Save
    </button>

</form>

@endsection
