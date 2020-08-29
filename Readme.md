# 🐳 Docker + PHP 7.4 + Nginx + Symfony 5

## Description

This is a test app working with Foreign exchange rates API.

It is composed by 2 containers:

- `nginx`, acting as the webserver.
- `php`, the PHP-FPM container with the 7.4 PHPversion.

## Installation

1. Clone this repository.

2. Run `docker-compose up -d`

3. The 2 containers are deployed.

4. Run `docker-compose exec php bash` to get CLI access to the PHP container

5. Run `composer install`

6. Go to <localhost:300/api/rates> and check currency rates for USD, EUR, RUB, CNY(EUR is the base currency by default)

