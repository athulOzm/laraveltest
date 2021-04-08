<?php

namespace App\Listeners;

use App\Events\MemberRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIdCard
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
        //
    }
}
