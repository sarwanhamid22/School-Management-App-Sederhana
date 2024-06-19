<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function index()
    {
        $title = "Penilaian Sekolah";
        // Menampilkan daftar report (untuk admin)
        $reports = Report::all();
        return view('reports.index', compact('reports', 'title'));
    }

    public function create()
    {
        $title = "Tambah Suara Siswa";
        $reports = Report::all();
        return view('reports.create', compact('reports', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Report::create([
            'content' => $request->content,
        ]);

        return redirect()->route('reports.create')->with('success', 'Berhasil Menambahkan Data Laporan');
    }

    public function destroyAll()
    {
        DB::table('reports')->delete();
        
        return redirect()->route('reports.index')->with('success', 'Berhasil Menghapus Semua Data Laporan');
    }

}
