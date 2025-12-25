@extends('layouts.admin')

@section('content')

<div class="max-w-3xl">

    <!-- Page Title -->
    <h2 class="text-2xl font-semibold text-white mb-6">
        Add Training Image
    </h2>

    <!-- Form Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6">

        <form method="POST"
              enctype="multipart/form-data"
              action="{{ route('training.images.store') }}"
              class="space-y-5">
            @csrf

            <!-- Category -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Training Category
                </label>
                <select
                    name="category_id"
                    required
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Training Image
                </label>
                <input
                    type="file"
                    name="image"
                    accept="image/png,image/jpeg"
                    required
                    class="w-full text-sm border border-gray-300 rounded-md
                           file:bg-black file:text-white
                           file:px-4 file:py-2 file:border-0
                           hover:file:bg-yellow-500 hover:file:text-black"
                >
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <button
                    type="submit"
                    class="bg-yellow-500 text-black font-semibold
                           px-6 py-2 rounded-md
                           hover:bg-yellow-400 transition">
                    Upload Image
                </button>

                <a href="{{ route('training.index') }}"
                   class="text-sm text-gray-600 hover:text-black">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
