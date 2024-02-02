<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1 align="center">
Laravel URL Shortener
</h1>



## About URL Shortener
Auth user create short url by using long url



How to setup locally

-  Clone the repository
```bash
git clone https://github.com/developeralamin/Simple-URL-Shortener
```

- Install dependencies
```bash
composer install
```

- Create a copy of your .env file
```
cp .env.example .env
```

- Generate an app encryption key
```bash
php artisan key:generate
```

- Create Database Name .env file
```
DB_DATABASE = 
```
- Run migrations
```bash
php artisan migrate
```




- Run the local development server
```bash
php artisan serve
```

- Visit http://localhost:8000 in your browser
- Create account
- Login with email and password
