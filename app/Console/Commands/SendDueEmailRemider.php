<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserPackage;

class SendDueEmailRemider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:email:reminder:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userPackages = UserPackage::where('expired_date', '<', date('Y-m-d', strtotime('+7 days')))
            ->get();
        foreach ($userPackages as $key => $value) {
            echo $value->expired_date . "\r\n";
        }
        return Command::SUCCESS;
    }
}
