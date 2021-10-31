<h1 align="center">Patient Management Portal</h1>

Built with [TALL Stack](https://tallstack.dev "Reactive Laravel apps with the TALL stack"). This is a basic patient management portal that lets nurses manage patients.

### Prerequisites
- PHP 7.3+ | 8.0+
- Composer
- MySQL 5.7.23+

### Installation
Clone the repository
```shell
git clone https://github.com/iamwebwiz/tallstack-patient-management-portal
```

Navigate into the cloned project directory
```shell
cd tallstack-patient-management-portal
```

Copy the contents of `.env.example` to `.env`
```shell
cp .env.example .env
```

Install composer dependencies
```shell
composer install
```

Install NPM dependencies and compile the assets
```shell
npm install && npm run dev
```

Generate application key
```shell
php artisan key:generate
```

Create a database in your SQL client app, then update the database information in `.env` with the correct values
```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

Run the migration & seed the database
```shell
php artisan migrate --seed
```

Start the development server
```shell
php artisan serve
```

Visit 127.0.0.1:8000 a web browser of your choice after serving the app to see the UI.

Sign in with this credentials for demo purposes

| Email | Password |
|-------|----------|
| nurse@circlelinkhealth.com | password |


### Testing
To run the tests in the application, enter the following command:
```shell
composer test
```

### License
MIT
