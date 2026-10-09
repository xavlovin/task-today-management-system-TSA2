# Tasks for Today Management System

A neumorphic (Soft UI) task management web application built with PHP 8 and CodeIgniter 4.

## Tech Stack
- **Backend:** PHP 8.x, CodeIgniter 4.7
- **Database:** MySQL / MariaDB
- **Frontend:** Hand-written Neumorphic CSS, HTML5, inline SVGs

## Local Setup Instructions

1. **Clone or Download the Repository**
   Place the project folder in your local web server directory (e.g., `c:\xampp\htdocs\task-today-management-system`).

2. **Install Dependencies**
   Run the following command in the project root to install CodeIgniter 4 and its dependencies:
   ```bash
   composer install
   ```

3. **Database Configuration**
   - Open phpMyAdmin (usually `http://localhost/phpmyadmin/`)
   - Create a new database named `task_today_db` (Collation: `utf8mb4_general_ci`)
   - Rename the `env` file to `.env` if you haven't already.
   - Update your `.env` file with your database credentials:
     ```env
     database.default.hostname = localhost
     database.default.database = task_today_db
     database.default.username = root
     database.default.password = 
     database.default.DBDriver = MySQLi
     ```

4. **Run Migrations & Seeders**
   Open your terminal in the project folder and run:
   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```
   *(Alternatively, you can manually import the `schema.sql` file included in this repository into your phpMyAdmin database).*

5. **Run the Application**
   Access the app via your local server (e.g., `http://localhost/task-today-management-system/public/`).

## MVC Architecture & Routing
The application strictly follows the MVC pattern:
- **Models:** 
  - `TaskModel`: Handles queries for all tasks and today's tasks.
  - `UserModel`: Retrieves the demo user.
- **Controllers:**
  - `TaskController`: Handles the home view (`/`) and all tasks view (`/tasks`).
  - `UserController`: Handles the profile view (`/profile`).
  - `PagesController`: Handles static pages like the about page (`/about`).
- **Views:** Neumorphic HTML templates utilizing inline SVGs and global CSS (`public/css/app.css`).

## Deployment Checklist (Alternative Free Hosts & Local Expose)

It seems you are running into strict anti-bot/fraud filters that free hosting companies use (which is very common for student projects!). 

Here are two completely different free hosting networks to try, plus a guaranteed 1-minute fail-safe if you just need a link to submit for your class.

### Option A: Serv00.com (Developer Focused)
[Serv00](https://www.serv00.com/) provides 3GB of SSD storage, PHP, and MySQL. It's built for developers and has a different signup system than the others.
1. Sign up for a free account.
2. In their panel, add a MySQL database.
3. Import `schema.sql` via their phpMyAdmin.
4. Upload your files via FTP/SFTP to the `public_html` or `www` folder.
5. Update your `.env` with the Database details and your new URL.

### Option B: ByetHost (The Classic)
[ByetHost](https://byethost.com/) is one of the oldest free hosting networks.
1. Sign up for their free hosting plan.
2. Go to the VistaPanel -> MySQL Databases and create a database.
3. Import `schema.sql` via phpMyAdmin.
4. Upload all files into the `htdocs` folder via their File Manager or FTP.
5. Update `.env` with your DB details and change your `app.baseURL` to your new domain (remember to add `/public/` to the end).

---

### The Guaranteed Fail-safe: Expose your Local Server (Ngrok / LocalTunnel)
If every single free host blocks you from creating an account, you can simply "tunnel" your local XAMPP server to the internet. This gives you a public URL (like `https://random-words.ngrok.io`) that you can share with your professor, and it directly serves the files from your computer.

**How to do it with LocalTunnel (No account needed):**
1. Install [Node.js](https://nodejs.org/).
2. Open your terminal and run: `npx localtunnel --port 80`
3. It will generate a public URL. Update your `.env` `app.baseURL` to this new URL.
4. Keep your XAMPP Apache/MySQL running, and keep the terminal open. Anyone with the link can now access your site!
