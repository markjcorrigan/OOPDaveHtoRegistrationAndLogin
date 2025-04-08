{% extends "base.mvc.php" %}

{% block title %}New Login{% endblock %}

{% block body %}

<h1>New Login</h1>

<form novalidate method="post" action="/login/create">

     {% include "Login/form.mvc.php" %}

</form>

{% endblock %}