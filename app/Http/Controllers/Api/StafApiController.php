<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Enums\AttendanceEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeJournalResource;
use App\Http\Resources\PopularViolationResource;
use App\Http\Resources\RegulationResource;
use App\Http\Resources\RepairStudentResource;
use App\Http\Resources\StudentPermissionResource;
use App\Http\Resources\StudentPointResource;
use App\Models\User;
use App\Services\EmployeeJournalService;
use App\Services\StaffChartService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StafApiController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private StudentInterface $student;
    private EmployeeInterface $employee;
    private EmployeeJournalService $journalService;
    private EmployeeJournalInterface $employeeJournal;
    private RegulationInterface $regulation;
    private AttendanceRuleInterface $attendanceRule;
    private AttendanceInterface $attendance;
    private StaffChartService $chartService;


    public function __construct(
        AttendanceRuleInterface $attendanceRule,
        StudentViolationInterface $studentViolation,
        StudentRepairInterface $studentRepair,
        SchoolPointInterface $schoolPoint,
        StudentInterface $student,
        EmployeeInterface $employee,
        EmployeeJournalService $journalService,
        EmployeeJournalInterface $employeeJournal,
        RegulationInterface $regulation,
        AttendanceInterface $attendance,
        StaffChartService $chartService
    )
    {
        $this->attendanceRule = $attendanceRule;
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->schoolPoint = $schoolPoint;
        $this->student = $student;
        $this->employee = $employee;
        $this->journalService = $journalService;
        $this->employeeJournal = $employeeJournal;
        $this->regulation = $regulation;
        $this->attendance = $attendance;
        $this->chartService = $chartService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        try {
            $approved = $this->studentRepair->count_approved('1');
            $process = $this->studentRepair->count_approved('0');
            $not_process = $this->studentRepair->count_approved(null);

            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
                'approved' => $approved,
                'process' => $process,
                'not_process' => $not_process,
            ]], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function history_journals(User $user)
    {
        try {
            $employeeJournals = $this->employeeJournal->getEmployee($user->id, 'get');

            if ($employeeJournals->where('created_at', '>=', Carbon::today())->isEmpty()) {
                return response()->json([
                    'journal_message' => 'Hari ini anda belum mengisi jurnal!',
                    'status' => 'success',
                    'message' => "Berhasil mengambil data",
                    'code' => 200,
                    'data' => [ 'journals' => EmployeeJournalResource::collection($employeeJournals),]
                ], 200);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => "Berhasil mengambil data",
                    'code' => 200,
                    'data' => [ 'journals' => EmployeeJournalResource::collection($employeeJournals),]
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function create_journal(User $user, Request $request)
    {
        $condition = $this->attendanceRule->whereDayRole(Carbon::today()->format('l'),'teacher');
        if (Carbon::now()->format('H:i:s') <= $condition->checkout_end ) {
            return response()->json(['status' => 'error', 'message' => 'Anda belum waktunya mengisi jurnal', 'code' => 400], 400);
        }

        $description = preg_replace('/\s+/', '', $request->input('description'));
        if (strlen($description) < 150) {
            return response()->json(['status' => 'error', 'message' => 'Deskripsi minimal harus 150 karakter tanpa spasi', 'code' => 400], 400);
        }

        $employee = $this->employee->getByUser($user->id);
        $result = $this->employeeJournal->whereDate($employee->id, Carbon::today());

        if ($result) {
            return response()->json(['status' => 'error', 'message' => "Jurnal anda hari ini sudah tersedia", 'code' => 500], 500);
        }

        $data = $this->journalService->store_api($request, $user);
        $this->employeeJournal->store($data);
        return response()->json(['status' => 'success', 'message' => "Data Berhasil di Tambahkan", 'code' => 200], 200);
    }

    public function overview_header()
    {
        try {
            $student_violation = $this->studentViolation->countByStudent();
            $maxPoint = $this->schoolPoint->getMaxPoint();
            $studentHighPoint = $this->student->highestPoint($maxPoint);

            $countViolation = $this->studentViolation->count('week');
            $countRepair = $this->studentRepair->count();

            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
                'student_violation' => $student_violation,
                'student_high_point' => $studentHighPoint,
                'violation_in_week' => $countViolation,
                'repair_in_week' => $countRepair,
            ]], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function max_point()
    {
        try {
            $maxPoint = $this->schoolPoint->getMaxPoint();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'max_point' => $maxPoint], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function list_violation()
    {
        try {
            $regulations = $this->regulation->latest();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => RegulationResource::collection($regulations)], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function list_repair()
    {
        try {
            $data = $this->studentRepair->groupByClassroomStudentAndCreated();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
            'data' => $data->mapWithKeys(function ($dateGroup, $date) {
                    $formattedDate = Carbon::parse($date)->translatedFormat('j F Y');
                    return [
                        $formattedDate => $dateGroup->map(function ($classroomGroup, $classroomStudentId) {
                            $totalPoints = $classroomGroup->sum('point');
                            $studentName = optional($classroomGroup->first())->classroomStudent()->latest()->first()->student->user->name;

                            return [
                                'name' => $studentName,
                                'total_points' => $totalPoints,
                                'data' => RepairStudentResource::collection($classroomGroup),
                            ];
                        })
                    ];
                }),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function list_point_student(Request $request)
    {
        try {
            $students = $this->student->getByApi($request);
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => StudentPointResource::collection($students)], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }

    public function popular_violations()
    {
        try {
            $popular_violations = $this->regulation->getOrderApi();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => PopularViolationResource::collection($popular_violations)], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 400], 400);
        }
    }
    
    public function student_permissions(Request $request)
    {
        try {
            $attendances = $this->attendance->getSickAndPermit($request, [AttendanceEnum::SICK->value, AttendanceEnum::PERMIT->value]);
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [ 'permissions' => StudentPermissionResource::collection($attendances)], ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong".$th->getMessage(),'code' => 400], 400);
        }
    }

    public function statistic_violation()
    {
        try {
            $charts = $this->chartService->violationChart();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [ 'violations' => $charts], ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Kosong".$th->getMessage(),'code' => 400], 400);
        }
    }
}
