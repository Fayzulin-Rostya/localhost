<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/sweetalert2.min.css">
    <title>Добавление</title>
</head>

<body>
    <?
    session_start();
    $hostname = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'storage_system';
    $tablename = 'articles';

    $conn = mysqli_connect($hostname, $username, $pass, $dbname);

    if (!$conn) {
        echo 'Connection failed!';
        exit();
    }


    if ($conn) {
        $theme = $_POST['theme'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['user']['name'];
        //print_r($_POST);

        $sql = "INSERT INTO $tablename (theme, title, text, author) VALUES ('$theme', '$title', '$content', '$author')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
    ?>

            <script>
                //alert('Пользователь с такой почтой уже существует!');
                Swal.fire({
                    icon: "success",
                    title: "Ваша статья добавлена опубликована!",
                    text: "Хорошего дня!",
                    customClass: {
                        popu: 'custom-swal-container',
                        htmlContainer: 'swl2-popup',
                        confirmButton: 'swal2-btn',
                        cancelButton: 'swal2-btn',
                        denyButton: 'swal2-btn',
                    },
                }).then(function() { //редирект
                    window.location.href = '../index.php';
                });
            </script>

    <?
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>