@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-white">
        Contact Submissions
    </h2>
</div>

<div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">

    <table class="min-w-full border-collapse">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">Name</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Email</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Phone</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Message</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Date</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 transition">

                    {{-- Name --}}
                    <td class="px-4 py-3 font-medium">
                        {{ $contact->name }}
                    </td>

                    {{-- Email --}}
                    <td class="px-4 py-3">
                        {{ $contact->email }}
                    </td>

                    {{-- Phone --}}
                    <td class="px-4 py-3">
                        {{ $contact->phone }}
                    </td>

                    {{-- Message --}}
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ \Illuminate\Support\Str::limit($contact->message, 60) }}
                    </td>

                    {{-- Date --}}
                    <td class="px-4 py-3 text-center text-sm">
                        {{ $contact->created_at->format('d M Y') }}
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                        No contact submissions found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

{{-- Pagination --}}
<div class="mt-4">
    {{ $contacts->links() }}
</div>

@endsection
