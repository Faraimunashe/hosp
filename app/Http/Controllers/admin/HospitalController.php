<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return view('admin.facilities', [
            'hospitals'=>$hospitals
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        $new = new Hospital();
        $new->cordidates = $request->latitude.",".$request->longitude;
        $new->name = $request->name;
        $new->address = $request->address;
        $new->save();

        return redirect()->back()->with('success', 'successfully added medical facility');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'hospital_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        $hos = Hospital::find($request->hospital_id);

        try{
            $hos->cordidates = $request->latitude.",".$request->longitude;
            $hos->name = $request->name;
            $hos->address = $request->address;
            $hos->save();
        }catch(QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'successfully updated facility');
    }

    public function delete($id)
    {
        $hospital = Hospital::find($id);

        $hospital->delete();

        return redirect()->back()->with('success', 'facility deleted successfully');
    }
}
