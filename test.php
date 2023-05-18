<?php
require('db.php');
if (isset($_POST['test'])) {
    // echo(sql('show', ['name' => 'Test', 'email' => 'dsdsdsd']));
    $result = $conn->query(sql('show', ['name' => 'Test']));

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    insert("user", ["name" => "Chó Giang 2", "password" => "add 2", "email" => "123444"]);
    insert("test1", ["name" => "Chó Giang 2", "amount" => "add 2", "price" => 1223333]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="submit" name="test" value="Test Nút">
    </form>
</body>

</html>