# HospitalRegistrySystem2021
this is a project for hospital registry system  <br>
Laravel | Bootstrap 4 | Select2 | Jquery | Accessors & Mutators | MySql | MultiAUth Admin | Mailable | ERD | Eager Loading | DataTables
Configure local development server

- [ ] Turn your Your development Server(e.g wampp / xampp)
	- [ ] http://localhost/phpmyadmin/
	- [ ] create database ~ hospitalregistrysystem2021_test
- [ ] clone from github
```
git clone https://github.com/rifatron999/HospitalRegistrySystem2021.git
```
	- [ ] cd projectName
```
composer install
```

```
cp .env.example .env
```
	- [ ] copy to env file
```
APP_NAME='Hospital Registry System 2021'
APP_ENV=local
APP_KEY=base64:7LaB+E1ttrV5bbwYrNiXyXICO38VFySa5lpoYZWZoIc=
APP_DEBUG=false
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospreg
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=1800

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=demoemailron@gmail.com
MAIL_PASSWORD=Ri123456789~
MAIL_ENCRYPTION=tls

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

```
php artisan key:generate
```
- [ ] migrate tables
```
php artisan migrate
```
- [ ] generate super-admin seed
```
php artisan multiauth:seed --role=super
```
- [ ] start server
```
php artisan serve --port 3000
```
- [ ] go to 
```
http://localhost:3000
```
- [ ] login
	- [ ] super@admin.com => secret (wrong first)
- [ ] Create Role
	- [ ] system_user =>1 Admin
	- [ ] doctor => 2 Admin
	- [ ] hospital_agent => 2 Admin
- [ ] create hospital
	- [ ] LABAID Specialized Hospital 
		- [ ] 09666710606
			- [ ] House- -1 and, 6 Road No 4, Dhaka 1205
	- [ ] Square Hospitals Ltd
		- [ ] 028144400
			- [ ] 18 Bir Uttam Qazi Nuruzzaman Sarak West, Panthapath, Dhaka 1205
	- [ ] Evercare Hospital Dhaka
		- [ ] 09666710607
			- [ ] Plot: 81 Block: E, Dhaka 1229
- [ ] 
- [ ] create Admin (new Admin)
	- [ ] rcr@gmail.com => doctor + hospital agent

<br>Designed and Developed BY 
![sinnature](https://user-images.githubusercontent.com/43786423/120041270-c4084300-c029-11eb-80b4-8be1374d6ac6.png)
