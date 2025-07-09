<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\Employee;
use App\Models\EmployeeJournal;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmployeeJournalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:employee-journal-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $day = Carbon::now()->format('l');
        $dateNow = Carbon::now()->format('Y-m-d');

        if($day != 'Sunday')
        {
            $employee_ids = EmployeeJournal::whereDate('created_at', $dateNow)->pluck('employee_id')->toArray();
            $employee_notYet = Employee::query()
                    ->whereRelation('user.roles', 'name', RoleEnum::STAFF->value)
                    ->whereNotin('id', $employee_ids)
                    ->get();

            foreach ($employee_notYet as $employee) {
                EmployeeJournal::create([
                    'employee_id' => $employee->id,
                    'title' => 'Kosong',
                    'description' => 'Kosong',
                    'status' => StatusEnum::NOT_COMPLETED
                ]);
            }
        }

        $this->info('Command berhasil dijalankan!');
    }
}
