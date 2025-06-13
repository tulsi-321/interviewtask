@extends('layouts.app')
@section('title', 'Events')
@section('content')

<!-- Background Styling -->
<style>
    body {
        background: url('{{ asset("images/event-bg.jpg") }}') no-repeat center center fixed;
        background-size: cover;
    }
    .card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
    }
    .modal-content {
        background: #fff;
    }
</style>

<h2 class="text-center text-white mb-4">Available Events</h2>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach($events as $event)
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
                    <p><strong>Venue:</strong> {{ $event->venue }}</p>
                    <p><strong>Seats Left:</strong> {{ $event->available_seats }}</p>
                    <button class="btn btn-primary" 
                        onclick="openBookingModal({{ $event->id }}, '{{ $event->name }}', '{{ $event->venue }}', '{{ $event->date }}')">
                        Book Ticket
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Book Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    @csrf
                    <input type="hidden" id="event_id" name="event_id">
                    <div class="mb-3">
                        <label class="form-label">Event</label>
                        <input type="text" id="event_name" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Venue</label>
                        <input type="text" id="event_venue" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="text" id="event_date" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="submitBooking()" class="btn btn-success">Confirm Booking</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Booking confirmed successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    function openBookingModal(id, name, venue, date) {
        document.getElementById('event_id').value = id;
        document.getElementById('event_name').value = name;
        document.getElementById('event_venue').value = venue;
        document.getElementById('event_date').value = date;

        const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
        modal.show();
    }

    async function submitBooking() {
        const eventId = document.getElementById('event_id').value;

        const res = await fetch("{{ route('book') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
            },
            body: JSON.stringify({ event_id: eventId }),
        });

        const data = await res.json();

        if (data.status === 'success') {
            const toastEl = document.getElementById('successToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();

            const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
            modal.hide();

            setTimeout(() => {
                window.location.reload();
            }, 2000);
        }
    }
</script>
@endsection
