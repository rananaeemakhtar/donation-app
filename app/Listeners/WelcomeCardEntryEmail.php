<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeCardEntryEmail as WelcomeCardEntry;
use Illuminate\Support\Facades\Log;
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

        Log::info("Sending welcome card entry email to: ". $data['email']);
    
        Mail::to(env('ADMIN_EMAIL'))->send(new WelcomeCardEntry($data));
    }
}
