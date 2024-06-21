<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Result;
use App\Models\Symptoms;
use App\Models\SymptomsDisease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DiagnoseController extends Controller
{
    public function index()
    {
        return view('pages.diagnose.index');
    }

    public function diagnose()
    {
        $symptoms = Symptoms::all();

        return view('pages.diagnose.diagnose', compact('symptoms'));
    }

    public function store(Request $request)
    {
        $symptomsIds = $request->input('symptoms');

        //Ambil nama dari id gejala
        $symptomsNames = Symptoms::whereIn('id', $symptomsIds)->pluck('name')->toArray();

        // Mendapatkan id dari penyakit
        $diseaseIds = SymptomsDisease::whereIn('symptoms_id', $symptomsIds)
            ->pluck('disease_id')
            ->unique() // Menghindari duplikasi penyakit
            ->toArray();

        $results = [];

        foreach ($diseaseIds as $diseaseId) {
            $disease = Disease::with(['symptoms' => function ($query) use ($symptomsIds) {
                $query->whereIn('symptoms.id', $symptomsIds);
            }])->find($diseaseId);

            if ($disease) {
                // Hitung total bobot gejala yang cocok
                $totalBobot = $disease->symptoms->sum('bobot');

                // Hitung jumlah gejala yang timbul dari gejala yang dipilih
                $symptomsPresent = SymptomsDisease::where('disease_id', $disease->id)->count();

                // Hitung persentase gejala yang timbul dari total gejala penyakit
                $totalSymptoms = $disease->symptoms->count();
                $percentage = ($totalSymptoms / $symptomsPresent) * 100;

                // Simpan hasil
                $results[] = [
                    'disease_id' => $disease->id,
                    'disease_name' => $disease->name,
                    'total_bobot' => $totalBobot,
                    'percentage' => $percentage,
                ];
            }
        }

        $sortedResults = collect($results)->sortByDesc('total_bobot')->sortByDesc('percentage')->values()->all();

        $topResult = reset($sortedResults);

        $diseaseTop = Disease::findOrFail($topResult['disease_id']);

        $userId = Auth::id();

        Result::create([
            'user_id' => $userId,
            'symptoms' => json_encode($symptomsNames),
            'disease' =>  $topResult['disease_name'],
            'solution' =>  $diseaseTop['solution'],
            'percentage' => $topResult['percentage'],
        ]);

        return redirect()->route('diagnose-result', [
            'solution' => $diseaseTop->solution,
            'disease_name' => $topResult['disease_name'],
            'total_bobot' => $topResult['total_bobot'],
            'percentage' => $topResult['percentage'],
            'symptoms' => $symptomsNames,
        ]);
    }

    public function diagnoseResult(Request $request)
    {
        $solution = $request->input('solution');
        $diseaseName = $request->input('disease_name');
        $percentage = $request->input('percentage');
        $symptoms = $request->input('symptoms');

        // Tampilkan view diagnose-result.blade.php dengan data hasil diagnosa
        return view('pages.diagnose.result', compact('solution', 'diseaseName', 'percentage', 'symptoms'));
    }

    public function history(){
        return view('pages.diagnose.history');
    }

    public function getData()
    {
        $data = Result::where('user_id', Auth::user()->id)->get();

        return DataTables::of($data)->make(true);
    }

    public function historyDetail($result_id){
        $data = Result::findOrFail($result_id);
        $symptoms = json_decode($data->symptoms);

        return view('pages.diagnose.history-detail', compact('data', 'symptoms'));
    }
}
