<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Адмінка</title>
  <style>
    body{
      background-color: black;
      font-family: 'Montserrat Alternates', sans-serif;
      color: azure;
      
    }
    table {
border-spacing: 0 10px;

font-weight: bold;
display: flex;
justify-content: center;
}
th {
padding: 10px 20px;
background: #782aff;
color: #fff;
border-right: 2px solid;
font-size: 0.9em;
}

td {
vertical-align: middle;
padding: 10px;
font-size: 14px;
text-align: center;
border-top: 3px solid #782aff;
border-bottom: 3px solid #782aff;
border-right: 3px solid #782aff;
}
td:first-child {
border-left: 3px solid #782aff;
border-right: none;
}
td:nth-child(2){
text-align: center;
}

/* width */
::-webkit-scrollbar {
    width: 15px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px rgba(149, 25, 237, 0.685); 
    border-radius: 10px;
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #49199d; 
    border-radius: 10px;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #782aff; 
  }

  img{
    float: left;
    padding: auto;
    border-radius: 20px;
    margin-right: 4px;
margin-left: 6px;
padding: 5px;
  }

  .button-64 {
    align-items: center;
    background-image: linear-gradient(144deg,#6109b8, #5B42F3 50%,#0004eb);
    border: 0;
    border-radius: 8px;
    box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
    box-sizing: border-box;
    color: #FFFFFF;
    display: flex;
    font-size: 20px;
    justify-content: center;
    line-height: 30px;
    max-width: 100%;
    min-width: 70%;
    padding: 5px;
    
  margin-top: 2%;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    cursor: pointer;
    
  }
  
  .button-64:active,
  .button-64:hover {
    outline: 0;
  }
  
  .button-64 span {
    background-color: rgb(7, 8, 45);
    padding: 5px 8px;
    border-radius: 6px;
    width: 70%;
    height: 80%;
    transition: 300ms;
  }
  
  .button-64:hover span {
    background: none;
  }
  
  @media (min-width: 500px) {
    .button-64 {
      font-size: 20px;
      min-width: 100px;
    }
  }

  a{
    text-decoration: none;
    color: #FFFFFF;
  }

  .lev{
    display: flex;
    margin-left: 10%;
    justify-content: space-between;
    margin-right: 10%;
  }
  
  h3{
    display: flex;
    justify-content: center;
  }
  </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap" rel="stylesheet">
</head>
<body>

<h3>Асортимент</h3>
  <table>
    <tr>
      <th>№</th>
      <th>Назва</th>
      <th>Опис</th>
      <th>Фото</th>
      <th>Ціна</th>
      <th>Редагувати</th>
      <th>Видалити</th>
    </tr>
  
<?
$connect = mysqli_connect('localhost', 'root', '', 'shop');

if(!$connect) {
 die ("Error connect to database");
}

$rows = mysqli_query($connect, "SELECT id, name, description, image, price FROM `items`"); ///меняй id, author, title, image, file на названия своих столбцов, book1 на название своей таблицы
while ($i = mysqli_fetch_array($rows)){
  $show_img = base64_encode($i['image']);
echo "<tr>";
echo "<td>" . $i['id'] ."</td>";
echo "<td>" . $i['name'] ."</td>";
echo "<td>" . $i['description'] ."</td>";
echo "<td><img src='data:image/jpeg;base64, " .$show_img."' alt='Фото немає' width='250' height='250'></td>";
echo "<td>" . $i['price'] ."</td>";
echo "<td><button class='button-64'><a href = 'edit.php?id=" . $i['id'] ."'><span class='text'>Редагувати</span></a></button></td>";
echo "<td><button class='button-64'><a href = 'delete.php?id=" . $i['id'] ."'> <span class='text'>Видалити</span></a></button></td>";
echo "</tr>";
}
?>

</table><br>

<h3><? echo "Ви авторизовані, як: " . $_SESSION['login'] . "<br>"; ?></h3>
<div class="lev">
<button class="button-64" name="button2"><a href='logout.php'><span class="text">Вийти</span></a></button>
<button class="button-64" name="button2"><a href = "new.html"><span class="text">Додати річ</span></a></button></div>
</body>
</html>