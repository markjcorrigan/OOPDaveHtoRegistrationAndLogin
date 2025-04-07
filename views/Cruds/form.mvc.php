<label for="name">Name</label>
<input type="text" id="name" name="name" value="{{ crud["name"] }}">

{% if (isset($errors["name"])): %}
    <p>{{ errors["name"] }}</p>
{% endif; %}

<label for="surname">Surname</label>
<input type="text" id="surname" name="surname" value="{{ crud["surname"] }}">

{% if (isset($errors["surname"])): %}
<p>{{ errors["surname"] }}</p>
{% endif; %}

<label for="email">Email</label>
<input type="text" id="email" name="email" value="{{ crud["email"] }}">

{% if (isset($errors["email"])): %}
<p>{{ errors["email"] }}</p>
{% endif; %}

<label for="cell">Cell</label>
<input type="text" id="cell" name="cell" value="{{ crud["cell"] }}">

{% if (isset($errors["cell"])): %}
<p>{{ errors["cell"] }}</p>
{% endif; %}

<label for="description">Description</label>
<textarea id="description" name="description">{{ crud["description"] }}</textarea>

<button>Save</button>