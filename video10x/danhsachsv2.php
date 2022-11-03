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
<!-- <style>
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
    </style> -->
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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php
        $i = 1;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               
                ?>
            <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="anh/anh.jpg" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?= $row["hoten"] ?></h5>
            <p class="card-text"><?= $row["lop"] ?></p>
            <p class="card-text"><?= $row["gioitinh"] ?></p>
            <p class="card-text"><?= $row["ngaysinh"] ?></p>
           
            <a href="#" class="btn btn-outline-primary">Xem chi tiết</a>
        </div>
    </div>
            </div>
            <?php
               }
            }
            ?>
            <!-- het col -->
        </div>
        <!-- het row -->
    </div> 
    <!-- het container -->
    
</body>
</html>
<!-- 10.1 thiết kế cơ sở dữ liệu
10.2 kết nối csdl
10.3 hiển thị tên lớp 
10.4 thiết kế gia diện hiển thị dannh sách
10.5 hướng dẫ thêm sửa xóa 
10.6 xóa nhiều dòng 
10.7 chức năng tìm kiếm -->