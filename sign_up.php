<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_sign_up.css">
    <link rel="icon" href="icon/favicon.svg">
    <title>Регистрация пользователя</title>
</head>

<body>
    <div class="container">
        <h1>Регистрация</h1>
        <form action="function/reg.php" method="POST">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>

            <label for="password">Пароль:</label>
            <input type="password" id="pass" name="pass" required>

            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Зарегистрироваться</button>
            <button type="button" onclick="goBack()">Назад</button>
        </form>
        <br>
        <span class="inc">© RossTEAM Inc. </span>
    </div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>