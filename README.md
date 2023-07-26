# laravel-parent-assessment


### Clone Repo

- Clone the repository from 

```bash
git clone https://github.com/shabayekdes/laravel-parent-assessment.git
```

### Installation

- Go to folder of project and install composer

```bash
cd laravel-parent-assessment
composer install
cp .env.example .env
```

- Run server with 

```bash
php artisan serve
```

- run artisan test

```bash
php artisan test
```

- open your browser and click on http://127.0.0.1:8000/

### Installation via Docker

> make sure you install docker on local machine first 

- run with laravel sail

```bash
./vendor/bin/sail up -d
./vendor/bin/sail composer install
```

- run artisan test

```bash
./vendor/bin/sail artisa test
```

- open your browser and click on http://127.0.0.1:8080/

