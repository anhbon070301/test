<?php
require_once('../db/dbhelper.php');
include "header.php";

if (isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
}

if (isset($_POST['username'])) {
    $id_user = $user['id'];
    if ($id_user == 0) {
        header('location: thanhtoan.php');
    }else{
    $name = $_POST['username'];
    $tongtien = tongtien($cart);
    $sdt = $_POST['sdt'];
    $email= $_POST['email'];
    $diachi = $_POST['diachi'];
    $ghichu = $_POST['ghichu'];

    // var_dump($cart);
    // die();
    $query = mysqli_query($con, "INSERT INTO donhang( id_user, ten, tongtien, sdt, email, diachi, ghichu) VALUES ('$id_user','$name','$tongtien','$sdt','$email','$diachi','$ghichu')");
   
    if ($query) {
        
       $id_donhang = mysqli_insert_id($con);
       foreach($cart as $value){
           mysqli_query($con,"INSERT INTO giohang(id_donhang, id_sanpham, soluong, gia, id_user) VALUES ('$id_donhang','$value[id]','$value[soluong]','$value[gia]','$id_user')");
       }
       unset($_SESSION['cart']);
       header('location: success.php');
    }
}
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> MOWO - MOTO WORLD </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../CSS/shop-homepage.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="../JS/scripts.js"></script>
    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    
</head>

<body>

    <?php if (isset($_SESSION['USER'])) { ?>
        <form method="post" onsubmit="return donhang()">
            <!-- Page Content -->
            <div class="container">
                <main>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">?????T H??NG</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">H??? v?? t??n</label>
                                                    <input class="form-control py-4" id="username" name="username" type="text" value="<?php echo $user['username'] ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"> S??? ??i???n tho???i </label>
                                                    <input class="form-control py-4" pattern="[0-9]{10}" title="Ph???i nh???p s??? trong kho???ng 0-9" id="sdt" name="sdt" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" value="<?php echo $user['email'] ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">?????a ch??? *(Vui l??ng ghi r?? S??? NH??, PH?????NG/X??, QU???N/HUY???N, T???NH/TH??NH PH???)</label>
                                            <input class="form-control py-4" id="diachi" name="diachi" type="text" aria-describedby="emailHelp" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Ghi ch?? </label>
                                            <input class="form-control py-4" id="ghichu" name="ghichu" type="text" aria-describedby="emailHelp" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card-body">
                                    <h4>Th??ng tin ????n h??ng</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th> T??n s???n ph???m</th>
                                                    <th> Gi?? $</th>
                                                    <th> S??? l?????ng </th>
                                                    <th> Th??nh ti???n </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($cart as $key => $value) : ?>
                                                    <tr>
                                                        <td><?php echo $value['tensp'] ?></td>
                                                        <td><?php echo $value['gia'] ?></td>
                                                        <td><?php echo $value['soluong'] ?> </td>
                                                        <td><?php echo number_format($value['gia'] * $value['soluong']) ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <tr>
                                                    <td>T???ng ti???n</td>
                                                    <td colspan="6">
                                                        <?php echo number_format(tongtien($cart)) ?>$
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">?????t h??ng </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
            <!-- /.container -->
        </form>

    <?php } else { ?>
        <div class="alert alert-denger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <Strong>Vui l??ng ????ng nh???p ????? mua h??ng</Strong> <a href="./login.php?action=thanhtoan">Login</a>
        </div>
    <?php } ?>
    <!-- <footer class="py-5 bg-dark ">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MOWO - MOTO WORLD 2021</p>
    </div> -->
  </footer>
</body>

</html>