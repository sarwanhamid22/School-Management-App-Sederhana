<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Payment; // Ubah dari Payments menjadi Payment
use App\Models\Students;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Pembayaran";
        $payments = Payment::whereNull('deleted_at')->get();
        $trashedPayments = Payment::onlyTrashed()->get();
        return view('payments.index', compact('payments','title', 'trashedPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::with('class')->get();
        $title = "Tambah Pembayaran";
        $classes = Classes::all();
        return view('payments.create', compact('students', 'title', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_year' => 'required|string',
            'payment_type' => 'required|array',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'class_id' => 'required|exists:classes,id', // Validasi class_id
        ]);
    
        try {
            Payment::create($validatedData); // Menggunakan model Payment
        } catch (\Exception $e) {
            // Handle any other exceptions here
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal Menambahkan Data Pembayaran']);
        }
        
        return redirect()->route('listPayments')->with('success', 'Berhasil Menambahkan Data Pembayaran');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Payment $payment) // Menggunakan model Payment
    {
        $title = "Detail Pembayaran";
        return view('payments.show', compact('payment', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment) // Menggunakan model Payment
    {
        $title = "Edit Pembayaran";
        $students = Students::with('class')->get();
        return view('payments.edit', compact('payment', 'students', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment) // Menggunakan model Payment
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_year' => 'required|string',
            'payment_type' => 'required|array',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        try {
            $payment->update($validatedData);
        } catch (\Exception $e) {
            // Handle any other exceptions here
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal Mengupdate Data Pembayaran']);
        }
        
        return redirect()->route('listPayments')->with('success', 'Berhasil Mengupdate Data Pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete(); // Menghapus data secara permanen dari database
        return redirect()->route('listPayments')->with('success', 'Payment deleted successfully.');
    }
    public function restore($id)
    {
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('listPayments')->with('success', 'Pembayaran berhasil direstore');
    
    }
    public function forceDelete($id)
    {
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->forceDelete();

        return redirect()->route('payments.trashed')->with('success', 'data pembayaran berhasil di hapus Permanent.');
    }
    public function trashed()
    {
        $trashedPayments = Payment::onlyTrashed()->get();
        return view('payments.trashed', compact('trashedPayments'));
    }

    public function print($id)
    {
        $payment = Payment::findOrFail($id);
    
        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Render view ke dalam HTML
        $html = view('payments.print', compact('payment'))->render();
    
        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);
    
        // Render PDF (optional: atur ukuran dan orientasi)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Menampilkan PDF di browser tanpa memaksa unduhan
        return $dompdf->stream('detail_pembayaran.pdf', array("Attachment" => false));
    }
    
}
