<?
$connect = mysqli_connect('localhost', 'root', '', 'books_db');

if(!$connect) {
 die ("Error connect to database");
}
?>