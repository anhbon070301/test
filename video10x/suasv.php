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
    if(isset($_POST["sua"])){
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
          $query = "UPDATE sinhvien set hoten='$hoten', lopid='$lop', gioitinh='$gioitinh' ,ngaysinh='$ngaysinh' where id=".$id;
          $result = mysqli_query($conn,$query);
          if ($conn->query($query) === TRUE) {
           // echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
          header("Location: danhsachsv.php");
    }
   
    ?>
    <form action="#" method="post">

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
                <td colspan = 2><input type="submit" name="sua" value="Sửa"></td>
            </tr>
        </table>
    </form>
</body>
</html>