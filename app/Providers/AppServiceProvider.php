<?php

namespace App\Providers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\CityInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Contracts\Interfaces\ExtracurricularStudentInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\GuestBookInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\LevelClassInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\ProvinceInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\RepairInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SemesterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Contracts\Interfaces\SubDistrictInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\VillageInterface;
use App\Contracts\Repositories\AttendanceJournalRepository;
use App\Contracts\Repositories\AttendanceRepository;
use App\Contracts\Repositories\AttendanceRuleRepository;
use App\Contracts\Repositories\AttendanceTeacherRepository;
use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\ClassroomRepository;
use App\Contracts\Repositories\ClassroomStudentRepository;
use App\Contracts\Repositories\EmployeeJournalRepository;
use App\Contracts\Repositories\EmployeeRepository;
use App\Contracts\Repositories\ExtracurricularRepository;
use App\Contracts\Repositories\ExtracurricularStudentRepository;
use App\Contracts\Repositories\FeedbackRepository;
use App\Contracts\Repositories\GuestBookRepository;
use App\Contracts\Repositories\LessonHourRepository;
use App\Contracts\Repositories\LessonScheduleRepository;
use App\Contracts\Repositories\LevelClassRepository;
use App\Contracts\Repositories\MaxLateRepository;
use App\Contracts\Repositories\SubjectRepository;
use App\Contracts\Repositories\ModelHasRfidRepository;
use App\Contracts\Repositories\ProvinceRepository;
use App\Contracts\Repositories\RegulationRepository;
use App\Contracts\Repositories\ReligionRepository;
use App\Contracts\Repositories\RepairRepository;
use App\Contracts\Repositories\RfidRepository;
use App\Contracts\Repositories\SchoolPointRepository;
use App\Contracts\Repositories\SchoolRepository;
use App\Contracts\Repositories\SchoolYearRepository;
use App\Contracts\Repositories\SemesterRepository;
use App\Contracts\Repositories\StudentRepairRepository;
use App\Contracts\Repositories\StudentRepository;
use App\Contracts\Repositories\StudentViolationRepository;
use App\Contracts\Repositories\SubDistrictRepository;
use App\Contracts\Repositories\Teachers\TeacherJournalRepository;
use App\Contracts\Repositories\TeacherSubjectRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\VillageRepository;
use App\Policies\StudentRepairPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        UserInterface::class => UserRepository::class,
        StudentInterface::class => StudentRepository::class,
        ReligionInterface::class => ReligionRepository::class,
        ProvinceInterface::class => ProvinceRepository::class,
        CityInterface::class => CityRepository::class,
        SubDistrictInterface::class => SubDistrictRepository::class,
        SchoolInterface::class => SchoolRepository::class,
        SemesterInterface::class => SemesterRepository::class,
        EmployeeInterface::class => EmployeeRepository::class,
        SubjectInterface::class => SubjectRepository::class,
        VillageInterface::class => VillageRepository::class,
        SchoolYearInterface::class => SchoolYearRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        ClassroomStudentInterface::class => ClassroomStudentRepository::class,
        LessonHourInterface::class => LessonHourRepository::class,
        LessonScheduleInterface::class => LessonScheduleRepository::class,
        AttendanceInterface::class => AttendanceRepository::class,
        AttendanceTeacherInterface::class => AttendanceTeacherRepository::class,
        RfidInterface::class => RfidRepository::class,
        LevelClassInterface::class => LevelClassRepository::class,
        AttendanceRuleInterface::class => AttendanceRuleRepository::class,
        ModelHasRfidInterface::class => ModelHasRfidRepository::class,
        ExtracurricularInterface::class => ExtracurricularRepository::class,
        TeacherSubjectInterface::class => TeacherSubjectRepository::class,
        ExtracurricularStudentInterface::class => ExtracurricularStudentRepository::class,
        TeacherJournalInterface::class => TeacherJournalRepository::class,
        AttendanceJournalInterface::class => AttendanceJournalRepository::class,
        RepairInterface::class => RepairRepository::class,
        StudentViolationInterface::class => StudentViolationRepository::class,
        RegulationInterface::class => RegulationRepository::class,
        SchoolPointInterface::class => SchoolPointRepository::class,
        StudentRepairInterface::class => StudentRepairRepository::class,
        EmployeeJournalInterface::class => EmployeeJournalRepository::class,
        GuestBookInterface::class => GuestBookRepository::class,
        FeedbackInterface::class => FeedbackRepository::class,
        MaxLateInterface::class => MaxLateRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) {
            $this->app->bind($index, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }

}
