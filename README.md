# 🌍 NorthBound Travel Website

NorthBound is a full-stack travel booking platform that allows users to explore destinations, view travel packages, and securely book trips online.
It includes a complete authentication system and an admin dashboard for managing bookings and enquiries.

---

## 🚀 Tech Stack

* Frontend: HTML, CSS, JavaScript
* Backend: PHP
* Database: MySQL
* Server: XAMPP (Apache + MySQL)

---

## 📂 Project Structure

northbound-travel-website/

│
├── index.php
├── README.md
│
├── assets/
│   ├── css/
│   └── images/
│
├── pages/
│   ├── activities.php
│   ├── blog.php
│   ├── booking.php
│   ├── contact.php
│   ├── destination.php
│   ├── gallery.php
│   ├── hotels.php
│   ├── loginsignup.php
│   ├── packages.php
│   └── special.php
│
├── backend/
│   ├── db.php
│   ├── signup.php
│   ├── login.php
│   ├── booking.php
│   └── contact.php
│
├── admin/
│   ├── login.php
│   ├── login_process.php
│   ├── dashboard.php
│   ├── bookings.php
│   ├── enquiries.php
│   ├── delete_booking.php
│   ├── delete_enquiry.php
│   └── logout.php
│
└── database/
    └── travel.sql


---

## ✨ Features

### 🔐 User Authentication

* User Signup with password hashing
* Secure Login system using sessions
* Redirect system (returns user to original page after login)

---

### 🌍 Travel Browsing

* Explore destinations, hotels, and activities
* View travel packages
* Fully responsive UI

---

### 🧾 Booking System

* Secure booking form
* Only logged-in users can book
* User data linked with bookings
* Success & error handling

---

### 📩 Contact System

* Users can send enquiries
* Data stored in database
* Admin can view all enquiries

---

### 🛠️ Admin Dashboard

* Admin login system
* View total bookings, users, enquiries
* Manage bookings (delete)
* Manage enquiries (delete)
* Secure session-based access

---

### 🔒 Security Features

* Prepared Statements (SQL Injection protection)
* Password hashing
* Session-based authentication
* XSS protection using `htmlspecialchars()`
* Route protection (login required for booking/contact)

---

## 🗄️ Database Design

* `users` → stores user data
* `bookings` → linked with users (foreign key)
* `contact` → stores enquiries
* `admin` → admin login


## 🎯 Future Improvements

* Payment Integration (Razorpay/Stripe)
* Email Notifications
* User Dashboard
* Booking history
* Admin analytics (charts)

---

## 📌 Author

* Ankit Tiwari
* Karan Sharma
* Akshit Rangra

---

## 💼 Resume Highlight

> Built a full-stack travel booking platform with authentication, protected routes, booking system, contact system, and admin dashboard using PHP, MySQL, and JavaScript.
