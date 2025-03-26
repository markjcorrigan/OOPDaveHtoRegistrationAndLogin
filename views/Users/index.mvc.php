{% extends "base.mvc.php" %}

{% block title %}Users{% endblock %}

{% block body %}

<h1>Users</h1>

<a href="/Users/new">New User</a>

<p>Total: {{ total }}</p>

{% foreach ($users as $user): %}

<h2>
    <a href="/users/<?= $user["id"] ?>/show">
        <?= htmlspecialchars($user["name"]) ?>
    </a>
</h2>


{% endforeach; %}

{% endblock %}