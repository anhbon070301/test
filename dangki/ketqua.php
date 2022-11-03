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
    $id =(isset($_POST["id"]))?$_POST["id"]:0;
    $hoten =(isset($_POST["hoten"]))?$_POST["hoten"]:"";
    $usename =(isset($_POST["txtun"]))?$_POST["txtun"]:"";
    $password =(isset($_POST["txtpw"]))?$_POST["txtpw"]:"";
    $passwordr =(isset($_POST["txtrpw"]))?$_POST["txtrpw"]:"";
    $gioitinh =(isset($_POST["rbgt"]))?$_POST["rbgt"]:"";
    $ngaysinh =(isset($_POST["dtns"]))?$_POST["dtns"]:"";
    $diachi =(isset($_POST["diachi"]))?$_POST["diachi"]:"";
    $anhtrc =(isset($_POST["avatar_old"]))?$_POST["avatar_old"]:"";
    $duongdanfile ="";
    $sothich = (isset($_POST['sothich']))?$_POST['sothich']:"";
    $hobby="";
    
      foreach ($sothich as $values) {
       
        $hobby = $hobby.'-'.$values;
      }
    
   
    
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
   // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
 // echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  //echo "Người dùng không upload ảnh!";
  $duongdanfile = $anhtrc;
// if everything is ok, try to upload file
} else {
 // echo "Người dùng sửa ảnh!";
  $duongdanfile ="http://localhost:7882/hochtml/dangki/uploads/".basename( $_FILES["fileToUpload"]["name"]);
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
    //$duongdanfile ="http://localhost:7882/hochtml/dangki/uploads/".basename( $_FILES["fileToUpload"]["name"]);
    // echo "duongdanfile: ".$duongdanfile;
    //  echo '<img src="'.$duongdanfile.'" alt="">'
    $avatar = $duongdanfile;

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
    echo "Connected successfully";
    if($id >0){
      $sql_up = "UPDATE user SET username='$usename',password='$password',repassword='$passwordr',sex='$gioitinh',birthday='$ngaysinh',address='$diachi',hobby='$hobby',name='$hoten',avatar='$avatar' WHERE id=".$id;

      if ($conn->query($sql_up) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
     }
    }else{
    $sql = "INSERT INTO user (username, password, repassword,sex,birthday,address,hobby,avatar,name)
    VALUES ('$usename', '$password', '$passwordr','$gioitinh','$ngaysinh','$diachi','$hobby','$avatar','$hoten')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
    

    $conn->close();
    ?>
    <hr>
    <br>
    <a href="hienthi.php">Xem kết quả</a>
    <br>
    <a href="dangki.php">Quay lại</a>
</body>
</html>