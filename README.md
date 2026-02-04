# Home Cleaning Service Web Application (PHP + MySQL)

A full-stack web application built in PHP and MySQL to manage a home cleaning service.  
Includes user registration/login and an admin dashboard to manage bookings/services (and other features).

## Tech Stack
- PHP, HTML, CSS, JavaScript
- MySQL
- Bootstrap
- XAMPP (Apache + MySQL)

## Key Features
- User authentication (Register / Login)
- Booking workflow (customers can create/manage bookings)
- Admin functionality (manage bookings/services/users) *(edit this to match your app)*
- Database-backed pages and forms

The Full Documentation can be read in Documentation.docx
---

## How to Run Locally (XAMPP)

### 1) Install and start XAMPP
1. Install XAMPP
2. Open XAMPP Control Panel
3. Start **Apache** and **MySQL**

### 2) Add the project to `htdocs`
1. Copy this project folder into:
   - `C:\xampp\htdocs\` (Windows)
   - or the equivalent `htdocs` directory on macOS/Linux
2. Example:
   - `C:\xampp\htdocs\home-cleaning-webapp`

### 3) Create the database and import the SQL script
1. Open:
   - `http://localhost/phpmyadmin`
2. Click **New** → Create a database named:
   - `hsservicedb` 
3. Click **Import**
4. Choose the SQL file in this repo:
   - `hsservicedb.sql` 
5. Click **Go**

### 4) Run the app

Open in your browser:

http://localhost/home-cleaning-webapp/


Demo Accounts (for quick access)

Use the following accounts to explore features without registering:

Admin (need to access by .../AHome.php)

Email: RandomEmail@gmail.com

Password: PSA123

Customer

Email: Jack@gmail.com

Password: JJ1122

Note: These accounts exist only in the sample database from the SQL script.
You can also register a new account from the Register page.
