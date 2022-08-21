# symvue-challenge
Code challenge for learning Symfony and Vue.js


### Setting Up the Backend and DB 
to create the db, add a symvue user and grant privileges:

```
mysql -uroot -p
CREATE DATABASE symvue CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'symvue_user'@'localhost' IDENTIFIED BY 'super.strong.pword';
GRANT ALL PRIVILEGES on symvue.*  to 'symvue_user'@'localhost';
```
to install dependencies and run db migration:
```
composer install
php bin/console doctrine:migrations:migrate
```
to run the backend on port 8000:
```
php -S 127.0.0.1:8000 -t public
```
