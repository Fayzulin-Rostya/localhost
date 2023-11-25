<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_404.css">
    <title>404 - Страница не найдена</title>
</head>

<body>
    <?php
    header("HTTP/1.0 404 не найден");
    ?>
    <div class="container">
        <form>
            <h1>404</h1>
            <p>Страница не найдена!</p>
            <button type="button" onclick="goBack()">Назад</button>
        </form><br>
        <span class="inc">© RossTEAM Inc. </span>
    </div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>

</html>