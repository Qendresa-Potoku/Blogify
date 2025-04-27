# Laravel CRUD Project

## Setup Instructions

1. **Clone the project:**

    ```bash
    git clone https://github.com/Qendresa-Potoku/Laravel_CRUD.git
    cd Laravel_CRUD
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy `.env` file and set up your database:**

    ```bash
    cp .env.example .env
    ```

    - Update your `.env` file with database name, username, password.

4. **Generate app key:**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**

    ```bash
    php artisan migrate
    ```

6. **Start the server:**

    ```bash
    php artisan serve
    ```

    Visit `http://127.0.0.1:8000`

---

## 📁 Project Structure

- `routes/web.php` → Routes
- `resources/views/` → Blade view files
- `app/Models/` → Models
- `app/Http/Controllers/` → Controllers

---

## ✨ Features

- User registration, login and logout
- Create, edit and delete own posts
- "My Posts" page for user-specific posts
- "Home page" lists posts with details
- Pagination
- Responsive design - TailwindCSS

