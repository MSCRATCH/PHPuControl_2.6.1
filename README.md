## PHPuControl_2.6.1

PHPuControl 2.6.1 is a procedurally written PHP and MySQL system offering a complete backend and user management functionality, ready to serve as a foundation for your projects.

*Features*

1. CSRF & XSS Protection: Safeguards to prevent cross-site attacks.
2. SQL Injection Protection: All database queries are securely handled with prepared statements.
3. Backend Security: Additional token based authentication required for access.
4. Brute Force Protection: Login attempts are protected against automated attacks.
5. Strong Passwords: Passwords are securely hashed using Bcrypt.
6. Comprehensive Activity Logging: Tracks all user actions.
7. Directory Security: All directories protected, access only via public entry points.

*Technologies*

![PHP](https://img.shields.io/badge/PHP-8.4-blue.svg)
![Procedural PHP](https://img.shields.io/badge/PHP-Procedural-blue.svg)
![MySQLi](https://img.shields.io/badge/MySQLi-blue.svg)
![HTML](https://img.shields.io/badge/HTML-5-orange.svg)
![CSS](https://img.shields.io/badge/CSS-3-blue.svg)
![GIMP](https://img.shields.io/badge/GIMP-2.x-blue.svg)

*Installation*

As there is currently no installation system available, manual installation is required. Here are the steps:

1. *Database setup*: Insert the database credentials into the `config/config.php` file.
2. *Create tables*: Create the necessary tables using the provided SQL code.
3. *Create user account*: Sign up for a new user account using the registration form.
4. *Assign administrator privileges*: Change the user level to administrator in phpMyAdmin.
