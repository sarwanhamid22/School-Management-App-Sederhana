<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\Students;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = " Kehadiran Siswa";
        $attendances = Attendances::with('student')->get();
        return view('attendances.index', compact('attendances', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Kehadiran Siswa";
        $students = Students::with('class')->get(); // Load the class relationship
        return view('attendances.create', compact('students', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Excused',
        ]);

        Attendances::create($request->all());
        return redirect()->route('listAttendances')->with('success', 'Berhasil Menambahkan Data Kehadiran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendances $attendance)
    {
        $title = "Detail Kehadiran Siswa";
        return view('attendances.show', compact('attendance', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendances $attendance)
    {
        $title = "Edit Kehadiran Siswa";
        $students = Students::with('class')->get(); // Load the class relationship
        return view('attendances.edit', compact('attendance', 'students', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendances $attendance)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Excused',
        ]);

        $attendance->update($request->all());
        return redirect()->route('listAttendances')->with('success', 'Berhasil Mengupdate Data Kehadiran ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendances $attendance)
    {
        $attendance->delete();
        return redirect()->route('listAttendances')->with('success', 'Berhasil Menghapus Data Kehadiran');
    }
}
