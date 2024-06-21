<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SymptomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.symptoms.index');
    }

    public function getData()
    {
        $symptom = Symptoms::all();

        return DataTables::of($symptom)->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.symptoms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Symptoms::create($data);

        return redirect()->route('symptom.index')->with('toast_success', 'Tambah Gejala Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Symptoms::findOrFail($id);

        return view('pages.symptoms.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        Symptoms::findOrFail($id)->update($data);

        return redirect()->route('symptom.index')->with('toast_success', 'Update Gejala Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Symptoms::findOrFail($id)->delete();

        return redirect()->route('symptom.index')->with('toast_success', 'Delete Gejala Successfully!');
    }
}
