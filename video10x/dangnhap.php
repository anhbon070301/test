<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<style>
    table{
        margin-left: 500px;
        margin-top: 260px;
        background-color: #00BFFF; 
        border-radius: 30px;
    }
    body{
        background-image: url("https://img.thuthuattinhoc.vn/uploads/2019/07/28/anh-nen-bui-mau-bung-ra_014738614.jpg");
        background-repeat: no-repeat;
    }
  .vien{
     border-radius:20px;
  }
  b{
    font-size: 40px;
  }
  .cach{
      margin-left: 500px;
  }
  .maubt{
    background-color: #4C24AB;
  }
</style>
<body>

    <form action="" method="post">
            <!-- <p>Đăng nhập</p> -->
            <table  class="bang" >
                <tr>
                    <td colspan=2 align=center><b>Đăng nhập</b> </td>
                </tr>
            <tr >
                <td>Tài khoản</td>
                <td><input type="text" name="username" class="vien"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" class="vien"></td>
            </tr>
            <tr>
                <td colspan=2 align=center><input type="submit" name="submit" value="Đăng nhập" class="vien maubt"> <input type="reset" value="Reset" class="vien maubt"></td>
            </tr>
            </table>
    </form>
    <?php
    
   
    $servername = "localhost";
    $username_sql = "root";
    $password_sql = "";
    $dbname = "dangki";

    // Create connection
    $conn = mysqli_connect($servername, $username_sql, $password_sql,$dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
   if (isset($_POST["submit"]))
   {
       if (empty($_POST["username"]) or empty($_POST["password"])){
        echo "<p class=cach>Vui lòng không để trống</p>";
       }
       else{
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * from user where username='$username' and password='$password'";
        $query = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($query);
        if($num == 0)
        {
            echo "<p class=cach>Tài khoản hoặc mật khẩu không chính xác</p> ";
        }
        else{
            $_SESSION["username"] = $username;
           header('location:danhsachsv.php');
          
        }
       }
   }
    
    
    ?>

</body>
</html>