{% extends "base.mvc.php" %}

{% block title %}New User{% endblock %}

{% block body %}

<h1>New User</h1>

<form novalidate method="post" action="/signup/create">

    {% include "Signup/form.mvc.php" %}

</form>

{% endblock %}