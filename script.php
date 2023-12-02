<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root'); 
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'microgreens'); 

$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

if (!$link) {
    die("Ошибка: " . mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html>
<head>
<title>testscript</title>
<meta charset="utf-8" />
</head>
<body>

<?php

// Если это запрос GET, то нам надо вывести данные редактируемого пользователя в поля формы. 
// Для этого получаем из базы данных объект по переданному id
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["product_id"]))
{
    // Получаем данные и, если они имеются, выводим их в поля формы. 
    // Таким образом, пользователь увидит на форме данные обновляемого объекта.
    $received_product_id = mysqli_real_escape_string($link, $_GET["product_id"]);
    $sql = "SELECT * FROM products WHERE product_id = '$received_product_id'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $received_product_name = $row["product_name"];
                $received_product_price = $row["product_price"];
            }
            echo "<h3>Обновление данных о товаре</h3>
                <form method='post'>
                    <input type='hidden' name='product_id' value='$received_product_id' />
                    <p>Наименование:
                    <input type='text' name='product_name' value='$received_product_name' /></p>
                    <p>Стоимость:
                    <input type='number' name='product_price' value='$received_product_price' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Товар не найден</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($link);
    }
}
// Вторая часть скрипта представляет обработку POST-запроса - когда пользователь нажимает на кнопку на форме, 
// то будет отправляться POST-запрос с отправленными данными. 
// Мы получаем эти данные и отправляем базе данных команду UPDATE с этими данными, используя при этом параметризацию запроса:
elseif (isset($_POST["product_id"]) && isset($_POST["product_name"]) && isset($_POST["product_price"])) {
      
    $received_product_id = mysqli_real_escape_string($link, $_POST["product_id"]);
    $received_product_name = mysqli_real_escape_string($link, $_POST["product_name"]);
    $received_product_price = mysqli_real_escape_string($link, $_POST["product_price"]);
      
    $sql = "UPDATE products SET product_name = '$received_product_name', product_price = '$received_product_price' WHERE product_id = '$received_product_id'";
    if($result = mysqli_query($link, $sql)){
        header("Location: index.php"); // После выполнения запроса к БД перенаправляем пользователя на скрипт index.php с помощью функции
    } else{
        echo "Ошибка: " . mysqli_error($link);
    }
}
else{
    echo "Некорректные данные";
}
mysqli_close($link);
?>
</body>
</html>