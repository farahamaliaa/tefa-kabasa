<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CityInterface;
use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityInterface $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->city->get();
        return view('', compact('data'));
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
    public function store(StoreCityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $provinceId = $request->input('province_id');
        $cities = $this->city->where($provinceId);
        return response()->json(['data' => $cities]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
