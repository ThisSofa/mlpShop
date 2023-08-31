<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <style>
    body{
      background-color: black;
    }
    td{
      background-color: aquamarine;
    }
    th{
      background-color: #006400;
      color: aliceblue;
    }
    td, th {
      padding: 10px;
      
    }
  </style>
</head>
<body>
<h2>Асортимент</h2>
  <table>
    <tr>
      <th>№</th>
      <th>Назва</th>
      <th>Опис</th>
      <th>Фото</th>
      <th>Ціна</th>
      <th>Купити</th>
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
echo "<td><a href = 'form.php?id=" . $i['id'] ."'>Купити</a></td>";
echo "</tr>";
}
?>

</table>
<a href = 'login.html'>Увійти, як адміністратор</a>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>