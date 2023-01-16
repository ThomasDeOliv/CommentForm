# Welcome to CommentForm !
Tool designed for collecting people opinions through a Web site

## Give us your opinion
A simple form is provided for visitors, with a minimum of personal datas required.

## Consult others people opinions
Consult and sort easely the opions of others people.

## Intuitive navigation
Navigate with an intuitive menu available everywhere on the website

# Requirement

- A server : Apache2 for example, 
- [Composer](https://getcomposer.org/)
- [PHP 8.1](https://www.php.net/manual/fr/intro-whatis.php)
- [MySQL](https://www.mysql.com/)

# Installation

**After installing all the dependencies, expose the public folder of this project in your server provider**

First, from the **.env.example** file, you need to create and complete the **.env** file with all the environment variables (*For example : MySQL host, port, user, password, ...*).

Then, in the folder of your application, type the following line before starting your server daemon :
```
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
```
This will install all dependencies, generate the Application Key, do all migration in your database and create a symbolic link between the storage and the public folder.