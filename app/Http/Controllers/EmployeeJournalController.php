<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Enums\StatusEnum;
use App\Exports\EmployeeJournalExport;
use App\Models\EmployeeJournal;
use App\Http\Requests\StoreEmployeeJournalRequest;
use App\Http\Requests\UpdateEmployeeJournalRequest;
use App\Services\EmployeeJournalService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeJournalController extends Controller
{
    private EmployeeJournalInterface $employeeJournal;
    private EmployeeJournalService $service;

    public function __construct(EmployeeJournalInterface $employeeJournal, EmployeeJournalService $service)
    {
        $this->employeeJournal = $employeeJournal;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeJournals = $this->employeeJournal->getEmployee(auth()->user()->id, 'paginate');
        return view('staff.pages.journal.index', compact('employeeJournals'));
    }

    public function export(Request $request)
    {
        $journals = $this->employeeJournal->export($request);
        return view('school.pages.journals.export-staff', compact('journals'));
    }

    public function downloadJournal(Request $request)
    {
        return Excel::download(new EmployeeJournalExport($this->employeeJournal, $request), 'Jurnal-Staff.xlsx');
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
    public function store(StoreEmployeeJournalRequest $request)
    {
        $data = $this->service->store($request);
        $this->employeeJournal->store($data);
        return redirect()->back()->with('success', 'Berhasil menambah jurnal.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeJournal $employeeJournal, Request $request)
    {
        $allJournals = $this->employeeJournal->search($request);
        $completedJournals = $this->employeeJournal->getByStatus(StatusEnum::COMPLETED->value, $request);

        $notCompletedJournals = $this->employeeJournal->getByStatus(StatusEnum::NOT_COMPLETED->value, $request);

        return view('school.pages.journals.journal-staff', compact('completedJournals', 'notCompletedJournals', 'allJournals'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeJournal $employeeJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeJournalRequest $request, EmployeeJournal $employeeJournal)
    {
        $data = $this->service->update($request);
        $this->employeeJournal->update($employeeJournal->id, $data);
        return redirect()->back()->with('success', 'Berhasil mengedit jurnal.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeJournal $employeeJournal)
    {
        $this->employeeJournal->delete($employeeJournal->id);
        return redirect()->back()->with('success', 'Berhasil menghapus jurnal.');
    }

    public function detail(EmployeeJournal $employeeJournal)
    {
        return view('staff.pages.journal.detail', compact('employeeJournal'));
    }
}
