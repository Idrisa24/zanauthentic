<?php

namespace App\Listeners;

use App\Events\EnqueryProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEqueryNotification
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
     * @param  EnqueryProcessed  $event
     * @return void
     */
    public function handle(EnqueryProcessed $event)
    {
        //
    }
}
