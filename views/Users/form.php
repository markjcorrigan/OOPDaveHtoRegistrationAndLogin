<label for="name">Name</label>
<input type="text" id="name" name="name" value="<?= $User["name"] ?? "" ?>">

<?php if (isset($errors["name"])): ?>
    <p><?= $errors["name"] ?></p>
<?php endif; ?>

<label for="name">Email</label>
<input type="text" id="email" name="email" value="<?= $User["email"] ?? "" ?>">

<label for="password_hash">Password_hash</label>
<input type="text" id="password_hash" name="password_hash" value="<?= $User["password_hash"] ?? "" ?>">

<button>Save</button>