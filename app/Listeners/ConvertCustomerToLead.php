<?php

namespace App\Listeners;

use App\Events\UserActivated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConvertCustomerToLead
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
     * @param  UserActivated  $event
     * @return void
     */
    public function handle(UserActivated $event)
    {
        //
    }
}
