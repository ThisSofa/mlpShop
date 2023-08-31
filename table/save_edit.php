<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
  $connect = mysqli_connect('localhost', 'root', '', 'shop');  ///поменяй library на название своей дб
  if(!$connect) {
  die ("Помилка конекту до бази даних");
  }
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $update = "name ='{$name}', description = '{$description}', price ='{$price}'";

  if(!empty($_FILES['image']['tmp_name']))
  {
    $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      $update .=", image = '{$img}'";
  }
  

  $zapros = "UPDATE `items` SET {$update} WHERE id=".$_POST['id']."";
  mysqli_query($connect, $zapros);
  if(mysqli_affected_rows($connect) > 0){
    echo "Збережено";
  }
  else{
    echo "Щось не так";
  } ?>
  <a href = "index_admin.php">Повернутися</a>
</body>
</html>