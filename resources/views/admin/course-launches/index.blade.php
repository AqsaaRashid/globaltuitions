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
    <table class="w-full">
        <thead class="bg-black text-white">
            <tr>
                <th class="p-3 text-left">Course</th>
                <th class="p-3">Launch Date</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($launches as $launch)
            <tr class="border-t">
                <td class="p-3"style="color:#000;">{{ $launch->course->title }}</td>
                <td class="p-3 text-center"style="color:#000;" >{{ $launch->launch_date }}</td>
                <td class="p-3 text-center flex justify-center gap-3">

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

@endsection
