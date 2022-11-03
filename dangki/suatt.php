<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dk.css">
    <title>Document</title>
</head>
<body>
    <!-- <style>
       
        .dangki_cot{
            color: #ffffff;
        }
          body{
                background-image: url("https://phongvu.vn/cong-nghe/wp-content/uploads/2020/11/119234579_169457918065236_755533166268046471_n-1.jpg")
            }
        .dangki{
          display: flex;
          justify-content: center;
        }
        h2{
            color:#ffffff;
        }
    </style> -->
    <?php
    
    $severname = "localhost";
    $username = "root";
    $pass="";
    $db="dangki";
    $id=(isset($_GET["id"]))?$_GET["id"]:0;
    $conn= new mysqli($severname,$username,$pass,$db);
    if($conn->connect_error)
    {
        echo "Kết nối thất bại".$con->connect_error;
    }
    

    $sql = "SELECT * FROM user where id=".$id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
<form action="ketqua.php" enctype="multipart/form-data" method="post" >

<div class="dangki">

    <table border="2px"> 
        <tr>
            <td colspan="2" align="center" class="dam"><h2 color="#ffffff">Đăng kí</h2></td>
           <td> <input type="hidden" name="id" value=<?=$row['id']?>></td>
        </tr>
        <tr>
            <td class="dangki_cot">Họ tên</td>
            <td><input type="text" name="hoten" value="<?=$row["name"]?>"></td>
        </tr>
        <tr>
            <td class="dangki_cot">Usename</td>
            <td><input type="text" name="txtun" value="<?=$row["username"]?>"></td>
        </tr>
        <tr>
            <td class="dangki_cot">Password</td>
            <td><input type="password" name="txtpw" value="<?=$row["password"]?>"></td>
        </tr>
        <tr>
            <td class="dangki_cot">Nhập lại Passwword</td>
            <td><input type="password" name="txtrpw" value="<?=$row["repassword"]?>"></td>
        </tr>
        <tr>
            <td class="dangki_cot">Giới tính</td>
            <td class="dangki_cot">
                <?php
                if($row["sex"]=="Nam")
                {
                ?>
                <input type="radio" name="rbgt" value="Nam" checked>Nam
                <input type="radio" name="rbgt" value="Nữ">Nữ
                <?php
                }
                else
                {
                    ?>
                    <input type="radio" name="rbgt" value="Nam">Nam
                    <input type="radio" name="rbgt" value="Nữ" checked>Nữ
                    <?php

                }
                ?>
                
            </td>
        </tr>
        <tr>
            <td class="dangki_cot">Ngày sinh</td>
            <td><input type="date" name="dtns" id="" value="<?=$row["birthday"]?>"></td>
        </tr>
        <tr>
            <td class="dangki_cot">Địa chỉ</td>
            <td>
               <textarea name="diachi" id="" cols="30" rows="10"> <?=$row["address"]?></textarea>
            </td>
        </tr>
        <tr>
            <td class="dangki_cot">Ảnh avatar</td>
            <td>
            <input type="hidden" name = "avatar_old" value="<?=$row["avatar"]?>">
            <input type="FILE" name="fileToUpload">
            <input type="submit" value="Upload Image" name="submit"><br/>
            <img src="<?=$row['avatar']?>" width=100px alt="">
            </td>
        </tr>
        <tr>
            <td class="dangki_cot">Sở thích</td>
            <td class="dangki_cot">
                <?php
            
              $xemphim = "";
              $thethao = "";
              $web ="";
              $arr_sothich = explode("-",$row['hobby']);

              foreach ($arr_sothich as $value) {

                  if (trim($value) == "Xem phim") {
                      $xemphim = "checked";
                  }elseif (trim($value) == "Thể thao") {
                      $thethao = "checked";
                  }elseif (trim($value) == "Web") {
                      $web = "checked";
                  }
              }
              
                   ?>
                   <input type="checkbox" name="sothich[]" value="Xem phim"  id="" <?= $xemphim?>>Xem phim
                <input type="checkbox" name="sothich[]" value="Thể thao" id="" <?= $thethao?> >Thể thao
                <input type="checkbox" name="sothich[]" value="Web" id="" checked="true" <?= $web?>>Lướt web
             
            </td>
        </tr>
        <tr >
            <td colspan="2" align="center"class="dangki_cot--button">
                <input  type="submit" value="OK">
                <input  type="reset" value="Resset">
            </td>
            
        </tr>
       
    </table>
</div>
</form>
<?php
    }
    }


$conn->close();
?>
</body>
</html>