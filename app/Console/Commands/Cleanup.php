<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ValidationRequest;
use App\Models\ValidatorInvite;
use App\Models\Company;
use App\Models\User;
use App\Models\Validator;
use App\Models\Alert;
use App\Notifications\MobileValidationPending;
use App\Notifications\NewAlerts;
use App\Notifications\ProfileNotFilled;
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
        $alerts = Alert::groupBy('target_id')->get();
        $validators = Validator::whereHas('user', function ($query) {
            $query->where('notify_me', true);
        })->whereHas('validationRequest.student.user', function ($f) {
            $f->where('valid', '!=', 'validated');
        })->get();


        $validators = ValidationRequest::with('validator.user')->whereHas('student', function ($query) { $query->where('valid', 'pending'); })->get()->map(function($item) {
            return $item->validator;
        });

        foreach ($validators as $val) {
            if ($val && $val->user && $val->user->notify_me == 1 && $val->user->enabled == 1) {
                $val->user->notify(new ValidationsPending($val->user));
                $val->user->notify(new MobileValidationPending($val->user));
            }
        }

        foreach ($alerts as $al) {
            if ($al->target->notify_me) {
                $al->target->notify(new NewAlerts($al->target));
            }
        }
    }
}
