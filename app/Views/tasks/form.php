<?php
    // This one form is used for both New Task ($task is null) and Edit Task ($task has data).
    // old() refills the fields after a failed validation; otherwise we use the task's saved values.
    // (false = don't escape here, because esc() is used when printing below)
    $titleValue  = old('title', $task['title'] ?? '', false);
    $dateValue   = old('task_date', $task['task_date'] ?? date('Y-m-d'), false);
    $statusValue = old('status', $task['status'] ?? 'pending', false);
    $errors      = session()->getFlashdata('errors') ?? [];
?>
<!-- Page Header -->
<div class="page-header animate-fade-in">
    <h2><?= esc($title) ?></h2>
    <p class="subtitle"><?= $task ? 'Change the details of this task.' : 'Fill in the details of the new task.' ?></p>
</div>

<div class="neu-card-flat simple-form">
    <?php if (! empty($errors)): ?>
        <ul class="form-errors">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url($action) ?>" method="post">
        <?= csrf_field() ?>

        <label for="title">Title</label>
        <input type="text" id="title" name="title" maxlength="150" value="<?= esc($titleValue) ?>">

        <label for="task_date">Task Date</label>
        <input type="date" id="task_date" name="task_date" value="<?= esc($dateValue) ?>">

        <label for="status">Status</label>
        <select id="status" name="status">
            <?php foreach (['pending' => 'Pending', 'in-progress' => 'In Progress', 'completed' => 'Completed'] as $value => $label): ?>
                <option value="<?= $value ?>" <?= $statusValue === $value ? 'selected' : '' ?>><?= $label ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn"><?= $task ? 'Save Changes' : 'Add Task' ?></button>
        <a href="<?= base_url('/tasks') ?>">Cancel</a>
    </form>
</div>
