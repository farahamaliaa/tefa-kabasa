<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Models\AttendanceJournal;
use App\Http\Requests\StoreAttendanceJournalRequest;
use App\Http\Requests\UpdateAttendanceJournalRequest;
use App\Services\AttendanceJournalService;

class AttendanceJournalController extends Controller
{
    private AttendanceJournalInterface $attendanceJournal;
    private AttendanceJournalService $attendanceJournalService;

    public function __construct(AttendanceJournalInterface $attendanceJournal, AttendanceJournalService $attendanceJournalService)
    {
        $this->attendanceJournal = $attendanceJournal;
        $this->attendanceJournalService = $attendanceJournalService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendanceJournals = $this->attendanceJournal->get();
        return view('', compact('attendanceJournals'));
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
    public function store(StoreAttendanceJournalRequest $request)
    {
        $data = $this->attendanceJournalService->store($request);
        $this->attendanceJournal->store($data);
        return redirect()->back()->with('success', 'Berhasil menyimpan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceJournal $attendanceJournal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceJournal $attendanceJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceJournalRequest $request, AttendanceJournal $attendanceJournal)
    {
        $this->attendanceJournal->update($attendanceJournal, $request->validated());
        return redirect()->back()->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceJournal $attendanceJournal)
    {
        $this->attendanceJournal->delete($attendanceJournal);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
