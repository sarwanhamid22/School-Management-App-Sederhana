<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Imports\TeachersImport;
use App\Models\Students;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TeachingSchedules;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Pastikan meng-import model User
use Illuminate\Support\Facades\DB;




class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Profil Guru";
        $teachers = Teachers::all();
        return view('teachers.index', compact('teachers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Profil Guru";
        return view('teachers.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required|unique:teachers',
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
            'email' => 'required|email|unique:teachers,email|unique:users,email',
            'password' => 'required|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password before saving
            ];

            $user = User::create($userData);
            $user->assignRole('teacher'); // Assign role teacher

            $teacherData = $request->all();
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $teacherData['photo'] = $photoPath;
            }

            $teacherData['user_id'] = $user->id; // Assume there is a user_id column in teachers table to link to the user
            Teachers::create($teacherData);

            DB::commit();
            return redirect()->route('listTeachers')->with('success', 'Berhasil Menambahkan Data Guru');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Error: ' . $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Teachers $teacher)
    {
        $title = "Detail Profil Guru";
        return view('teachers.show', compact('teacher', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teacher)
    {
        $title = "Edit Profil Guru";
        return view('teachers.edit', compact('teacher', 'title'));
    }

    public function update(Request $request, Teachers $teacher)
    {
        // Atur aturan validasi untuk input
        $rules = [
            'name' => 'required',
            'teacher_id' => 'required|unique:teachers,teacher_id,' . $teacher->id,
            'specialization' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto opsional
        ];

        // Tambahkan aturan validasi untuk password jika diisi
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6';
        }

        // Validasi input dari request
        $request->validate($rules);

        // Ambil semua data dari request
        $data = $request->only([
            'name', 'teacher_id', 'specialization', 'phone_number', 'address', 'email',
        ]);

        // Handle password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Handle photo jika ada file baru diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($teacher->photo && Storage::exists('public/photos/' . $teacher->photo)) {
                Storage::delete('public/photos/' . $teacher->photo);
            }

            // Simpan foto baru yang diunggah
            $photoPath = $request->file('photo')->store('public/photos');
            $data['photo'] = basename($photoPath);
        }

        // Update data guru
        $teacher->update($data);

        // Redirect ke halaman daftar guru dengan pesan sukses
        return redirect()->route('listTeachers')->with('success', ' Berhasil Mengupdate Data Guru');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teacher)
    {
        // Delete related teaching schedules
        TeachingSchedules::where('teacher_id', $teacher->id)->delete();

        // Delete photo if exists
        if ($teacher->photo && File::exists(public_path('storage/photos/' . $teacher->photo))) {
            File::delete(public_path('storage/photos/' . $teacher->photo));
        }

        $teacher->delete();
        return redirect()->route('listTeachers')->with('success', 'Berhasil Menghapus Data Guru');
    }
}
