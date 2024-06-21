<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Symptoms;
use App\Models\SymptomsDisease;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.disease.index');
    }

    public function getData()
    {
        $cafe = Disease::all();

        return DataTables::of($cafe)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $symptoms = Symptoms::all();

        return view('pages.disease.create', compact('symptoms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $disease = Disease::create($data);

        foreach ($data['symptom_disease'] as $item) {
            SymptomsDisease::create([
                'disease_id' => $disease->id,
                'symptoms_id' => $item,
            ]);
        }

        return redirect()->route('disease.index')->with('toast_success', 'Tambah Penyakit Successfully!');
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
        $data = Disease::findOrFail($id);
        $symptoms = Symptoms::all();
        $symptomDisease = SymptomsDisease::where('disease_id', $id)->pluck('symptoms_id')->toArray();

        return view('pages.disease.edit', compact('data', 'symptomDisease', 'symptoms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        Disease::findOrFail($id)->update($data);

        SymptomsDisease::where('disease_id', $id)->delete();

        if ($request['symptom_disease']) {
            foreach ($data['symptom_disease'] as $item) {
                SymptomsDisease::create([
                    'disease_id' => $id,
                    'symptoms_id' => $item,
                ]);
            }
        }

        return redirect()->route('disease.index')->with('toast_success', 'Update Penyakit Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Disease::findOrFail($id)->delete();

        return redirect()->route('disease.index')->with('toast_success', 'Delete Penyakit Successfully!');
    }
}
