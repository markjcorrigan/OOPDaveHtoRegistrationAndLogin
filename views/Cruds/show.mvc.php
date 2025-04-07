{% extends "base.mvc.php" %}

{% block title %}Cruds{% endblock %}

{% block body %}

<h1>{{ crud["name"] }}</h1>
<p><a href="/cruds/index">Back</a></p>

<p>{{ crud["description"] }}</p>

<p><a href="/cruds/{{ crud["id"] }}/edit">Edit</a></p>

<p><a href="/cruds/{{ crud["id"] }}/delete">Delete</a></p>

{% endblock %}