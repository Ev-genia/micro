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
// define('MYSQL_SERVER', 'localhost');
// define('MYSQL_USER', 'root'); 
// define('MYSQL_PASSWORD', '');
// define('MYSQL_DB', 'microgreens'); -->

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["product_id"]))
{
    // // $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
    // // if (!$link) {
    // //   die("Ошибка: " . mysqli_connect_error());
    // // }
    // $received_product_id = mysqli_real_escape_string($link, $_GET["product_id"]);
    // // через запрос GET получаем параметр id - идентификатор пользователя, который надо получить из базы данных. 
    // // Однако поскольку это значение приходит извне, к нему применяется метод real_escape_string(), который экранирует спецсимволы
    // $sql = "SELECT * FROM products WHERE product_id = '$received_product_id'";
    // if($result = mysqli_query($link, $sql)){
    //     if(mysqli_num_rows($result) > 0){
    //         foreach($result as $row){
    //             $received_name = $row["product_name"];
    //             $received_price = $row["product_price"];
    //             echo "<div>
    //                     <h3>Информация о товаре</h3>
    //                     <p>Наименование: $received_name</p>
    //                     <p>Количество: $received_price</p>
    //                 </div>";
    //         }
    //     }
    //     else{
    //         echo "<div>Товар не найден</div>";
    //     }
    //     mysqli_free_result($result);
    // } else{
    //     echo "Ошибка: " . mysqli_error($link);
    // }
    // mysqli_close($link);
    // Получаем данные и, если они имеются, выводим их в поля формы. 
    // Таким образом, пользователь увидит на форме данные обновляемого объекта.
    $received_product_id = mysqli_real_escape_string($link, $_GET["product_id"]);
    $sql = "SELECT * FROM tovar WHERE product_id = '$received_product_id'";
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
mysqli_close($link);
?>
</body>
</html>