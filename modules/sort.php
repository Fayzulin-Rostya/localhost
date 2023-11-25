<?
session_start();

$hostname = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'storage_system';
$tablename = 'themes';

$conn = mysqli_connect($hostname, $username, $pass, $dbname);

if ($conn) {
} else {
    echo 'Connection failed!';
    exit();
}

$sql = "SELECT * FROM $tablename";
$result = mysqli_query($conn, $sql);
$num_r = mysqli_num_rows($result);

?>

<form method="POST">
    <label for="sort">Выберите вид статьи:</label><br>
    <select name="sort" id="sort">
        <option value=""></option>
        <?
        if ($num_r > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
        <?
            }
        } else {
            echo 'Нет данных для сортировки';
        }
        ?>
    </select><br>
    <button class="register-btn">Сортировать</button>
</form>
<br>
<?
mysqli_close($conn);
?>