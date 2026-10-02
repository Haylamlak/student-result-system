# Student Result Management System

A secure, responsive, and web-based platform built with PHP, MariaDB/MySQL, custom CSS3, and JavaScript. Designed for educational institutions to streamline academic performance tracking, grade administration, and instant result retrieval through role-based access control.

---

## 🚀 Key Features

### 🔒 Role-Based Access Control
- **Admin Portal:** Full CRUD permissions (Create, Read, Update, Delete) to manage student records, courses, grades, and system users.
- **Student Portal:** Secure personalized dashboard to query and view individual academic marks and performance evaluations.

### 🛡️ Security & Performance
- **Database Safety:** Secure MariaDB/MySQL interactions utilizing PHP Data Objects (PDO) with prepared statements to prevent SQL Injection attacks.
- **Password Protection:** Industry-standard password hashing using `PASSWORD_BCRYPT`.
- **Session Management:** Secure session handling and role normalization to safeguard data integrity.

### 📱 Responsive User Interface
- Clean, modern layout built from scratch with semantic HTML5, custom CSS Variables, Flexbox, and Grid.
- Fully responsive across desktop, tablet, and mobile viewports.
- Integrated contact support system and detailed developer credentials page.

---

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Backend:** PHP (Modular MVC-inspired structure with PDO)
- **Database:** MariaDB / MySQL
- **Environment:** Apache Web Server (XAMPP / WAMP / InfinityFree)

---

## ⚙️ Installation & Setup

1. **Clone the Repository**
   git clone https://github.com/Haylamlak/student-result-management-system.git
   cd student-result-management-system

## Database Configuration

Import schema.sql into your MySQL/MariaDB database server (via phpMyAdmin or MySQL CLI).

Update your connection settings in config/db.php
$host = 'localhost';
$dbname = 'student_db';
$username = 'your_username';
$password = 'your_password';

## Run the Application

Place the project folder inside your web server root (e.g., htdocs for XAMPP or www for WAMP).


Access the application in your browser at http://localhost/student-result-management-system.
🔑 Demo Test CredentialsYou can test both user roles using the following pre-configured account details
admin: admin@gmail.com  password: admin123  
User:  gebreeyesusayelgn027@gmail.com  password: hayle12345678 

   👨‍💻 Developer Information
Developer: Haylamlak Ayelgn Assefa

ID Number: 053/16

Department: Computer Science

Course: Web Programming (CoSc3091)

### open your browser then try open this link: https://student-result--system.infinityfreeapp.com/
