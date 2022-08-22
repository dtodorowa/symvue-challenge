# symvue-challenge
Code challenge for learning Symfony and Vue.js

### Pre-reqs
You need to have mySQL, PHP and Node.js installed for this to work

### Setting Up the Backend and DB 
create the db, add a symvue user and grant privileges:

```
mysql -uroot -p [your password]
CREATE DATABASE symvue CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'symvue_user'@'localhost' IDENTIFIED BY 'super.strong.pword';
GRANT ALL PRIVILEGES on symvue.*  to 'symvue_user'@'localhost';
```
install dependencies and run the db migration:
```
cd symvue-server
composer install
php bin/console doctrine:migrations:migrate
```
populate the database 
```
INSERT INTO policy_type (type) VALUES ('Public Liability');
INSERT INTO policy_type (type) VALUES ('Motor Fleet');
INSERT INTO client (name) VALUES ('Achme Broker Ltd');
INSERT INTO customer (name, address) VALUES ('ABC Joinery', '12 Ascott Street, Dundee');
INSERT INTO customer (name, address) VALUES ('XYZ Plumbing', '24 Fleet Street, Glasgow');
INSERT INTO customer (name, address) VALUES ('Fast Taxis', '324b Bank Street, Aberdeen');
INSERT INTO insurer (name) VALUES ('Aviva');
INSERT INTO insurer (name) VALUES ('Allianz');
INSERT INTO insurer (name) VALUES ('QBE');
INSERT INTO policy (client_id, customer_id, policy_type_id, insurer_id, premium) VALUES (1,1,1,1,123.87);
INSERT INTO policy (client_id, customer_id, policy_type_id, insurer_id, premium) VALUES (1,2,1,2,2321.45);
INSERT INTO policy (client_id, customer_id, policy_type_id, insurer_id, premium) VALUES (1,3,2,1,59897.00);
INSERT INTO policy (client_id, customer_id, policy_type_id, insurer_id, premium) VALUES (1,3,1,3,6845.00);
```

### Running the project
run the api on port 8000
```
cd symvue-server
php -S 127.0.0.1:8000 -t public
```
run the client
```
cd symvue-client
npm install
vue serve
```
et voila:
