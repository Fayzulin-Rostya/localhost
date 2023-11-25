<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/style_m_add.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система хранения публикаций</title>
</head>
<body>
    <div class="container">
        <h1>Система харанения публикаций</h1>
        <form action="function/add_articles.php" method="POST">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" required>

            <label for="theme">Тема статьи:</label>
            <select name="theme" id="theme">
                <option value="Научная статья">Научная статья</option>
                <option value="Новостная статья">Новостная статья</option>
                <option value="Информационная статья">Информационная статья</option>
            </select>

            <label for="content">Содержание:</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>

            <br>

            <button type="submit">Сохранить</button>
            <button type="button"onclick="goBack()">Назад</button>
        </form>
        <br>
        <span>© RossTEAM Inc. </span>
    </div>

</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>