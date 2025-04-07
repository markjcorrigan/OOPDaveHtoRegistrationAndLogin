{% extends "base.mvc.php" %}

{% block title %}Signed In{% endblock %}

{% block body %}

<h1>New Sign In</h1>

<p>The below variable names before : are between {{  }} in the templating engine </p>
<p> userObj->id : {{ userObj->id }}</p>
<p> userObj->id : {{ userObj->name }}</p>
<p> userObj->id : {{ userObj->email }}</p>

<p> email : {{ email }}</p>
<p> password : {{ password }}</p>
<p>You have successfully signed in</p>
<a href="/">Take me home</a><br>

{% endblock %}