{% extends "base.mvc.php" %}

{% block title %}Signed In{% endblock %}

{% block body %}

<h1>New Sign In</h1>


<p>{{ userObj->id }}</p>
<p>{{ userObj->name }}</p>
<p>{{ userObj->email }}</p>

<p>{{ email }}</p>
<p>{{ password }}</p>
<p>You have successfully signed in</p>
<a href="/">Take me home</a><br>

{% endblock %}