<h1 style="color:yellowgreen" align="center">JSON to Excel Converter</h1>

## Overview
This application allows authenticated users to upload JSON files and export them to Excel format. It leverages Laravel Breeze with Blade templating for scaffolding and supports social login via GitHub for user convenience.

Features

* Upload JSON files
* Export JSON files to Excel
* Authentication required for file operations
* Support for manual registration or GitHub social login

## Installation

* Navigate to the project directory:

    `cd project-directory`


* Install dependencies via Composer:

    `composer install`


* Copy `.env.example` to `.env` and configure your environment variables, including database settings, GitHub OAuth credentials and email settings


* Generate application key:

    `php artisan key:generate`


* Run migrations to set up the database:

  `php artisan migrate`


* Install dependencies:

  `npm install`


* Run development server:

  `npm run dev`


### Usage

Start the development server:

`php artisan serve`

Start the queue worker:

`php artisan queue:work`

* Access the application in your web browser at http://localhost:8000.
* Register an account manually or login directly with GitHub.
* Navigate to the "Upload File" link to upload your JSON file.
* After uploading, navigate to the "Export File" link to convert the JSON file to Excel.
* You will receive an email notification on your registered email once the export process is completed.

## License

The project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
