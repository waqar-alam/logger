# Laravel REST API with Logging

## Overview

This project is a Laravel-based REST API for managing users and logs with comprehensive logging capabilities. It provides functionalities for user management, log management, log levels, log targets, runtime configuration, multi-threading, and more.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Configuration](#configuration)
- [Logging Logic](#logging-logic)
- [Runtime Configuration](#runtime-configuration)
- [Multi-Threading](#multi-threading)
- [Custom Exceptions](#custom-exceptions)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- [PHP](https://www.php.net/downloads.php) (>= 7.3)
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs/8.x/installation) (>= 8)
- [Database](#database-setup) (MySQL or PostgreSQL recommended)

## Installation

To set up this project locally, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/waqar-alam/logger.git

## Install dependencies:

1. composer install

Create a .env file based on .env.example and configure your database connection.

## Generate the application key:

1. php artisan key:generate
2. Run database migrations:
3. php artisan migrate

## Start the development server:
1. php artisan serve
2. Your Laravel application should now be running at http://localhost:8000.


## API Endpoints

/api/users (GET, POST, PUT, DELETE): Manage users.
Log API
/api/logs (GET, POST, PUT, DELETE): Manage logs.
Log Level API
/api/log-levels (GET, POST, PUT, DELETE): Manage log levels.
Log Target API
/api/log-targets (GET, POST, PUT, DELETE): Manage log targets.
Runtime Configuration API
/api/runtime-configuration (GET, POST, PUT, DELETE): Configure runtime log levels.
Configuration
You can configure the application by modifying the .env file. Refer to the Laravel documentation for more details on configuration options.

Logging Logic
The logging logic in this application allows you to send log entries to different targets based on their type and settings. This feature is essential for managing log entries efficiently.

Runtime Configuration
You can configure the minimum log levels per target at runtime. This allows you to customize which log levels are accepted for each target.

Multi-Threading
The application is designed to handle multi-threading environments. Laravel's Queue Workers are used to process log entries asynchronously, improving system performance.

Custom Exceptions
Custom exception classes are included to handle specific error scenarios. These exceptions provide detailed error messages for different exceptional situations.
