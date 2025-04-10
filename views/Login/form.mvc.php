<div>
    <label for="inputEmail">Email address</label>
    <input id="inputEmail" name="email" type="email" value="{{ user['email'] }}" placeholder="Email address" required />
</div>
{% if (isset($errors["email"])): %}
<p>{{ errors["email"] }}</p>
{% endif; %}
<br>
<div>
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" name="password" value="{{ user['password'] }}" placeholder="Password" required />
    <button type="button" id="togglePassword">Show Password</button>
</div>
{% if (isset($errors["password"])): %}
<p>{{ errors["password"] }}</p>
{% endif; %}
<br>
<button type="submit">Log in</button>

<script>
let passwordType = 'password';
document.getElementById('togglePassword').addEventListener('click', function() {
if (passwordType === 'password') {
passwordType = 'text';
document.getElementById('inputPassword').type = 'text';
this.textContent = 'Hide Password';
} else {
passwordType = 'password';
document.getElementById('inputPassword').type = 'password';
this.textContent = 'Show Password';
}
});
</script>



