@extends('layouts.admin')

@section('content')

<div class="max-w-3xl">

    <!-- Page Title -->
    <h2 class="text-2xl font-semibold text-white mb-6">
        Edit Course
    </h2>

    <!-- Form Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6">

        <form id="courseForm"
              method="POST"
              enctype="multipart/form-data"
              action="{{ route('admin.courses.update', $course) }}"
              class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Course Title -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Title
                </label>
                <input
                    type="text"
                    name="title"
                    value="{{ $course->title }}"
                    required
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Course Description (Rich Text - Quill) -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Description
                </label>

                <div id="editor"
                     class="bg-white border border-gray-300 rounded-md"
                     style="height: 280px;"></div>

                <!-- Hidden field (HTML saved to DB) -->
                <input type="hidden" name="description" id="description">
            </div>

            <!-- Course Level -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Level
                </label>
                <select
                    name="level"
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="">Select Level</option>
                    <option value="Beginner" {{ $course->level === 'Beginner' ? 'selected' : '' }}>
                        Beginner
                    </option>
                    <option value="Intermediate" {{ $course->level === 'Intermediate' ? 'selected' : '' }}>
                        Intermediate
                    </option>
                    <option value="Advanced" {{ $course->level === 'Advanced' ? 'selected' : '' }}>
                        Advanced
                    </option>
                </select>
            </div>

            <!-- Duration -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Duration
                </label>
                <input
                    type="text"
                    name="duration"
                    value="{{ $course->duration }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Price ($)
                </label>
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    value="{{ $course->price }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Skills / Prerequisites -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    Skills / Prerequisites
                </label>

                <div class="flex gap-2">
                    <input
                        type="text"
                        id="skillInput"
                        placeholder="Type a skill and press Add"
                        class="flex-1 rounded-md border border-gray-300 px-4 py-2
                               focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <button
                        type="button"
                        onclick="addSkill()"
                        class="bg-black text-white px-4 py-2 rounded-md
                               hover:bg-yellow-500 hover:text-black transition">
                        Add
                    </button>
                </div>

                <div id="skillsContainer" class="flex flex-wrap gap-2 mt-3"></div>

                <input type="hidden" name="skills" id="skillsField">

                <div id="skillsData"
                     data-skills='@json($course->skills ? explode(",", $course->skills) : [])'>
                </div>
            </div>

            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Sort Order
                </label>
                <input
                    type="number"
                    name="sort_order"
                    value="{{ $course->sort_order }}"
                    required
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Current Image -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    Current Image
                </label>
                <div class="flex items-center gap-4">
                    <img
                        src="{{ asset('images/'.$course->image) }}"
                        class="w-28 rounded border">
                    <span class="text-sm text-gray-600">
                        Upload a new image to replace this
                    </span>
                </div>
            </div>

            <!-- Replace Image -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Replace Image
                </label>
                <input
                    type="file"
                    name="image"
                    class="w-full text-sm border border-gray-300 rounded-md
                           file:bg-black file:text-white
                           file:px-4 file:py-2 file:border-0
                           hover:file:bg-yellow-500 hover:file:text-black">
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="is_active"
                    {{ $course->is_active ? 'checked' : '' }}
                    class="h-4 w-4 text-yellow-500">
                <span class="text-sm font-medium">Active</span>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <button
                    type="submit"
                    class="bg-yellow-500 text-black font-semibold
                           px-6 py-2 rounded-md
                           hover:bg-yellow-400 transition">
                    Update Course
                </button>

                <a href="{{ route('admin.courses.index') }}"
                   class="text-sm text-gray-600 hover:text-black">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

<!-- Quill (FREE, NO API KEY) -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
    // Initialize Quill
    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write course description here...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ header: [1, 2, 3, false] }],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    // Load existing description
    quill.root.innerHTML = `{!! addslashes($course->description) !!}`;

    // Save HTML on submit
    document.getElementById('courseForm').addEventListener('submit', function () {
        document.getElementById('description').value = quill.root.innerHTML;
    });

    // Skills logic
    const skillsDataEl = document.getElementById('skillsData');
    let skills = [];

    try {
        skills = JSON.parse(skillsDataEl.dataset.skills || '[]');
    } catch (e) {
        skills = [];
    }

    function addSkill() {
        const input = document.getElementById('skillInput');
        const skill = input.value.trim();
        if (!skill) return;
        if (skills.some(s => s.toLowerCase() === skill.toLowerCase())) return;
        skills.push(skill);
        input.value = '';
        renderSkills();
    }

    function removeSkill(skill) {
        skills = skills.filter(s => s !== skill);
        renderSkills();
    }

    function renderSkills() {
        const container = document.getElementById('skillsContainer');
        const hiddenField = document.getElementById('skillsField');
        container.innerHTML = '';

        skills.forEach(skill => {
            const tag = document.createElement('div');
            tag.className =
                'flex items-center gap-2 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm';

            tag.innerHTML = `
                <span>${skill}</span>
                <button type="button"
                        onclick="removeSkill('${skill}')"
                        class="text-red-600 font-bold">×</button>
            `;
            container.appendChild(tag);
        });

        hiddenField.value = skills.join(',');
    }

    renderSkills();
</script>

@endsection
