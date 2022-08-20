# symvue-challenge
Code challenge for learning Symfony and Vue.js


### Setting Up the DB 
creating the db, a user and granting privileges

```
mysql -uroot -p
CREATE DATABASE symvue CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'symvue_user'@'localhost' IDENTIFIED BY 'super.strong.pword';
GRANT ALL PRIVILEGES on symvue.*  to 'symvue_user'@'localhost';
```
