{{-- resources/views/admin/course-launches/index.blade.php --}}

@extends('layouts.admin')

@section('content')

<div class="flex justify-between mb-6">
    <h2 class="text-2xl font-semibold text-white">Course Launch Dates</h2>
    <a href="{{ route('admin.course-launches.create') }}"
       class="bg-yellow-500 px-4 py-2 rounded font-semibold">
        + Add
    </a>
</div>

<div class="bg-white rounded-lg overflow-hidden">

    @forelse($launches->groupBy('course_id') as $courseLaunches)

        @php $course = $courseLaunches->first()->course; @endphp

        <div class="border-b">
            <!-- Course Header -->
            <div class="bg-gray-100 px-4 py-3 font-semibold text-black">
                {{ $course->title }}
                <span class="text-sm text-gray-600">
                    ({{ ucfirst($course->level) }})
                </span>
            </div>

            <!-- Launch Dates -->
            <table class="w-full">
                <tbody>
                @foreach($courseLaunches as $launch)
                    <tr class="border-t">
                        <td class="p-3 text-center text-black">
                            {{ \Carbon\Carbon::parse($launch->launch_date)->format('d M Y') }}
                        </td>

                        <td class="p-3 text-center flex justify-center gap-4">
                            <a href="{{ route('admin.course-launches.edit', $launch) }}"
                               class="text-blue-600 font-semibold">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.course-launches.destroy', $launch) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 font-semibold"
                                        onclick="return confirm('Delete this launch date?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @empty
        <div class="p-6 text-center text-gray-600">
            No launch dates added yet.
        </div>
    @endforelse

</div>

@endsection
