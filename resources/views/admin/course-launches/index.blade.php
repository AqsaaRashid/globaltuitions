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
                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Course
                </th>
                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Level
                </th>
                <th class="px-4 py-3 text-center text-sm font-semibold">
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

                <td class="px-4 py-3 font-medium text-black">
                    {{ $launch->course->title }}
                </td>

                <td class="px-4 py-3 text-sm text-gray-700">
                    {{ ucfirst($launch->course->level) }}
                </td>

                <td class="px-4 py-3 text-center text-black">
                    {{ \Carbon\Carbon::parse($launch->launch_date)->format('d M Y') }}
                </td>

                <td class="px-4 py-3 text-center flex justify-center gap-4">
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
