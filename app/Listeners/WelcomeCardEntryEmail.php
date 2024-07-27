<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeCardEntryEmail as WelcomeCardEntry;
use Mail;

class WelcomeCardEntryEmail
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
    public function handle(object $event): void
    {
        $data = $event->data;
    
        Mail::to($data->email)->send(new WelcomeCardEntry($data));
    }
}
