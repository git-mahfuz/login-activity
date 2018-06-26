<?php

namespace Mahfuz\LoginActivity\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mahfuz\LoginActivity\Models\LoginActivity;

class LoginActivityController extends Controller
{
    public function index()
    {
        $activities = LoginActivity::whereUserId(auth()->user()->id)->latest()->paginate(10);

        return view('login-activity::login-activity', compact('activities'));
    }
}
