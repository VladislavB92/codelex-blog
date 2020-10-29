<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your account</title>
</head>

<body>
    <a href="/">Back</a>
    <h1>Your account</h1>

    <div class="login">
        <h3>Existing user? Log in now!</h3>

        <form action="/" method="POST">
            <label for="name">Username:</label>
            <input id="name" type="text" name="name"><br>

            <label for="password">Password:</label>
            <input id="password" type="text" name="password"><br>

            <button type="submit">Login</button>
        </form>
    </div>

    <div class="register">
        <h3>Don't have an account? Register now!</h3>

        <form action="/account/create" method="POST">
            <label for="name">Username:</label>
            <input id="name" type="text" name="name"><br>

            <label for="email">E-mail:</label>
            <input id="email" type="text" name="email"><br>

            <label for="password">Password:</label>
            <input id="password" type="text" name="password"><br>

            <label for="passwordR">Repeat password:</label>
            <input id="passwordR" type="text" name="repeatPassword"><br>

            <input type="submit" name="create" onclick="return confirm('Are your details correct?')">
        </form>
    </div>
</body>

</html>