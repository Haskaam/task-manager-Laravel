# Laravel Task Manager

## About
This project is a Laravel implementation of my previous PHP Task Manager. It was created to learn MVC architecture, Eloquent ORM and Laravel best practices.

## Features
- User registration
- User login and logout
- Password hashing
- Task creation
- Task editing
- Task deletion
- Task status management
- Task sorting by status, priority and due date
- User-specific task management

## Technologies
- Laravel
- PHP
- Blade
- MySQL
- HTML
- CSS
- JavaScript
- Eloquent ORM

## Database 
The application uses two main tables: 
- users 
- tasks

Each task belongs to one user using a foreign key relationship.

## Security
Passwords are hashed using Hash::make.
CSRF protection for forms.
Dashboard access is restricted to authenticated users.
Users can edit and delete only their own tasks.
Input validation using Laravel validation.
Eloquent ORM prevents SQL injection through parameter binding.

## Installation

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

## Most challenging tasks
My main challange was to get into object-oriented programming, understanding where the data comes from and how it flows.
Once I understood the flow everything was pretty easy, I could tell that Laravel makes difference when working with data flow, definietly easier then plain PHP where HTML code and PDO are in the same file making it a bit messy, controllers in Laravel solved it very well. Overall really enjoyed working in Laravel. 

## Status 
Completed.
