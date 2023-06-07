## About Laravel Open Market Charity

(Models are nameed wrong, started working on Product Cart: But charity was a better suite)

### Word of advice on updating user, password is username on Guest accounts

Commands needed to get the applications to run

    git clone https://github.com/JBeggs/open-market-charity.git
    cd open-market-charity

    composer require laravel/ui

    nano .env

### Update these database settings

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=username
    DB_PASSWORD=password





## admin user

##### email    : admin@micropythonsolutions.co.za
##### password : password

### Setup the database and seed some data for the front end

    php artisan migrate
    php artisan db:seed

### Install npm and run dev

    npm install && npm run dev
    php sertisan serve

## Open browser

http://127.0.0.1:8000

# Some features

## Guest Login

One click login for looking around

![guest](public/images/README/guest-login.png)

## Cart

Basic cart, Add to Cart and Remove

![guest](public/images/README/cart.png)

Click on show first 

![guest](public/images/README/show.png)

Then Add to Cart

![guest](public/images/README/cart-add.png)

### Users Manage their Own Charities

![guest](public/images/README/charity.png)

### Charity Admin

Login

![guest](public/images/README/admin-panel.png)

### Crude Content Management to edit banners

![guest](public/images/README/content.png)

### Admin can edit all Charities and Delete them

![guest](public/images/README/manage-charity.png)
