<?php

namespace App\Listeners;

use App\Events\MemberRegistered;
use App\Mail\SendGreetingMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendGreeting
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MemberRegistered  $event
     * @return void
     */
    public function handle(MemberRegistered $event)
    {
        Mail::to('test@gmail.com')->send(new SendGreetingMail);
    }
}
