<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id = (isset($_POST['xoa']))?$_POST['xoa']:"";
    //var_dump($id);
    $strIn ="";
    $count = 1;
    foreach($id as $key => $value){
      //  echo $key."-".$value. '<br>';
        if($count < sizeof($id))
        {
            $strIn= $strIn.$value.',';
        }else
        {
            $strIn= $strIn.$value;
        }
        $count++;
    }
  //  echo $strIn;
                 $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "qlsv";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password,$db);
                 // Check connection
                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $query = "delete from sinhvien where id in (".$strIn.")";
                  $result = mysqli_query($conn,$query);
                  header("Location: danhsachsv.php");
    ?>
</body>
</html>