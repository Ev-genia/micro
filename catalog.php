<!DOCTYPE html>
<html>

<head>
  <title>
    Catalog
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body class="text-bg-light p-3">
  <h1 align="center">MicroDiliGreens</h1>
  <h2 align="center">The store of MicroGreens</h2>
  <p>
    <a href="index.html" class="link-success">Back to home page</a>
  </p>
  <summary>Виды микрозелени:</summary>
  <ol>
    <li>
      <p>
        <a href="redis.html" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Redis</a>
      </p>
      <img src="images/catalog_redis.webp" alt="loading redis" width="100" height="100">
      <p></p>
    </li>

    <li>
      <p>
        <a href="amarant.html"  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Amarant</a>
      </p>
      <img src="images/catalog_amaranth.jpg" alt="loading amaranth" width="100" height="100">
      <p></p>
    </li>

    <li>
      <p>
        <a href="broccoli.html"  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Broccoli</a>
      </p>
      <img src="images/catalog_broccoli.webp" alt="loading broccoli" width="100" height="100">
      <p></p>
    </li>
  </ol>

  <p></p>

  <!-- <h4>
    Price
  </h4>

  <table class="table table-hover">
    <thead class="thead-dark">
      <tr class="table-success">
        <th scope="col">Name</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-success">
        <td>Redis</td>
        <td>100 руб.</td>
      </tr>
      <tr class="table-success">
        <td>Amorant</td>
        <td>120 руб.</td>
      </tr>
      <tr class="table-success">
        <td>Broccoli</td>
        <td>110 pуб.</td>
      </tr>
    </tbody>
  </table> -->

<?php
// define('MYSQL_SERVER', 'localhost');
// define('MYSQL_USER', 'root'); 
// define('MYSQL_PASSWORD', '');
// define('MYSQL_DB', 'microgreens'); 

// $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
// if (!$link) {
//   die("Ошибка: " . mysqli_connect_error());
// }
// $sql = "SELECT * FROM products";
// if($result = mysqli_query($link, $sql)){
//     // mysqli_query возвращает набор полученных строк, который мы можем перебрать с помощью цикла
//     $rowsCount = mysqli_num_rows($result); // количество полученных строк
//     echo "<h4>Price</h4>";
//     echo "<table class='table table-hover'><tr class=table-success><th>Код товара</th><th>Наименование</th><th>Стоимость</th></tr>";
//     foreach($result as $row){
//         // каждый элемент $result передается в переменную $row и хранит данные отдельной строки в виде ассоциативного массива, где ключи элементов - названия столбцов.
//         echo "<tr>";
//             echo "<td>" . $row["product_id"] . "</td>";
//             echo "<td>" . $row["product_name"] . "</td>";
//             echo "<td>" . $row["product_price"] . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
//     mysqli_free_result($result); // очистить отведенную для него память
// } else{
//     echo "Ошибка: " . mysqli_error($link);
// }
// mysqli_close($link);

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root'); 
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'microgreens'); 

$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
if (!$link) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT product_id, product_name, product_price FROM products";
if($result = mysqli_query($link, $sql)){
    // echo "<table class='table table-hover'><tr class=table-success><th>Наименование</th><th>Стоимость</th><th></th></tr>";
    echo "<table class='table table-hover'><tr class=table-success><th>Наименование</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td>" . $row["product_price"] . " руб.</td>";
            // echo "<td><a href='script_details.php?product_id=" . $row["product_id"] . "'>Подробнее</a></td>";
            // echo "<td><a href='script.php?product_id=" . $row["product_id"] . "'>Подробнее</a></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($link);
}
mysqli_close($link);
?>

</body>

</html>