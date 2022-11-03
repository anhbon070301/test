<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bài 10</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
        p{
            font-size: 40px;
        }
        .menu{
            display: flex;
            justify-content: space-between ;
            align-items: flex-end;
            background-color: #6A5ACD;
            height: 50px;
        }
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box
        }
        .menu__icon i{
            margin-left: 40px;
           font-size: 40px;
          color:#e4e6eb;
        }
        .menu__icon{
           
        }
        .menu__timkiem{
            width: 800px;
            display:flex;
            justify-content: space-around;
        }

        .menu__chucnang{
            margin-right: 100px;
            margin-bottom: 10px;
        }
        .inputtim{
            margin-bottom:10px;
            width: 300px;
            height: 28px;
            border-radius: 40px;
        }
        .tim{
            width: 50px;
            height: 28px;
            border-radius: 20px;
        }
        .xoa{
            background-color:  #6A5ACD ;
            font-size: 20px;
            color:#e4e6eb;
            border:0px;
            margin-left: 10px;
        }
        .icon1{
            font-size: 20px;
            color:#e4e6eb;
        }
        /* table{
            margin-top: 50px;
            margin-left:380px;
        } */
        body{
            background-color:#B0E0E6;
        }
    </style>
<body>
   
    <?php
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
    if(isset($_POST["Tim"])){
                $hoten = (isset($_POST["txtTim"]))?$_POST["txtTim"]:"";
                //$hoten = (isset($_POST['txtTim']))?$_POST['txtTim']:"";
                $query = "select sinhvien.id,sinhvien.hoten,sinhvien.lopid,sinhvien.gioitinh,sinhvien.ngaysinh,lop.lop from sinhvien,lop where sinhvien.lopid=lop.id and hoten like '%".$hoten."%'";
                
    }else{
        $query = "select sinhvien.id,sinhvien.hoten,sinhvien.lopid,sinhvien.gioitinh,sinhvien.ngaysinh,lop.lop from sinhvien,lop where sinhvien.lopid=lop.id";
      
    }
    $result = mysqli_query($conn,$query);
    ?>
 <div class="menu">
        <div class="menu__icon">
        <i class="fa fa-home icon"></i>
        </div>
        <div class="menu__timkiem">
        <form action="#" method="post">
                <input type="text" name="txtTim" class="inputtim"> <input type="submit" value="Tìm" name="Tim" class="btn btn-outline-primary">
            
            </form>
        </div>
        <div class="menu__chucnang">
        <form action="xulixoa.php" method="post">
               <a href="themmoisv.php" class=" btn btn-primary"><i class="fa fa-user-plus icon1"></i></a> <input type="submit" value="Xóa" class="xoa">
            

        </div>
    </div>
        <table border=1px class="table ">
            
         
            
            <tr >
                <th colspan=6> <p >Tổng số sinh viên</p>  </th>
            </tr>
           
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Chức năng</th>
                <?php
               
        $i = 1;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               if($i % 2 == 0){
                ?>
               
               <tr class="table-success">
                   <td><?= $i;?></td>
                   <td><?= $row["hoten"] ?></td>
                   <td><?= $row["lop"] ?></td>
                   <td><?= $row["gioitinh"] ?></td>
                   <td><?= $row["ngaysinh"] ?></td>
                   <td><a href="suasv.php?id=<?=$row["id"]?>">Sửa</a><a href="xoasv.php?id=<?=$row['id']?>"> <input type="checkbox" value="<?=$row['id']?>" name="xoa[]" id="">   </a></td>
               </tr>
               <?php } else{ ?>
                <tr class="table-danger">
                   <td><?= $i;?></td>
                   <td><?= $row["hoten"] ?></td>
                   <td><?= $row["lop"] ?></td>
                   <td><?= $row["gioitinh"] ?></td>
                   <td><?= $row["ngaysinh"] ?></td>
                   <td><a href="suasv.php?id=<?=$row["id"]?>">Sửa</a><a href="xoasv.php?id=<?=$row['id']?>"> <input type="checkbox" value="<?=$row['id']?>" name="xoa[]" id="">   </a></td>
                <?php } ?>
               <?php
                $i++;
            }
        }
        else{
            echo"Danh sách rỗng!!";
        }
                ?>
            </tr>
            </form>
        </table>
    
</body>
</html>
<!-- 10.1 thiết kế cơ sở dữ liệu
10.2 kết nối csdl
10.3 hiển thị tên lớp 
10.4 thiết kế gia diện hiển thị dannh sách
10.5 hướng dẫ thêm sửa xóa 
10.6 xóa nhiều dòng 
10.7 chức năng tìm kiếm -->