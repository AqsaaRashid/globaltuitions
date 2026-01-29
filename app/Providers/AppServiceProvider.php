<?php

namespace App\Providers;
use App\Models\CourseLaunch;
use App\Observers\CourseLaunchObserver;

use Illuminate\Support\ServiceProvider;
use App\Models\CourseEnrollment;
use App\Models\Contact;
use App\Models\CourseInquiry;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
   View::composer('*', function ($view) {
    CourseLaunch::observe(CourseLaunchObserver::class);
    $view->with([
        
        'pendingEnrollmentsCount' => \App\Models\CourseEnrollment::where('status', 'pending')->count(),
        'pendingContactsCount'    => \App\Models\Contact::where('reply_status', 'pending')->count(),
        'pendingInquiriesCount'   => \App\Models\CourseInquiry::where('reply_status', 'pending')->count(),
    ]);
});

}
}
