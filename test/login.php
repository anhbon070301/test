<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .login__table{
            margin: 250px 450px;
        }
    </style>
<form action="trangchu.php" method="GET">

<table class="login__table">
    <tr>
    <td colspan="2" align="center">Thông tin đăng nhập</td>
    </tr>
    <tr>
        <td>User name</td>
        <td><input type="text" name="txtUN"></td>
    </tr>
    <tr>
        <td>Pass Word</td>
        <td><input type="password" name="txtPW"></td>
    </tr>
    <tr>
        <td><input type="submit" name="smDN" value="Đăng nhập"></td>
        <td align="center"><input type="reset" name="rsXoa" value="Xóa"></td> 
    </tr>
</table>
</form>
</body>
</html>