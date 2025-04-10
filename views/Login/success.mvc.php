{% extends "base.mvc.php" %}
{% block title %}Signed In{% endblock %}
{% block body %}
<h1>New Sign In</h1>

{% if ($_SESSION['user_id']): %}
<p>User with ID {{ session }} is logged on.</p>
{% else: %}
<a href="/login">Sign up</a> or <a href="/signup">Log in</a>.
{% endif; %}


<p>The below variable names before : are between {{ }} in the templating engine</p>
<p>userObj->id : {{ userObj->id }}</p>
<p>userObj->name : {{ userObj->name }}</p>
<p>userObj->email : {{ userObj->email }}</p>
<p>email : {{ email }}</p>
<p>password : {{ password }}</p>
<p>You have successfully signed in</p>
<a href="/">Take me home</a><br>
{% endblock %}
