# Online Lawyer Management System

PHP and MySQL based lawyer booking and management system created as an undergraduate internship project.

## Features

- User, lawyer, and admin login
- Lawyer registration and approval flow
- Lawyer listing and search
- Appointment booking
- Profile and password update pages
- Email notification scripts using PHPMailer

## Requirements

- XAMPP or equivalent Apache/PHP/MySQL stack
- PHP 7.4+ or PHP 8.x
- MySQL or MariaDB

## Local Setup

1. Copy this project folder into `C:\xampp\htdocs\lawyermanagementsystem`.
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Open phpMyAdmin at `http://localhost/phpmyadmin`.
4. Create a database named `lawyermanagement`.
5. Import `SQL DATABASE/lawyermanagement.sql` into that database.
6. Open `http://localhost/lawyermanagementsystem/index.php`.

The database connection is configured in `db_con/dbCon.php`:

```php
$servername = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USERNAME') ?: "root";
$password = getenv('DB_PASSWORD') ?: "";
$database = getenv('DB_DATABASE') ?: "lawyermanagement";
```

If your local MySQL setup uses a password, set `DB_PASSWORD` or update the fallback value locally. For example, some XAMPP installs use `root` as the MySQL root password.

## Demo Logins

The included SQL seed contains demo accounts:

| Role | Email | Password |
| --- | --- | --- |
| Admin | `admin@gmail.com` | `admin` |
| User | `user@gmail.com` | `1234567` |
| Lawyer | `lawyer@gmail.com` | `123456` |

Some seeded emails in the SQL file contain trailing spaces. If login fails, check the imported `user` table and trim the email/password values.

## Email Configuration

The email scripts read SMTP credentials from environment variables:

```text
SMTP_USERNAME=your-email@example.com
SMTP_PASSWORD=your-app-password
SMTP_FROM_EMAIL=your-email@example.com
```

## GitHub Notes

This repository intentionally ignores local upload files and PHPMailer development artifacts such as tests, docs, examples, and zip archives. Keep only files needed to run or explain the project.
