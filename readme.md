# 📦 Laravel Tailwind Starter Pack

[![Build Status](https://travis-ci.org/riipandi/laravel-tailwind.svg)](https://travis-ci.org/riipandi/laravel-tailwind)
[![StyleCI Status](https://github.styleci.io/repos/174728418/shield?branch=master)](https://github.styleci.io/repos/174728418)
[![Total Download](https://poser.pugx.org/riipandi/laravel-start/d/total.svg)](https://packagist.org/packages/riipandi/laravel-start)
[![Latest Stable Version](https://poser.pugx.org/riipandi/laravel-start/v/stable.svg)](https://packagist.org/packages/riipandi/laravel-start)
[![License](https://img.shields.io/badge/License-MIT-brightgreen.svg)](https://choosealicense.com/licenses/mit)

## Introduction

Frameworks allow you to do more with less code. Laravel is the most popular MVC framework for PHP. 
Laravel is a web application framework with expressive, elegant syntax. Laravel attempts to take the 
pain out of development by easing common tasks used in the majority of web projects.

Tailwind is a utility-first CSS framework for rapidly building custom user interfaces. Tailwind is 
different from frameworks like Bootstrap, Foundation, or Bulma in that it's not a UI kit. If you're 
looking for a framework that comes with a menu of predesigned widgets to build your site with, 
Tailwind might not be the right framework for you. But if you want a huge head start implementing a 
custom design with its own identity, Tailwind might be just what you're looking for.

## Quick Start

### Prerequisites

1. PHP >= 7.2;
2. Nodejs >= 8.15 or >= 10.15;
3. MySQL >= 5.7 or MariaDB >= 10.3;
4. Redis Server >= 3.2;

### Local installation

Edit or create `.env` file and then execute:

```bash
composer install
npm i --no-optional
npm run development
php artisan migrate:fresh --seed
```

Create example user:

```php
php artisan tinker

$user = new App\Models\User();
$user->name     = 'Admin Sistem';
$user->username = 'admin';
$user->password = 'secret';
$user->email    = 'admin@mail.com';
$user->email_verified_at = now();
$user->save();
exit();
```

### Automatic Versioning

You will need add git hooks. Open `.git/hooks/post-commit` and put this code:

```bash
#!/bin/sh
php artisan version:refresh
```

Don't forget to edit `config/version.yml` and change the remote git repository value with your own.

## Security Issue

If you discover any security related issues, please send an e-mail to
[aris@ripandi.id](mailto:aris@ripandi.id) instead of using the issue tracker.

## Support Development

Do you like this project? Support it by donating via:

* PayPal: <https://paypal.me/riipandi>
* Bitcoin: `3GyvnzgVCkrb8rjkdzAb1Fav2EbL3qAjUA`

## License

Laravel is a trademark of Taylor Otwel, and TailwindCSS is a trademark of Adam Wathan.

This project licensed under the terms of [MIT License](https://choosealicense.com/licenses/mit).
Read the [license file](./license.txt) file for the full license text.
