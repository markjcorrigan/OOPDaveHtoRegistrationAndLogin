<div>


<div>
    <label for="inputEmail">Email address</label>
    <input id="inputEmail" name="email" type="email" value="{{ user['email'] }}" placeholder="Email address" required  />
</div>
<br>
<div>
    <label for="inputPassword">Password</label>
    <input type="text" id="inputPassword" name="password" value="{{ user['password'] }}" placeholder="Password" required  />
    <!--required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Minimum 6 chars, at least one letter and number"  From older Reg and Login course  NB Dave says this is unreliable-->
</div>


<br>
<button type="submit">Log in</button>


