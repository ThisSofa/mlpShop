<?php session_start(); // start session это магазин!
if (!isset($_POST['button'])) {
    include("login.html");
} else {
    $db = mysqli_connect('localhost', 'root', '', 'shop') or die("Такой базы нема");
    $res = mysqli_query($db, "SELECT * FROM user WHERE login='" . $_POST['login'] . "' AND pass='" . $_POST['pass'] . "'");
    if (mysqli_num_rows($res) != 1) {
        echo "Перевірте корректність вводу<br>";
        echo "<a href = 'login.html'>Повернутися</a>";
    } else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pass'] = $_POST['pass'];
        header("Location: table_admin.php");
        exit();
    }
    mysqli_close($db);
}
?>
