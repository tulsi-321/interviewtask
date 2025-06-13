<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     public function book(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        if ($event->available_seats <= 0) {
            return response()->json(['status' => 'error', 'message' => 'No seats available']);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id
        ]);

        $event->decrement('available_seats');

        return response()->json(['status' => 'success', 'message' => 'Booking confirmed']);
    }

    public function history()
    {
        $bookings = Booking::with('event')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('bookings.history', compact('bookings'));
    }
}
