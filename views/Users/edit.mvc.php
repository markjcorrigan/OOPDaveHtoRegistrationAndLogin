{% extends "base.mvc.php" %}

{% block title %}Edit User{% endblock %}

{% block body %}

<h1>Edit {{ user["name"] }}</h1>

<form method="post" action="/users/{{ user["id"] }}/update">

{% include "users/form.mvc.php" %}

</form>

<p><a href="/users/{{ user["id"] }}/show">Cancel</a></p>

{% endblock %}