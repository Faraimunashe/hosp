<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        return view('user.dashboard',[
            'patient' => $patient
        ]);
    }
}
