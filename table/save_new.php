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
  $names = $_POST['name'];
  $descriptions = $_POST['description'];
  $price = $_POST['price'];
  $insert = "name='{$names}', description = '{$descriptions}', price='{$price}'";


  if(!empty($_FILES['image']['tmp_name']))
    {$img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $insert .=", image = '{$img}'";}
  
  $j = "INSERT INTO `items` SET {$insert}";
  mysqli_query($connect, $j);
  if(mysqli_affected_rows($connect) > 0)
  {
    echo "Все спрацювало";
  }
  else
  {
    echo "Щось не так";
  }
  ?>
  <a href = "table_admin.php">Повернутися</a>
</body>
</html>