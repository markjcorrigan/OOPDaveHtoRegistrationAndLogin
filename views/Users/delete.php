<h1>Delete User</h1>

<form method="post" action="/Users/<?= $User["id"] ?>/destroy">

<p>Delete this User?</p>

<button>Yes</button>

</form>

<p><a href="/Users/<?= $User["id"] ?>/show">Cancel</a></p>

</body>
</html>