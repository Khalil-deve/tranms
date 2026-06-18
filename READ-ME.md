# Project Documentation: Online Transport Management System (TranMS)

## 1. Project Title
**Online Transport Management System (TranMS)**

## 2. Introduction
The Online Transport Management System (TranMS) is a comprehensive web-based platform designed to bridge the gap between transport service providers (drivers/owners) and passengers. It serves as a centralized hub where users can seamlessly discover, book, and manage transport vehicles for their personal or commercial needs. By digitizing the traditional booking process, TranMS ensures a fast, secure, and highly reliable transport ecosystem.

## 3. Problem Statement
Traditional transport booking methods rely heavily on manual processes, phone calls, and physical visits to transport hubs. This results in inefficiencies, lack of pricing transparency, booking conflicts, and a generally poor user experience for both customers and drivers. Furthermore, independent vehicle owners lack a streamlined digital platform to list their services and manage their clientele efficiently.

## 4. Objectives
* **For Customers:** To provide an intuitive interface for browsing available vehicles, comparing features, and securing online bookings effortlessly.
* **For Drivers/Owners:** To offer a dedicated dashboard for listing vehicles, managing availability, and processing customer booking requests (Accept/Decline).
* **System-wide:** To ensure responsive design, fast performance, secure authentication, and a scalable codebase.

## 5. System Features

### 5.1 Customer Module
* **User Authentication:** Secure registration and login using hashed passwords.
* **Service Browsing:** View available transport services (Luxury Coaches, Express Minivans, City Cabs, etc.) with details on seating capacity and features.
* **Online Booking:** Submit detailed booking requests specifying pickup/drop-off locations, dates, times, passenger counts, and special requests.
* **Booking Management:** Track the status of active and past bookings (Pending, Accepted, Declined).

### 5.2 Driver / Owner Module
* **Service Management:** Add, edit, and delete transport listings. Define vehicle features, capacities, and descriptions.
* **Booking Dashboard:** View incoming booking requests from customers.
* **Action Controls:** Accept or decline booking requests with a single click to manage schedule availability.

## 6. Technologies Used
* **Frontend:** HTML5, CSS3, JavaScript (ES6+).
* **UI Framework:** Bootstrap 5 (Responsive Layouts, Floating Labels, Cards).
* **Animations:** WOW.js and Animate.css for scroll-triggered animations.
* **Backend:** Core PHP (Procedural/Modular Structure).
* **Database:** MySQL (Relational Database Management).
* **Package Management:** Composer (for PHP dependencies like Ramsey/UUID).
* **Icons & Fonts:** FontAwesome 5, Bootstrap Icons, Google Fonts (Jost, Yeseva One, Dancing Script).

## 7. Database Architecture

The system utilizes a relational MySQL database with three primary entities:

### 7.1 Users Table (`users`)
Stores all registered accounts.
* `id` (UUID - Primary Key)
* `name` (String)
* `email` (String, Unique)
* `password` (String, Bcrypt Hashed)
* `user_type` (Enum: 'customer', 'driver')

### 7.2 Transport Table (`transport`)
Stores the fleet of vehicles listed by drivers.
* `id` (UUID/Int - Primary Key)
* `ownerid` (Foreign Key -> users.id)
* `title` (String)
* `description` (Text)
* `seats` (Integer)
* `features` (Text)
* `image` (String - Path to asset)

### 7.3 Bookings Table (`bookings`)
Stores customer reservation requests.
* `id` (UUID/Int - Primary Key)
* `user_id` (Foreign Key -> users.id)
* `transport_id` (Foreign Key -> transport.id)
* `pickup_location` (String)
* `dropoff_location` (String)
* `pickup_date` (Date)
* `pickup_time` (Time)
* `passengers` (Integer)
* `special_request` (Text)
* `status` (Enum: 'pending', 'accepted', 'declined')

## 8. Conclusion
The TranMS project successfully modernizes transport booking by providing a two-sided marketplace. With its clean UI, responsive design, and robust backend logic, the system effectively eliminates the friction of traditional booking methods. Future iterations can easily build upon this foundation to introduce features like payment gateway integration, real-time GPS tracking, and advanced MVC routing.
