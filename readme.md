<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# The movies

Справочник фильмов, отсортированный по тегам.

## Запуск поректа

```
composer install
docker-compose up
```

Проект будет доступен по адерсу:

http://movies.localhost/

Применение миграций:
```
docker exec -it movies-php-fpm sh
php artisan migrate
```

phpMyadmin:

http://movies.localhost:8080