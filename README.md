# Laravel Web Application - Software House Services & Courses

### Group Members: 
Sameed Ilyas (426125)
Muhammad Taha Salaar (415961)
Muhammad Zain (405749)
(BESE-13 B)

## Description
This project is a dynamic web application built using the Laravel PHP framework for a software house company. The application provides services and courses to users and integrates various Laravel features such as MVC architecture, routing, Blade templates, middleware, and Eloquent ORM for database interaction. Additionally, user roles (admin and regular users) are implemented to restrict access to certain routes and pages.

## Features
- **Role-Based Access**: Admin users have restricted access to certain pages and functionalities (admin-only pages).
- **Dynamic Content**: Services and courses are dynamically displayed from the database, with CRUD operations available.
- **Eloquent ORM**: Used to interact with the database via models and migrations.
- **Database Migrations**: Includes migrations for creating and managing tables.
- **AJAX and Event Listeners**: Used to fetch and update content dynamically without page reloads.
- **Middleware**: Ensures restricted access for admin pages.

## Technologies Used
- **Laravel**: PHP Framework
- **Blade**: Templating engine for rendering dynamic views
- **Eloquent ORM**: For database interactions
- **AJAX**: For dynamic content updates
- **Middleware**: For user access control
- **MySQL**: Database for storing services, courses, users, etc.

---

## Installation

### Prerequisites
Before you begin, ensure that you have the following installed:
- PHP (>= 8.0)
- Composer
- MySQL or other database

### Steps to Install

1. **Clone the repository**:

    ```bash
    git clone https://github.com/yourusername/laravel-software-house.git
    cd laravel-software-house
    ```

2. **Install dependencies**:

    Use Composer to install all required PHP packages.

    ```bash
    composer install
    ```

3. **Set up the environment**:

    Copy the `.env.example` file to create your `.env` file.

    ```bash
    cp .env.example .env
    ```

    Configure your database connection settings in the `.env` file.

4. **Generate the application key**:

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations**:

    Migrate the database to create necessary tables.

    ```bash
    php artisan migrate
    ```

6. **Seed the database** (optional):

    If you want to populate the database with initial data (e.g., sample services and courses), you can run the database seeder.

    ```bash
    php artisan db:seed
    ```

7. **Start the local server**:

    You can now start the Laravel development server.

    ```bash
    php artisan serve
    ```

    Your application will be accessible at `http://127.0.0.1:8000`.

---

## Folder Structure Overview

- **app/**: Contains application logic (models, controllers, middleware).
  - **Http/Controllers**: Contains all the controller files, including `CourseController`, `ServiceController`, and others.
  - **Models**: Contains models like `Course`, `Service`, `User`, and `Contact` that interact with the database.
  - **Http/Middleware**: Contains the `AdminMiddleware` for role-based access control.
  
- **routes/**: Contains the `web.php` file for defining routes.
  
- **resources/views**: Contains all the Blade templates.
  - `layouts/master.blade.php`: The master layout that includes header, footer, and sidebar.
  - Other Blade templates for displaying dynamic content such as courses and services.

- **database/migrations/**: Contains migration files for creating and modifying database tables (e.g., `courses`, `services`, `users`).

---

## Routes and Controllers

### Routes
Routes for the application are defined in `routes/web.php`. Examples include:
- `/courses` - Displays all courses for regular users.
- `/admin/courses` - Displays courses for admin users (restricted access via middleware).
- `/services` - Displays all services.
- `/services/add` - Allows admin to add a new service (form submission via POST request).

### Controllers
Controllers manage business logic and handle requests for different pages. Key controllers include:
- **CourseController**: Handles actions for courses, including displaying courses, adding, updating, and deleting.
- **ServiceController**: Handles actions for services, similar to `CourseController`.
- **UserController**: Manages user registration, authentication, and user profile.

---

## Key Features Implemented

### 1. **Role-Based Authentication & Middleware**
- Admin pages are protected by **AdminMiddleware**, which requires the correct username (`administrator`) and password (`password`) to access admin-only pages.
  
  Example of middleware:
  ```php
  public function handle($request, Closure $next)
  {
      if ($request->username !== 'administrator' || $request->password !== 'password') {
          abort(403, 'Unauthorized action.');
      }
      return $next($request);
  }

### 2. **Dynamic Content with AJAX**
Services and courses are displayed dynamically using AJAX to ensure a smoother user experience. Data is fetched asynchronously from the server and displayed without the need for a full page reload.

### 3. **CRUD Operations**
- **Create**: Admins can add new services and courses via forms.
- **Read**: Courses and services are displayed dynamically on their respective pages.
- **Update**: Existing services and courses can be updated through the admin panel.
- **Delete**: Admins can delete services and courses after confirmation.

### 4. **Blade Templates**
The application uses Blade templates for rendering views and organizing content. All pages extend a master layout and include specific content sections.

---
### Conclusion
This project demonstrates a robust web application using Laravel that incorporates dynamic content management, user roles, and seamless CRUD operations for services and courses. With the use of AJAX for dynamic updates, Blade templates for efficient view management, and Eloquent ORM for database interactions, the application is designed to offer a smooth and efficient user experience. The implementation of middleware ensures that only authorized users have access to the admin panel, maintaining the security and integrity of the system.


