<?php

namespace App\Services;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Models\Employee;
use App\Models\ModelHasRfid;
use App\Models\Student;

class ModelHasRfidService
{
    private RfidInterface $rfid;
    private ModelHasRfidInterface $modelRfid;

    public function __construct(RfidInterface $rfid, ModelHasRfidInterface $modelRfid)
    {
        $this->rfid = $rfid;
        $this->modelRfid = $modelRfid;
    }

    public function check(StoreModelHasRfidRequest $request): array|bool
    {
        $data = $request->validated();
        return $this->rfid->where($data['rfid']);
    }

    public function update(UpdateModelHasRfidRequest $request, string $role, string $id): mixed
    {
        $data = $request->validated();

        $rfid = $this->modelRfid->where($data['rfid']);
        if (!$rfid) {
            $this->modelRfid->updateOrCreate(
                ['rfid' => $request->old_rfid],
                [
                    'rfid' => $data['rfid'],
                    'model_type' => "App\Models\\" . ucfirst($role),
                    'model_id' => $id
                ]
            );

            return redirect()->back()->with('success', 'Berhasil menambahkan rfid');
        } else {
            return redirect()->back()->with('error', 'RFID telah digunakan');
        }

    }
}
