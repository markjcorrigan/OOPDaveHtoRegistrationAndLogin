<h1>Edit User</h1>

<form method="post" action="/Users/<?= $User["id"] ?>/update">

<?php require "form.php" ?>

</form>

<p><a href="/Users/<?= $User["id"] ?>/show">Cancel</a></p>

</body>
</html>