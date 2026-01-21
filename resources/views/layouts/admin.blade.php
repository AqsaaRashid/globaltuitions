<x-app-layout>
   
    <div class="bg-black min-h-screen">

        <!-- SIDEBAR (FIXED, NEVER SQUEEZES) -->
        <aside class="fixed top-0 left-0 w-64 h-screen
                      bg-black text-white
                      flex flex-col
                      border-r border-gray-800
                      z-40">

            <!-- Brand -->
            <div class="px-6 py-5 border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wide">
                    <span class="text-white">GLOBAL</span>
                    <span class="text-yellow-500">TUITIONS</span>
                </h1>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('dashboard')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black transition' }}">
                    Dashboard
                </a>
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Your Courses
                </div>

                <!-- Courses -->
                <a href="{{ route('admin.courses.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('admin.courses.*')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black transition' }}">
                    Manage Courses
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
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Training Section
                </div>

                <!-- Training Manager -->
                <a href="{{ route('training.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('training.index')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black transition' }}">
                    Training Moments
                </a>
                <!-- Divider -->
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Enrollments & Inquiries
                </div>

                <!-- Course Enrollments -->
                <a href="{{ route('admin.course-enrollments.index') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('admin.course-enrollments.*')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black transition' }}">
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
                © {{ date('Y') }} Global TUITIONS
            </div>
        </aside>

        <!-- MAIN CONTENT (SHIFTED RIGHT) -->
        <main class="ml-64 min-h-screen bg-black text-white">

            <!-- Header -->
            <div class="border-b border-gray-800 px-6 py-4 sticky top-0 bg-black z-30">
                <h2 class="text-xl font-semibold">
                    {{ $title ?? '' }}
                </h2>
            </div>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
                @stack('scripts')
            </div>

        </main>

    </div>
</x-app-layout>
