<p align="center"><img src="public/favicon.ico" width="100" alt="OSL Logo"></p>

# OSL - Open Source Learning

## About OSL

OSL is an application with an LMS (Learning Management System) concept which aims for special training in programming. This was created to provide free learning resources for anyone, according to the name of the application, open source learning.

## Features
- Create courses easily, adjust the amount of material in the course and can be updated at any time.
- Create a test to check how far students understand the material they have studied.
- Get a certificate after successfully passing a course with a certain grade.
- Useful feedback feature from users on the quality of the course to develop it even better.

## Roles
There are two roles in this application, namely **administrator** and **user**. The administrator functions to manage the entire course. Administrators can manage courses by going to the [/admin](#) page. While the user is a student.

## Deployment
1. Make sure all the required software is installed. This application uses the [Laravel 10 framework](https://laravel.com/docs/10.x/releases) and uses [MYSQL](https://www.mysql.com/) for database system.
2. Clone this project using `git clone (repository url)` command. Example:
```
git clone https://github.com/yosmisyael/lms-open-source-learning.git .
```
3. Copy the .env file and configure it.
4. Generate application key with following command:
```
php artisan key:generate
```
5. Delete `/storage` directory inside `public` folder.
6. Create link to `storage` directory with following command:
```
php artisan storage:link
```
7. Run database migration with following command:
```
php artisan migrate
```
8. You can optionally run database seeder for courses, tests, and users example with following command:
```
php artisan db:seed
```

## License
The OSL is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).