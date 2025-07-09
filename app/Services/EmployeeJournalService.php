<?php

    namespace App\Services;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Enums\StatusEnum;
use App\Http\Requests\StoreEmployeeJournalRequest;
use App\Http\Requests\UpdateEmployeeJournalRequest;
use App\Models\User;
use Illuminate\Http\Request;

    class EmployeeJournalService
    {
        private EmployeeInterface $employee;

        public function __construct(EmployeeInterface $employee)
        {
            $this->employee = $employee;
        }

        public function store(StoreEmployeeJournalRequest $request): array|bool
        {
            $data = $request->validated();
            $user = auth()->user();
            $employee = $this->employee->getByUser($user->id);

            return [
                'employee_id' => $employee->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => StatusEnum::COMPLETED->value,
            ];
        }

        public function store_api(Request $request, User $user): array|bool
        {
            $data = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            $employee = $this->employee->getByUser($user->id);

            return [
                'employee_id' => $employee->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => StatusEnum::COMPLETED->value,
            ];
        }

        public function update(UpdateEmployeeJournalRequest $request): array|bool
        {
            $data = $request->validated();
            $user = auth()->user();
            $employee = $this->employee->getByUser($user->id);

            return [
                'employee_id' => $employee->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => StatusEnum::COMPLETED->value,
            ];
        }
    }
