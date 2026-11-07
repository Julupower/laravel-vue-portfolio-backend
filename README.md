# Enterprise Portfolio API (Laravel REST Backend)

A decoupled, production-grade RESTful API built with Laravel 11, Docker, and MySQL. Engineered to enterprise software standards featuring custom API Resource transformers, stateful CSRF protection via Sanctum, database seeding factories, and complete automated PHPUnit feature testing.

---

## Architecture & Standards

- Framework: Laravel 11 (PHP 8.2+)
- Environment Orchestration: Docker Sail (PHP, MySQL, Redis, Mailpit)
- API Architecture: RESTful Resource Controllers (JsonResource)
- Authentication & Security: Laravel Sanctum (CORS & Cookie-based CSRF protection)
- Persistence Layer: MySQL 8 with Eloquent ORM & Database Seeder Factories
- Testing Engine: PHPUnit / Laravel Feature & Unit Suite

---

## REST API Endpoints Overview

| Method | Endpoint | Description | Response Type |
| :--- | :--- | :--- | :--- |
| GET | /api/v1/projects | Fetch all portfolio projects with tag relations | Flat REST Array |
| GET | /api/v1/projects/{slug} | Fetch single project by unique URL slug | Detailed JSON Resource |
| GET | /api/v1/tags | Fetch available technology stack tags | Tag Array |
| POST | /api/v1/login | Authenticate administrative user | Sanctum Cookie / Token |

---

## Local Development Setup (Laravel Sail)

### Prerequisites
- Docker Desktop installed and running
- Git

### Installation Protocol

1. Clone the repository:
   git clone https://github.com/Julupower/laravel-vue-portfolio-backend.git
   cd laravel-vue-portfolio-backend

2. Install Composer dependencies via temporary container:
   docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install

3. Configure Environment:
   cp .env.example .env
   (Ensure FRONTEND_URL=http://localhost:5173 is set in .env for CORS configuration)

4. Boot Docker Sail Containers:
   ./vendor/bin/sail up -d

5. Initialize Application & Database:
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate --seed

---

## Automated Testing Suite

Execute the complete automated backend feature and unit test suite inside the Sail container:

./vendor/bin/sail artisan test

---

## License

Distributed under the MIT License.