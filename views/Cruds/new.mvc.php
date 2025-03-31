{% extends "base.mvc.php" %}

{% block title %}New Crud{% endblock %}

{% block body %}

<h1>New Crud</h1>

<form method="post" action="/cruds/create">

{% include "Cruds/form.mvc.php" %}

</form>

{% endblock %}