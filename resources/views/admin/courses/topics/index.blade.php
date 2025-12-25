@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-white">
            Manage Topics
            <span class="block text-sm font-normal text-gray-300">
                {{ $course->title }}
            </span>
        </h2>

        <a href="{{ route('admin.courses.index') }}"
           class="text-sm text-gray-300 hover:text-white">
            ← Back to Courses
        </a>
    </div>

    <!-- Add Topic Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6 mb-8">
        <h3 class="text-lg font-semibold mb-4">
            Add New Topic
        </h3>

        <form id="topicForm"
      method="POST"
      action="{{ route('admin.courses.topics.store', $course) }}"
      class="grid grid-cols-1 gap-5">

            @csrf

            <!-- Topic Title -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Topic Title
                </label>
                <input
                    name="title"
                    required
                    placeholder="e.g. Introduction to Basics"
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <!-- Topic Description (Quill) -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Description
                </label>

                <div id="topicEditor"
                     class="bg-white border border-gray-300 rounded-md"
                     style="height: 200px;"></div>

                <!-- Hidden input -->
                <input type="hidden" name="description" id="topicDescription">
            </div>

            <!-- Sort + Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Sort Order
                    </label>
                    <input
                        type="number"
                        name="sort_order"
                        value="1"
                        required
                        class="w-full rounded-md border border-gray-300 px-4 py-2
                               focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div class="flex items-center gap-2 mt-6">
                    <input
                        type="checkbox"
                        name="is_active"
                        checked
                        class="h-4 w-4 text-yellow-500 focus:ring-yellow-500">
                    <span class="text-sm font-medium">
                        Active
                    </span>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-2">
                <button
                    class="bg-yellow-500 text-black font-semibold
                           px-6 py-2 rounded-md
                           hover:bg-yellow-400 transition">
                    Add Topic
                </button>
            </div>
        </form>
    </div>

    <!-- Topics Table -->
    <div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">
                        Title
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">
                        Description
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">
                        Sort
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">
                        Status
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($topics as $topic)
                    <tr class="hover:bg-gray-50 transition">

                        <!-- Title -->
                        <td class="px-4 py-3 font-medium">
                            {{ $topic->title }}
                        </td>

                        <!-- Description Preview -->
                        <td class="px-4 py-3 text-sm text-gray-600">
    @php
        $plain = trim(strip_tags($topic->description));
    @endphp

    @if($plain !== '')
        {{ \Illuminate\Support\Str::limit($plain, 120) }}
    @else
        <span class="italic text-gray-400">
            No description
        </span>
    @endif
</td>


                        <!-- Sort -->
                        <td class="px-4 py-3 text-center">
                            {{ $topic->sort_order }}
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-3 text-center">
                            @if($topic->is_active)
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

                        <!-- Actions -->
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-3">

                                <a href="{{ route('admin.topics.edit', $topic) }}"
                                   class="text-sm text-blue-600 hover:underline">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.topics.destroy', $topic) }}"
                                      onsubmit="return confirm('Delete this topic?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-sm text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            class="px-4 py-6 text-center text-gray-500">
                            No topics added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- ===================== -->
<!-- Quill (FREE, NO API) -->
<!-- ===================== -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
    const quill = new Quill('#topicEditor', {
        theme: 'snow',
        placeholder: 'Write topic description here...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

   document.getElementById('topicForm').addEventListener('submit', function () {
    let html = quill.root.innerHTML;

    // real empty check
    if (html === '<p><br></p>' || html.trim() === '') {
        html = '';
    }

    document.getElementById('topicDescription').value = html;
});

</script>


@endsection
