# ⎇ Alt Stack - An alternative Laravel stack
<!-- [![Build Status](https://travis-ci.org/riipandi/altstack.svg?branch=master)](https://travis-ci.org/riipandi/altstack) -->
[![StyleCI](https://github.styleci.io/repos/174728418/shield?branch=master)](https://github.styleci.io/repos/174728418?branch=master)
[![Total Download](https://poser.pugx.org/riipandi/altstack/d/total.svg?format=flat-square)](https://packagist.org/packages/riipandi/altstack)
[![Latest Stable Version](https://poser.pugx.org/riipandi/altstack/v/stable.svg?format=flat-square)](https://packagist.org/packages/riipandi/altstack)
[![License](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat-square)](https://choosealicense.com/licenses/apache-2.0/)

## Introduction
AltStack is a boilerplate meant to standardize much of the setup that almost every web application needs. 
Reclaim your first few hours of development on every new project by allowing AltStack to give you a 
little speed boost.

This is the Laravel template with Tailwind, Alpine.js, and Livewire as default preset and ships with some
features like user management with UUID for primary key, and Two Factor Authentication. I'm using this
template for (nearly) all my personal projects and professional projects, but you may use my template but
please notice that we offer no support whatsoever. We also don't follow semver for this project and won't
guarantee that the code (especially the master branch) is stable.

> In short: when using this, you're on your own.

## Quick Start
At least you will need `PHP >= 7.3` and `Nodejs >= 12.16`. For database backend, you can choose between
`PostgreSQL >= 9.6` or `MySQL >= 5.7` or `MariaDB >= 10.3` or any other database engine that supported
by Laravel. Also, you maybe want to use `Redis >= 3.2` for session store and or caching storage.

By default I'm using PostgreSQL for main database. But, you can change it via `.env` configuration file.

### Create PostgreSQL database
```sql
-- sudo -u postgres psql
DROP DATABASE IF EXISTS "homestead"; DROP ROLE IF EXISTS "homestead";
CREATE ROLE "homestead" SUPERUSER CREATEDB CREATEROLE LOGIN ENCRYPTED PASSWORD 'securepwd';
CREATE DATABASE "homestead"; GRANT ALL PRIVILEGES ON DATABASE "homestead" TO "homestead";
```

### Create New Project
```bash
# Use latest version:
composer create-project riipandi/altstack <app_name>

# If you want to use spesific version:
composer create-project riipandi/altstack <app_name> <version>
```

Change `<app_name>` with your own and `<version>` with release version.
See [release page][releasepage] for the version number.

#### Package Version
The versioning number will follow the release of the Laravel version, followed by the package release number:

```
x.y  =>  x is Laravel version, y are Alt Stack version.
7.5  =>  Laravel 7.x.x, Alt Stack revision 5.
```

### Local Installation
Edit or create `.env` file and then execute:

```bash
# Composer dependencies
composer install --no-suggest
php artisan key:generate --force
php artisan migrate:fresh --seed

# Publish vendor components
php artisan vendor:publish --tag=blade-heroicons --force
php artisan livewire:publish --assets --force

# Compiling resources
npm install --no-optional --no-audit
npm run dev
```

## Contributing
Current state we won't accept any PR requests to this project. If you have discovered a bug or have an
idea to improve the code, contact us first before you start coding.

## Security Issue
If you discover any security related issues, please send an e-mail to [riipandi@gmail.com](mailto:riipandi@gmail.com)
instead of using the issue tracker.

## LICENSE
Laravel is a trademark of Taylor Otwell, TailwindCSS is a trademark of Adam Wathan, Laravel Livewire and
Alpine.js is a trademark of Caleb Porzio. Both of them are licensed under the terms of the MIT License.
This template licensed under the terms of [Apache License 2.0][choosealicense].

```
Copyright 2019-2020 Aris Ripandi.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```

Please see [license file](./license.txt) for more information.

[choosealicense]:https://choosealicense.com/licenses/apache-2.0/
[releasepage]:https://github.com/riipandi/altstack/releases
