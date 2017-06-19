<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\ProfileNotFilled;
use App\Models\User;

class WeeklyTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs weekly tasks';

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
        $fillAlerts = User::where('is_filled', false)->where('notify_me', true)->get();

        foreach ($fillAlerts as $fal) {
            $fal->notify(new ProfileNotFilled($fal));
        }
    }
}
