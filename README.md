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

### Customizing

By following these simple steps, you can easily add new data providers

- Add new class to app/Dto that extend from abstract class **DtoUser** and pass parameters to parent constructor **provider name**, **status**, **balance** and all array 

```php
namespace App\Dto;

class DtoUserY extends DtoUser
{
    public function __construct(array $json)
    {
        $status = $this->getStatus($json['statusCode']);
        parent::__construct('DataProviderY', $status->value, $json['parentAmount'], $json);
    }
    // ...
}
```

- add method get status, you can use enum class called **StatusLabel** to map status value with three status

```php

class DtoUserY extends DtoUser
{
    // ...
    private function getStatus($status)
    {
        return match ($status){
            1 => StatusLabel::AUTHORISED,
            2 => StatusLabel::DECLINE,
            3 => StatusLabel::REFUNDED
        };
    }
}
```

- put json file on database path 

- add DtoUserZ which you created on **data_provider** config with path of json file

```php
use App\Dto\DtoUserX;
use App\Dto\DtoUserY;

return [
    'providers' => [
        DtoUserX::class => database_path('DataProviderX.json'),
        DtoUserY::class => database_path('DataProviderY.json')
        // Add more data providers here as needed
        // App\Dto\DtoUserZ::class => database_path('DataProviderZ.json')

    ],
];
```

#### Feel Free to Contact Me:

If you have any questions or need further information about this project or my qualifications, 
please don't hesitate to reach out. I'm available for discussions and would be glad to provide additional insights. 
You can contact me via email at [esmail.shabayek@gmail.com](mailto:esmail.shabayek@gmail.com). 
Thank you for considering my application.

