<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sql(string $action, array $attribute = [], int $id = 0)
{
    $sqlAdd = "";

    switch ($action) {
        case 'add':
            $sql = '';
            break;

        case 'edit':
            $sql = 'rtsdasdasdasd';
            break;

        case 'show':
            $sql = "SELECT * FROM user";

            foreach ($attribute as $key => $item) {
                if (($sqlAdd == null)) {
                    $sqlAdd = $sqlAdd . " where " . $key . " like '%" . $attribute[$key] . "%'";
                } else {
                    $sqlAdd = $sqlAdd . " and " . $key . " like '%" . $attribute[$key] . "%'";
                }
            }

            $sql = $sql . $sqlAdd;
            break;

        case 'detail':
            break;

        default:
            $sql = '1111';
            break;
    }

    return $sql;
}

function insert($table, array $attribute = [])
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $column = "";
    $data = "";

    foreach ($attribute as $key => $value) {
        if ($column == "") {
            $column = $key;
            $data = "'" . $value . "'";
        } else {
            $column .= "," . $key;
            $data .= ", '" . $value . "'";
        }
    }
    $sql = "INSERT INTO " . $table . " (" . $column . ") VALUES (" . $data . ")";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
