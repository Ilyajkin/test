<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="utf-8">
</head>
<body>

<h2>Добавить новую страну</h2>
<form method="POST">
    <p><label for="country_id">Введите номер:</label><input type="text" name="id" id="country_id"/></p>
    <p><label for="country_name">Название:</label><input type="text" name="name" id="country_name"/></p>
    <input type="submit" value="Добавить">
</form>
</body>
</html>
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'Bkmz1994';
$dbname = 'interface_add_country';

if(isset($_POST['id']) && isset($_POST['name'])){

    // подключаемся к серверу
    $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Ошибка " . mysqli_error($link));

    // экранирования символов для mysql
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));

    //строка запроса

    $query_addition = "INSERT INTO country (id, name) VALUES('$id', '$name')";

    // выполняем запрос

    $addition_result = mysqli_query($link, $query_addition ) or die("Ошибка " . mysqli_error($link));
    $query_output ="SELECT * FROM country";
    if($addition_result) {
        echo "<span style='color:#0000ff;'>Данные добавлены</span>";
    }
    // очищаем результат
    mysqli_free_result($addition_result);


    $output = mysqli_query($link, $query_output) or die("Ошибка " . mysqli_error($link));
    if($output)
    {
        $rows = mysqli_num_rows($output); // количество полученных строк

        echo "<table><tr><th>Id</th><th>Название</th>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($output);
            echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }


    // очищаем результат
    mysqli_free_result($output);
}
    echo "</table>";
    // закрываем подключение
    mysqli_close($link);
}
?>


