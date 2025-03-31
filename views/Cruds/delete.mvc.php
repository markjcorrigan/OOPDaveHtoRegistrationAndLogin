{% extends "base.mvc.php" %}

{% block title %}Delete Crud{% endblock %}

{% block body %}

<h1>Delete Crud</h1>

<form method="post" action="/cruds/{{ crud["id"] }}/destroy">

<p>Delete this crud?</p>

<button>Yes</button>

</form>

<p><a href="/cruds/{{ crud["id"] }}/show">Cancel</a></p>

{% endblock %}