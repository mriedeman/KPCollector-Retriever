<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title">KPCollector API Login</h1>
        <form action="process_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

