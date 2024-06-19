@extends('layouts.master')

@section('title', 'Edit Mata Pelajaran')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}">Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Edit Mata Pelajaran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('subjects.update', ['subject' => $subject->id]) }}" method="POST"
                            class="w-100">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name_subjects">Mata Pelajaran</label>
                                <input type="text" class="form-control @error('name_subjects') is-invalid @enderror"
                                    id="name_subjects" name="name_subjects"
                                    value="{{ old('name_subjects', $subject->name_subjects) }}" required>
                                @error('name_subjects')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <input type="text" class="form-control" id="class_id" name="class_id"
                                    value="{{ $subject->class->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Guru</label>
                                <select class="form-control @error('teacher_id') is-invalid @enderror" id="teacher_id"
                                    name="teacher_id" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ old('teacher_id', $subject->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
