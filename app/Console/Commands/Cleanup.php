<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ValidationRequest;
use App\Models\ValidatorInvite;

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
    protected $description = 'Does the cleanup for Talented Europe entities';

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
    }
}
