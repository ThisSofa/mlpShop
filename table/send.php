<?
 ///подумай, как получить то, что хочет юзер в почте, может просто текст из формы

 //почта
$username = $_POST['username'];
$from = $_POST['mail'];
$comments = $_POST['comments'];
$name = $_POST['name'];

//obrabotka
$username = htmlspecialchars($username);
$from = htmlspecialchars($from);
$comments = htmlspecialchars($comments);

$username = urldecode($username);
$from = urldecode($from);
$comments = urldecode($comments);

$username = trim($username);
$from  = trim($from);
$comments = trim($comments);

if($_POST['size'] == 'xs'){
  $size = 'xs';
} elseif($_POST['size'] == 's'){
  $size = 's';
} elseif($_POST['size'] == 'm'){
  $size = 'm';
} elseif($_POST['size'] == 'l'){
  $size = 'l';
} elseif($_POST['size'] == 'xl'){
  $size = 'xl';
} elseif($_POST['size'] == 'xxl'){
  $size = 'xxl';
} else{
  $size = 'Не вказано';
}

if($_POST['list'] == 'female'){
  $list = 'female';
} elseif($_POST['list'] == 'male'){
  $list  = 'male';
} else{
  $list  = 'Не вказано';
}

///кому
$to = "gismetio.anonima@gmail.com";

//формирование самого письма
$headers = "Замовник: $username" . "\r\n".
"Замовив: $name" . "\r\n".
"Розмір: $size" . "\r\n".
"Фасон: $list" . "\r\n".
"Поштова скринька замовника: $from" . "\r\n".
"Коментарій до замовлення: $comments" . "\r\n".
"X-Mailer: PHP/" . phpversion();

//отправка
if(mail($to, 'Замовлення', $headers)){
  echo 'Ok';
}
else {
  echo 'Ne ok';
}

header ('Location: index.php');
?>