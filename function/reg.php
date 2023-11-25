<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/sweetalert2.min.css">
    <title>Регистрация</title>

</head>

<body>
    <?
    error_reporting(E_ERROR | E_PARSE);
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
    $email = $_POST['email'];

    $test_email = "SELECT * FROM $tablename WHERE email = '$email'"; //проверка на повторение почты
    $test_name = "SELECT * FROM $tablename WHERE name = '$name'"; //проверка на повторение имени

    $result_e = mysqli_query($conn, $test_email);
    $result_n = mysqli_query($conn, $test_name);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result_n) > 0) {
    ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Пользователь с таким именем уже существует!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_up.php';
            });
        </script>
        
    <?
    } elseif (mysqli_num_rows($result_e) > 0) {
    ?>
        <script>
            //alert('Пользователь с такой почтой уже существует!');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Пользователь с такой почтой уже существует!",
                customClass: {
                    popu: 'custom-swal-container',
                    htmlContainer: 'swl2-popup',
                    confirmButton: 'swal2-btn',
                    cancelButton: 'swal2-btn',
                    denyButton: 'swal2-btn',
                },
            }).then(function() { //редирект
                window.location.href = '../sign_up.php';
            });
        </script>
    <?
    } else {

        $sql2 = "INSERT INTO $tablename (name, pass, email) VALUES ('$name', '$pass', '$email')";

        $result = mysqli_query($conn, $sql2);
    ?>
        <script>
            //alert('Учетная запись успешно создана!');
            Swal.fire({
                icon: "success",
                title: "Учетная запись успешно создана!",
                text: "Войдите в свою учетную запись чтобы продолжить",
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
    mysqli_close($conn);
    ?>
</body>

</html>