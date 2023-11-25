<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/sweetalert2.min.css">
    <title>Вход</title>

</head>

<body>
    <?
    session_start();
    //error_reporting(E_ERROR | E_PARSE);
    $hostname = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'storage_system';
    $tablename = 'users';

    $conn = mysqli_connect($hostname, $username, $pass, $dbname);

    if ($conn) {
    } else {
        echo 'Connection failed!';
        exit();
    }

    $name = $_POST['login'];
    $pass = $_POST['pass'];

    $test_email = "SELECT * FROM $tablename WHERE email = '$name'"; //проверка на повторение почты
    $test_name = "SELECT * FROM $tablename WHERE name = '$name'"; //проверка на повторение имени
    $test_pass = "SELECT * FROM $tablename WHERE pass = '$pass'";
    $sql = "SELECT * FROM $tablename WHERE (name = '$name' or email = '$name') and pass = '$pass'";

    $result = mysqli_query($conn, $sql);
    $result_e = mysqli_query($conn, $test_email);
    $result_n = mysqli_query($conn, $test_name);
    $result_p = mysqli_query($conn, $test_pass);

    $user = mysqli_fetch_assoc($result);

    if ((mysqli_num_rows($result_n) > 0 or mysqli_num_rows($result_e) > 0) and mysqli_num_rows($result_e) > 0) {
    ?>

        <script>
            //alert('Учетная запись найдена!');
            Swal.fire({
                icon: "success",
                title: "Добро пожаловать <?= $user['name'] ?> !",
                text: "Приятного пользования",
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

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "time" => $user['time']
        ];
    } elseif ((mysqli_num_rows($result_e) > 0 or mysqli_num_rows($result_n) > 0) and mysqli_num_rows($result_p) == 0) {

    ?>

        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Неверный логин или пароль!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_in.php';
            });
        </script>

    <?

    } elseif ((mysqli_num_rows($result_e) > 0 or mysqli_num_rows($result_n) == 0) and mysqli_num_rows($result_p) > 0) {

    ?>
        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "success",
                title: "Добро пожаловать <?= $user['name'] ?>!",
                text: "Приятного пользования",
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

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "time" => $user['time']
        ];
    } elseif ((mysqli_num_rows($result_e) == 0 or mysqli_num_rows($result_n) > 0) and mysqli_num_rows($result_p) > 0) {
    ?>

        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "success",
                title: "Добро пожаловать <?= $user['name'] ?>!",
                text: "Приятного пользования",
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
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "time" => $user['time']
        ];
    } elseif ((mysqli_num_rows($result_e) == 0 or mysqli_num_rows($result_n) == 0) and mysqli_num_rows($result_p) > 0) {
    ?>

        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Неверный логин или пароль!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_in.php';
            });
        </script>

    <?
    } elseif ((mysqli_num_rows($result_e) > 0 or mysqli_num_rows($result_n) == 0) and mysqli_num_rows($result_p) == 0) {
    ?>

        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Неверный логин или пароль!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_in.php';
            });
        </script>

    <?
    } elseif ((mysqli_num_rows($result_e) == 0 or mysqli_num_rows($result_n) > 0) and mysqli_num_rows($result_p) == 0) {
    ?>

        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Неверный логин или пароль!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_in.php';
            });
        </script>

    <?
    }
    mysqli_close($conn);
    ?>
</body>

</html>