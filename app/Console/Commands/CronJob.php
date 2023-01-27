<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add New User Using Cron Job';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data['name'] = 'Kaushal Parekh';
        $data['email'] = 'kkaushal8511'.time().'@gmail.com';
        $data['password'] = Hash::make('123');
        $data['created_at'] = now()->format('Y-m-d H:i:s');
        $data['updated_at'] = now()->format('Y-m-d H:i:s');
        DB::table('users')->insert($data);
        $this->info('Success');
    }
}
