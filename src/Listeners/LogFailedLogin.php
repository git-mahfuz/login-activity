<?php

namespace Mahfuz\LoginActivity\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mahfuz\LoginActivity\Models\LoginActivity;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        try {

            if(is_null($event->user)) return 0;

            LoginActivity::create([
                'type'          =>  'Failed Login Attempt',
                'user_id'       =>  $event->user->id,
                'ip_address'    =>  \Illuminate\Support\Facades\Request::ip(),
                'user_agent'    =>  \Illuminate\Support\Facades\Request::header('User-Agent')
            ]);

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
