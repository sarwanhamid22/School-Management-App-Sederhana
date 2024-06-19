<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Students;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\TeachingSchedules;
use Illuminate\Http\Request;

class TeachingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Jadwal Guru";
        $teachingSchedules = TeachingSchedules::with('teacher', 'subject', 'class')->get();
        return view('teaching_schedules.index', compact('teachingSchedules', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Jadwal Guru";
        $teachers = Teachers::all();
        $classes = Classes::all();
        $subjects = Subject::all();

        return view('teaching_schedules.create', compact('teachers', 'classes', 'subjects', 'title'));        return view('teaching_schedules.create', compact('teachers', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'class_id' => 'required|exists:classes,id',
            'teaching_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        // Simpan jadwal mengajar
        TeachingSchedules::create([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'class_id' => $request->class_id,
            'teaching_day' => $request->teaching_day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    
        return redirect()->route('listTeachingschedules')->with('success', 'Berhasil Menambahkan Data Jadwal Mengajar Guru');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(TeachingSchedules $teachingSchedule)
    {
        $title = "Detail Jadwal Guru";
        return view('teaching_schedules.show', compact('teachingSchedule', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teachingSchedule = TeachingSchedules::with('teacher', 'class', 'subject')->findOrFail($id);
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('teaching_schedules.edit', compact('teachingSchedule', 'classes', 'subjects'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teaching_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        $teachingSchedule = TeachingSchedules::findOrFail($id);
        $teachingSchedule->update([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'teaching_day' => $request->teaching_day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    
        return redirect()->route('listTeachingschedules')->with('success', 'Berhasil Mengupdate Data Jadwal Mengajar Guru');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingSchedules $teachingSchedule)
    {
        $teachingSchedule->delete();
        return redirect()->route('listTeachingschedules')->with('success', 'Berhasil Menghapus Data Jadwal Mengajar Guru');
    }
}
