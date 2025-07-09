<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing cron job pada server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Cron job pada server berjalan ' + now()->format('Y-m-d H:i:s'));
    }
}
