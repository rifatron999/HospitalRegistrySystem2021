# HospitalRegistrySystem2021
This is a project for hospital registry system  <br>
Laravel | Bootstrap 4 | Select2 | Jquery | Accessors & Mutators | MySql | MultiAUth Admin | Mailable | ERD | Eager Loading | DataTables
---
Configure local development server (beta 0.0.1)

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
- [ ] update \vendor\bitfumes\laravel-multiauth\src\Http\Controllers\AdminController.php index function
```
use App\Prescription;
use App\Patient;
use App\Hospital;
use App\Disease;
use App\Treatment;
```

```
public function index()
    {
        $result = Prescription::with([
                                'patient' => function($q){
                                    $q->select('id', 'name');
                                },
                                'hospital' => function($q){
                                    $q->select('id', 'name');
                                },
                                'doctor' => function($q){
                                    $q->select('id', 'name');
                                },
                            ->orderBy('date', 'desc')
                            ->paginate(2);
            foreach ($result as $key => $value) {
                $diseaseList = Disease::select('id' , 'name' )->whereIn('id' , $value['disease_id'])->get()->toArray() ;
                $result[$key]['disease'] = $diseaseList;

                $treatmentList = Treatment::select('id' , 'name' )->whereIn('id' , $value['treatment_id'])->get()->toArray() ;
                $result[$key]['treatment'] = $treatmentList;
            }
        return view('multiauth::admin.home' , compact('result') );

    }
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
	- [ ] Full Navbar is visible for super admin
	- [ ] config/multiauth => admin_active - false
		- [ ] it will hide admin
- [ ] Create Role
	- [ ] system_user =>1 Admin
	- [ ] doctor => 2 Admin
	- [ ] hospital_agent => 2 Admin
- [ ] create Admin (new Admin)
	- [ ] Kawsarul Alam => demoemailron@gmail.com => system_user => no hospital
		- [ ] Email has been sent
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
			- [ ] create Treatment
				- [ ] Radiation Therapies
					- [ ] Radiation therapy, or radiotherapy, uses high-energy rays to damage or kill cancer cells by preventing them from growing and dividing. Similar to surgery, radiation therapy is a local
				- [ ] Surgery
					- [ ] Surgery is used in many ways, including for diagnosing cancer, determining the stage of the cancer, removing the primary tumor and relieving symptoms.
				- [ ] Histasin tablets 10mg
					- [ ] The antihistamine relieves itchy/watery eyes and itchy throat by blocking a substance (histamine) released by allergies.
				- [ ] Nitroglycerin 500mg
					- [ ] his medication, used to treat chest pain (angina), can help improve blood flow to the heart by widening (dilating) the blood vessels
				- [ ] Oxifun Creame
					- [ ] for fungal infection
			- [ ] create disease
				- [ ] Cancer
					- [ ] Cancer occurs when cells do not die at the normal point in their life cycle.
				- [ ] Heart disease
					- [ ] Heart disease is the leading cause of deathTrusted Source for both men and women. This is the case in the U.S. and worldwide.
				- [ ] Fungal Infection
					- [ ] Fungal Infection
	- [ ] Raif Hassan => rifatron99@gmail.com => hospital_agent
		- [ ] Email has been sent
		- [ ] He Can Only create Patient
		- [ ] let's login as a doctor + Hospital agent
	- [ ] Rifat Chowdhury Ron => rifatron999@gmail.com => doctor + hospital_agent 
			- [ ] email check
			- [ ] create 3 patient
				- [ ] nobel@gmail.com
				- [ ] rahul@gmail.com
				- [ ] sifat@gmail.com
			- [ ] create prescroption
				- [ ] 3 prescription
					- [ ] edit one 
					- [ ] delete one 
			- [ ] do to dashboard 
				- [ ] search
	- [ ] Nour Hassan => rifatron001@gmail.com => doctor
			- [ ] email check
---

<br>Designed and Developed BY 
![sinnature](https://user-images.githubusercontent.com/43786423/120041270-c4084300-c029-11eb-80b4-8be1374d6ac6.png)
