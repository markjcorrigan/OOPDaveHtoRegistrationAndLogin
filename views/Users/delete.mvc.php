{% extends "base.mvc.php" %}

{% block title %}Delete User{% endblock %}

{% block body %}

<h1>Delete User</h1>

<form method="post" action="/users/{{ user["id"] }}/destroy">

<p>Delete this User?</p>

<button>Yes</button>

</form>

<p><a href="/users/{{ user["id"] }}/show">Cancel</a></p>

{% endblock %}