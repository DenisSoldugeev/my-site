# My Site

Personal blog built with Laravel.

## Requirements

- PHP 8.2+
- Composer
- Node.js & npm

## Installation

```bash
# Clone and install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database
touch database/database.sqlite
php artisan migrate --seed

# Build assets
npm run build
```

## Development

```bash
# Start dev server
php artisan serve

# Watch assets
npm run dev
```

## Deployment

1. Set environment variables in `.env`:

```env
APP_ENV=production
APP_DEBUG=false

ADMIN_LOGIN=your_login
ADMIN_PASSWORD=your_secure_password
```

2. Run:

```bash
composer install --no-dev --optimize-autoloader
npm run build
php artisan migrate --force
php artisan db:seed --class=AdminSeeder
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Creating Admin User

### Option 1: Via seeder

Set `ADMIN_LOGIN` and `ADMIN_PASSWORD` in `.env`, then:

```bash
php artisan db:seed --class=AdminSeeder
```

### Option 2: Via tinker

```bash
php artisan tinker
```

```php
App\Models\User::create([
    'login' => 'your_login',
    'name' => 'Your Name',
    'password' => 'your_password'
]);
```

## Tech Stack

- Laravel 11
- SQLite
- Vite
