<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Models\Extracurricular;
use App\Models\LessonHour;
use App\Models\School;
use App\Observers\ClassroomObserver;
use App\Observers\ExtracurricularObserver;
use App\Observers\LessonHourObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Spatie\Permission\Models\Permission;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        LessonHour::observe(LessonHourObserver::class);
        Classroom::observe(ClassroomObserver::class);
        Extracurricular::observe(ExtracurricularObserver::class);

        $school = School::first();
        $classrooms = Classroom::all();
        $permission_feedback = Permission::where('name', 'active_feedback')->first();
        view()->share('school', $school);
        view()->share('all_classrooms', $classrooms);
        view()->share('permission_feedback', $permission_feedback);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
