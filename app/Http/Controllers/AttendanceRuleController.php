<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Models\AttendanceRule;
use App\Http\Requests\StoreAttendanceRuleRequest;
use App\Http\Requests\UpdateAttendanceRuleRequest;
use App\Services\AttendanceRuleService;
use Illuminate\Http\Request;

class AttendanceRuleController extends Controller
{
    private AttendanceRuleInterface $attendanceRule;
    private AttendanceRuleService $service;
    private MaxLateInterface $maxLate;

    public function __construct(AttendanceRuleInterface $attendanceRule, AttendanceRuleService $service, MaxLateInterface $maxLate)
    {
        $this->attendanceRule = $attendanceRule;
        $this->service = $service;
        $this->maxLate = $maxLate;
    }

    public function setting()
    {
        $maxLate = $this->maxLate->get();
        return view('school.pages.attendance.clock-settings', compact('maxLate'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $day = $request->query('day');
        $role = $request->query('role');
        $attendanceRules = $this->attendanceRule->whereDayRole($day, $role);
        return response()->json([
            'start_time' => $attendanceRules->checkin_start,
            'end_time' => $attendanceRules->checkin_end,
            'leave_start' => $attendanceRules->checkout_start,
            'leave_end' => $attendanceRules->checkout_end,
            'holiday' => $attendanceRules->is_holiday,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRuleRequest $request, string $day, string $role)
    {
        try {
            $data = $this->service->storeOrUpdate($request, $day, $role);
            $this->attendanceRule->store($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan waktu absen');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRuleRequest $request, AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceRule $attendanceRule)
    {
        //
    }
}
