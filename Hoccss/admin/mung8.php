<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .div-cha{
        display: flex;
        flex-direction: column;
        margin-top: 200px;
    }
    .div-tong{
        display: flex;
        justify-content:space-around;
    }
    .div-con{
        margin-top: 20px;
    }
    body{
       
        background-repeat: no-repeat;
        background-color:#ffb6c1;
        background-size: cover;
    
    }
    @media screen and (max-width: 3200px) {
   body {
      width: 100%;
      height: 100%;
   }
}
</style>
<body>
<div class="container">
       <div class="row">
         <div class="col-sm-12 col-xs-9">
         <form action="" method="post">
        <div class="div-tong">
        <div class="div-cha">
            <div class="div-con">
            <input class="form-control" type="text" name="ten" placeholder="Nhập tên của bạn">
            </div>
            <div class="div-con">
            <input class="btn btn-primary" type="submit" name="gui" value="Nhấn vào đây sẽ có bất ngờ!" >
            </div>
        </div>
        </div>
        
    </form>
         </div>
         </div>
         </div>
   
    <?php
    session_start();
    $ten = (isset($_POST["ten"])) ? $_POST["ten"] :"";
    if(isset($_POST["gui"])){
        if($ten != ""){
            $_SESSION["ten"]= $ten;
            header('Location: mung8truoc.php');
        }    
        else{
            echo "<div class='alert alert-danger div-con' role='alert'>
           Nhập tên của bạn đã!
          </div>";
        }  
    }
    
    ?>
</body>
</html>
