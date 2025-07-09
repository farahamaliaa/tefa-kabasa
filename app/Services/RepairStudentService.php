<?php

    namespace App\Services;

    use App\Enums\UploadDiskEnum;
    use App\Http\Requests\RepairStudentRequest;
    use App\Models\StudentRepair;
    use App\Traits\UploadTrait;

    class RepairStudentService
    {
        use UploadTrait;

        public function validateAndUpload(string $disk, object $file, string $old_file = null): string
        {
            if ($old_file) $this->remove($old_file);
            return $this->upload($disk, $file);
        }

        public function store(RepairStudentRequest $request, StudentRepair $studentRepair): array|bool
        {
            $data = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                if ($studentRepair->proof == null) {
                    $data['file'] = $request->file('file')->store(UploadDiskEnum::PROOF_REPAIR->value, 'public');
                } else {
                    $this->remove($studentRepair->proof);
                    $data['file'] = $request->file('file')->store(UploadDiskEnum::PROOF_REPAIR->value, 'public');
                }
            } else {
                $data['file'] = $studentRepair->proof;
            }

            return $data;
        }
    }
