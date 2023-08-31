<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap" rel="stylesheet">
  <style>body{
      background-color: black;
      font-family: 'Montserrat Alternates', sans-serif;
      color: azure;
    }
    
input::placeholder, textarea::placeholder {
  color: #fff;
  font-size: 20px;
  display: flex;
  align-items: center;
}

input:focus::placeholder, textarea::focus:placeholder {
  color: #782aff;
}


/* on hover placeholder */

input:hover::placeholder, textarea:hover::placeholder {
  color: #782aff;
  font-size: 20px;
}

input:hover:focus::placeholder, textarea:hover:focus::placeholder {
  color: #782aff;
  font-size: 20px;
}

input:hover::placeholder, textarea:hover::placeholder {
  color: #782aff;
  font-size: 20px;
}



form {
  position: relative;
  width: 500px;
  margin: 50px auto 100px auto;
}

input {
  font-size: 20px;
  width: 470px;
  height: 50px;
  padding: 0px 15px 0px 15px;
  background: #782aff;
  outline: none;
  color: #ffffff;
  border: solid 1px #b3aca7;
  border-bottom: none;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
}

input:hover {
  background:  #4B0082;
  color: #782aff;
}

textarea {
  width: 470px;
  max-width: 470px;
  height: 110px;
  max-height: 110px;
  padding: 15px;
  
  background: transparent;
  outline: none;
  
  color: #726659;
  font-family: 'Lato', sans-serif;
  font-size: 0.875em;
  
  border: solid 1px #b3aca7;
  
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
}

textarea:hover {
  background: #b3aca7;
  color: #e2dedb;
}

#submit {
  width: 502px;
  
  padding: 0;
  margin: -5px 0px 0px 0px;
  font-size: 25px;
  color: #ffffff;
  outline:none;
  cursor: pointer;
  border: solid 1px #b3aca7;
  border-top: none;
}

#submit:hover {
  color: #e2dedb;
}
    </style>
  <title>Замовлення</title>
</head>
<body>
  <?
    $connect = mysqli_connect('localhost', 'root', '', 'shop');  ///поменяй library на название своей дб
    if(!$connect) {
    die ("Помилка конекту до бази даних");
    }
    $rows = mysqli_query($connect, "SELECT name, description, image, price FROM `items` WHERE id =".$_GET['id'].""); ///меняй id, author, title, image, file на названия своих столбцов, book1 на название своей таблицы
    
  while($stroka = mysqli_fetch_array($rows))
  {
    $id = $_GET['id'];
    $name = $stroka['name'];
    $description = $stroka['description'];
    $show_img = base64_encode($stroka['image']);
    $price = $stroka['price'];
  } ?>

<form action="send.php" method="POST">

<h3>Ви замовляете: <textarea name="name" maxlength="150" readonly><? echo $name;?></textarea><br></h3>
<h3>Ціна:</h3>  <input name = "price" value="<? echo $price;?>" readonly><br><br>
<h3>Опис: </h3> <? echo $description;?><br>
<h3>Фото: </h3><br>
<img src="data:image/jpeg;base64, <? echo $show_img;?>" alt='Фото немає' width='250' height='250'>

  <h3>Вкажіть розмір:</h3>
  <select name = "size" multiple="no">
      <option disabled selected>Виберіть розмір</option>
      <option value = "xs">XS</option>
      <option value = "s">S</option>
      <option value = "m">M</option>
      <option value = "l">L</option>
      <option value = "xl">XL</option>
      <option value = "xxl">XXL</option>
  </select><br><br>
  <h3>Вкажіть фасон:</h3>
  <input type="radio" id="radio1"
               name="list" value="female">
   <label for="radio1">Жіночий</label><br>
          
  <input type="radio" id="radio2"
               name="list" value="male">
   <label for="radio2">Чоловічий</label><br>
  
  <input name="mail" type="email" name="email" placeholder="email" maxlength="50" required><br><br>
<input name="username" placeholder="фио" maxlength="100" required><br><br>
<textarea name="comments" placeholder="sms" maxlength="500"></textarea><br>

  <input type="submit" value="Відправити">
  </form>
  
</body>
</html>