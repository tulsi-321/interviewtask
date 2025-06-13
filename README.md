
# 🎟️ Laravel 10 Event Booking System

A complete Laravel 10-based event ticket booking system designed for PHP Developer Interview Assignment. Users can register, log in, book tickets to events, and view their booking history with AJAX functionality.

---

## ✅ Features

- Laravel 10 setup using Composer
- Models: Event, Booking
- Controllers: AuthController, EventController, BookingController
- Event seeding with EventSeeder
- AJAX-based ticket booking
- User-friendly UI with Bootstrap 5
- Blade templates: login, register, events, bookings
- Secure: CSRF protection, hashed passwords, Laravel Auth

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js and npm (for frontend assets)
- Laravel 10

---

## 🚀 Installation Steps

```bash
git clone <https://github.com/tulsi-321/interviewtask.git>
cd eventmanagement
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## 📁 Project Structure (Simplified)

```
ticket-booking-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── BookingController.php
│   │   │   └── EventController.php
│   ├── Models/
│   │   ├── Booking.php
│   │   └── Event.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_events_table.php
│   │   └── xxxx_create_bookings_table.php
│   └── seeders/
│       └── EventSeeder.php
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── bookings/
│       │   └── history.blade.php
│       ├── events/
│       │   └── index.blade.php
│       └── layouts/
│           └── app.blade.php
├── routes/
│   └── web.php
├── .env.example
├── artisan
└── README.md
```

---

## 👥 Authentication

- Register with name, email, password confirmation
- Login using email and password
- Logout available once logged in

---

## 🗃️ Database Tables

### `users` (default Laravel)

- id, name, email, password, timestamps

### `events`

- id, name, date, venue, available_seats, timestamps

### `bookings`

- id, user_id, event_id, timestamps

---

## 📦 Blade Views Summary

### `layouts/app.blade.php`
Base layout including navbar, alerts, and section wrappers.

### `auth/register.blade.php` & `auth/login.blade.php`
Forms for user registration and login.

### `events/index.blade.php`
Event listing with AJAX ticket booking functionality.

### `bookings/history.blade.php`
Paginated list of a user's previous bookings.

---

## 🧪 Test Flow

1. Register as a new user.
2. Login.
3. View event list.
4. Click "Book Ticket" button.
5. Booking is processed via AJAX.
6. View booking history.

---




