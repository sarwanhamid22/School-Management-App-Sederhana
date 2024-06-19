<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;
use App\Models\Teachers;
use App\Models\TeachingSchedules;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
    public function index()
    {
        $title = "Mata Pelajaran";
        $subjects = Subject::with('class', 'teacher')->get();
        return view('subjects.index', compact('subjects', 'title'));
    }

    public function create()
    {
        $classes = Classes::all();
        $teachers = Teachers::all();
        return view('subjects.create', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_subjects' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Subject::create([
            'name_subjects' => $request->name_subjects,
            'class_id' => $request->class_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Berhasil Menambahkan Mata Pelajaran');
    }

    public function edit(Subject $subject)
    {
        $classes = Classes::all();
        $teachers = Teachers::all();
        return view('subjects.edit', compact('subject', 'classes', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name_subjects' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $subject->update([
            'name_subjects' => $request->name_subjects,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Berhasil Mengupdate Data Mata Pelajaran');
    }

    public function destroy($id)
    {
        // Begin a transaction
        DB::beginTransaction();
    
        try {
            $subject = Subject::findOrFail($id);
    
            // Delete related records in teaching_schedules
            TeachingSchedules::where('subject_id', $id)->delete();
    
            // Now delete the subject
            $subject->delete();
    
            // Commit the transaction
            DB::commit();
    
            return redirect()->route('subjects.index')->with('success', 'Berhasil Menghapus Data Mata Pelajaran');
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();
    
            return redirect()->route('subjects.index')->with('error', 'Gagal Menghapus Data Mata Pelajaran: ' . $e->getMessage());
        }
    }
}
