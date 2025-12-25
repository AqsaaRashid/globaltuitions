@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-white">
        Courses
    </h2>

    <a href="{{ route('admin.courses.create') }}"
       class="bg-yellow-500 text-black font-semibold
              px-4 py-2 rounded-md
              hover:bg-yellow-400 transition">
        + Add Course
    </a>
</div>

<div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">

    <table class="min-w-full border-collapse">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">Image</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Course</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Level</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Duration</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Price</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Sort</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Status</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($courses as $course)
                <tr class="hover:bg-gray-50 transition">

                    {{-- Image --}}
                    <td class="px-4 py-3">
                        <img
                            src="{{ asset('images/'.$course->image) }}"
                            alt="Course Image"
                            class="w-16 h-auto rounded border"
                        >
                    </td>

                    {{-- Title + Skills --}}
                    <td class="px-4 py-3 font-medium">
                        {{ $course->title }}

                        @if($course->skills)
                            <div class="text-xs text-gray-500 mt-1">
                                Skills: {{ \Illuminate\Support\Str::limit($course->skills, 40) }}
                            </div>
                        @endif
                    </td>

                    {{-- Level --}}
                    <td class="px-4 py-3">
                        {{ $course->level ?? '-' }}
                    </td>

                    {{-- Duration --}}
                    <td class="px-4 py-3">
                        {{ $course->duration ?? '-' }}
                    </td>

                    {{-- Price --}}
                    <td class="px-4 py-3">
                        {{ $course->price ? '$'.number_format($course->price, 2) : '-' }}
                    </td>

                    {{-- Sort --}}
                    <td class="px-4 py-3 text-center">
                        {{ $course->sort_order }}
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-3 text-center">
                        @if($course->is_active)
                            <span class="px-3 py-1 text-xs font-semibold
                                         bg-green-100 text-green-700 rounded-full">
                                Active
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold
                                         bg-red-100 text-red-700 rounded-full">
                                Inactive
                            </span>
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-3 text-center">
    <div class="flex items-center justify-center gap-2 flex-wrap">

        <!-- Edit -->
        <a href="{{ route('admin.courses.edit', $course) }}"
           class="px-3 py-1 text-xs font-semibold
                  bg-blue-100 text-blue-700
                  rounded-full hover:bg-blue-200 transition">
            Edit
        </a>

        <!-- Topics -->
        <a href="{{ route('admin.courses.topics', $course) }}"
           class="px-3 py-1 text-xs font-semibold
                  bg-purple-100 text-purple-700
                  rounded-full hover:bg-purple-200 transition">
            Topics
        </a>

        <!-- Delete -->
        <form action="{{ route('admin.courses.destroy', $course) }}"
              method="POST"
              onsubmit="return confirm('Delete this course?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="px-3 py-1 text-xs font-semibold
                           bg-red-100 text-red-700
                           rounded-full hover:bg-red-200 transition">
                Delete
            </button>
        </form>

    </div>
</td>


                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                        No courses found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
