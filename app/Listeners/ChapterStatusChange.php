<?php

namespace App\Listeners;


// use App\Mail\ChapterStatus;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

use App\Mail\ChapterStatusMail;
use App\Events\ChapterStatus; // Import the correct event class
use App\Jobs\ChapterStatusChange as JobsChapterStatusChange;
use Illuminate\Support\Facades\Log;

class ChapterStatusChange
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ChapterStatus $event): void
    {
        Log::info($event->chapter);
        
        $chapter = $event->chapter;
        $email = session('email'); // Retrieve the email from the session
        Mail::to($email)->send(new ChapterStatusMail($chapter));
        // JobsChapterStatusChange::dispatch($chapter,$chapterstatus);
        }
}



