<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasks for Today Management System - A neumorphic task management application built with CodeIgniter 4">
    <title><?= esc($title ?? 'Tasks for Today') ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <!-- TSA2: a few simple styles for the login link, forms, buttons and messages -->
    <style>
        .auth-links { padding: 1rem 1.25rem; font-size: 0.85rem; color: var(--text-secondary); }
        .auth-links a, .task-actions a, .simple-form a { color: var(--accent-primary); font-weight: 600; }
        .flash { padding: 0.75rem 1rem; border-radius: 10px; margin-bottom: 1rem; font-weight: 600; }
        .flash-success { background: var(--status-completed-bg); color: var(--status-completed-text); }
        .flash-error, .form-errors { background: #fde2e1; color: #9b1c1c; }
        .form-errors { padding: 0.75rem 1rem 0.75rem 2rem; border-radius: 10px; margin-bottom: 1rem; }
        .simple-form { max-width: 480px; }
        .simple-form label { display: block; font-weight: 600; margin: 0.75rem 0 0.25rem; }
        .simple-form input, .simple-form select { width: 100%; padding: 0.5rem; border: 1px solid #c3cddb; border-radius: 8px; font: inherit; }
        .btn { padding: 0.5rem 1rem; border: 0; border-radius: 8px; background: var(--accent-primary); color: #fff; font: inherit; font-weight: 600; cursor: pointer; margin-top: 1rem; margin-right: 0.5rem; text-decoration: none; display: inline-block; }
        .task-actions { display: flex; gap: 0.5rem; align-items: center; }
        .task-actions form { margin: 0; }
        .task-actions .btn { margin: 0; padding: 0.3rem 0.75rem; font-size: 0.8rem; }
    </style>
</head>
<body>

<div class="app-layout">

    <!-- Mobile Menu Toggle -->
    <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>

    <!-- Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Navigation -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <!-- Clipboard Check Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1>
                Tasks for Today
                <span>Management System</span>
            </h1>
        </div>

        <ul class="sidebar-nav">
            <li>
                <a href="<?= base_url('/') ?>" class="<?= ($activeRoute ?? '') === '/' ? 'active' : '' ?>">
                    <!-- Home / Today Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Today's Tasks
                </a>
            </li>
            <li>
                <a href="<?= base_url('/tasks') ?>" class="<?= ($activeRoute ?? '') === '/tasks' ? 'active' : '' ?>">
                    <!-- List Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    All Tasks
                </a>
            </li>
            <li>
                <a href="<?= base_url('/profile') ?>" class="<?= ($activeRoute ?? '') === '/profile' ? 'active' : '' ?>">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a href="<?= base_url('/about') ?>" class="<?= ($activeRoute ?? '') === '/about' ? 'active' : '' ?>">
                    <!-- Info Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                    </svg>
                    About
                </a>
            </li>
        </ul>

        <!-- TSA2: Login / Logout link -->
        <div class="auth-links">
            <?php if (session()->get('user_id')): ?>
                Logged in as <strong><?= esc(session()->get('user_name')) ?></strong> |
                <a href="<?= base_url('/logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/login') ?>">Login</a>
            <?php endif; ?>
        </div>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                </div>
                <div class="user-info">
                    <div class="name"><?= esc($user['full_name'] ?? 'Demo User') ?></div>
                    <div class="role">Developer</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        <!-- TSA2: one-time flash messages (e.g. "Task added.", "Invalid login details.") -->
        <?php if (session()->getFlashdata('success')): ?>
            <p class="flash flash-success"><?= esc(session()->getFlashdata('success')) ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="flash flash-error"><?= esc(session()->getFlashdata('error')) ?></p>
        <?php endif; ?>

        <?= $content ?? '' ?>
    </main>

</div>

<script>
    // Mobile sidebar toggle
    const toggle  = document.getElementById('mobileToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (toggle) {
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });
    }
</script>

</body>
</html>
