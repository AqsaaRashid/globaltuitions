@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-white">
        Training Categories
    </h2>

    <a href="{{ route('training.categories.create') }}"
       class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2 rounded-md font-semibold">
        Add Category
    </a>
</div>

@if(session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:10px;margin-bottom:10px;border-radius:4px">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">

<table class="min-w-full border-collapse">
    <thead class="bg-black text-white">
        <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold">Name</th>
            <th class="px-4 py-3 text-left text-sm font-semibold">Slug</th>
            <th class="px-4 py-3 text-right text-sm font-semibold">Action</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
        @forelse($categories as $category)
        <tr class="hover:bg-gray-50 transition">

            <td class="px-4 py-3 font-medium">
                {{ $category->name }}
            </td>

            <td class="px-4 py-3 text-gray-600">
                {{ $category->slug }}
            </td>

            <td class="px-4 py-3 text-right space-x-3">
                <a href="{{ route('training.categories.edit', $category) }}"
                   class="text-blue-600 hover:underline text-sm">
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('training.categories.destroy', $category) }}"
                      class="inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-600 hover:underline text-sm"
                            onclick="return confirm('Delete this category?')">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                No categories found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>

@endsection
