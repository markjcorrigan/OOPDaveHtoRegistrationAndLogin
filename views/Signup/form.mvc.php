<div>
<!--    <label for="name">Name</label>-->
<!--    <input type="text" id="name" name="name" value="{{ user['name'] }}" autofocus />-->
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ product["name"] }}">
</div>
{% if (isset($errors["name"])): %}
<p>{{ errors["name"] }}</p>
{% endif; %}
<div>
    <label for="inputEmail">Email address</label>
    <input id="inputEmail" name="email" type="email" value="{{ user['email'] }}" placeholder="Email address" />
</div>
{% if (isset($errors["email"])): %}
<p>{{ errors["email"] }}</p>
{% endif; %}
<div>
    <label for="inputPassword">Password</label>
    <input type="text" id="inputPassword" name="password" value="{{ user['password'] }}" placeholder="Password" />
</div>
{% if (isset($errors["password"])): %}
<p>{{ errors["password"] }}</p>
{% endif; %}

<div>
    <label for="inputPasswordConfirmation">Repeat password</label>
    <input type="text" id="inputPasswordConfirmation" name="password_confirmation"
           placeholder="Repeat password" />
</div>
{% if (isset($errors["password"])): %}
<p>{{ errors["password_confirmation"] }}</p>
{% endif; %}
<br>
<button type="submit">Sign up</button>