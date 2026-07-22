# Laravel Task Manager

## About
Laravel Task Manager is a task management application built as a rewrite of my previous PHP Task Manager project. The main goal was to learn the Laravel framework, MVC architecture, Eloquent ORM, authentication, and Docker-based development workflow.

## Features
- User registration
- User login and logout
- Password hashing
- Task creation
- Task editing
- Task deletion
- Task status management
- Sorting tasks by status, priority and due date
- User-specific task management
- Authentication and authorization
- Dockerized development enviroment

## Technologies
- Laravel 12 
- PHP 8.2
- Blade
- MySQL 8
- Docker & Docker Compose
- Nginx
- HTML
- CSS
- JavaScript
- Eloquent ORM

## Project Structure
The application follows the MVC architecture: 
- Models - business logic and database relationships
- Views (Blade) - user interface
- Controllers - request handling and application logic

## Database 
The application uses two main tables: 
- users 
- tasks

Each task belongs to one user using a foreign key relationship.

## Security
- Passwords are hashed using Laravel Hash
- CSRF protection for forms.
- Dashboard access is restricted to authenticated users.
- Users can edit and delete only their own tasks.
- Input validation using Laravel validation.
- SQL injection protection through Eloquent ORM

## Installation
1. Clone the repository
git clone <repository-url>
cd laravel-task-manager

2. Create the environment file 
cp .env.example .env

3. Start Docker
docker compose up -d --build

4. Generate app key 
docker compose exec app php artisan key:generate

5. Run migrations 
docker compose exec app php artisan migrate

6. Open the app 
http://localhost:8080

## Docker Architecture
The application consists of three containers: 
- app - PHP 8.2 with Laravel (PHP-FPM)
- nginx - Web server
- db - MySQL 8 database

## What I learned
During this project I learned:
- Laravel routing
- MVC architecture
- Eloquent ORM
- Route Model Binding
- Authentication using Laravel Auth
- Blade templating
- CRUD operations
- Form validation
- Middleware and authorization
- Database migrations
- Docker 
- Docker Compose
- Nginx + PHP-FPM architecture
- Running Laravel inside containers

## Most challenging tasks
My main challange was to get into object-oriented programming, understanding where the data comes from and how it flows.
Once I understood the flow everything was pretty easy, I could tell that Laravel makes difference when working with data flow, definietly easier then plain PHP where HTML code and PDO are in the same file making it a bit messy, controllers in Laravel solved it very well. Overall really enjoyed working in Laravel. 
Another important challange was learning Docker. Building a complete development enviroment with PHP-FPM, Nginx and MySQL helped me understand how modern Laravel applications are structred and deployed.

## Note
Docker enviroment and some parts of Laravel for this project was built as part of my learning process. 
While working on it, I used AI as a learning assistant to better understand Docker concepts, containerization, networking, and best practices. Every configuration was built step by step with the goal of understanding why each component is needed rather than simply copying a ready-made setup.

I believe being able to effectively learn and solve problems using modern AI tools is an important skill for software developers, alongside understanding the underlying technologies.

## Status 
Completed.
