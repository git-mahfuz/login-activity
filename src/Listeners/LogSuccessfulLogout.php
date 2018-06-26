<?php

namespace Mahfuz\LoginActivity\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mahfuz\LoginActivity\Models\LoginActivity;

class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        try {

            LoginActivity::create([
                'type'          =>  'Logged Out',
                'user_id'       =>  $event->user->id,
                'ip_address'    =>  \Illuminate\Support\Facades\Request::ip(),
                'user_agent'    =>  \Illuminate\Support\Facades\Request::header('User-Agent')
            ]);

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
