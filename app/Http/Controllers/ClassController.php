<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes; // Sesuaikan nama model jika berbeda
use App\Models\Teachers; // Sesuaikan nama model jika berbeda

class ClassController extends Controller
{
    public function index()
    {
        $title = "Kelas Siswa";
        $classes = Classes::all();
        return view('class.index', compact('classes', 'title'));
    }

    public function create()
    {
        $teachers = Teachers::all();
        return view('class.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Classes::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Berhasil Menambahkan Data Kelas');
    }

    public function edit(Classes $class)
    {
        $teachers = Teachers::all();
        return view('class.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, Classes $class) // Perhatikan huruf besar 'C' pada 'Classes'
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Berhasil Mengupdate Data Kelas'); // Ganti 'class' menjadi 'classes' di route
    }

    public function destroy(Classes $class)
    {
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Berhasil Menghapus Data Kelas'); // Ganti 'class' menjadi 'classes' di route
    }
}

