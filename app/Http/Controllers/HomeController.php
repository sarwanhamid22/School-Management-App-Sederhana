<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\Students;
use App\Models\Payment;
use App\Models\Notification;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $title = "Dashboard";
        $data = [
            'teachers' => Teachers::count(),
            'students' => Students::count(),
            'class' => Students::count(),
            'total_payments' => Payment::sum('amount'),
            'notifications' => Notification::latest()->limit(5)->get(),
        ];

        return view('dashboard', compact('data', 'title'));
    }

    public function storeNotification(Request $request)
    {
        $request->validate([
            'notificationMessage' => 'required|string',
        ]);

        Notification::create([
            'content' => $request->notificationMessage,
        ]);

        return redirect()->back()->with('success', 'Notification added successfully.');
    }

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }
}
