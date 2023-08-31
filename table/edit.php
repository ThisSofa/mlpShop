<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
</head>
<body>
  <?
    $connect = mysqli_connect('localhost', 'root', '', 'shop');  ///поменяй library на название своей дб
    if(!$connect) {
    die ("Помилка конекту до бази даних");
    }
    $rows = mysqli_query($connect, "SELECT name, description, image, price FROM `items` WHERE id =".$_GET['id'].""); ///меняй id, name, description, image, file на названия своих столбцов, book1 на название своей таблицы
    
  while($stroka = mysqli_fetch_array($rows))
  {
    $id = $_GET['id'];
    $name = $stroka['name'];
    $description = $stroka['description'];
    $show_img = base64_encode($stroka['image']);
    $price = $stroka['price'];
  } ?>

  <form action="save_edit.php" method="post" enctype="multipart/form-data">
    Назва <textarea maxlength="150" name = "name"><? echo $name;?></textarea><br><br>
    Опис <textarea maxlength="500" name = "description"><? echo $description;?></textarea><br><br>
    Фото: <input type="file" name="image"><br><br> 
    <p>Обкладинка до зміни</p>
    <img src="data:image/jpeg;base64, <? echo $show_img;?>" alt='Фото немаэ' width='250' height='250'><br><br>
    Ціна <input name = "price" value="<? echo $price;?>"><br><br>
    
    <input type="hidden" name="id" value="<? echo $id;?>"><br>
    <input type="submit" value="Зберегти">
  </form>
</body>
</html>