
# Tasker - Backend

Tasker is an AI-featured public project management platform where anyone can create an account, create their own projects, and invite other users to collaborate on project development.

This repository contains the backend API built with Laravel, providing authentication, project management, task management, and AI-powered assistance.

## 🚀 Features

- User registration and authentication
- User profile management
- Create and manage projects
- Invite users to projects
- Project member management
- Role-based project access
- Project task management
- AI-powered task management assistant
- Laravel AI SDK integration
- Google Gemini AI provider integration
- Custom AI agents and tools
- User-specific task retrieval through AI tools
- Task filtering by status, priority, and project
- Real-time streaming AI responses
- API-based architecture
- Request validation
- Authorization and access control
- Unit and feature testing with Pest

## 🛠️ Tech Stack

- **PHP**
- **Laravel**
- **MySQL**
- **Laravel AI SDK** - AI integration
- **Google Gemini** - AI provider
- **Pest** - Testing
- **Composer**
- **REST API**

## 📋 Requirements

Make sure the following are installed on your system:

- PHP 8.3+
- Composer
- MySQL 8+
- Laravel 13.8+
- Git
- Google Gemini API Key

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

### 8. Configure AI Integration

Tasker uses Laravel AI SDK with Google Gemini as the AI provider.

Add your Gemini API key to the `.env` file:

```env
GEMINI_API_KEY=your_gemini_api_key
```

You can obtain an API key from [Google AI Studio](https://aistudio.google.com/).

Make sure to keep your API key secure and never commit it to the repository.

### 9. Start the development server

```bash
php artisan serve
```

The backend will be available at:

```text
http://127.0.0.1:8000
```

## 🤖 AI Integration

Tasker integrates AI capabilities using the Laravel AI SDK with Google Gemini as the AI provider.

The AI assistant allows users to interact with their task management data through natural language.

### Key Features

- Google Gemini integration using Laravel AI SDK
- Custom AI Agent implementation
- Custom AI tools for retrieving user-specific tasks
- Context-aware task assistance
- Task filtering based on status, priority, and project
- Real-time streaming AI responses

### AI Agent

Tasker uses a custom AI Agent called `GeminiAssistant`.

The agent is responsible for:

- Understanding user prompts
- Assisting with task-related queries
- Retrieving task information through custom tools
- Providing task management suggestions
- Generating clear and relevant responses

### Custom AI Tools

Tasker uses custom AI tools to allow the assistant to interact with application data.

**GetMyTasksTool**

Retrieves tasks assigned to the authenticated user.

Supports filtering by:

- Task status
- Task priority
- Project name

The tool ensures that users can only retrieve their own assigned tasks.

### AI Chat API

The backend provides an API endpoint for AI chat interactions.

**Endpoint:**

```http
POST /api/v1/ai-chat
```

**Example Request:**

```json
{
    "prompt": "Show my pending tasks"
}
```

The AI assistant processes the request using Google Gemini and available custom tools.

Responses are streamed to the frontend in real time using Server-Sent Events (SSE).

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
│   ├── AI/
│   │   ├── Agents/
│   │   │   └── GeminiAssistant.php
│   │   └── Tools/
│   │       └── GetMyTasksTool.php
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
/api/v1/login
/api/v1/register
/api/v1/projects
/api/v1/projects/{project}/sections
/api/v1/tasks
/api/v1/ai-chat
```

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
- Interact with the AI assistant

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
- User-specific AI tool access

Sensitive environment variables and credentials must not be committed to the repository.

## Code Quality

The project aims to maintain:

- Clean and maintainable code
- Repository pattern
- SOLID principles
- Laravel conventions
- Separation of responsibilities
- Reusable business logic
- Meaningful naming
- Automated testing
- Proper request validation
- Proper authorization
- Consistent API responses

## License

This project is currently developed as a personal project and portfolio application.

## Author

**Saheer K P**

Full Stack Software Engineer
