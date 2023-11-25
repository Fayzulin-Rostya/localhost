<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="icon" href="icon/favicon.svg">
    <title>СxС</title>
    <style>

    </style>
</head>

<body>

    <?php
    session_start();


    if (!isset($_SESSION['user'])) {
        require 'modules/header.php';
    } else {
        require 'modules/header_session.php';
    }
    ?>

    <div class="container">
        <div id="main-content">
            <div id="articles-container">
                <div class="article">
                    <h2>Последние статьи</h2>
                    <?
                    $hostname = 'localhost';
                    $username = 'root';
                    $pass = '';
                    $dbname = 'storage_system';
                    $tablename = 'articles';

                    $conn = mysqli_connect($hostname, $username, $pass, $dbname);

                    if ($conn) {
                    } else {
                        echo 'Connection failed!';
                        exit();
                    }

                    $sql = "SELECT * FROM $tablename ORDER BY time DESC LIMIT 3";
                    $result = mysqli_query($conn, $sql);
                    $num_r = mysqli_num_rows($result);

                    if (isset($_POST['sort'])) {
                        $_SESSION['sort'] = [
                            "name" => $_POST['sort']
                        ];

                        header("Refresh:0; url= index_sort.php");
                    }

                    if ($num_r > 0) {

                        require 'modules/sort.php';
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                            <h3>
                                <hr><?= $row['title'] ?>
                            </h3>
                            <span><?= $row['theme'] ?></span><br><br>
                            <p><?= $row['text'] ?></p><br>
                            <span class="inc"><?= $row['time'] ?></span><br>
                            <span class="inc">Автор: <?= $row['author'] ?></span><br><br>

                    <?
                        }
                    } else {
                        echo "Статей не обнаружено!";
                    }

                    mysqli_close($conn);
                    ?>

                </div>
            </div>
            <br>
            <span class="inc">© RossTEAM Inc. </span>
        </div>
    </div>
</body>

</html>