{% extends "base.mvc.php" %}

{% block title %}Cruds{% endblock %}

{% block body %}

<h1>Cruds</h1>

<a href="/cruds/new">New Crud</a>

<p>Total: {{ total }}</p>

{% foreach ($cruds as $crud): %}

<h2>
    <a href="/cruds/{{ crud["id"] }}/show">
    {{ crud["name"] }}
    </a>
</h2>

{% endforeach; %}

{% endblock %}