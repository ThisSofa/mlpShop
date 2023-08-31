<?php
$connect = mysqli_connect('localhost', 'root', '', 'shop');  ///поменяй library на название своей дб
if(!$connect) {
die ("Помилка конекту до бази даних");
}
$zapros="DELETE FROM items WHERE id ='".$_GET['id']. "'"; ////book1 название таблицы в дб
mysqli_query ($connect, $zapros);
header ('Location: table_admin.php');

?>