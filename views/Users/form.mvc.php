<label for="name">Name</label>
<input type="text" id="name" name="name" value="{{ user["name"] }}">

{% if (isset($errors["name"])): %}
    <p>{{ errors["name"] }}</p>
{% endif; %}

<label for="email">Email</label>
<input type="text" id="email" name="email" value="{{ user["email"] }}">

<label for="password_hash">Password_hash</label>
<!--<input type="text" id="password_hash" name="password_hash" value="--><?php //= $User["password_hash"] ?? "" ?><!--">-->
<input type="password" id="password_hash" name="password_hash" value="{{ user["password_hash"] }}">

<button>Save</button>