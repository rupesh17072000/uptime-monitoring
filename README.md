# Website Uptime Monitoring System
A scalable website uptime monitoring system built with Laravel 10, Inertia.js, Vue 3 Composition API, MySQL, and Laravel Queues.

# Tech Stack
* Laravel 10
* Inertia.js
* Vue 3 (Composition API)
* MySQL
* Laravel Queues
* Laravel Scheduler
* Mailables
* Tailwind CSS

# Features

## Client Management

* Each client has an email address
* Each client can monitor multiple websites

## Website Monitoring

* Websites are checked every 15 minutes
* HTTP timeout set to 10 seconds
* Detects unreachable websites and failed responses

## Email Notifications

* Sends email alerts when a website goes down
* Subject format:
  `{website URL} is down!`

## Frontend Features

* Client email dropdown
* Website hyperlinks
* Confirmation dialog before opening website
* Modern Vue 3 Composition API implementation

## Scalability Features

* Queue-based monitoring system
* Chunked website processing
* Service layer architecture
* Queue jobs for asynchronous processing


# Project Architecture

```text
Scheduler
    ↓
Artisan Command
    ↓
Dispatch Queue Jobs
    ↓
Website Monitor Service
    ↓
Email Notifications

# Installation

## 1. Clone Repository
git clone https://github.com/your-username/uptime-monitor.git
## 2. Go To Project Directory
## 3. Install PHP Dependencies
composer install
## 4. Install Node Dependencies
npm install
## 5. Configure Environment
Copy `.env.example`
cp .env.example .env

## 6. Generate Application Key
php artisan key:generate
# Database Configuration
Update `.env`

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uptime_monitor
DB_USERNAME=root
DB_PASSWORD=
# Queue Configuration

For local development:
env
QUEUE_CONNECTION=database
CACHE_DRIVER=file
SESSION_DRIVER=file
```

The application architecture supports Redis queues in production without code changes.

# Mail Configuration

Example local mail configuration:

env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=do-not-reply@example.com
MAIL_FROM_NAME="Uptime Monitor"

# Run Migrations
php artisan migrate
# Seed Database
php artisan db:seed
# Queue Setup

Create queue table:
php artisan queue:table
Run migration:
php artisan migrate
Start queue worker:
php artisan queue:work
# Scheduler Setup

Local development:
php artisan schedule:work
Production cron setup:

* * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1
# Start Development Server

## Start Laravel
php artisan serve
## Start Vite
npm run dev

# Monitoring Flow

1. Scheduler runs every 15 minutes
2. `websites:check` command executes
3. Queue jobs are dispatched
4. Each website is checked asynchronously
5. Email alert is sent if website is down


# Folder Structure
app
 ├── Console
 ├── Jobs
 ├── Mail
 ├── Models
 ├── Services
 ├── Http
 └── Providers

resources
 └── js
      └── Pages
           └── Home.vue

# Key Components
## Service Layer
`WebsiteMonitorService`
Responsible for:
* HTTP checks
* Error handling
* Sending notifications
## Queue Job
`CheckWebsiteJob`
Processes website checks asynchronously.
## Scheduler
`CheckWebsitesCommand`
Dispatches monitoring jobs every 15 minutes.
# Frontend
Built using:

* Inertia.js
* Vue 3 Composition API
* Tailwind CSS

Features:

* Client dropdown
* Website list
* Confirmation dialog before opening website
# Error Handling

* HTTP request timeout handling
* Exception logging
* Queue-based fault tolerance
* Prevent duplicate email alerts
# Testing

Run tests:
php artisan test
# Scalability Considerations

* Queue-based architecture
* Chunked database processing
* Decoupled service layer
* Production-ready scheduler setup
* Easily extensible for additional monitoring features

# Future Improvements
* Website uptime history
* Dashboard analytics
* Retry mechanisms
* SMS/Slack notifications
* Website response time tracking
* Authentication system
* Multi-channel alerts

# Production Recommendations

* Redis queues
* Supervisor queue management
* Horizon dashboard
* HTTPS enforcement
* Queue monitoring
* Centralized logging

