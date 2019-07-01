Project :  Peolple10 Assignment

Technology  :  
php 7.1
Laravel 5.4 framework (MVC)
MySQL 3.1
Guzzle ( Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services. http://docs.guzzlephp.org/en/stable/)
Eloquent ORM (Laravel)
xampp server
Php Storm (IDE)
Postman (For Testing Http request)

1. create laravel project through  composer
      
	  
2.create table through migration files

php artisan make:migration create_employees_table --create=employees

php artisan make:migration create_employee_web_history_table --create=employee_histories

3. crating table in database

php artisan migrate

4- Start Server

php artisan serve

5- Create Model for table under App

php artisan make:model Emloyee
php artisan make:model EmloyeeHistory

6- Create Controller 	
App\Http\Controllers\API

php artisan make:controller API/PostAPIController --resource

php artisan make:controller API/EmpWebController --resource

7. Write Logic Perfom Opration like Get, POST, Delete

8. Create Custom Artisan Command in Laravel for perform opration through Command Promt
(app/Console/Command/)
php artisan make:command userData

9- After create class for command mention in Kernel.php

10- create resource routes for list create, delete, get

routes/api.php


Testing Request through Postman 
================================

For Employee

#based on request like get, delete, post call particular method
http://127.0.0.1:8000/api/posts/

#fetch all data from employee table
http://127.0.0.1:8000/api/post/

#get data based on ip address in employee table
http://127.0.0.1:8000/api/search/{ip_address}

#delete request based on ip address in employee table
http://127.0.0.1:8000/api/delete/{ip_address}

For Employee Web History

#fetch all data from employeeWebHistory table
http://127.0.0.1:8000/api/empweb/

#get data based on ip address in employee history table
http://127.0.0.1:8000/api/empsearch/{ip_address}

#delete request based on ip address in employee history table
http://127.0.0.1:8000/api/empdel/{ip_address}

#Post request based on ip address in employee web history table
http://127.0.0.1:8000/api/emppost/{ip_address}


Testing request through command 
===================================
Employee table-

#set data in employees table  - id, emp_id, epm_name,ip_address
php artisan set:employee 14 6 ashish 192.168.22.21 

#get employee data basis on ip_address Command description
	php artisan get:employee 192.168.22.21

#delete data Command description from ip_address
php artisan unset:employee 192.168.22.21


Emloyee Web Search History Table- 


#set data in employees table , ip_address, url
php artisan set:empwebhistory 192.168.22.21 yahoo.com

#get data from employees_histories table
php artisan get:empwebhistory 192.168.22.21

#detele data from employees_histories table based on Ip Address
php artisan unset:empwebhistory 192.168.22.21



