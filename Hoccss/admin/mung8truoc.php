<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    .center{
      margin:0px auto;
      text-align: center;
    }
  .qua{
    
    font-size: 200px;
    background-color: #ffb6c1;
    color: red;
    cursor: pointer;
    
  }
  .mau{
    margin-top:20%; 
    background-color: white;
    border: 0px solid white;
  }
  body{
    background-color:#ffb6c1;
    background-repeat: no-repeat;
        background-size: cover;
  }
  @media only screen and (max-width: 480px){
  body{
      display: none;
  }
}
</style>
<body>
  

    <?php
      session_start();
    ?>
    <div class="container">
       <div class="row">
         <div class="col-sm-12 col-xs-9">

     
     <div class="center">
     <button type="button" class="mau" data-toggle="modal" data-target="#exampleModalCenter">
     <i class="fa fa-gift qua"></i>
     </button>
     </div>
    
   
   
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Lời Chúc</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <?php
         echo "Ngày 8/3, Chúc ".$_SESSION["ten"]." và những người phụ nữ trong gia đình luôn luôn vui vẻ, xinh đẹp,... gặp nhiều thành công trong cuộc sống! Happy Women's Day!";
         ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
       </div>
     </div>
   </div>
 </div>

         </div>
         </div>
         </div>

    
 
</body>
</html>
