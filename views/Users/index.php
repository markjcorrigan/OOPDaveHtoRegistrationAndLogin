<h1>Users</h1>

<a href="/Users/new">New User</a>

<p>Total: <?= $total ?></p>

<?php foreach ($Users as $User): ?>

    <h2>
        <a href="/Users/<?= $User["id"] ?>/show">
            <?= htmlspecialchars($User["name"]) ?>
        </a>
    </h2>
    
<?php endforeach; ?>

</body>
</html>