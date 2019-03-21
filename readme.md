# 📦 Laravel Tailwind Starter Pack

[![Build Status](https://travis-ci.org/riipandi/laravel-tailwind.svg?branch=master)](https://travis-ci.org/riipandi/laravel-tailwind)
[![StyleCI Status](https://github.styleci.io/repos/174728418/shield?branch=master)](https://github.styleci.io/repos/174728418)
[![Total Download](https://poser.pugx.org/riipandi/laravel-tailwind/d/total.svg?format=flat-square)](https://packagist.org/packages/riipandi/laravel-tailwind)
[![Latest Stable Version](https://poser.pugx.org/riipandi/laravel-tailwind/v/stable.svg?format=flat-square)](https://packagist.org/packages/riipandi/laravel-tailwind)
[![License](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat-square)](https://choosealicense.com/licenses/apache-2.0/)

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

### Create the project

```
composer create-project riipandi/laravel-tailwind <your_app_name> <version>

# Example
composer create-project riipandi/laravel-tailwind myblog v0.1.2
```

### Local installation

Edit or create `.env` file and then execute:

```bash
composer install
npm i --no-optional
npm run development
php artisan migrate:fresh --seed
```

Create example user using Tinker:

```php
$user = new App\Models\User();
$user->name     = 'Admin Sistem';
$user->username = 'admin';
$user->password = 'secret';
$user->email    = 'admin@mail.com';
$user->email_verified_at = now();
$user->save();
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
This project licensed under the terms of [Apache License 2.0](https://choosealicense.com/licenses/apache-2.0/).
Please see [license file](./license.txt) for more information.