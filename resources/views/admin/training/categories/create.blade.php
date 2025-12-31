@extends('layouts.admin')

@section('content')

<div class="max-w-3xl">

    <!-- Page Title -->
    <h2 class="text-2xl font-semibold text-white mb-6">
        Add Training Category
    </h2>

    <!-- Form Card -->
    <div class="bg-white text-black rounded-lg shadow-lg p-6">

        <form method="POST"
              action="{{ route('training.categories.store') }}"
              class="space-y-5">
            @csrf

            <!-- Category Name -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Category Name
                </label>
                <input
                    type="text"
                    name="name"
                    placeholder="Enter category name"
                    required
                    class="w-full rounded-md border border-gray-300 px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-yellow-500"
                >
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <button
                    type="submit"
                    class="bg-yellow-500 text-black font-semibold
                           px-6 py-2 rounded-md
                           hover:bg-yellow-400 transition">
                    Save Category
                </button>


                <a href="{{ route('training.categories.index') }}"
                   class="text-sm text-gray-600 hover:text-black">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
