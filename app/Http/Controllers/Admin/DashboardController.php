<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $diagnoseDisease = Result::all();
        $disease = Result::select('disease', DB::raw('count(*) as count'))
                           ->groupBy('disease')
                           ->get();

        return view('pages.dashboard', compact('disease'));
    }
}
