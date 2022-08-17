<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Collect;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    public function index()
    {
        $colls = Collect::all();

        return view('admin.collect', [
            'collections' => $colls
        ]);
    }
}
