<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\CheckMasterKeyRequest;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceMasterController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceService $service;
    private ModelHasRfidInterface $rfid;

    public function __construct(ModelHasRfidInterface $modelHasRfid, AttendanceService $service, ModelHasRfidInterface $rfid)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->service = $service;
        $this->rfid = $rfid;
    }

    public function index()
    {
        return view('school.pages.test.attendance');
    }

    public function index_teacher() {
        return view('school.pages.test.attendance-teacher');
    }

    public function check(CheckMasterKeyRequest $request)
    {
        $data = $request->validated();
        $card = $this->rfid->where($data['rfid']);
        if ($card) {
            // $user = \App\Models\User::whereRelation('school.modelHasRfid', 'rfid', $data['rfid'])->first();
            // $token = $user->createToken($user->password)->plainTextToken;
            return ResponseHelper::jsonResponse('success', 'valid rfid');
        } else {
            return ResponseHelper::jsonResponse('error', 'Kartu tidak terdaftar sebagai master key!', null, 404);
        }
    }

    public function check_teacher(CheckMasterKeyRequest $request) {
        $data = $request->validated();
        $card = $this->modelHasRfid->where($data['rfid']);
        if ($card->model_type == 'App\Models\School') {
            return to_route('list-attendance-teacher.index', ['school_id' => $card->model_id])->with('success', 'Berhasil masuk');
        } else {
            return ResponseHelper::jsonResponse('error', 'Kartu tidak terdaftar sebagai master key!', null, 404);
        }
    }
}
