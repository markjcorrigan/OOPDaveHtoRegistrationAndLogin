{% extends "base.mvc.php" %}

{% block title %}User{% endblock %}

{% block body %}

<h1>{{ user["name"] }}</h1>
<p><a href="/users/index">Back</a></p>

<p>{{ user["email"] }}</p>

<p><a href="/users/{{ user["id"] }}/edit">Edit</a></p>

<p><a href="/users/{{ user["id"] }}/delete">Delete</a></p>

{% endblock %}