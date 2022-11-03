<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="#" method="post">
<?php
    if(isset($_POST["them"])){
        $id = (isset($_GET["id"]))?$_GET["id"]:"";
        // echo $id;
        $hoten = (isset($_POST["hoten"]))?$_POST["hoten"]:"";
        $lop = (isset($_POST["lop"]))?$_POST["lop"]:"";
        $gioitinh = (isset($_POST["gioitinh"]))?$_POST["gioitinh"]:"";
        $ngaysinh = (isset($_POST["date"]))?$_POST["date"]:"";
        //echo $hoten."-".$lop."-".$gioitinh."-".$ngaysinh;
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
          $query = "INSERT into sinhvien values(null,'$hoten','$lop','$gioitinh','$ngaysinh')";
          $result = mysqli_query($conn,$query);
         
          header("Location: danhsachsv.php");
    }
   
    ?>
<table>
   
    <tr>
    <td>Họ tên</td>
    <td><input type="text" name ="hoten"></td>
    </tr>
    <tr>
        <td>Mã lớp</td>
        <td> <input type="text" name="lop"></td> 
    </tr>
    <tr>
    <td>Giới tính</td>
    <td>
        <input type="radio" name ="gioitinh" value="Nam">Nam
        <input type="radio" name ="gioitinh" value="Nữ">Nữ
    </td>
    </tr>
    <tr>
    <td>Ngày sinh</td>
    <td><input type="date" name ="date"></td>
    </tr>
    <tr>
        <td colspan = 2 align="center"><input type="submit" name="them" value="Thêm"></td>
    </tr>
</table>
</form>
</body>
</html>