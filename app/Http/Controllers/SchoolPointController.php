<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Http\Requests\StoreSchoolPointRequest;
use App\Services\SchoolPointService;

class SchoolPointController extends Controller
{
    private SchoolPointInterface $schoolPoint;
    private SchoolPointService $schoolPointService;

    public function __construct(SchoolPointInterface $schoolPoint, SchoolPointService $schoolPointService)
    {
        $this->schoolPoint = $schoolPoint;
        $this->schoolPointService = $schoolPointService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolPointRequest $request)
    {
        $this->schoolPointService->store($request);
        return redirect()->back()->with('success', 'Point peringatan berhasil disimpan');
    }
}
