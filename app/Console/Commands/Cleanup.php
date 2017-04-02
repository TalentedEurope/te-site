<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ValidationRequest;
use App\Models\ValidatorInvite;
use App\Models\Company;
use App\Models\Validator;
use App\Models\Alert;
use App\Notifications\NewAlerts;
use App\Notifications\ValidationsPending;

class Cleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Does the cleanup and other daily tasks for Talented Europe entities';

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
        ValidationRequest::cleanup();
        ValidatorInvite::cleanup();
        $validators = Validator::whereHas('user', function ($query) {
            $query->where('notify_me', true);
        })->whereHas('validationRequest')->get();
        $alerts = Alert::get();
        foreach ($validators as $val) {
            $val->user->notify(new ValidationsPending($val->user));
        }
        foreach ($alerts as $al) {
            $al->target->notify(new NewAlerts($al->target));
        }
    }
}
