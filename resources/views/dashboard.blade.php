<x-app-layout>
   

    <div class="bg-black min-h-screen">

        <!-- SIDEBAR (FIXED, NEVER SQUEEZES) -->
        <aside class="fixed top-0 left-0 w-64 h-screen
                      bg-black text-white
                      border-r border-gray-800
                      flex flex-col z-40">

            <!-- Brand -->
            <div class="px-6 py-5 border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wide">
                    <span class="text-white">GLOBAL</span>
                    <span class="text-yellow-500">TUITIONS</span>
                </h1>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-md
                          bg-yellow-500 text-black font-semibold">
                    Dashboard
                </a>
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Your Courses
                </div>


                <a href="{{ route('admin.courses.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                          text-white hover:bg-white hover:text-black transition">
                    Manage Courses
                </a>
                <a href="{{ route('admin.courses.popular') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.courses.popular')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Popular Courses
</a>
                <a href="{{ route('admin.course-launches.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.course-launches.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
     Launch Free Courses
</a>

                <a href="{{ route('training.categories.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('training.categories.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Categories
</a>


                <!-- Divider -->
                <!-- <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Training Section
                </div>

                <a href="{{ route('training.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('training.index')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black' }}">
                    Training Moments
                </a> -->
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Enrollments & Inquiries
                </div>


                <a href="{{ route('admin.course-enrollments.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('admin.course-enrollments.*')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black' }}">
                    Course Enrollments
                    @if($pendingEnrollmentsCount > 0)
        <span class="ml-auto bg-yellow-500 text-black text-xs font-bold
                     rounded-full px-2 py-0.5">
            {{ $pendingEnrollmentsCount }}
        </span>
    @endif
                </a>

 <a href="{{ route('admin.course-inquiries.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.course-inquiries.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Course Inquiries
     @if($pendingInquiriesCount > 0)
        <span class="ml-auto bg-yellow-500 text-black text-xs font-bold
                     rounded-full px-2 py-0.5">
            {{ $pendingInquiriesCount }}
        </span>
    @endif
</a>






               
<div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Contact Us
                </div>

                <!-- Contact Leads -->
<a href="{{ route('admin.contacts.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.contacts.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Contact Leads
     @if($pendingContactsCount > 0)
        <span class="ml-auto bg-yellow-500 text-black text-xs font-bold
                     rounded-full px-2 py-0.5">
            {{ $pendingContactsCount }}
        </span>
    @endif
</a>
<div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
    Newsletter
</div>

<a href="{{ route('admin.subscribers.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.subscribers.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Subscribers
</a>



            </nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-800 text-sm text-gray-500">
                © {{ date('Y') }}  Imperial Tuitions
            </div>
        </aside>

        <!-- MAIN CONTENT (SHIFTED RIGHT, SCROLLABLE) -->
        <main class="ml-64 min-h-screen bg-black text-white">

            <!-- Header -->
            <div class="border-b border-gray-800 px-6 py-4 sticky top-0 bg-black z-30">
                <h2 class="text-xl font-semibold text-white">
                    Dashboard
                </h2>
            </div>

            <!-- Page Content -->
            <div class="p-6 space-y-6">

                <!-- KPI GRID -->
                <!-- KPI GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Total Enrollments -->
    <div class="bg-black border border-gray-800 rounded-lg p-6
                hover:border-yellow-500 transition">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 uppercase tracking-wide">
                    Total Enrollments
                </p>

                <h3 class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $totalEnrollments }}
                </h3>
            </div>

            <div class="w-12 h-12 rounded-full bg-yellow-500
                        flex items-center justify-center
                        text-black font-bold text-lg shadow">
                📋
            </div>
        </div>

        <p class="text-xs text-gray-500 mt-4">
            Total course enrollment submissions
        </p>
    </div>

    <!-- Total Active Courses -->
    <div class="bg-black border border-gray-800 rounded-lg p-6
                hover:border-yellow-500 transition">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 uppercase tracking-wide">
                    Active Courses
                </p>

                <h3 class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $totalActiveCourses }}
                </h3>
            </div>

            <div class="w-12 h-12 rounded-full bg-yellow-500
                        flex items-center justify-center
                        text-black font-bold text-lg shadow">
                🎓
            </div>
        </div>

        <p class="text-xs text-gray-500 mt-4">
            Currently published courses
        </p>
    </div>
    <!-- Inquiries Summary -->
<div class="bg-black border border-gray-800 rounded-lg p-6
            hover:border-yellow-500 transition">

    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-gray-400 uppercase tracking-wide">
            Inquiries
        </p>

        <div class="w-10 h-10 rounded-full bg-yellow-500
                    flex items-center justify-center
                    text-black font-bold shadow">
            ❓
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">

        <!-- Course Inquiries -->
        <div class="text-center">
            <p class="text-xs text-gray-400 uppercase tracking-wide">
                Course Inquiries
            </p>

            <h3 class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $pendingInquiriesCount }}
            </h3>
        </div>

        <!-- General Inquiries -->
        <div class="text-center border-l border-gray-800">
            <p class="text-xs text-gray-400 uppercase tracking-wide">
                General Inquiries
            </p>

            <h3 class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $pendingContactsCount }}
            </h3>
        </div>

    </div>
</div>


</div>
<!-- end kpi -->
 <!-- Recent Activities -->
<div class="bg-black border border-gray-800 rounded-lg p-6
            hover:border-yellow-500 transition">

    <h3 class="text-lg font-semibold text-white mb-4">
        Recent Activities
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400 border-b border-gray-800">
                    <th class="text-left py-3">Activity</th>
                    <th class="text-left py-3">Date</th>
                    <th class="text-left py-3">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-800">
                @forelse($recentActivities as $activity)
                    <tr class="hover:bg-gray-900 transition">
                        <td class="py-3 text-white">
                            {{ $activity['activity'] }}
                        </td>

                        <td class="py-3 text-gray-400">
                            {{ $activity['date']->format('M d, Y') }}
                        </td>

                        <td class="py-3">
                            @if($activity['status_color'] === 'green')
                                <span class="text-green-400 font-semibold">
                                    {{ $activity['status'] }}
                                </span>
                            @else
                                <span class="text-yellow-400 font-semibold">
                                    {{ $activity['status'] }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-6 text-center text-gray-500">
                            No recent activity found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


            </div>

        </main>

    </div>
</x-app-layout>
