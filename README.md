# Tasker - Backend

Tasker is a public project management platform where anyone can create an account, create their own projects, and invite other users to participate in project development.

This repository contains the backend API built with Laravel.

## 🚀 Features

- User registration and authentication
- User profile management
- Create and manage projects
- Invite users to projects
- Project member management
- Role-based project access
- Project task management
- API-based architecture
- Request validation
- Authorization and access control
- Unit and feature testing with Pest

## 🛠️ Tech Stack

- **PHP**
- **Laravel**
- **MySQL**
- **Pest** - Testing
- **Composer**
- **REST API**

## 📋 Requirements

Make sure the following are installed on your system:

- PHP 8.2+
- Composer
- MySQL 8+
- Laravel requirements
- Git

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd tasker-backend
```

### 2. Install PHP dependencies
```bash
composer install
```


### 3. Create the environment file

Copy the example environment file:

```bash
cp .env.example .env
```

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Configure the environment

Update the `.env` file with your local database configuration.

```env
APP_NAME=Tasker
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasker
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Create the database

Create a MySQL database that matches the `DB_DATABASE` value in your `.env` file.

```sql
CREATE DATABASE tasker;
```

### 7. Run migrations

```bash
php artisan migrate
```

To run migrations with seed data:

```bash
php artisan migrate --seed
```

### 8. Start the development server

```bash
php artisan serve
```

The backend will be available at:

```text
http://127.0.0.1:8000
```

## Testing

Tasker uses Pest for unit and feature testing.

Run the complete test suite:

```bash
php artisan test
```

Or run Pest directly:

```bash
./vendor/bin/pest
```

Run a specific test file:

```bash
./vendor/bin/pest tests/Feature/ExampleTest.php
```

Run tests with coverage:

```bash
./vendor/bin/pest --coverage
```

## Project Structure

```text
tasker-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Resources/
│   ├── Models/
│   ├── Services/
│   └── ...
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── api.php
│   └── web.php
├── tests/
│   ├── Feature/
│   └── Unit/
├── config/
├── resources/
├── storage/
├── .env.example
├── composer.json
└── README.md
```

## API

The Tasker backend provides RESTful APIs for the frontend application.

The API is versioned under:

```text
/api/v1
```

Main API modules include:

```text
/api/v1/auth
/api/v1/users
/api/v1/projects
/api/v1/tasks
/api/v1/invitations
```

API documentation will be added as the project develops.

## Authentication

Tasker provides authentication for registered users.

Authenticated users can:

- Manage their profile
- Create projects
- Update and manage their projects
- Invite other users
- Manage project members
- Create and manage tasks
- Access projects they are authorized to participate in

Protected API endpoints require authentication.

## Project Workflow

The basic workflow of Tasker is:

```text
User
  │
  ├── Sign Up
  │
  └── Create Project
          │
          ├── Manage Project
          │
          ├── Create Tasks
          │
          └── Invite Users
                  │
                  ├── Accept Invitation
                  │
                  └── Participate in Project
```

A user can create multiple projects and participate in projects created by other users.

## Security

The application follows Laravel's built-in security practices, including:

- Request validation
- Authentication
- Authorization
- Password hashing
- Mass-assignment protection
- SQL injection protection through Eloquent and Query Builder
- Secure API access
- Environment-based configuration

Sensitive environment variables and credentials must not be committed to the repository.

## Development Workflow

The recommended development workflow is:

```text
Create Branch
      ↓
Implement Feature
      ↓
Write Tests
      ↓
Run Test Suite
      ↓
Review Code
      ↓
Create Pull Request
      ↓
Merge
```

## Code Quality

The project aims to maintain:

- Clean and maintainable code
- SOLID principles
- Laravel conventions
- Separation of responsibilities
- Reusable business logic
- Meaningful naming
- Automated testing
- Proper request validation
- Proper authorization
- Consistent API responses

## Future Improvements

Planned improvements may include:

- Real-time project collaboration
- Notifications
- Advanced project roles and permissions
- Activity logs
- Comments and discussions
- File attachments
- API documentation
- CI/CD pipeline
- Docker support

## License

This project is currently developed as a personal project and portfolio application.

## Author

**Shaheer K P**

Full Stack Software Engineer