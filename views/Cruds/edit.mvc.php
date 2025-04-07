{% extends "base.mvc.php" %}

{% block title %}Edit Crud{% endblock %}

{% block body %}

<h1>Edit Crud</h1>

<form method="post" action="/cruds/{{ crud["id"] }}/update">

{% include "Cruds/form.mvc.php" %}

</form>

<p><a href="/cruds/{{ crud["id"] }}/show">Cancel</a></p>

{% endblock %}