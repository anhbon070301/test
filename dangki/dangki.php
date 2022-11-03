<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="dk.css">
</head>
<style>
      
        
      </style>
<body>
   
    <form action="ketqua.php" enctype="multipart/form-data" method="post" >

        <div class="dangki">
    
            <table border=2px class="mau"> 
                <tr>
                    <td colspan="2" align="center"><h2 color="#ffffff">Đăng kí</h2></td>
                   
                </tr>
                <tr>
                    <td class="dangki_cot do">Họ tên</td>
                    <td><input type="text" name="hoten"></td>
                </tr>
                <tr>
                    <td class="dangki_cot">Usename</td>
                    <td><input type="text" name="txtun"></td>
                </tr>
                <tr>
                    <td class="dangki_cot">Password</td>
                    <td><input type="password" name="txtpw"></td>
                </tr>
                <tr>
                    <td class="dangki_cot">Nhập lại Passwword</td>
                    <td><input type="password" name="txtrpw"></td>
                </tr>
                <tr>
                    <td class="dangki_cot">Giới tính</td>
                    <td class="dangki_cot">
                        <input type="radio" name="rbgt" value="Nam">Nam
                        <input type="radio" name="rbgt" value="Nữ">Nữ
                    </td>
                </tr>
                <tr>
                    <td class="dangki_cot">Ngày sinh</td>
                    <td><input type="date" name="dtns" id=""></td>
                </tr>
                <tr>
                    <td class="dangki_cot">Địa chỉ</td>
                    <td>
                       <textarea name="diachi" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="dangki_cot">Ảnh avatar</td>
                    <td>
                   <input type="FILE" name="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                    </td>
                </tr>
                <tr>
                    <td class="dangki_cot">Sở thích</td>
                    <td class="dangki_cot">
                        <input type="checkbox" name="sothich[]" value="Xem phim"  id="">Xem phim
                        <input type="checkbox" name="sothich[]" value="Thể thao" id="">Thể thao
                        <input type="checkbox" name="sothich[]" value="Web" id="">Lướt web
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
  
</body>
</html>