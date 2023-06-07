## About Laravel Opem Market Charity

(Models are nameed wrong, started working on Product Cart: But charity was a better suite)

Commands needed to get the applications to run

    git clone https://github.com/JBeggs/open-market-charity.git
    cd open-market-charity

    composer require laravel/ui

    nano .env

## Add these database settings

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=username
    DB_PASSWORD=password

## Setup the database and seed some data for the front end

### admin user
### email : admin@micropythonsolutions.co.za
### password : password

    php artisan migrate
    php artisan db:seed

    npm install && npm run dev
    php sertisan serve

## Open browser

### Some features

