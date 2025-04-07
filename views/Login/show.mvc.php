{% extends "base.mvc.php" %}

{% block title %}Testing Login Creds{% endblock %}

{% block body %}

<h1>Testing Login Creds</h1>

<p><>>>>>>>>>>>>>Passed Test Email Exists>>>>>>>>>><></p>
<p>{{ test }}</p>

<p>{{ userObj->id }}</p>

<p>{{ email }}</p>

<p>{{ password }}</p>

<p>{{ userObj->password_hash }}</p>
<p><>>>>>>>>>>>>>Passed Test Email Exists>>>>>>>>>><></p>
<br><br><br>






<p>You have successfully logged into this site</p>
<a href="/login">Back to login</a><br>






{% endblock %}