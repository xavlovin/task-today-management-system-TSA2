<!-- Page Header -->
<div class="page-header animate-fade-in">
    <h2>User Profile</h2>
    <p class="subtitle">Account details and performance overview.</p>
</div>

<!-- Profile Card -->
<div class="profile-card">
    <div class="profile-avatar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
        </svg>
    </div>
    <div class="profile-name"><?= esc($user['full_name'] ?? 'N/A') ?></div>
    <div class="profile-username">@<?= esc($user['username'] ?? 'user') ?></div>
    <div class="profile-email">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
        </svg>
        <?= esc($user['email'] ?? 'N/A') ?>
    </div>
</div>

<!-- Account Information Grid -->
<div class="profile-info-grid">
    <div class="info-card">
        <div class="info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
        </div>
        <div>
            <div class="info-label">Username</div>
            <div class="info-value"><?= esc($user['username'] ?? 'N/A') ?></div>
        </div>
    </div>

    <div class="info-card">
        <div class="info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
            </svg>
        </div>
        <div>
            <div class="info-label">Full Name</div>
            <div class="info-value"><?= esc($user['full_name'] ?? 'N/A') ?></div>
        </div>
    </div>

    <div class="info-card">
        <div class="info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
            </svg>
        </div>
        <div>
            <div class="info-label">Email Address</div>
            <div class="info-value"><?= esc($user['email'] ?? 'N/A') ?></div>
        </div>
    </div>

    <div class="info-card">
        <div class="info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
            </svg>
        </div>
        <div>
            <div class="info-label">Member Since</div>
            <div class="info-value"><?= isset($user['created_at']) ? date('F j, Y', strtotime($user['created_at'])) : 'N/A' ?></div>
        </div>
    </div>
</div>

<!-- Task Statistics -->
<div class="page-header mt-2">
    <h2 style="font-size:1.25rem;">Task Statistics</h2>
    <p class="subtitle">A summary of your task activity across all dates.</p>
</div>

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon total">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"/>
            </svg>
        </div>
        <div>
            <div class="stat-value"><?= $totalTasks ?></div>
            <div class="stat-label">Total Tasks</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon pending">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <div class="stat-value"><?= $pendingTasks ?></div>
            <div class="stat-label">Pending</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon progress">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182"/>
            </svg>
        </div>
        <div>
            <div class="stat-value"><?= $inProgress ?></div>
            <div class="stat-label">In Progress</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon completed">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <div class="stat-value"><?= $completedTasks ?></div>
            <div class="stat-label">Completed</div>
        </div>
    </div>
</div>

<!-- Completion Rate -->
<?php $completionRate = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0; ?>
<div class="neu-card-flat" style="margin-top: 0.5rem;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
        <span style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted);">Completion Rate</span>
        <span style="font-size: 1.15rem; font-weight: 800; color: var(--text-primary);"><?= $completionRate ?>%</span>
    </div>
    <div style="height: 10px; border-radius: 50px; background: var(--bg-primary); box-shadow: var(--shadow-inset-dk), var(--shadow-inset-lt); overflow: hidden;">
        <div style="height: 100%; width: <?= $completionRate ?>%; border-radius: 50px; background: var(--accent-gradient); transition: width 0.8s ease;"></div>
    </div>
</div>
