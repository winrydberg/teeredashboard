<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\SMSNotification;

use App\Applicant;


class ProcessSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 5;

    public $applicant;
    public $to;
    public $message;

    public function __construct(Applicant $applicant, $message)
    {
        $this->applicant = $applicant;
        $this->to = $applicant->phoneno;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        $phoneno = $this->to;
        $message =$this->message;

        $this->applicant->notify(new SMSNotification($this->applicant,''.$phoneno, $message));
    }
}
