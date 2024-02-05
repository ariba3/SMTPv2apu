<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    
    
    <style>
       *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .login{
            padding: 1rem;
            position: relative;
        }
        .row{
            background-color: #87CEEB;
            border-radius: 30px;
            box-shadow: 12px 12px 22px;
            position: relative;
            padding: 1rem;
        }
        .login img{
            height: 43rem;

        
        }
        .login h1{
            font-size: 4rem;
            font-weight: 700;
            font-family: 'Edu SA Beginner', cursive;
        }
        .btn{
            height: 50px;
            width: 50%;
            color: #000;
            border-radius: 30px;
        }
        

    </style>
</head>
<body>
<div class="intro">
        <h1 class="logo-header" >
          <span class="logo">Tw</span><span class="logo">ic...</span><br>
        </h1>
  </div> 

<section class="login  py-2 bg-light">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-5">
                <img src="images/img1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12  text-center py-5">
                <h1 class="animate_animated">Welcome to Twic</h1>

                <form action="./registerAction.php" method="post">

                    <div class="offset-1 col-lg-10 text-left py-1" style="font: bold">
                            Username : 
                            <input type="text" class="form-control" name = "r_username" required>

                        </div>
                        <div class="offset-1 col-lg-10 text-left py-1">
                            Email :
                            <input type="email" class="form-control" name="r_email" required>
                        </div>
                        <div class="offset-1 col-lg-10 text-left py-1">
                        Password :
                      <input type="password" class="form-control" name="r_pass" required>
                    </div> 
                        <div class="offset-1 col-lg-10 text-left py-1">
                        Confirm Password :
                      <input type="password" class="form-control" name="r_con_pass" required>
                    </div>
                        <div class="offset-1 col-lg-10 py-3">
                            <button class="btn" id="login" name= "login" value = "Submit" >Submit</button>
                        </div>  
                        <div class=" text offset-1 col-lg-10 py-3">
                        <p>You have an account?
                            <a href="login.php" style="color: antiquewhite;">LogIn</a>
                        </p>
                    </div>  
                    </div>
                </form>
            </div>

        </div>


    </div>


</section>




<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="app1.js"></script>

</body>
</html>