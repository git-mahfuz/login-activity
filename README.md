# Laravel Login Activity

##### This package will save successful login, failed login attempt and logout activity of user

###### Features:
 * Logging Successful Login Event with IP and User Agent Information.
 * Logging Logout Event with IP and User Agent Information.
 * Logging Failed Login Events with IP and User Agent Information.
 * Sending Email to User Upon Multiple Failed Login Attempts to Their Account On a Certain Time Interval to let them know about suspicious activity in their account.

## Installation instructions for Laravel 5.3.*

Considering ```user_id``` as your ```primary column``` of ```users``` table follow below steps to install this package  -

##### 1. Installation 

Install the package by running below command in your terminal -
  
```composer require mahfuz/login-activity:dev-master```

##### 2. Adding Servicer Provider to Providers Array

Add below Service Provider in your ``providers`` array of ```config/app.php``` file

```Mahfuz\LoginActivity\LoginActivityServiceProvider::class,```

##### 3. Running Migrations

Run ```php artisan migrate``` in your terminal. This will run a migration file required to make this project work which will create a table name ```login_activities``` in your database.

##### 4. Adding Event Listeners

Add below event listeners to ```$listen``` array  of ```app/Providers/EventServiceProvider.php```

```$xslt
'Illuminate\Auth\Events\Login' => [
    'Mahfuz\LoginActivity\Listeners\LogSuccessfulLogin',
],

'Illuminate\Auth\Events\Failed' => [
    'Mahfuz\LoginActivity\Listeners\LogFailedLogin',
],

'Illuminate\Auth\Events\Logout' => [
    'Mahfuz\LoginActivity\Listeners\LogSuccessfulLogout',
],
```

##### 5. Accessing Routes and Views

To view login activities visit this URL ```http://localhost:8000/login-activity```.

*** Please note that ```url('login-activity')``` is protected by ```auth``` middleware. So, only logged in user can able to browse this route path.

##### 6. Publishing Views, Migrations and Config files

Go to your project root via terminal and run ```php artisan vendor:publish``` 

Once done check ```config/login-activity.php```,  you can configure it to whether send email upon 'X' failed login attempts in last 'N' minutes or not.

Also check ```resources/views/vendor/login-activity``` if you want to update login activity view and failed login attempt email view.

That's all.


##### Sample View:
![Alt text](sample-view.png?raw=true "Login Activities")


##### Happy Coding! #####
