<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MailController;
use App\Application;

class RegistryMailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica o admin sobre novas aplicações de emprego duas vezes ao dia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $applications = Application::where('application_status_id', 1)->get();

        $count = count($applications);

        if ($count > 0) {
            MailController::notify($count);
        }

    }

    protected function schedule(Schedule $schedule)
   {
       $schedule->command('hour:update')
                ->twiceDaily(12, 18);
   }
}
