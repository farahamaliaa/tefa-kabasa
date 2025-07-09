<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\FeedbackInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackApiRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\LessonSchedule;
use App\Services\FeedbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentFeedbackController extends Controller
{
    private FeedbackInterface $feedback;
    private FeedbackService $service;

    public function __construct(FeedbackInterface $feedback, FeedbackService $service)
    {
        $this->feedback = $feedback;
        $this->service = $service;
    }

    public function store(StoreFeedbackApiRequest $request, LessonSchedule $lessonSchedule)
    {
        DB::beginTransaction();
        try {
            $data = $this->service->storeApi($request, $lessonSchedule);
            $this->feedback->store($data);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengirim tanggapan", 'code' => 200], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => "Gagal mengirim tanggapan ".$th->getMessage(),'code' => 400], 400);
        }
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        DB::beginTransaction();
        try {
            $this->feedback->update($feedback->id, $request->validated());
            DB::commit();
            return response()->json(['status' => 'success', 'message' => "Berhasil memperbarui tanggapan", 'code' => 200], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => "Gagal memperbarui tanggapan ".$th->getMessage(),'code' => 400], 400);
        }
    }
}
