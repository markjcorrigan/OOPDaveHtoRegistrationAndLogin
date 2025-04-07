<h1>Cruds</h1>

<a href="/cruds/new">New Crud</a>

<p>Total: <?= $total ?></p>

<?php foreach ($cruds as $crud): ?>

    <h2>
        <a href="/cruds/<?= $crud["id"] ?>/show">
            <?= htmlspecialchars($crud["name"]) ?>
        </a>
    </h2>
    
<?php endforeach; ?>

</body>
</html>