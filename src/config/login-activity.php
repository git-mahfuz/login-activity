<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Email Settings for Failed Login Attempts Event
    |--------------------------------------------------------------------------
    |
    | If you want to  send email for multiple failed login attempts set mail_for_failed_login_attempts to true,
    | if not false otherwise.
    |
    */

    'multiple_failed_login_attempt_email'    => false,

    /*
    |--------------------------------------------------------------------------
    | Settings for Multiple Failed Login Attempt
    |--------------------------------------------------------------------------
    |
    | Once multiple_failed_login_attempt_email is set to true you need to set 'no_of_attempts' and 'in_minutes' as integer value.
    | For example: Let's say value of 'no_of_attempts' is 3 and 'in_minutes' is 15 means if there are
    | 3 failed login attempts to an account in last 15 minutes it will notify respective user via email
    | about this suspicious activity.
    |
    */

    'multiple_failed_login_attempt_email_settings' => [
        'no_of_attempts'    =>  3,
        'in_minutes'        =>  15
    ]

];