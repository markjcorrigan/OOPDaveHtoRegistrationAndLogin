<h1>Edit Crud</h1>

<form method="post" action="/cruds/<?= $crud["id"] ?>/update">

<?php require "form.php" ?>

</form>

<p><a href="/cruds/<?= $crud["id"] ?>/show">Cancel</a></p>

</body>
</html>