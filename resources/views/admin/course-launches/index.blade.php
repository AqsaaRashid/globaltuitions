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

<div class="bg-white rounded-lg overflow-hidden shadow">

    <table class="w-full border-collapse">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-2 py-1 text-left text-sm font-semibold">
                    Course
                </th>
                <th class="px-2 py-1 text-left text-sm font-semibold">
                    Level
                </th>
                <th class="px-2 py-1 text-center text-sm font-semibold">
                    Launch Date
                </th>
                <th class="px-4 py-3 text-center text-sm font-semibold">
                    Action
                </th>
            </tr>
        </thead>

        <tbody class="divide-y">
        @forelse($launches as $launch)
            <tr class="hover:bg-gray-50 transition">

                <td class="px-2 py-1 font-medium text-black max-w-[420px] truncate">
    {{ $launch->course->title }}
</td>


                <td class="px-2 py-1 text-sm text-gray-700">
                    {{ ucfirst($launch->course->level) }}
                </td>

                <td class="px-2 py-1 text-center text-black">
                    {{ \Carbon\Carbon::parse($launch->launch_date)->format('d M Y') }}
                </td>
<td class="px-4 py-3 text-center w-[420px] min-w-[420px]">
<div class="flex items-center justify-center gap-3 text-sm flex-nowrap whitespace-nowrap">

        <!-- EDIT -->
        <a href="{{ route('admin.course-launches.edit', $launch) }}"
           class=" shrink-0 text-blue-600 hover:text-blue-800 font-semibold">
            Edit
        </a>

        <!-- ENROLLMENTS -->
        <a href="{{ route('admin.course-enrollments.byLaunch', $launch->id) }}"
           class=" shrink-0 flex items-center gap-2
                  bg-gray-100 text-gray-800
                  px-3 py-1.5 rounded-full
                  font-semibold
                  hover:bg-gray-200 transition">

            <span>Enrollments</span>

            <span class="min-w-[22px] h-[22px]
                         flex items-center justify-center
                         bg-black text-white
                         rounded-full text-[11px] font-bold">
                {{ $launch->enrollments_count ?? 0 }}
            </span>
        </a>

       

        <!-- DELETE -->
        <form method="POST"
              action="{{ route('admin.course-launches.destroy', $launch) }}"
              onsubmit="return confirm('Delete this launch date?')">
            @csrf
            @method('DELETE')

            <button class="text-red-600 hover:text-red-800 font-semibold">
                Delete
            </button>
        </form>
         <!-- INQUIRIES -->
        <a href="{{ route('admin.course-inquiries.byLaunch', $launch->id) }}"
           class=" shrink-0 flex items-center gap-2
                  bg-gray-100 text-gray-800
                  px-3 py-1.5 rounded-full
                  font-semibold
                  hover:bg-gray-200 transition">

            <span>Inquiries</span>

            <span class="min-w-[22px] h-[22px]
                         flex items-center justify-center
                         bg-yellow-500 text-black
                         rounded-full text-[11px] font-bold">
                {{ $launch->inquiries_count ?? 0 }}
            </span>
        </a>

    </div>
</td>


            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-600">
                    No launch dates added yet.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection
