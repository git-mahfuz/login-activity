<?php

namespace Mahfuz\LoginActivity\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mahfuz\LoginActivity\Mail\FailedLoginMailable;
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

            if( config('login-activity.multiple_failed_login_attempt_email') == true )
                $this->sendEmailForFailedLoginAttempts($event);

        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Send Email for Failed Login Attempts
     *
     * @param Failed $event
     */
    protected function sendEmailForFailedLoginAttempts(Failed $event)
    {
        $no_of_attempts = config('login-activity.multiple_failed_login_attempt_email_settings.no_of_attempts');
        $in_minutes = config('login-activity.multiple_failed_login_attempt_email_settings.in_minutes');

        $totalFailedAttemptInNMinutes = LoginActivity::whereUserId($event->user->id)
            ->whereType('Failed Login Attempt')
            ->whereRaw("created_at > date_sub(now(), interval {$in_minutes} minute)")
            ->count();

        if($totalFailedAttemptInNMinutes >= $no_of_attempts) {

            $attempts = LoginActivity::whereUserId($event->user->id)
                        ->whereType('Failed Login Attempt')
                        ->whereRaw("created_at > date_sub(now(), interval {$in_minutes} minute)")
                        ->limit(5)->get();

            Mail::to($event->user->email)->send(new FailedLoginMailable($attempts));
        }
    }
}
