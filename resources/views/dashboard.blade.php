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
                    <span class="text-white">BTMG</span>
                    <span class="text-yellow-500">Trainings</span>
                </h1>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-md
                          bg-yellow-500 text-black font-semibold">
                    Dashboard
                </a>

                <a href="{{ route('admin.courses.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                          text-white hover:bg-white hover:text-black transition">
                    Manage Courses
                </a>

                <!-- Divider -->
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Training Section
                </div>

                <a href="{{ route('training.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('training.index')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black' }}">
                    Training Moments
                </a>

                <a href="{{ route('admin.course-enrollments.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('admin.course-enrollments.*')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black' }}">
                    Course Enrollments
                </a>
                <a href="{{ route('admin.course-inquiries.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.course-inquiries.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Course Inquiries
</a>
                <!-- Contact Leads -->
<a href="{{ route('admin.contacts.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.contacts.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Contact Leads
</a>



            </nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-800 text-sm text-gray-500">
                © {{ date('Y') }} BTMG TRAININGS
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

</div>
<!-- end kpi -->

            </div>

        </main>

    </div>
</x-app-layout>
