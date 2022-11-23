<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserPackage;

use Twilio\Rest\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendDueRemider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:due:reminder';

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
            ->with('user')->get();

        $sid = env('TWILIO_ID', '');
        $token = env('TWILIO_SECRET', '');

        $client = new Client($sid, $token);

        foreach ($userPackages as $key => $value) {
            try {
                echo "send email to " . $value->user->email . " !!\r\n";

                //should send email and sms notification here
                $details = [
                    'title' => 'Your Subscription About to ended',
                    'body' => 'Hi, your subscription will end at ' . date("Y-m-d", strtotime($value->expired_date))
                ];
                \Mail::to($value->user->email)->send(new \App\Mail\DueEMail($details));
                \Log::channel('due-subscription-email')->info("email sent to " . $value->user->email);
            } catch (\Throwable $th) {
                \Log::channel('due-subscription-email')->error($th);
            }


            try {
                echo "send sms to " . $value->user->phone_number . " !!\r\n";

                $client->messages->create(
                    $value->user->phone_number, // Text this number
                    [
                        'from' => env('TWILIO_PHONE_NUMBER', ''),
                        'body' => 'Hi ' . $value->user->name . ', your subscription is baout to ended'
                    ]
                );
                \Log::channel('due-subscription-sms')->info("sms sent to " . $value->user->email);
            } catch (\Throwable $th) {
                \Log::channel('due-subscription-sms')->error($th);
            }
        }
        return Command::SUCCESS;
    }
}
