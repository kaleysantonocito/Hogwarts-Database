# Hogwarts Student Registry

## Project Overview

The Hogwarts Student Registry is a web-based database application developed as a school project. Inspired by the Harry Potter universe, the application allows users to manage student records through a simple interface.

The project was designed to demonstrate database development, PHP programming, and the integration of a MySQL database with a web application.

## Features

- **User Registration & Login:** Users can create an account and securely log in to access the application.
- **Password Hashing:** Passwords are hashed using PHP's `password_hash()` function and verified using `password_verify()`.
- **Add Students:** Enter new students into the Hogwarts database.
- **View Students:** Display existing student records.
- **Search Students:** Find student records stored in the database.
- **Update Students:** Modify existing student information.
- **Delete Students:** Remove student records from the database.
- **Hogwarts Theme:** Custom styling and house imagery inspired by the Harry Potter universe.

## Technologies Used

- **PHP** – Server-side programming and application functionality
- **MySQL** – Relational database for storing user and student information
- **HTML** – Website structure and forms
- **CSS** – Styling and visual design
- **phpMyAdmin** – Database administration
- **AMPPS** – Local development environment using Apache, PHP, and MySQL

## Running the Project Locally

1. Install a local development environment such as AMPPS that supports Apache, PHP, and MySQL.
2. Place the project folder inside the server's `www` directory.
3. Start Apache and MySQL.
4. Create a local `dblogin.php` file using `dblogin.example.php` as a template, and configure your database credentials.
5. Configure the database credentials needed by `setupDB.php`, then run the setup script to create the database tables.
6. Open the application in your browser:

   `http://localhost/DatabaseDevelopmentCapstone/login.php`

7. Register an account or log in to access the student registry.


*Developed as part of my Web Database Development coursework at Farmingdale State College.*