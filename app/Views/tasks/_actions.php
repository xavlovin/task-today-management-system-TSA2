<?php // Edit and Delete buttons for one task. Only shown when logged in (the routes are also protected by the auth filter). ?>
<?php if (session()->get('user_id')): ?>
    <div class="task-actions">
        <a href="<?= base_url('/tasks/' . $task['id'] . '/edit') ?>" class="btn">Edit</a>

        <!-- Delete uses a POST form (not a GET link) and includes the CSRF token -->
        <form action="<?= base_url('/tasks/' . $task['id'] . '/delete') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
<?php endif; ?>
