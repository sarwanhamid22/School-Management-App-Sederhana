<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeachingScheduleController;
use App\Http\Controllers\FinancialReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::post('/notification/store', [HomeController::class, 'storeNotification'])->middleware('role:admin')->name('store.notification');
    Route::delete('/notification/{id}', [HomeController::class, 'deleteNotification'])->middleware('role:admin')->name('delete.notification');
    Route::post('/events', [EventController::class, 'store'])->middleware('role:admin')->name('events.store');
    Route::get('/events', [EventController::class, 'fetchEvents'])->name('events.fetch');
    Route::delete('/events/delete-all', [EventController::class, 'deleteAllEvents'])->middleware('role:admin')->name('events.delete.all');

    // Student Routes
    Route::get('/students', [StudentController::class, 'index'])->middleware('role:admin|student')->name('listStudents');
    Route::get('/students/create', [StudentController::class, 'create'])->middleware('role:admin')->name('createStudents');
    Route::post('/students', [StudentController::class, 'store'])->middleware('role:admin')->name('storeStudents');
    Route::get('/students/{student}', [StudentController::class, 'show'])->middleware('role:admin|student')->name('showStudents');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->middleware('role:admin')->name('editStudents');
    Route::put('/students/{student}', [StudentController::class, 'update'])->middleware('role:admin')->name('updateStudents');
    Route::delete('/students/{student}/delete', [StudentController::class, 'destroy'])->middleware('role:admin')->name('deleteStudents');
    Route::post('/students/importStudents', [StudentController::class, 'importStudents'])->middleware('role:admin')->name('importStudents');

    // Teacher Routes
    Route::get('/teachers', [TeacherController::class, 'index'])->middleware('role:admin|teacher')->name('listTeachers');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->middleware('role:admin')->name('createTeachers');
    Route::post('/teachers', [TeacherController::class, 'store'])->middleware('role:admin')->name('storeTeachers');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->middleware('role:admin|teacher')->name('showTeachers');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->middleware('role:admin')->name('editTeachers');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->middleware('role:admin')->name('updateTeachers');
    Route::delete('/teachers/{teacher}/delete', [TeacherController::class, 'destroy'])->middleware('role:admin')->name('deleteTeachers');
    Route::post('/teachers/importTeachers', [TeacherController::class, 'importTeachers'])->middleware('role:admin')->name('importTeachers');

    // Attendance Routes
    Route::get('/attendances', [AttendanceController::class, 'index'])->middleware('role:admin|student')->name('listAttendances');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->middleware('role:admin')->name('createAttendances');
    Route::post('/attendances', [AttendanceController::class, 'store'])->middleware('role:admin')->name('storeAttendances');
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show'])->middleware('role:admin|student')->name('showAttendances');
    Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->middleware('role:admin|student')->name('editAttendances');
    Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->middleware('role:admin|student')->name('updateAttendances');
    Route::delete('/attendances/{attendance}/delete', [AttendanceController::class, 'destroy'])->middleware('role:admin')->name('deleteAttendances');

    // Grade Routes
    Route::get('/grades', [GradeController::class, 'index'])->middleware('role:admin|teacher|student')->name('listGrades');
    Route::get('/grades/create', [GradeController::class, 'create'])->middleware('role:admin|teacher')->name('createGrades');
    Route::post('/grades', [GradeController::class, 'store'])->middleware('role:admin|teacher')->name('storeGrades');
    Route::get('/grades/{grade}', [GradeController::class, 'show'])->middleware('role:admin|teacher|student')->name('showGrades');
    Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->middleware('role:admin|teacher')->name('editGrades');
    Route::put('/grades/{grade}', [GradeController::class, 'update'])->middleware('role:admin|teacher')->name('updateGrades');
    Route::delete('/grades/{grade}/delete', [GradeController::class, 'destroy'])->middleware('role:admin')->name('deleteGrades');

    // Teaching Schedule Routes
    Route::get('/teaching_schedules', [TeachingScheduleController::class, 'index'])->middleware('role:admin|teacher')->name('listTeachingschedules');
    Route::get('/teaching_schedules/create', [TeachingScheduleController::class, 'create'])->middleware('role:admin')->name('createTeachingschedules');
    Route::post('/teaching_schedules', [TeachingScheduleController::class, 'store'])->middleware('role:admin')->name('storeTeachingschedules');
    Route::get('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'show'])->middleware('role:admin|teacher')->name('showTeachingschedules');
    Route::get('/teaching_schedules/{teaching_schedule}/edit', [TeachingScheduleController::class, 'edit'])->middleware('role:admin|teacher')->name('editTeachingschedules');
    Route::put('/teaching_schedules/{teaching_schedule}', [TeachingScheduleController::class, 'update'])->middleware('role:admin|teacher')->name('updateTeachingschedules');
    Route::delete('/teaching_schedules/{teaching_schedule}/delete', [TeachingScheduleController::class, 'destroy'])->middleware('role:admin')->name('deleteTeachingschedules');

    // Payment Routes (accessible only by admin)
    Route::middleware(['role:admin'])->group(function () {
      
        Route::get('payments/trashed', [PaymentController::class, 'trashed'])->name('payments.trashed');  
        Route::post('payments/{id}/restore', [PaymentController::class, 'restore'])->name('payments.restore');
        Route::delete('payments/{id}/force-delete', [PaymentController::class, 'forceDelete'])->name('payments.forceDelete');
        Route::get('/payments', [PaymentController::class, 'index'])->name('listPayments');     
        Route::get('/payments/create', [PaymentController::class, 'create'])->name('createPayments');     
        Route::post('/payments', [PaymentController::class, 'store'])->name('storePayments');    
        Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('showPayments');    
        Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('editPayments');      
        Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('updatePayments');   
        Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('deletePayments');
        Route::get('/payments/{payment}/print', [PaymentController::class, 'print'])->name('payments.print');
    });
    
        // financialreport Routes (accessible only by admin)
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/financial-reports', [FinancialReportController::class, 'index'])->name('financial-reports.index');
            Route::get('/financial-reports/create', [FinancialReportController::class, 'create'])->name('financial-reports.create');
            Route::post('/financial-reports', [FinancialReportController::class, 'store'])->name('financial-reports.store');
            Route::get('/financial-reports/print', [FinancialReportController::class, 'print'])->name('financial-reports.print');
            Route::post('/financial-reports/print', [FinancialReportController::class, 'printReports'])->name('financial-reports.printReports');
            Route::post('/financial-reports/print-pdf', [FinancialReportController::class, 'printPdf'])->name('financial-reports.printPdf');
            Route::get('/financial-reports/{id}', [FinancialReportController::class, 'show'])->name('financial-reports.show');
            Route::delete('/financial-reports/{id}', [FinancialReportController::class, 'destroy'])->name('financial-reports.destroy');
            Route::get('/financial-reports/{id}/edit', [FinancialReportController::class, 'edit'])->name('financial-reports.edit');
            Route::put('/financial-reportss/{id}', [FinancialReportController::class, 'update'])->name('financial-reports.update');           
        });



    // Classes Management (accessible only by admin)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
        Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
        Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
        Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('classes.edit');
        Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
        Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('classes.destroy');
    });

    // Subjects Management (accessible only by admin)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    });

    // Routes untuk penilaian sekolah
    Route::get('reports', [ReportController::class, 'index'])->middleware('role:admin')->name('reports.index');
    Route::get('reports/create', [ReportController::class, 'create'])->middleware('role:admin|student')->name('reports.create');
    Route::post('reports', [ReportController::class, 'store'])->middleware('role:admin|student')->name('reports.store');
    Route::delete('reports/destroyAll', [ReportController::class, 'destroyAll'])->middleware('role:admin|student')->name('reports.destroyAll');
});

require __DIR__ . '/auth.php';
