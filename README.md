# Get Shorty
URL shortener application built with Laravel 11 with Vue.js 3.4 and TailwindCSS 3.4.

## Local Development
- Clone this repository
- Copy `.env.example` to `.env`
- Update `.env` with your database credentials
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `npm install`
- Run `npm run dev`
- Run `php artisan serve`

## How it works
- Enter a long URL in the input field
- A short 6 character string will be generated
- When the short URL is visited, the user will be redirected to the original URL
