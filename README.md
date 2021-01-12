# Tweets

### Prerequisites

You must install: 

- [Docker](https://docs.docker.com/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [git](https://git-scm.com/downloads)

### Cloning Repository

`$ git clone https://github.com/l-mendes/livewire-example.git tweets` 

### Environment Variables

Clone the example file and make the necessary adjustments:

`$ cp .env.example .env`

### Dependencies

Install dependencies by running the following command:

`$ docker-compose run --rm php-fpm composer install --ignore-platform-reqs`

### Hosts File

Add the following line to your hosts file (`/etc/hosts`)

```
127.0.0.1 http://tweets.localhost.com.br
```

### Running it locally

`$ docker-compose up -d`

The application should be available at: http://tweets.localhost.com.br

### Migrations

Run laravel migrations to create the tables

`$ docker-compose run --rm php-fpm php artisan migrate`

### SSH

`$ docker-compose exec [container-name] sh`

Example:

`$ docker-compose exec webserver sh`

`$ docker-compose exec php-fpm sh`