<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Collect;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('admin.patients', [
            'patients' => $patients
        ]);
    }

    public function collect(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'quantity' => 'required|string'
        ]);

        $coll = new Collect();
        $coll->user_id = $request->user_id;
        $coll->attend_by = Auth::id();
        $coll->quantity = $request->quantity;
        $coll->save();

        return redirect()->back()->with('success', 'you have successfully added collection.');
    }
}
