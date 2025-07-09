<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CityInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\ProvinceInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SubDistrictInterface;
use App\Contracts\Interfaces\VillageInterface;
use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private SchoolInterface $school;
    private SchoolService $service;
    // private ProvinceInterface $province;
    // private CityInterface $city;
    // private SubDistrictInterface $subdistrict;
    // private VillageInterface $village;
    // private EmployeeInterface $employee;
    // private ClassroomInterface $classroom;
    // private SchoolYearInterface $schoolYear;
    // private ModelHasRfidInterface $modelHasRfid;

    public function __construct(SchoolInterface $school, SchoolService $service,
        // ProvinceInterface $province, CityInterface $city,
        // SubDistrictInterface $subdistrict, VillageInterface $village,
        // EmployeeInterface $employee, ClassroomInterface $classroom,
        // SchoolYearInterface $schoolYear, ModelHasRfidInterface $modelHasRfid
        )
    {
        $this->school = $school;
        $this->service = $service;
        // $this->province = $province;
        // $this->city = $city;
        // $this->subdistrict = $subdistrict;
        // $this->village = $village;
        // $this->employee = $employee;
        // $this->classroom = $classroom;
        // $this->schoolYear = $schoolYear;
        // $this->modelHasRfid = $modelHasRfid;
    }

    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index(Request $request)
    // {
    //     $schools = $this->school->search($request)->paginate(10);
    //     $activeSchools = $this->school->where('1', $request);
    //     $nonActiveSchools = $this->school->where('0', $request);
    //     return view('admin.pages.list-school.index', compact('schools', 'activeSchools', 'nonActiveSchools'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $provinces = $this->province->get();
    //     $cities = $this->city->get();
    //     $subdistricts = $this->subdistrict->get();
    //     $villages = $this->village->get();
    //     return view('admin.pages.list-school.add-school', compact('provinces', 'cities', 'subdistricts', 'villages'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreSchoolRequest $request)
    // {
    //     $data = $this->service->store($request);
    //     // dd($data);
    //     $this->school->store($data);
    //     return to_route('school-admin.index')->with('success', 'Berhasil menambahkan sekolah');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show($slug, Request $request)
    // {
    //     $school = $this->school->showWithSlug($slug);
    //     $teachers = $this->employee->getTeacherBySchool();
    //     $schoolYears = $this->schoolYear->whereSchool($school->id, $request);
    //     $rfids = $this->modelHasRfid->whereSchool($school->id);
    //     $activeRfids = $this->modelHasRfid->whereNotNull('model_type');
    //     $nonactiveRfids = $this->modelHasRfid->whereNull('model_type');
    //     $schoolYear = $this->schoolYear->active($school->id);

    //     $classrooms = 0;
    //     // Loop untuk menghitung jumlah classrooms dari setiap schoolYear
    //     foreach ($schoolYears as $schoolYear) {
    //         $classrooms += $this->classroom->whereSchoolYears($schoolYear->school_year, $request)->count();
    //     }

    //     return view('admin.pages.list-school.detail', compact('school', 'teachers', 'classrooms', 'rfids', 'activeRfids', 'nonactiveRfids', 'schoolYear'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(School $school)
    // {
    //     //
    // }

    // public function nonactive(School $school)
    // {
    //     $this->school->update($school->id, ['active' => 0]);
    //     return redirect()->back()->with('success', 'Sekolah berhasil dinonaktifkan');
    // }

    // public function active(School $school)
    // {
    //     $this->school->update($school->id, ['active' => 1]);
    //     return redirect()->back()->with('success', 'Sekolah berhasil diaktifkan');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(School $school)
    // {
    //     $this->service->delete($school);
    //     $this->school->delete($school->id);
    //     $school->user->delete();
    //     return to_route('school-admin.index')->with('success', 'Berhasil menghapus sekolah');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $data = $this->service->update($school, $request);
        $this->school->update($school->id, $data);
        return to_route('school.settings-information.index')->with('success', 'Berhasil memperbarui sekolah');
    }
}
