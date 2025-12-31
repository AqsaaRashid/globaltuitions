@extends('layouts.admin')

@section('content')

<div class="max-w-3xl">

    <!-- Page Title -->
    <h2 class="text-2xl font-semibold text-white mb-6">
        Add New Course
    </h2>

    <!-- Form Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6">

        <form id="courseForm"
              method="POST"
              enctype="multipart/form-data"
              action="{{ route('admin.courses.store') }}"
              class="space-y-5">
            @csrf

            <!-- Course Title -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Title
                </label>
                <input
                    type="text"
                    name="title"
                    required
                    placeholder="Enter course title"
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Course Category -->
<div>
    <label class="block text-sm font-medium mb-1">
        Course Category
    </label>

    <select
        name="training_category_id"
        required
        class="w-full rounded-md border border-gray-300 px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-yellow-500">

        <option value="">Select Category</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>


            <!-- Course Description (Rich Text - Quill) -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Description
                </label>

                <div id="editor"
                     class="bg-white border border-gray-300 rounded-md"
                     style="height: 280px;"></div>

                <!-- Hidden input (HTML saved to DB) -->
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
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
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
                    placeholder="e.g. 6 Weeks / 20 Hours"
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
                    placeholder="e.g. 199.99"
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
            </div>

            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Sort Order
                </label>
                <input
                    type="number"
                    name="sort_order"
                    required
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Course Image
                </label>
                <input
                    type="file"
                    name="image"
                    required
                    class="w-full text-sm border border-gray-300 rounded-md
                           file:bg-black file:text-white
                           file:px-4 file:py-2 file:border-0
                           hover:file:bg-yellow-500 hover:file:text-black">
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" checked
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
                    Save Course
                </button>

                <a href="{{ route('admin.courses.index') }}"
                   class="text-sm text-gray-600 hover:text-black">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

<!-- Quill (FREE, NO API) -->
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

    // Save HTML on submit
    document.getElementById('courseForm').addEventListener('submit', function () {
        document.getElementById('description').value = quill.root.innerHTML;
    });

    // Skills logic
    let skills = [];

    function addSkill() {
        const input = document.getElementById('skillInput');
        const skill = input.value.trim();
        if (!skill || skills.includes(skill)) return;
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
</script>

@endsection
