# 🏫 School Management System

This is a web application built using the Laravel framework to manage school data, including user authentication, student records, and more. The project leverages **Laravel 9** for robust backend functionality, uses **Bootstrap 5** for a clean, responsive interface, and implements **AJAX** for dynamic, non-reloading data interactions.

---

## 🔗 Live Demo & Deployment Info

You can view and interact with the live deployment of this project.  
This is a **full-stack Laravel application** where Laravel handles both the backend logic and the Blade-based frontend.  
The application is deployed on **`Vercel`**, and the database is hosted on **`Supabase`** (PostgreSQL).

| Detail | Value |
| :--- | :--- |
| **Live URL** | **[https://school-mgt-system-psi.vercel.app/](https://school-mgt-system-psi.vercel.app/)** |
| **Admin Email** | `admin@gmail.com` |
| **Admin Password** | `password123` |
| **Frontend & Backend** | Laravel (deployed on [Vercel](https://vercel.com/)) |
| **Database** | [Supabase](https://supabase.com/) (PostgreSQL) |

---

## ✨ Features

* **Authentication:** Secure sign-in/sign-out functionality.
* **User Management:** Centralized system to handle different user roles (e.g., Admin, Teacher).
* **Dynamic UI:** Uses AJAX for non-blocking operations, improving user experience and performance.
* **Responsive Design:** Styled with Bootstrap 5 to ensure compatibility across various devices.
* **Laravel Ecosystem:** Built on Laravel 9 for modern features, security, and developer-friendly tools.

---

## 🚀 Getting Started

Follow these steps to set up and run the project on your local machine.

### Prerequisites

You will need the following software installed:

* **PHP:** Version 8.0 or higher
* **Composer:** Latest version
* **Node.js & npm:** Latest LTS version
* **MySQL or MariaDB:** Database server

### Installation Steps

1.  **Clone the Repository:**
    ```bash
    git clone [https://github.com/Rxak22/school-mgt-system.git](https://github.com/Rxak22/school-mgt-system.git)
    cd school-mgt-system
    ```

2.  **Install PHP Dependencies (Composer):**
    ```bash
    composer install
    ```

3.  **Create and Configure the Environment File:**
    ```bash
    cp .env.example .env
    ```
    Generate a new application key:
    ```bash
    php artisan key:generate
    ```

4.  **Database Configuration:**
    Open the newly created `.env` file and update the following lines with your database credentials:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_db_username
    DB_PASSWORD=your_db_password
    ```

5.  **Run Migrations and Seeders:**
    ```bash
    php artisan migrate --seed
    ```
    *This command will create the necessary tables and populate the database with initial data (if seeders are defined).*
    
    ***please note***: login with email **`admin@gmail.com`** and password **`password123`**

6.  **Install Frontend Dependencies (npm):**
    ```bash
    npm install
    ```

7.  **Compile Assets (Laravel Mix/Webpack):**
    Since the project uses Laravel Mix for asset compilation:
    ```bash
    npm run dev
    # OR for production build:
    npm run production 
    ```

8.  **Start the Local Server:**
    ```bash
    php artisan serve
    ```
    The application will typically be accessible at: `http://127.0.0.1:8000`

---

## ⚙️ Project Structure & Key Technologies

| Technology | Role | Version | Notes |
| :--- | :--- | :--- | :--- |
| **Backend Framework** | Laravel | 9.x | The foundation of the application. |
| **Frontend Framework** | Bootstrap | 5.x | Used for styling and responsive layout. |
| **Data Handling** | AJAX (jQuery) | N/A | Enables dynamic requests without full page reloads. |
| **Asset Compiler** | Laravel Mix (Webpack) | N/A | Compiles CSS and JavaScript assets. |
| **Routing** | Laravel Web Routes | N/A | Defined in `routes/web.php`. |

### Key Files and Directories

* `routes/web.php`: Contains all application routes.
* `app/Http/Controllers/`: Houses the main application logic.
* `database/migrations/`: Stores database schema definitions.
* `resources/views/`: Contains Blade templates (HTML).
* `public/`: The web server root, containing compiled assets.

---

## ☁️ Deployment Note (Vercel)

This project has been configured for deployment on Vercel using the custom **`vercel-php`** runtime.

### Vercel Requirements:

1.  **`vercel.json`** file in the root, configured with the `vercel-php@0.7.4` runtime and routing rules to direct traffic to `api/index.php`.
2.  **`api/index.php`** file as the serverless function entry point.
3.  **Environment Variables:** All critical variables (`APP_KEY`, `APP_URL`, Database Credentials) must be set in the Vercel project settings.
4.  **Database:** A separate external database (e.g., PlanetScale, Railway, AWS RDS) is required, as Vercel does not host databases.

---

## 🤝 Contribution

Feel free to fork the repository and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License

(Specify your project's license here, e.g., MIT, Apache 2.0, or leave blank if unspecified.)
