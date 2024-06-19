<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_date' => 'required|date',
        ]);

        try {
            Event::create([
                'title' => $request->title,
                'event_date' => $request->event_date,
            ]);

            return response()->json(['message' => 'Berhasil Menambahkan Data Acara']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal Menambahkan Data Acara: ' . $e->getMessage()], 500);
        }
    }

    public function fetchEvents()
    {
        $events = Event::select('id', 'title', 'event_date as start')->get();

        return response()->json($events);
    }

    public function deleteAllEvents(Request $request)
    {
        try {
            Event::truncate();

            return response()->json(['message' => 'Berhasil Menghapus Semua Data Acara']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal Menghapus Semua Data Acara: ' . $e->getMessage()], 500);
        }
    }
}
