<?php
require_once 'functions.php';
$connection = connect();
$result = get($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>

<h2>Добавить новую страну</h2>
<div class="formAdd">
<form action="connection.php" method="POST">
    <p><label for="country_id" class="addId">Введите номер:</label><input type="number" name="id" id="country_id"/></p>
    <p><label for="country_name" class="countryNameAdd">Название:</label><input type="text" name="name" id="country_name"/></p>
    <input type="submit" value="Добавить" class="submitAdd">
</form>
</div>
<div>
    <table><tr><th>Id</th><th>Модель</th></tr>
    <?php  while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <th>
    <?php  printf("%s" . PHP_EOL, $row["id"]); ?>
            </th>
            <th>
      <?php  printf("%s \n", $row["name"]); ?>
            </th>
        </tr>
    <?php  endwhile?>
    </table>
</div>

</body>
</html>

