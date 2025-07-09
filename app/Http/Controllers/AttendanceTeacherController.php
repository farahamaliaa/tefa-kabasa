<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\RfidInterface;
use App\Services\AttendanceService;
use App\Enums\AttendanceEnum;
use App\Enums\RoleEnum;
use App\Helpers\ResponseHelper;
use Illuminate\Http\Request;

class AttendanceTeacherController extends Controller
{
    private AttendanceTeacherInterface $attendance;
    private ModelHasRfidInterface $modelHasRfid;
    private RfidInterface $rfid;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;
    private AttendanceService $service;

    public function __construct(ModelHasRfidInterface $modelHasRfid, AttendanceTeacherInterface $attendance, StudentInterface $student, AttendanceRuleInterface $attendanceRule, AttendanceService $service, RfidInterface $rfid)
    {
        $this->attendance = $attendance;
        $this->rfid = $rfid;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->service = $service;
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $school_id)
    {
        $present = $this->attendance->getSchool($school_id, 'checkin');
        $out = $this->attendance->getSchool($school_id, 'checkout');
        return view('school.pages.test.list-attendane-teacher', compact('school_id', 'present', 'out'));
    }

    public function syncData(Request $request) {
        $present = $this->attendance->getSchool($request->user()->school->id, 'checkin');
        $out = $this->attendance->getSchool($request->user()->school->id, 'checkout');
        $data = $this->service->syncStudentAttendacne($present, $out);
        return ResponseHelper::jsonResponse('success', 'Berhasil sinkronisasi data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validated();
        $rfid = $this->rfid->where($data['rfid']);
        if (!$rfid) return ResponseHelper::jsonResponse('erorr', 'Rfid belum terdaftarkan');

        $user = $this->modelHasRfid->whereRfid($data['rfid']);
        if (!$user) return ResponseHelper::jsonResponse('warning', 'Rfid belum terdaftar di sekolah');
        if ($user->model_type != 'App\Models\Employee') return ResponseHelper::jsonResponse('error', 'Rfid bukan guru');
        if ($user->model_type == 'App\Models\Employee' && $user->model->status != RoleEnum::TEACHER->value) return ResponseHelper::jsonResponse('error', 'Rfid pegawai');
        if ($user->model_type === null) return ResponseHelper::jsonResponse('error', 'Rfid belum terdaftarkan ke pengguna');

        $time = now();
        $day = strtolower($time->format('l'));
        $clock = $time->format('H:i:s');

        $this->student->show($user->model_id);

        $rule = $this->attendanceRule->showByDay($request->user()->school->id, $day, RoleEnum::TEACHER->value);
        if (!$rule) return ResponseHelper::jsonResponse('warning', 'Tidak ada jadwal absensi');

        $presence = $this->attendance->checkPresence($user->model_id, AttendanceEnum::PRESENT->value);

        if ($clock >= $rule->checkin_start && $clock <= $rule->checkin_end) {
            if ($rule->is_holiday == true) return ResponseHelper::jsonResponse('warning', 'Hari ini libur ');
            if ($time->format('H:i:s') > $rule->checkin_end) return ResponseHelper::jsonResponse('warning', 'Absen sudah melebihi jamnya');
            if ($presence) return ResponseHelper::jsonResponse('warning', 'Sudah absen');

            $data = $this->service->storeByTeacher($time->format('H:i:s'), $user->model_id, AttendanceEnum::PRESENT->value);
            $this->attendance->store($data);

            return ResponseHelper::jsonResponse('success', 'Berhasil absen');
        } else if ($clock >= $rule->checkout_start && $clock <= $rule->checkout_end) {
            if (!$presence) return ResponseHelper::jsonResponse('warning', 'Anda belum absen pagi');
            if ($presence->checkout != null) return ResponseHelper::jsonResponse('warning', 'Anda sudah absen pulang');

            $this->attendance->updateCheckOut($user->model_id, ['checkout' => $clock]);
            return ResponseHelper::jsonResponse('success', 'Berhasil absen keluar');
        } else {
            return ResponseHelper::jsonResponse('warning', 'Waktu absen sudah melebihi batas waktu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
