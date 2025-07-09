<?php

namespace App\Observers;

use App\Models\LessonHour;

class LessonHourObserver
{
    /**
     * Handle the LessonHour "deleted" event.
     */
    public function deleted(LessonHour $lessonHour): void
    {
        //
    }

    /**
     * Handle the LessonHour "restored" event.
     */
    public function restored(LessonHour $lessonHour): void
    {
        //
    }

    /**
     * Handle the LessonHour "force deleted" event.
     */
    public function forceDeleted(LessonHour $lessonHour): void
    {
        //
    }
}
