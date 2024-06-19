<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Classes;
use App\Models\Teachers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected $fillable = [
        'name',
        'student_id',
        'class',
        'birth_date',
        'address',
        'phone_number',
        'email',
        'password',
        'photo',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Profil Siswa";
        $students = Students::with('class')->get(); // Eager load relasi 'class'
        return view('students.index', compact('students', 'title'));
    }

    public function create()
    {
        $title = "Tambah Profil Siswa";
        $classes = Classes::all(); // Ambil semua data kelas
        return view('students.create', compact('title', 'classes'));
    }

    public function store(Request $request)
    {
        // Debugging: Lihat semua data yang dikirimkan
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students',
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'nullable|email|unique:students|unique:users,email',
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password') ? Hash::make($request->password) : null,
            ];

            // Buat pengguna jika email dan password diisi
            $user = null;
            if ($request->filled('email') && $request->filled('password')) {
                $user = User::create($userData);
                $user->assignRole('student'); // Assign role student
            }

            // Siapkan data untuk tabel students
            $data = $request->only([
                'name', 'student_id', 'birth_date', 'address', 'phone_number', 'email'
            ]);
            $data['class_id'] = $request->input('class'); // Convert 'class' to 'class_id'
            $data['user_id'] = $user ? $user->id : null; // Assign user_id if user was created

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $data['photo'] = $photoPath;
            }

            Students::create($data);

            DB::commit();
            return redirect()->route('listStudents')->with('success', 'Berhasil Menambahkan Data Siswa');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        $title = "Detail Profil Siswa";
        return view('students.show', compact('student', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $student)
    {
        $title = "Edit Profil Siswa";
        $classes = Classes::all(); // Pastikan Anda mendapatkan semua kelas
        return view('students.edit', compact('student', 'title', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $student)
    {
        $rules = [
            'name' => 'required',
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'class' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Validasi password hanya jika ada input baru
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6';
        }

        $request->validate($rules);

        // Ambil data dari request
        $data = $request->only([
            'name', 'student_id', 'class', 'birth_date', 'address', 'phone_number', 'email'
        ]);

        // Handle password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); // Hapus password dari data jika tidak ada input baru
        }

        // Handle photo
        if ($request->hasFile('photo')) {
            // Upload dan simpan foto baru
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/photos', $photoName);
            $data['photo'] = $photoName;

            // Hapus foto lama jika ada
            if ($student->photo) {
                Storage::delete('public/photos/' . $student->photo);
            }
        }

        // Update data siswa
        $student->update($data);

        return redirect()->route('listStudents')->with('success', 'Berhasil Mengupdate Data Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student)
    {
        $student->delete();

        return redirect()->route('listStudents')->with('success', 'Berhasil Menghapus Data Siswa');
    }
}
