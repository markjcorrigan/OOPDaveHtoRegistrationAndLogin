{% extends "base.mvc.php" %}
{% block title %}Signed In{% endblock %}
{% block body %}
<h1>New Sign In</h1>


<?php
$messages = array_unique($_SESSION['flash_notifications']);
foreach ($messages as $message): ?>
    <?php if (is_array($message)): ?>
        <?php foreach ($message as $key => $value): ?>
<!--            <h2>--><?php //echo $key . ': ' . $value; ?><!--</h2>-->
            <h2><?php echo $value; ?></h2>
        <?php endforeach; ?>
    <?php else: ?>
        <h2><?php echo $message; ?></h2>
    <?php endif; ?>
<?php endforeach; ?>
<?php unset($_SESSION['flash_notifications']); ?>









{% if ($_SESSION['user_id']): %}
<p>User with Session ID: <?php echo session_id() ?> and User ID {{ session }} is logged on.</>
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
