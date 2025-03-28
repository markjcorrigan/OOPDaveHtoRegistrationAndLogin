<div>
    <label for="inputName">Name</label>
    <input id="inputName" name="name" placeholder="Name" autofocus />
</div>
{% if (isset($errors["name"])): %}
<p>{{ errors["name"] }}</p>
{% endif; %}
<div>
    <label for="inputEmail">Email address</label>
    <input id="inputEmail" name="email" type="email" placeholder="Email address" />
</div>
{% if (isset($errors["email"])): %}
<p>{{ errors["email"] }}</p>
{% endif; %}
<div>
    <label for="inputPassword">Password</label>
    <input type="text" id="inputPassword" name="password" placeholder="Password" />
</div>


<div>
    <label for="inputPasswordConfirmation">Repeat password</label>
    <input type="text" id="inputPasswordConfirmation" name="password_confirmation"
           placeholder="Repeat password" />
</div>
<br>
<button type="submit">Sign up</button>