<?php
    include 'config.php';
    $id = $_GET['id'];
    //echo $id;
    $dataFetchQuery = "SELECT * FROM `post` WHERE id = '$id'";
    $record = mysqli_query($connection,$dataFetchQuery);
    $data = mysqli_fetch_array($record);
    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style6.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        form{
            background: #fff;
            padding: 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius: 10px;
        }
    </style>
  <title>update post</title>
  </head>
  <body>

    
<div class="update-post">

<?php

if(isset($_SESSION['id'])){
   $id= $_SESSION['id'];
   $select = mysqli_query($connection, "SELECT * FROM idproduct WHERE id = '$id'") or die('query failed');
   $data = mysqli_fetch_assoc($select);
}

?>


<form action="updatepostaction.php" method="post" enctype="multipart/form-data">
<div class="flex">
                    <h3>Update post</h3>
                    
                    <div class="mb-3" style="padding-top: 20px;">
                  
                      <input style="border: 2px solid gray;" type="text" class="form-control" name="status_text" value="<?php echo $data['status_text'] ?>"required>
                    </div>
                    <div class="mb-3" style="padding-top: 20px;">
                  
                      <input type="file" class="form-control" name="image" value="<?php echo $data['image'] ?>">
                    </div>
                    <div class="mb-3">
                         <img src="<?php echo $data['image'] ?>" width="200px" alt="">
                    </div>

                    <input type="hidden" name='id' value="<?php echo $data['id'] ?>">
                    <input style=" background-color: var(--color-primary);" class="btn  col-12" type="submit" name="update" value="update" id="">
                    </div>

                  </form>
                  <a href="./homepage.php"><span class="close"><i class="fa fa-close"></i></span></a>



</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


