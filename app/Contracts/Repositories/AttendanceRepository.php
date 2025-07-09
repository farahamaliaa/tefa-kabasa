<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use App\Enums\RoleEnum;
use App\Models\Attendance;
use App\Models\ClassroomStudent;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{
    private $student;
    private $employee;

    public function __construct(Attendance $attendance, ClassroomStudent $student, Employee $employee)
    {
        $this->model = $attendance;
        $this->student = $student;
        $this->employee = $employee;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function getCurrentDay(): mixed
    {
        return $this->model->query()->with('classroomStudent')->whereDay('checkin', now()->day)->get();
    }
    public function getByDate($date): mixed
    {
        return $this->model->query()->with('classroomStudent')->whereDay('checkin', Carbon::create($date)->day)->get();
    }

    public function nowAttendance(): mixed
    {
        return $this->model->whereDate('created_at', now())->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function insert(array $data): mixed
    {
        return $this->model->query()->insert($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function updateWithAttribute(array $attribute, array $data): mixed
    {
        // dd($attribute);
        // dd($this->model->query()->where('model_id', $attribute['model_id'])->get());
        // dd($attribute);
        return $this->model->query()->where('model_type', $attribute['model_type'])->where('model_id', $attribute['model_id'])->whereDate('created_at', $attribute['created_at'])->firstOrFail()->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate(): mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function whereSchool(mixed $id, Request $request): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom.schoolYear.school', 'id', $id)
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student.user', 'name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->created_at, function ($query) use ($request) {
                $query->whereDate('created_at', $request->created_at);
            })
            ->when($request->year, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.classroom.schoolYear', 'school_year', $request->year);
            })
            ->latest()->paginate(10);
    }

    public function whereClassroom(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent', 'classroom_id', $id)->paginate(10);
    }

    public function whereClassroomCount(mixed $id, mixed $day, mixed $status): mixed
    {
        return $this->model->query()
            ->with('model')
            ->where('model_type', 'App\Models\ClassroomStudent')
            ->where('status', $status)
            ->whereDate('created_at', $day)
            ->whereHas('model', function ($query) use ($id) {
                $query->where('classroom_id', $id);
            })
            ->count();
    }

    public function classAndDate(mixed $classroom_id, Request $request): mixed
    {
        $date = $request->date ?? Carbon::today()->toDateString();
        $startDate = Carbon::parse($request->start)->startOfDay();
        $endDate = Carbon::parse($request->end)->endOfDay();

        return $this->student->query()
            ->whereHas('attendances', function ($query) use ($date, $request, $startDate, $endDate) {
                $query->whereDate('created_at', $date)
                ->when($request->start, function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('created_at', [$startDate, $endDate]);
                });
            })
            ->with(['student.user', 'attendances' => function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            }])
            ->where('classroom_id', $classroom_id)
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('student.user', 'name', 'LIKE', '%' . $request->name . '%');
            })
            ->get();
    }

    public function exportClassAndDate(mixed $classroom_id, Request $request): mixed
    {
        return $this->model->query()
            ->with('model')->where('model_type', ClassroomStudent::class)
            ->whereHas('model', function ($query) use ($classroom_id) {
                $query->where('classroom_id', $classroom_id);
            })->when($request->start, function ($query) use ($request) {
                $query->whereBetween('created_at', [$request->start . ' 00:00:00', $request->end . ' 23:59:59']);
            })
            ->get();
    }

    public function attendanceGetTecaher(Request $request): mixed
    {
        return $this->employee->query()
            ->with('attendances')
            ->whereHas('attendances')
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('user', 'name', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->date, function ($query) use ($request) {
                $query->whereHas('attendances', function ($query) use ($request) {
                    $query->whereDate('created_at', $request->date);
                });
            })
            ->get();
    }

    public function getSchool(mixed $id, mixed $query): mixed
    {
        return $this->model->query()->with('classroomStudent.student.user')->whereRelation('classroomStudent.classroom.schoolYear.school', 'id', $id)->whereNotNull($query)->latest()->get();
    }

    public function AttendanceChart(mixed $year, mixed $month, mixed $status): mixed
    {
        return $this->model->query()
            ->where('status', $status)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }

    public function AttendanceDasboard(mixed $model, mixed $query, Request $request): mixed
    {
        $result = $this->model->query();
        $result->where('model_type', $model);
        $result->where('status', $query);
        $request->date ? $result->whereDate('created_at', $request->date) : $result->whereDate('created_at', now());
        return $result->get();
    }

    public function classroomAttendanceChart($date)
    {
        return $this->model->query()
            ->whereDate('created_at', $date)
            ->where('model_type', 'App\Models\ClassroomStudent')
            ->with(['model' => function ($query) {
                $query->with('classroom'); // Memuat relasi classroom dari model
            }])
            ->get()
            ->groupBy(function ($item) {
                // Mengelompokkan berdasarkan classroom_id dari relasi model
                return $item->model->classroom_id ?? 'Unknown'; // Pastikan ada fallback jika null
            });
    }

    public function AttendanceChartEmployee(mixed $start_date, mixed $end_date, mixed $status): mixed
    {
        return $this->model->query()
            ->where('model_type', 'App\Models\Employee')
            ->where('status', $status)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->count();
    }

    public function checkPresence(mixed $id, mixed $status): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom', 'student_id', $id)
            ->where('status', $status)
            ->first();
    }

    public function getStudent(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom', 'student_id', $id)
            ->where('status', RoleEnum::STUDENT->value)
            ->with('classroomStudents.student')
            ->first();
    }

    public function updateCheckOut(mixed $id, array $data): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom', 'student_id', $id)->update($data);
    }

    public function listAttendance($date)
    {
        return $this->model->query()
            ->when($date, function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            })
            ->get();
    }

    public function reset($date)
    {
        return $this->model->query()
            ->when($date, function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            })
            ->delete();
    }

    public function getClassroomStudent(string $id): mixed
    {
        return $this->model->query()
            ->whereDay('created_at', now()->day)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->where('model_type', 'App\Models\ClassroomStudent')
            ->where('model_id', $id)
            ->first();
    }

    public function whereModel(mixed $model, Request $request): mixed
    {
        return $this->model->query()
            ->where('model_type', $model)
            ->when($request->start_date, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
            })
            ->get();
    }

    public function userToday(mixed $model, mixed $id): mixed
    {
        return $this->model->query()
            ->where('model_type', $model)
            ->where('model_id', $id)
            ->whereDay('created_at', today()->day)
            ->first();
    }

    public function whereUser(mixed $id, mixed $model): mixed
    {
        return $this->model->query()
            ->where('model_type', $model)
            ->where('model_id', $id)
            ->latest()
            ->get();
    }

    public function getByUserAndStatus(mixed $model, mixed $id, mixed $status, mixed $condition): mixed
    {
        $result = $this->model->query()
            ->where('model_type', $model)
            ->where('model_id', $id)
            ->where('status', $status);

        return $condition == 'get' ? $result->get() : $result->count();
    }

    public function getSickAndPermit(Request $request, array $status) : mixed
    {
        return $this->model->query()
            ->where('model_type', 'App\Models\ClassroomStudent')
            ->whereIn('status', $status)
            ->when($request->status, function($query) use ($request) {
                $query->where('status', 'like', '%' . $request->status . '%');
            })
            ->when($request->classroom, function($query) use ($request) {
                $query->where('model_id', $request->classroom);
            })
            ->latest()->get();
    }

    public function whereModelAndNow(mixed $model, Request $request): mixed
    {
        $query = $this->model->query()
            ->where('model_type', $model);

        if ($request->has(['start_date', 'end_date'])) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();

            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            $query->whereDate('created_at', now()->toDateString());
        }

        return $query->get();
    }

    public function allStudentWithPagination(Request $request): mixed
    {
        return $this->model->query()
            ->where('model_type', 'App\Models\ClassroomStudent')
            ->when($request->date, function ($query) use ($request) {
                $query->whereDate('created_at', $request->date);
            })
            ->latest()->paginate(10);
    }
}
