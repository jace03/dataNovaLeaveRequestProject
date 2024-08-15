# DataNova Leave Request Project

Welcome to the DataNova Leave Request Project! This project is a full-stack application utilizing Laravel for the backend and React for the frontend. This README will guide you through setting up the project locally. 

## Getting Started

To get started with the project, you'll need to follow these steps:

### Prerequisites

Ensure you have the following installed on your machine:

- **Node.js** (v20.6.1 or later)
- **npm** (v10.8.2 or later)
- **PHP** (v8.2 or later)
- **Composer** (for PHP dependency management)

### Clone the Repository

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/jace03/dataNovaLeaveRequestProject.git
    ```

2. Navigate to the project directory:

    ```bash
    cd dataNovaLeaveRequestProject
    ```

### Set Up Laravel Backend

1. Install PHP dependencies:

    ```bash
    composer install
    ```

2. Copy the example environment configuration file:

    ```bash
    cp .env.example .env
    ```

3. Edit the `.env` file to include your server username and password.

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the database migrations:

    ```bash
    php artisan migrate
    ```

6. Seed the database with initial data:

    ```bash
    php artisan db:seed
    ```

7. Serve the Laravel application:

    ```bash
    php artisan serve
    ```

### Set Up React Frontend

1. Open a new terminal and navigate to the React project directory:

    ```bash
    cd react-datanova-requests
    ```

2. Install Node.js dependencies:

    ```bash
    npm install
    ```

3. Start the React development server:

    ```bash
    npm run start
    ```

### Laravel Files

Here are the key files and their locations in the Laravel project:

- **Controllers:** `app/Http/Controllers/LeaveRequestController.php`
- **Requests:** `app/Http/Requests/StoreLeaveRequestRequests.php` (Note: It is named `requestRequest`)
- **Models:** `app/Models/LeaveRequest.php`
- **Factories:** `database/factories/UserFactory.php`
- **Migrations:** `database/migrations/2024_07_21_102937_create_leave_requests_table`
- **Seeders:** `database/seeders/LeaveRequestSeeder.php`
- **Images:** `public/images` (Contains project images, can be omitted if not working locally)
- **CSS:** `resources/css/app.css`
- **JS:** `resources/js/app.js`
- **Views:**
  - `resources/views/welcome.blade.php`
  - `resources/views/leave_requests/index.blade.php`
  - `resources/views/leave_requests/edit.blade.php`
  - `resources/views/leave_requests/create.blade.php`
- **Routes:**
  - `routes/api.php`
  - `routes/web.php`

### React Files

Here are the key files and their locations in the React project:

- **CSS:** `react-datanova-requests/src/css/app.css`
- **Custom CSS:** `react-datanova-requests/src/css/custom.css`
- **Components:**
  - `react-datanova-requests/components/LeaveRequests.js`
  - `react-datanova-requests/components/LeaveRequests.css`

If you have any questions or run into issues, feel free to reach out. Happy coding!

