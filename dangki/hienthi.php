<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="dk.css">
    <title>Document</title>
</head>
<body>
  <div class="dangki">
    <table border="2px" class="mau"> 
        <tr>
            <th class="dangki_cot dam" colspan=11>Danh sách người dùng</th>
        </tr>
        <tr >
            <th class="dangki_cot">id</th>
            <th class="dangki_cot">Họ tên</th>
            <th class="dangki_cot">Use Name</th>
            <th class="dangki_cot">PassWord</th>
            <th class="dangki_cot">RePassWord</th>
            <th class="dangki_cot">Giới tính</th>
            <th class="dangki_cot">Ngày sinh</th>
            <th class="dangki_cot">Địa chỉ</th>
            <th class="dangki_cot">Sở thích</th>
            <th class="dangki_cot">Avatar</th>
            <th class="dangki_cot">Hành động</th>
        </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dangki";
$id=(isset($_GET["id"]))?$_GET["id"]:0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql_de = "DELETE FROM user WHERE id=".$id;

if ($conn->query($sql_de) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      ?>
<tr>
    <td class="dangki_cot"><?=$row["id"]?> </td>
    <td class="dangki_cot"><?=$row["name"]?></td>
    <td class="dangki_cot"><?=$row["username"]?> </td>
    <td class="dangki_cot"><?=$row["password"]?> </td>
    <td class="dangki_cot"><?=$row["repassword"]?> </td>
    <td class="dangki_cot"><?=$row["sex"]?> </td>
    <td class="dangki_cot"><?=$row["birthday"]?> </td>
    <td class="dangki_cot"><?=$row["address"]?> </td>
    <td class="dangki_cot"><?=$row["hobby"]?> </td>
    <td>
      <input type="hidden" name = "avatar_old" value="<?=$row["avatar"]?>">
      <img src="<?=$row["avatar"]?>" width=100px alt=""> 
    </td>
    <td class="dangki_cot"><a href="suatt.php?id=<?= $row["id"]?>"><i class="fa fa-pencil-alt "></i></a><a href="hienthi.php?id=<?=$row["id"]?>" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-trash"></a></td>
</tr>
</div>
<?php
   
  }
} else {
  echo "0 results";
}
$conn->close();
?>

    </table>
</body>
</html>