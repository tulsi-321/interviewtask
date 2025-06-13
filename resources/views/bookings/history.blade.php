@extends('layouts.app')
@section('title', 'My Bookings')
@section('content')

<style>
    body {
        background: url('/images/event-bg.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .booking-card {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
    }

    h2 {
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .pagination {
        justify-content: center;
    }

    .pagination .page-link {
        color: #007bff;
        border-radius: 50px;
        margin: 0 4px;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
</style>

<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-10 booking-card">
        <h2>My Booking History</h2>

        @if($bookings->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Booked At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->event->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->event->date)->format('F j, Y') }}</td>
                            <td>{{ $booking->event->venue }}</td>
                            <td>{{ $booking->created_at->format('F j, Y, g:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links('pagination::bootstrap-5') }}
        </div>

        @else
        <p class="text-center text-muted">You haven't booked any tickets yet.</p>
        @endif
    </div>
</div>

@endsection
