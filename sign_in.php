<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_sign_in.css">
    <title>Sign in</title>
</head>
<body>
<div class="container">
        <h1>Вход в учетную запись</h1>
        <form action="function/login.php" method="POST">
            <label for="login">Логин или E-mail</label>
            <input type="login" name="login" id="login">

            <label for="pass">Пароль</label>
            <input type="password" name="pass" id="pass">

            <button type="submit">Войти</button>   
            <button type="button" onclick="goBack()">Назад</button>   
        </form>
        <br>
        <span>© RossTEAM Inc.</span>
    </div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>