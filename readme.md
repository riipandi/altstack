<p align="center"><img src="./public/banner.png" width="467" height="140" alt="Project Logo"></p>
<p align="center">
    <a href="https://github.com/riipandi/altstack/pulse">
        <img src="https://img.shields.io/badge/Contributions-welcome-blue.svg?style=flat-square" alt="Contribution welcome">
    </a>
    <a href="https://packagist.org/packages/riipandi/altstack">
        <img src="https://poser.pugx.org/riipandi/altstack/d/total.svg?format=flat-square" alt="Total Download">
    </a>
    <a href="https://packagist.org/packages/riipandi/altstack">
        <img src="https://poser.pugx.org/riipandi/altstack/v/stable.svg?format=flat-square" alt="Latest Stable Version">
    </a>
    <a href="https://choosealicense.com/licenses/mit/">
        <img src="https://img.shields.io/github/license/riipandi/altstack?style=flat-square" alt="License">
    </a>
</p>

## Introduction

AltStack is a boilerplate meant to standardize much of the setup that almost every web 
application needs. Reclaim your first few hours of development on every new project by 
allowing AltStack to give you a little speed boost. This is the Laravel template use 
Tailwind and Alpine.js as default preset and ships with some goodies.

I'm using this template for (nearly) all my personal projects and professional projects,
but you may use my template but please notice that we offer no support whatsoever. We 
won't guarantee that the code (especially the main branch) is stable.

> In short: when using this, you're on your own.

## Quick Start

At least you will need `PHP >= 8.0` and `Nodejs >= 14.19`. For database backend, you can 
choose between `PostgreSQL >= 10` or `MySQL >= 5.7` or `MariaDB >= 10.3` or any other 
database engine that supported by Laravel. Also, you maybe want to use `Redis >= 5.x` for 
session store and or caching storage. Docker `>= 20.10` may required when developing 
using Laravel Sail.

By default I'm using PostgreSQL for main database. But, you can change it via `.env`
configuration file.

### Prepare the database

```sql
-- If using PostgreSQL: sudo -u postgres psql
DROP DATABASE IF EXISTS "altstack"; DROP ROLE IF EXISTS "altstack";
CREATE ROLE "altstack" SUPERUSER CREATEDB CREATEROLE LOGIN ENCRYPTED PASSWORD 'passw0rd';
CREATE DATABASE "altstack"; GRANT ALL PRIVILEGES ON DATABASE "altstack" TO "altstack";

-- If using MariaDB 10.x: mysql -uroot -p
DROP USER IF EXISTS `altstack`@`localhost`;
DROP DATABASE IF EXISTS `altstack`; CREATE DATABASE `altstack`;
GRANT ALL PRIVILEGES ON `altstack`.* TO `altstack`@`localhost` 
  IDENTIFIED BY 'passw0rd' WITH GRANT OPTION;
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

The versioning number will follow the release of the Laravel version, followed by the 
package release number:

```
x.y  =>  x is Laravel version, y are AltStack version.
7.5  =>  Laravel 7.x.x, AltStack revision 5.
```

### Local Installation

Edit or create `.env` file and then execute:

```bash
# Initialize project and dependencies
composer install --no-suggest
sail|php artisan key:generate
sail|php artisan migrate:fresh --seed
sail|php artisan storage:link

# Compiling resources
yarn install --non-interactive
yarn dev
```

> Default username is `admin` with `secret` for the password.

### Example Deployment

```sh
# Clone the project
sudo mkdir -p /srv/altstack ; cd $_
sudo chown -R $(whoami): /srv/altstack
git clone git@github.com:riipandi/altstack.git current

# Fix folder permissions
find /srv/altstack/. -type d -exec sudo chmod 0775 {} \;
find /srv/altstack/. -type f -exec sudo chmod 0644 {} \;
sudo chown -R $(whoami): /srv/altstack/current/.git
sudo chmod -R 0777 /srv/altstack/current/{bootstrap/cache,storage}
sudo chown -R webmaster:webmaster /srv/altstack
sudo chmod 0777 /srv/altstack

# Nginx virtualhost
sudo touch /etc/nginx/vhost.d/altstack.conf
cat /srv/altstack/current/stubs/vhost.nginx.stub | \
sudo tee /etc/nginx/vhost.d/altstack.conf > /dev/null
sudo systemctl restart nginx && sudo systemctl status nginx

# Supervisor daemon
sudo touch /etc/supervisor/conf.d/altstack.conf
cat /srv/altstack/current/stubs/supervisor.stub | \
sudo tee /etc/supervisor/conf.d/altstack.conf > /dev/null
sudo supervisorctl reread && sudo supervisorctl update
sudo supervisorctl restart altstack
sudo systemctl status supervisor
```

## Security Issue

If you discover any security related issues, please send an e-mail to 
[riipandi@gmail.com](mailto:riipandi@gmail.com) instead of using the issue tracker.

## Thanks To...

In general, I'd like to thank every single one who open-sources their source code for
their effort to contribute something to the open-source community.
Your work means the world! 🌍 ❤️

## License

This project is open-sourced software licensed under the [MIT license](https://aris.mit-license.org).

Copyrights in this project are retained by their contributors.
See the [license file](./license.txt) for more information.

[releasepage]:https://github.com/riipandi/altstack/releases
