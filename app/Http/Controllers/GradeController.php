<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Students;
use App\Models\Subject; // Pastikan Anda menggunakan Subject, bukan Subjects
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Nilai Siswa";
        $grades = Grades::with(['student', 'subject'])->get();
        return view('grades.index', compact('grades', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Nilai Siswa";
        $students = Students::with('class')->get();
        $subjects = Subject::all();
        return view('grades.create', compact('students', 'subjects', 'title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id', // Ensure subject_id is validated correctly
            'grade' => 'required|numeric|between:0,100',
        ]);

        // Process to store grade
        Grades::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'grade' => $request->grade,
        ]);

        return redirect()->route('listGrades')->with('success', 'Berhasil Menambahkan Data Nilai');
    }


    /**
     * Display the specified resource.
     */
    public function show(Grades $grade)
    {
        $title = "Detail Nilai Siswa";
        return view('grades.show', compact('grade', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grades $grade)
    {
        $title = "Edit Nilai Siswa";
        $students = Students::all();
        $subjects = Subject::all(); // Ambil semua subjek dari tabel subjects
        return view('grades.edit', compact('grade', 'students', 'subjects', 'title'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grades $grade)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id', // Validasi subjek menggunakan exists:subjects,id
            'grade' => 'required|numeric|between:0,100',
        ]);

        // Ambil data dari request
        $data = $request->only(['student_id', 'subject_id', 'grade']);

        // Update record menggunakan metode update
        $grade->update($data);

        return redirect()->route('listGrades')->with('success', 'Berhasil Mengupdate Data Nilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grades $grade)
    {
        $grade->delete();

        return redirect()->route('listGrades')->with('success', 'Berhasil Menghapus Data Nilai');
    }
}
