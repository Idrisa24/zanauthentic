<?php

namespace App\Listeners;

use App\Events\ContactProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactNotification
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
     * @param  ContactProcessed  $event
     * @return void
     */
    public function handle(ContactProcessed $event)
    {
        //
    }
}
