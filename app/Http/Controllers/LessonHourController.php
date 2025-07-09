<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Models\LessonHour;
use App\Http\Requests\StoreLessonHourRequest;
use App\Http\Requests\UpdateLessonHourRequest;
use App\Services\LessonHourService;
use Illuminate\Http\Request;

class LessonHourController extends Controller
{
    private LessonHourInterface $lessonHour;
    private LessonHourService $service;

    public function __construct(LessonHourInterface $lessonHour, LessonHourService $service)
    {
        $this->lessonHour = $lessonHour;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lessonHours = $this->lessonHour->groupBy('day');
        $latestHour = $this->service->get();
        return view('school.pages.subjects.lesson-hours', compact('lessonHours', 'latestHour'));
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
    public function store(StoreLessonHourRequest $request, string $day)
    {
        try {
            $data = $this->service->store($request, $day);
            $rule_end = $data['end'] <= $data['start'];
            if ($rule_end) return redirect()->back()->with('error', 'Jam selesai tidak boleh lebih kecil dari jam awal');
            $rule = $this->lessonHour->whereDay($day, $data['name']);
            if ($rule) return redirect()->back()->with('error', 'Jam pelajaran sudah tersedia');
            $this->lessonHour->store($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan jam pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonHour $lessonHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonHour $lessonHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonHourRequest $request, LessonHour $lessonHour)
    {
        try {
            $this->lessonHour->update($lessonHour->id ,$request->validated());
            return redirect()->back()->with('success', 'Berhasil memperbarui jam pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());//throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonHour $lessonHour)
    {
        try {
            $this->lessonHour->delete($lessonHour->id);
            return redirect()->back()->with('success', 'Berhasil menghapus jam pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
