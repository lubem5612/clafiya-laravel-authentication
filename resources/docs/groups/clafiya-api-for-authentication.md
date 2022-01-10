# Clafiya API For Authentication

API for handling User Authentication

## Login user


login attempt into the platform

> Example request:

```bash
curl -X POST \
    "http://clafiya.slait.com.ng/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"earum","password":"rerum"}'

```

```javascript
const url = new URL(
    "http://clafiya.slait.com.ng/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "earum",
    "password": "rerum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTRjNmEyNi1lMTNhLTRkOGQtOTU2MC00NmZhZjRhNTllYmUiLCJqdGkiOiIwMGUyMzZiN2JmZDNkNTJiNDZiNThmNzJkOTVhMGVhNTY4NTMxOTNlZmFmYzk1OTRjY2ExZjMzOGZlOGM4OGM1OWYyMTc0NzkzMzYxNDg2OCIsImlhdCI6MTY0MTU1NTQ5My4yNjE2NiwibmJmIjoxNjQxNTU1NDkzLjI2MTY2NCwiZXhwIjoxNjQyMDczODkzLjI1OTg2Niwic3ViIjoiNjMwZmQzZGMtYmVhNC00MzdkLWI3Y2MtYjNjOGVhZDUzMjM2Iiwic2NvcGVzIjpbXX0.HsIn2YHEoWvC7dhLatfNEDHP66vJb8kONpDjT4AFJcOFqowPJ-uH-GzN-7UMzcQ5FKt87O2Dzx02iOZflBjwuS9mjfyxeNsk-KNwEeMlte-f55KEGQvt0KSkV0TGz-3hyLk0BdWHxsSxhjOEq0SXHmrGgR5_EJP-dIpokOOA8O70R7qrgV7yHEhuIqYGr92wVUphNyHEtoZ6U4mHFGAgPm9POn17lYjwnRLylx41bYHncGW6s9StlOzhyOl2FIY1vgobu6hHtt9KA9kow2aKupt7C3YiknDyvSpcJk3DplfVOrT-7buN_mDt4wsfRFFrx2XxUGgwU9ERPbDUfIp__b12nk51vhJ1ZyRbYmLEkDGkqHpGtHU69YbfrJD2Ep4BIL2ZwK1_LTNBJF-IaoxStZqgnjowpVrxDshgUM6LkJANjDfwRLp-T1HQ1Ui1fCdP-6OYNlrE-J2vGnZNAp8PWxs--X7Rq1jamc4A9TIu6xcPoXYdKkTxIxFz5WxfHrSch-4pDHashzUvgDSbtPEEJmhexIsayn-_0rgyTbOBrIs1GiFv8tsT0CH_Vrlr7euFdEBiKWLffA-Asmy7Q7GOOtRHIpW9WY6EvSjtEKBxOBXhmB6Ee_ocor26VJfRyTVnOdhrvkjZ44oQo6jlMSOAXGXJOqsCVOpfKJgShjfVdL8",
        "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
        "name": "Lubem Tser",
        "email": "enginlubem@ymail.com",
        "phone": "08038602189"
    },
    "message": "user logged in successfully.",
    "status": "success"
}
```
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The username of the user. either email or phone number can be used as username.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The password of the user.
</p>

</form>


## Register user


log in user after registration and return token with other user details

> Example request:

```bash
curl -X POST \
    "http://clafiya.slait.com.ng/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"modi","email":"quas","phone":"cupiditate","password":"at"}'

```

