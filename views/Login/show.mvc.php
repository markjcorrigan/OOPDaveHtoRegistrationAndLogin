{% extends "base.mvc.php" %}

{% block title %}Testing Login Creds{% endblock %}

{% block body %}

<h1>Testing Login Creds</h1>

<p>{{ test }}</p>

<p>{{ email }}</p>

<p>{{ password }}</p>

<p>You have successfully logged into this site</p>
<a href="/login">Back to log in</a><br>

{% endblock %}