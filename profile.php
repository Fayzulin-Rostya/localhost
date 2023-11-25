<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/style/style_prof.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="/style/sweetalert2.min.css">
    <title>Профиль</title>
</head>

<body>
    <?php
    session_start();

    print_r($_POST['submit']);

    if (!isset($_SESSION['user'])) {
        require 'modules/header.php';
    } else {
        require 'modules/header_session.php';
    }
    ?>

    <div class="container">
        <h1>Данные профиля</h1>
        <div class="main-block">
            <h3>Логин: <?= $_SESSION['user']['name'] ?></h3><br>
            <div>Дата регистрации: <?= $_SESSION['user']['time'] ?></div>
        </div>
        <br>
        <br>
        <div class="sec-block">
            <h2>Ваши статьи</h2>
            <?
            $hostname = 'localhost';
            $username = 'root';
            $pass = '';
            $dbname = 'storage_system';
            $tablename = 'articles';

            $conn = mysqli_connect($hostname, $username, $pass, $dbname);
            $name = $_SESSION['user']['name'];

            if ($conn) {
            } else {
                echo 'Connection failed!';
                exit();
            }

            $sql = "SELECT * FROM $tablename WHERE author = '$name'";
            $result = mysqli_query($conn, $sql);
            $num_r = mysqli_num_rows($result);

            if ($num_r > 0) {
                while ($row = $result->fetch_assoc()) {
                    $art_id = $row['id'];
            ?>

                    <h3>
                        <hr><?= $row['title'] ?>
                    </h3>
                    <span><?= $row['theme'] ?></span><br><br>
                    <p><?= $row['text'] ?></p><br>
                    <span class="inc"><?= $row['time'] ?></span><br><br>
                    <form action="" method="POST">
                        <input type="hidden" name="dell_id" value="<?= $art_id ?>">
                        <input type="submit" name="dell" value="Удалить" class="login-btn">
                    </form>
                <?
                }
            } else {
                echo "Мы не нашли ваших статей";
            }

            //удаление статей
            if (isset($_POST['dell'])) {
                $dell_art_id = $_POST['dell_id'];
                $dell = "DELETE FROM $tablename WHERE id = '$dell_art_id'";
                $dell_result = mysqli_query($conn, $dell);
                ?>
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "Статья удалена!",
                        text: "Ваша статья успешно удлена!",
                        customClass: {
                            popu: 'custom-swal-container',
                            htmlContainer: 'swl2-popup',
                            confirmButton: 'swal2-btn',
                            cancelButton: 'swal2-btn',
                            denyButton: 'swal2-btn',
                        },
                    });
                </script>
            <?
            }

            mysqli_close($conn);
            ?>
        </div>
        <br>
        <span>© RossTEAM Inc. </span>
    </div>

</body>

</html>