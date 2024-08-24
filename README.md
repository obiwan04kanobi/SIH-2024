# SIH-2024
## Team Members:
1) Hariom Tiwari
2) Soumya Pandey
3) Pranay Gupta
4) Nitish kumar
5) Ankit Vikas 
6) Mayank Pant

## Problem Statement:
The Prime Minister's Special Scholarship Scheme (PMSSS) aims to digitize the scholarship process by developing an online system for document submission and verification, replacing traditional paperwork. This system will allow students to securely upload their documents through a user-friendly portal, with real-time tracking and notifications. The documents will be verified by the SAG Bureau and automatically forwarded to the Finance Bureau for payment processing. The solution will enhance efficiency, reduce processing time, and ensure data privacy, all while eliminating the need for hard copies.


## How to install dependencies:

### Step 1: Ensure Composer is Installed
First, make sure Composer is installed on your system. You can check if Composer is installed by running:

```bash
composer --version
```

If Composer isn't installed, you can install it by following the instructions on the [official Composer website](https://getcomposer.org/download/).

### Step 2: Navigate to Your Laravel Project Directory
Use the terminal to navigate to the root directory of your Laravel project. This directory should contain the `composer.json` file, which lists all the dependencies for your project.

```bash
cd /path/to/your/laravel/project
```

### Step 3: Install Dependencies
Once you're in the root directory of your Laravel project, run the following command to install the dependencies:

```bash
composer install
```

This command will:
- Read the `composer.json` file to determine the dependencies required.
- Download and install those dependencies into the `vendor` directory.

### Step 4: Generate Application Key (Optional)
If you are setting up the Laravel project for the first time, you may need to generate an application key. This is often required for sessions and other encryption-related tasks:

```bash
php artisan key:generate
```

### Step 5: Configure Environment Variables
Make sure your `.env` file is correctly configured with the necessary environment variables. If the `.env` file is missing, you can create it by copying the example file:

```bash
cp .env.example .env
```

Then update the `.env` file with the correct values (e.g., database credentials, app URL, etc.).

### Step 6: Run Migrations (Optional)
If your project requires a database, you may need to run migrations to set up the database schema:

```bash
php artisan migrate
```

### Step 7: Clear Caches (Optional)
If you're facing issues, it might help to clear the caches:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Step 8: Serve the Application
Finally, you can serve the Laravel application locally using:

```bash
php artisan serve
```

This command will start a development server, usually accessible at `http://127.0.0.1:8000`.

---

By following these steps, you should have all the dependencies installed and your Laravel project ready to run. If you encounter any issues during the installation, feel free to ask for help!
