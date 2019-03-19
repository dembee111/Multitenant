<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\Tenant\Migrate',
        'App\Console\Commands\Tenant\MigrateRollback',
        'App\Console\Commands\Tenant\Seed',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('command:deletedtopics')
        //          ->hourly();
        // //  $schedule->call(function () {
        // //     DB::table('topics')->where('view_count', '<', 2)->delete();
        // // })->everyMinute();
        // // $schedule->exec('php artisan your:command')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
