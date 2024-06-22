<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Yajra\DataTables\DataTables;

class HistoryController extends Controller
{
    public function index(){
        return view('pages.history.index');
    }

    public function getData()
    {
        $result = Result::with(['user'])->get();

        return DataTables::of($result)->make(true);
    }

    public function detail($result_id){
        $data = Result::findOrFail($result_id);
        $symptoms = json_decode($data->symptoms);

        return view('pages.history.detail', compact('data', 'symptoms'));
    }
}
