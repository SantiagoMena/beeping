<?php

namespace App\Console\Commands;

use App\Jobs\ProcessExecuteTotal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExecutedCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'execute:total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Guardar el total en la executed, usando el endpoint /api/executed/create';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ProcessExecuteTotal::dispatch();
    }
}
