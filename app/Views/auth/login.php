<!-- Page Header -->
<div class="page-header animate-fade-in">
    <h2>Login</h2>
    <p class="subtitle">Log in to add, edit, or delete tasks.</p>
</div>

<div class="neu-card-flat simple-form">
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <?php if (! empty($errors)): ?>
        <ul class="form-errors">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url('/login') ?>" method="post">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= old('username') ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit" class="btn">Login</button>
    </form>
</div>
