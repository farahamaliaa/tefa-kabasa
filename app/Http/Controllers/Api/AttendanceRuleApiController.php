<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceRuleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

class AttendanceRuleApiController extends Controller
{
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(AttendanceRuleInterface $attendanceRule)
    {
        $this->attendanceRule = $attendanceRule;
        // $this->middleware = ['staf:create,dets'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $attendanceRules = $this->attendanceRule->get();

        // auth()->user()->hasRole();
        return response()->json(['status'=> 'success', 'code'=>200, 'data' => AttendanceRuleResource::collection($attendanceRules)]);
    }
}