```javascript
const url = new URL(
    "http://clafiya.slait.com.ng/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "modi",
    "email": "quas",
    "phone": "cupiditate",
    "password": "at"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTRjNmEyNi1lMTNhLTRkOGQtOTU2MC00NmZhZjRhNTllYmUiLCJqdGkiOiIwMGUyMzZiN2JmZDNkNTJiNDZiNThmNzJkOTVhMGVhNTY4NTMxOTNlZmFmYzk1OTRjY2ExZjMzOGZlOGM4OGM1OWYyMTc0NzkzMzYxNDg2OCIsImlhdCI6MTY0MTU1NTQ5My4yNjE2NiwibmJmIjoxNjQxNTU1NDkzLjI2MTY2NCwiZXhwIjoxNjQyMDczODkzLjI1OTg2Niwic3ViIjoiNjMwZmQzZGMtYmVhNC00MzdkLWI3Y2MtYjNjOGVhZDUzMjM2Iiwic2NvcGVzIjpbXX0.HsIn2YHEoWvC7dhLatfNEDHP66vJb8kONpDjT4AFJcOFqowPJ-uH-GzN-7UMzcQ5FKt87O2Dzx02iOZflBjwuS9mjfyxeNsk-KNwEeMlte-f55KEGQvt0KSkV0TGz-3hyLk0BdWHxsSxhjOEq0SXHmrGgR5_EJP-dIpokOOA8O70R7qrgV7yHEhuIqYGr92wVUphNyHEtoZ6U4mHFGAgPm9POn17lYjwnRLylx41bYHncGW6s9StlOzhyOl2FIY1vgobu6hHtt9KA9kow2aKupt7C3YiknDyvSpcJk3DplfVOrT-7buN_mDt4wsfRFFrx2XxUGgwU9ERPbDUfIp__b12nk51vhJ1ZyRbYmLEkDGkqHpGtHU69YbfrJD2Ep4BIL2ZwK1_LTNBJF-IaoxStZqgnjowpVrxDshgUM6LkJANjDfwRLp-T1HQ1Ui1fCdP-6OYNlrE-J2vGnZNAp8PWxs--X7Rq1jamc4A9TIu6xcPoXYdKkTxIxFz5WxfHrSch-4pDHashzUvgDSbtPEEJmhexIsayn-_0rgyTbOBrIs1GiFv8tsT0CH_Vrlr7euFdEBiKWLffA-Asmy7Q7GOOtRHIpW9WY6EvSjtEKBxOBXhmB6Ee_ocor26VJfRyTVnOdhrvkjZ44oQo6jlMSOAXGXJOqsCVOpfKJgShjfVdL8",
        "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
        "name": "Lubem Tser",
        "email": "enginlubem@ymail.com",
        "phone": "08038602189"
    },
    "message": "user created successfully.",
    "status": "success"
}
```
<div id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</div>
<div id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</div>
<form id="form-POSTapi-register" data-method="POST" data-path="api/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-register" onclick="tryItOut('POSTapi-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-register" onclick="cancelTryOut('POSTapi-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The name of the user
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The email of the user which must be unique. e.g me@example.com
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The phone number of the user which must be unique. e.g 07012345678
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>
The password of the user. must be min of 6 characters
</p>

</form>


## Authenticated User

<small class="badge badge-darkred">requires authentication</small>

get the authenticated user details on the platform

> Example request:

```bash
curl -X GET \
    -G "http://clafiya.slait.com.ng/api/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://clafiya.slait.com.ng/api/user"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
        "name": "Lubem Tser",
        "email": "enginlubem@ymail.com",
        "phone": "08038602189",
        "email_verified_at": null,
        "created_at": "2022-01-07T11:18:39.000000Z",
        "updated_at": "2022-01-07T11:18:39.000000Z"
    },
    "message": "logged user retrieved successfully",
    "status": "success"
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>


## Log Out User

<small class="badge badge-darkred">requires authentication</small>

log out a user from the platform

> Example request:

```bash
curl -X POST \
    "http://clafiya.slait.com.ng/api/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://clafiya.slait.com.ng/api/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "success": true,
    "data": null,
    "message": "user logged out successfully",
    "status": "success"
}
```
<div id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</div>
<form id="form-POSTapi-logout" data-method="POST" data-path="api/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-logout" onclick="tryItOut('POSTapi-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-logout" onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/logout</code></b>
</p>
<p>
<label id="auth-POSTapi-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-logout" data-component="header"></label>
</p>
</form>



