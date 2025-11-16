<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning ScanSehat-Web

📦 Teknologi Utama
Teknologi	Fungsi
Laravel 12.x	Framework backend (routing, controller, model, Blade)
Vite 7.x	Frontend build tool (hot reload, bundling)
TailwindCSS 3.x	Utility-first CSS framework
Node.js + NPM	Menjalankan Vite & dependency frontend
Laravel Vite Plugin 2.x	Integrasi Laravel ↔ Vite
### Tim tidak wajib menggunakan Laragon, XAMPP, WAMP, MAMP, atau setup manual PHP+MySQL juga bisa.

## Cara clone & setup project

### Clone repo
git clone https://github.com/username/ScanSehat-Web.git
cd ScanSehat-Web
### Install dependencies PHP & Node
composer install
npm install
### Sesuaikan konfigurasi database di .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=scansehat
DB_USERNAME=root
DB_PASSWORD=
### Generate application key Laravel
php artisan key:generate
### Jalankan migration untuk membuat tabel
php artisan migrate
### Cara jalankan server
npm run dev (Automatis menjalankan Front End Vite(npm run dev) + Back End Laravel(php artisan serve))
