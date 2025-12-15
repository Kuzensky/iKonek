# iKonek

## About

iKonek is a blood donation and fundraising platform that connects blood donors with those in need. The platform streamlines the blood donation process by allowing users to schedule appointments, track their donation history, and participate in fundraising campaigns. It aims to create a community of donors making a meaningful impact on saving lives.

## Features

- User registration with donor profiles (blood type, contact information)
- Dashboard for tracking donations and viewing impact statistics
- Multi-step blood donation appointment scheduling
- Fundraising campaign creation and browsing
- Donation history tracking
- Profile management

## Technical Stack

Built with Laravel 11 and PostgreSQL, utilizing Laravel Breeze for authentication and Blade templates for the frontend.

## Installation

1. Clone the repository and install dependencies
```bash
git clone <repository-url>
cd iKonek-laravel
composer install
npm install
```

2. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

3. Set up database credentials in `.env`
```
DB_CONNECTION=pgsql
DB_DATABASE=ikonek
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

4. Run migrations and start server
```bash
php artisan migrate
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## Authors

- Joel Aguzar
- Jerzha Ara Lalu
- Christian Nayre

## Instructor

Paul Isaac De Chavez
