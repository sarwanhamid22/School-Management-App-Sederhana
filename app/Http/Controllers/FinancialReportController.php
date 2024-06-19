<?php

namespace App\Http\Controllers;

use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class FinancialReportController extends Controller
{
    public function index()
    {
        $reports = FinancialReport::all();
        return view('financial-reports.index', compact('reports'));
    }

    public function create()
    {
        return view('financial-reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'report_date' => 'required|date',
            'expense' => 'required|numeric',
            'income' => 'required|numeric',
        ]);

        FinancialReport::create($validated);

        return redirect()->route('financial-reports.index')->with('success', 'Laporan keuangan berhasil dibuat.');
    }

    public function edit($id)
    {
        $financialReport = FinancialReport::findOrFail($id);
        return view('financial-reports.edit', compact('financialReport'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'report_date' => 'required|date',
            'expense' => 'required|numeric',
            'income' => 'required|numeric',
        ]);
    
        $financialReport = FinancialReport::findOrFail($id);
        $financialReport->update($validated);
    
        return redirect()->route('financial-reports.index')->with('success', 'Laporan keuangan berhasil diperbarui.');
    }

    public function show($id)
    {
        $financialReport = FinancialReport::findOrFail($id);
        return view('financial-reports.show', compact('financialReport'));
    }

    public function destroy($id)
    {
        $financialReport = FinancialReport::findOrFail($id);
        $financialReport->delete();
    
        return redirect()->route('financial-reports.index')->with('success', 'Laporan keuangan berhasil dihapus.');
    }

    public function print()
    {
        return view('financial-reports.print');
    }

    public function printReports(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        
        $reports = FinancialReport::whereYear('report_date', $year)
                                  ->whereMonth('report_date', $month)
                                  ->get();
        
        return view('financial-reports.print-reports', compact('reports', 'month', 'year'));
    }

   public function printPdf(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');
    
    $reports = FinancialReport::whereYear('report_date', $year)
                              ->whereMonth('report_date', $month)
                              ->get();
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml(view('financial-reports.pdf', compact('reports', 'month', 'year'))->render());
    
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Menampilkan PDF di browser tanpa memaksa unduhan
    return $dompdf->stream('financial-reports-' . $month . '-' . $year . '.pdf', ["Attachment" => false]);
}

}
