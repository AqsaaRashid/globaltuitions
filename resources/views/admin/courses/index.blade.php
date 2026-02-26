@extends('layouts.admin')

@section('content')
<div id="toast-container" class="fixed top-6 right-6 z-50 space-y-3"></div>

<style>
@keyframes progress { from { width:100%; } to { width:0%; } }
.animate-progress { animation: progress 3s linear forwards; }
</style>

<script>
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const colors = {
        success: 'border-yellow-500 bg-gray-900 text-white',
        error: 'border-red-500 bg-gray-900 text-white'
    };

    const toast = document.createElement('div');
    toast.className = `
        ${colors[type]}
        border rounded-xl shadow-2xl w-96
        transform transition-all duration-500
        translate-x-full opacity-0
    `;

    toast.innerHTML = `
        <div class="flex items-start p-5 gap-4">
            <div class="rounded-full w-10 h-10 flex items-center justify-center font-bold
                ${type === 'success' ? 'bg-yellow-500 text-black' : 'bg-red-500 text-white'}">
                ${type === 'success' ? '✓' : '!'}
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-sm ${type === 'success' ? 'text-yellow-400' : 'text-red-400'}">
                    ${type === 'success' ? 'Success' : 'Error'}
                </h4>
                <p class="text-sm text-gray-300 mt-1">${message}</p>
            </div>
            <button onclick="this.closest('div[role=toast]').remove()"
                class="text-gray-400 hover:text-white text-lg leading-none">×</button>
        </div>
        <div class="h-1 ${type === 'success' ? 'bg-yellow-500' : 'bg-red-500'} animate-progress"></div>
    `;

    toast.setAttribute('role','toast');
    container.appendChild(toast);

    setTimeout(() => toast.classList.remove('translate-x-full','opacity-0'), 50);

    setTimeout(() => {
        toast.classList.add('translate-x-full','opacity-0');
        setTimeout(() => toast.remove(), 400);
    }, 3000);
}
</script>
@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    showToast(@json(session('success')), 'success');
});
</script>
@endif
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

<form id="popularForm" method="POST" action="{{ route('courses.makePopular') }}">    @csrf
   <button type="submit"
    class="bg-yellow-500 text-black font-semibold
           px-4 py-2 rounded-md
           hover:bg-yellow-400 transition flex items-center gap-2">
    ⭐ Make Popular
</button>
<div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">

    <table class="min-w-full border-collapse">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">Image</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Course</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Level</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">
    Category
</th>

                <th class="px-4 py-3 text-left text-sm font-semibold">Duration</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Price</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Sort</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Status</th>
                       <th class="px-4 py-3 text-center text-sm font-semibold">
    Select
</th>
        
                <th class="px-4 py-3 text-center text-sm font-semibold">Actions</th>
             </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($courses as $course)
                <tr class="hover:bg-gray-50 transition">

                    {{-- Image --}}
                    <td class="px-4 py-3">
                       
                        <img
    src="{{ asset('images/' . $course->image) }}"
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
                    {{-- Category --}}
<td class="px-4 py-3">
    {{ $course->category?->name ?? 'Uncategorized' }}
</td>


                    {{-- Duration --}}
                    <td class="px-4 py-3">
    @if($course->duration)
        {{ $course->duration }}
    @elseif(isset($course->duration_value, $course->duration_unit))
        {{ $course->duration_value }} {{ ucfirst($course->duration_unit) }}
    @else
        -
    @endif
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
<td class="px-4 py-3 text-center">
    <input type="checkbox"
           name="selected_courses[]"
           value="{{ $course->id }}"
           class="course-checkbox">
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
        <button type="button"
    onclick="if(confirm('Delete this course?')) document.getElementById('del-{{ $course->id }}').submit();"
    class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition">
    Delete
</button>

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
</form>
</div>
@foreach($courses as $course)
<form id="del-{{ $course->id }}"
      action="{{ route('admin.courses.destroy', $course) }}"
      method="POST"
      class="hidden">
    @csrf
    @method('DELETE')
</form>
@endforeach

<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById('popularForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {

        const checkboxes = document.querySelectorAll('.course-checkbox:checked');

        if (checkboxes.length === 0) {
            e.preventDefault();
            showToast('Please select at least one course first.', 'error');
        }

    });

});
</script>
@endsection
