<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ForecastingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Drug::paginate(15);
        return view('forecasting.index', compact('drugs'));
    }

    function getDrugOutsCSV($drugId)
    {
        return DB::table('drugout')
        ->select(DB::raw('YEAR(created_at) as tahun, MONTH(created_at) as bulan, SUM(quantity) as total_keluar'))
        ->where('drug_id', $drugId)
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();
    }

    function generateCsvForDrug($drugId)
    {
        $drugName = DB::table('drugs')->where('id', $drugId)->value('name');
        $data = $this->getDrugOutsCSV($drugId);

        $filename = "obat_keluar_{$drugId}.csv";
        $handle = fopen(storage_path('app/' . $filename), 'w');

        // Hapus file jika sudah ada
        if (file_exists($filename)) {
            unlink($filename);
        }

        // Header CSV
        fputcsv($handle, ['Tahun', 'Bulan', 'Jumlah Keluar']);

        // Isi CSV
        foreach ($data as $row) {
            fputcsv($handle, [$row->tahun, $row->bulan, $row->total_keluar]);
        }

        fclose($handle);

        return $filename;
    }

    // public function generateForecast($drugId)
    // {
    //     // Generate the CSV file
    //     $filename = $this->generateCsvForDrug($drugId);

    //     // Path to Python script
    //     $pythonScript = storage_path('app/scripts/forecasting.py');
    //     print_r($pythonScript);


    //     $command = "python3 $pythonScript";
    //     exec($command, $output, $return_var);
    //     logger()->error('Python script output: ' . implode("\n", $output));
    //     logger()->error('Return status: ' . $return_var);

    //     if ($return_var === 0) {
    //         // Forecasting successful
    //         $forecastFilename = 'forecast_results.csv';
    //         // Handle the forecast results (e.g., return as response, save to storage, etc.)
    //         return response()->download(storage_path('app/' . $forecastFilename));
    //     } else {
    //         // Handle errors
    //         return response()->json(['error' => 'Forecasting failed'], 500);
    //     }
    // }

    public function generateForecast($drugId)
    {
        // putenv("PATH=" . getenv("PATH") . ";C:\Users\USER\AppData\Local\Microsoft\WindowsApps;C:\Users\USER\AppData\Local\Microsoft\WindowsApps");
        // Generate the CSV file
        $filename = $this->generateCsvForDrug($drugId);

        // Path to Python executable, script, and input CSV
        $pythonPath = 'C:\Users\USER\myenv\Scripts\python.exe';
        $pythonScript = storage_path('app/scripts/forecasting.py');
        $inputCsv = storage_path('app/' . $filename);

        // Create a new Process
        $process = new Process([
            $pythonPath,
            $pythonScript,
            $inputCsv
        ]);

        $process->setWorkingDirectory(storage_path('app/scripts'));

        try {
            $process->mustRun();

            // Forecasting successful
            $output = $process->getOutput();
            logger()->info('Python script output: ' . $output);

            $forecastFilename = 'forecast_results.csv';
            // Handle the forecast results (e.g., return as response, save to storage, etc.)
            return response()->download(storage_path('app/' . $forecastFilename));
        } catch (ProcessFailedException $exception) {
            // Handle errors
            logger()->error('Python script error: ' . $exception->getMessage());
            logger()->error('Python script error output: ' . $process->getErrorOutput());
            return response()->json(['error' => 'Forecasting failed: ' . $exception->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
