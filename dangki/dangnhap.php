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
    <table  class="bang" >
        <tr >
            <td>Tài khoản</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="OK"></td>
            <td><input type="reset" value="Reset"></td>
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
        echo "<p>Vui long ko de trong</p>";
       }
       else{
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * from user where username='$username' and password='$password'";
        $query = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($query);
        if($num == 0)
        {
            echo "<p>Tài khoản hoặc mật khẩu không chính xác</p> ";
        }
        else{
            $_SESSION["username"] = $username;
           header('location:trangchu.html');
          
        }
       }
   }
    
    
    ?>

</body>
</html>