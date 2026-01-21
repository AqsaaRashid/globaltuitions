@extends('layouts.admin')

@section('content')

<!-- Header -->
<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-white">
        Your Gallery
    </h2>

    <div class="flex gap-3">
        <a href="{{ route('training.categories.create') }}"
           class="bg-yellow-500 text-black font-semibold
                  px-4 py-2 rounded-md
                  hover:bg-yellow-400 transition">
            + Add Category
        </a>

        <a href="{{ route('training.images.create') }}"
           class="bg-white text-black font-semibold
                  px-4 py-2 rounded-md
                  hover:bg-gray-100 transition">
            + Add Image
        </a>
    </div>
</div>

<!-- Card -->
<div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">

    <table class="min-w-full border-collapse">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Category
                </th>
                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Images
                </th>
                <th class="px-4 py-3 text-center text-sm font-semibold">
                    Actions
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

        @forelse($categories as $category)
            <tr class="hover:bg-gray-50 transition align-top">

                <!-- Category -->
                <td class="px-4 py-4 font-semibold w-1/4">
                    {{ $category->name }}
                </td>

                <!-- Images -->
                <td class="px-4 py-4">
                    @if($category->images->count())
                        <div class="flex flex-wrap gap-3">
                            @foreach($category->images as $img)
                                <div class="relative group">
                                    <img
                                        src="{{ asset('storage/' . $img->image) }}"
                                        class="w-20 h-16 object-cover rounded border"
                                        alt="Training Image"
                                    >

                                    <!-- Image Actions -->
                                    <div class="absolute inset-0 bg-black/60
                                                opacity-0 group-hover:opacity-100
                                                flex items-center justify-center gap-3
                                                transition">

                                        <a href="{{ route('training.images.edit', $img) }}"
                                           class="text-white text-xs underline">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('training.images.destroy', $img) }}"
                                              onsubmit="return confirm('Delete this image?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-red-400 text-xs underline">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span class="text-sm text-gray-500">
                            No images added
                        </span>
                    @endif
                </td>

                <!-- Actions -->
                <td class="px-4 py-4 text-center">
                    <a href="{{ route('training.categories.edit', $category) }}"
                       class="text-sm text-blue-600 hover:underline">
                        Edit Category
                    </a>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="3"
                    class="px-4 py-6 text-center text-gray-500">
                    No training categories found.
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>

</div>

@endsection
