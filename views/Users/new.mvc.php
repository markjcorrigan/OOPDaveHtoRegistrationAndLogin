{% extends "base.mvc.php" %}

{% block title %}New User{% endblock %}

{% block body %}

<h1>New User</h1>

<form method="post" action="/Users/create">

{% include "users/form.mvc.php" %}

</form>

{% endblock %}