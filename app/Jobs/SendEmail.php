<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Mail\Mailable;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $adddata;
    public $useraccess;
 
    public function __construct($adddata,$useraccess)
    {
        $this->adddata=$adddata;
        $this->useraccess=$useraccess;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adddata=$this->adddata;
        $useraccess=$this->useraccess;

        Mail::to($adddata->email)->send(new WelcomeEmail($adddata,$useraccess));

    }
}
