<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChapterStatus;
use App\Mail\ChapterStatusMail;
use Illuminate\Support\Facades\Log;

class ChapterStatusChange implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $chapter;
    public $chapterstatus;
    public function __construct($chapter,$chapterstatus)
    {
        Log::info($this->chapter);
        Log::info($this->chapterstatus);
        $this->chapter=$chapter;
        $this->chapterstatus=$chapterstatus;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $chapter=$this->chapter;
        $chapterstatus=$this->chapterstatus;
        $email = session('email'); // Retrieve the email from the session
        Mail::to($email)->send(new ChapterStatusMail($chapter,$chapterstatus));
    }
}
