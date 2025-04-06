{% extends "base.mvc.php" %}

{% block title %}Home{% endblock %}

{% block body %}

<h1>Home Page</h1>

<a href="/signup/new">signups/new</a><br><br>

<a href="/signup">signup</a><br>
<a href="/login">login</a><br><br>



<a href="/products/index">Click here for the products section</a><br>
<a href="/cruds/index">Click here for the cruds section</a>

{% endblock %}