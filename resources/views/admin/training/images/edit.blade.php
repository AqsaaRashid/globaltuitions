@extends('layouts.admin')

@section('content')

<div class="max-w-3xl">

    <!-- Page Title -->
    <h2 class="text-2xl font-semibold text-white mb-6">
        Edit Training Image
    </h2>

    <!-- Form Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6">

        <form method="POST"
              enctype="multipart/form-data"
              action="{{ route('training.images.update', $image) }}"
              class="space-y-5">
            @csrf
            @method('PUT')

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
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $image->training_category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Current Image -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    Current Image
                </label>
                <img
                    src="{{ asset('images/' . $image->image) }}"
                    class="w-32 h-auto rounded-md border"
                    alt="Training Image"
                >
            </div>

            <!-- Change Image -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Change Image (optional)
                </label>
                <input
                    type="file"
                    name="image"
                    accept="image/png,image/jpeg"
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
                    Update Image
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
