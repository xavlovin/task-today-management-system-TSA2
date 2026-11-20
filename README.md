# Tasks for Today Management System — TSA2: Full CRUD and Authentication

IT0049 Technical Summative Assessment 2. This extends the TSA1 "Tasks for Today Management System" (CodeIgniter 4) with:

- **Login / logout** for the demo user (passwords stored with `password_hash()` and checked with `password_verify()`)
- **Create, edit, and delete** tasks (delete is a soft delete with an `is_archived` flag, so rows are never removed)
- An **AuthFilter** that protects the task-changing routes, and **CSRF protection** on every form

**Hosted link:** _<add hosted link here>_

## Requirements

- PHP **8.2 or newer** (tested on PHP 8.2.12)
- PHP extensions: **intl**, **mbstring**, **mysqli** (plus json, which is built in)
- **MySQL / MariaDB**. XAMPP works (tested on MariaDB 10.4)
- Composer (to install CodeIgniter 4.7 into `vendor/`)

## Setup

1. **Clone** the repository and go into the folder:
   ```bash
   git clone <repo-url>
   cd task-today-management-system-TSA2
   composer install
   ```
2. **Create the .env file** by copying the `env` example file:
   ```bash
   copy env .env        # Windows
   cp env .env          # macOS / Linux
   ```
3. **Edit `.env`.** Set the base URL and your database login:
   ```env
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = task_today_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306

   DEMO_PASSWORD = <choose a password>
   ```
   Don't set `session.savePath = null`. CodeIgniter reads that as a folder named "null" inside `public/`, which makes session files downloadable. Leave the line out, and sessions are saved in `writable/session`.
4. **Create the database** `task_today_db` (collation `utf8mb4_general_ci`) in phpMyAdmin, then use **one** of these:
   - **Migrations + seeders:**
     ```bash
     php spark migrate
     php spark db:seed DatabaseSeeder
     ```
     If you already have the TSA1 data, only run `php spark migrate` and then `php spark db:seed UserSeeder`. That sets the demo password without adding duplicate tasks.
   - **Or import** `schema.sql` in phpMyAdmin. It already has the `password` and `is_archived` columns and the hashed demo password.
5. **Start the server:**
   ```bash
   php spark serve
   ```
   Open <http://localhost:8080/>.

## Demo Login

The demo login is not published in this repository. The instructor receives it separately with the submission.

To set your own demo password, put `DEMO_PASSWORD = <your password>` in `.env` and run `php spark db:seed UserSeeder`. The seeder stores only the `password_hash()` value, never the plain text.

## Routes

| Method | Route                   | Controller::method           | Access        |
|--------|-------------------------|------------------------------|---------------|
| GET    | `/`                     | `TaskController::today`      | Public        |
| GET    | `/tasks`                | `TaskController::index`      | Public        |
| GET    | `/profile`              | `UserController::index`      | Public        |
| GET    | `/about`                | `PagesController::about`     | Public        |
| GET    | `/login`                | `AuthController::loginForm`  | Public        |
| POST   | `/login`                | `AuthController::login`      | Public        |
| GET    | `/logout`               | `AuthController::logout`     | Public        |
| GET    | `/tasks/new`            | `TaskController::new`        | **Protected** |
| POST   | `/tasks`                | `TaskController::create`     | **Protected** |
| GET    | `/tasks/(:num)/edit`    | `TaskController::edit`       | **Protected** |
| POST   | `/tasks/(:num)/update`  | `TaskController::update`     | **Protected** |
| POST   | `/tasks/(:num)/delete`  | `TaskController::delete`     | **Protected** |

Protected routes use the `auth` filter (`app/Filters/AuthFilter.php`, registered in `app/Config/Filters.php`). CSRF protection is turned on globally in `app/Config/Filters.php`, and every form includes `csrf_field()`.

## How It Works (MVC)

- **Models**
  - `TaskModel`: `getActiveTasks($date = null)` returns tasks with `is_archived = 0` and is used by the Welcome page, Task List, and Profile. `findActive($id)` finds one active task.
  - `UserModel`: finds the demo user and the user who is logging in.
- **Controllers**
  - `AuthController`: shows the login form, logs in (with `session()->regenerate()`), and logs out.
  - `TaskController`: Welcome and Task List pages, plus new/create/edit/update/delete. Missing or archived tasks show a 404 (`PageNotFoundException`).
  - `UserController`, `PagesController`: Profile and About pages (unchanged from TSA1).
- **Validation**
  - `title`: `required|max_length[150]`
  - `task_date`: `required|valid_date[Y-m-d]`
  - `status`: `required|in_list[pending,in-progress,completed]`
- **Soft delete:** `POST /tasks/{id}/delete` only sets `is_archived = 1`. It does not use CodeIgniter's `$useSoftDeletes` / `deleted_at`.

## Access Control Testing

These checks were run with `curl` and a cookie jar against `php spark serve`. All of them passed.

| # | Check | Result |
|---|-------|--------|
| a | Logged out: `GET /tasks/new`, `GET /tasks/1/edit`, `POST /tasks`, `POST /tasks/1/update`, `POST /tasks/1/delete` all return **302 → /login**, and nothing in the database changes | PASS |
| b | Logged out: `/`, `/tasks`, `/profile`, `/about`, `/login` return **200**. The nav shows "Login", and there are no Edit/Delete/New Task buttons | PASS |
| c | A wrong password, or an unknown username, shows the same "Invalid login details." message. Empty fields show "required" errors. The demo login works and redirects to `/tasks` | PASS |
| d | Logged in: creating a task saves it and shows "Task added." An empty title, an empty date, or an invalid date (`2026-13-45`) shows errors, refills the form with `old()`, and saves nothing | PASS |
| e | Logged in: the edit form is filled in, and update saves the change. Empty fields are rejected. A task id that doesn't exist returns 404 | PASS |
| f | Logged in: delete sets `is_archived = 1` and the row is still in the database. The task disappears from `/` and `/tasks`, and editing or updating it returns 404. `GET /tasks/1/delete` returns 404. A POST without a CSRF token returns 403 | PASS |
| g | After `GET /logout` (which redirects to `/`), the protected routes redirect to `/login` again | PASS |

Note: after a successful form POST, CodeIgniter redirects with **303 See Other**, the normal Post/Redirect/Get response. The AuthFilter sets **302** on purpose for its redirect to `/login`.
