<?php
include './config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="style5.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>home</title>
</head>

<body>
  <!-- start nev -->
  <nav>
    <div class="container nav-container">
      <div class="logo">

        <h3>Twic</h3>

      </div>

      <div class="search-bar">
        <i class="fa fa-search"></i>
          <input type="search" placeholder="Search here!">
      </div>  
      
      <div class="add-post">
        <!-- <label for="add-post" class="btn btn-primary">Add post</label> -->
        <div class="profile-picture" id="my-profile-picture">
        <?php
   
   if(isset($_SESSION['id'])){
      $id= $_SESSION['id'];
      $select = mysqli_query($connection, "SELECT * FROM idproduct WHERE id = '$id'") or die('query failed');
      $data = mysqli_fetch_assoc($select);
   }
   
   ?>
           <img src='<?php echo  $data['image'];?>' alt='Image' width='50px'   >
        </div>
      </div>
    </div>
  </nav>
  <!-- end  -->
  <!-- main -->
  <main>
  <div class="container main-container">
    <!-- left -->
    <!-- profile -->
    <div class="main-left">
      <a href="#" class="profile" >
      <?php
   
   if(isset($_SESSION['id'])){
      $id= $_SESSION['id'];
      $select = mysqli_query($connection, "SELECT * FROM idproduct WHERE id = '$id'") or die('query failed');
      $data = mysqli_fetch_assoc($select);
   }
   
   ?>
    
   
<!-- profile -->
        
    <div class="" id="my-profile-picture" style="display: flex; gap:10px; align-items:center;" >
    <!-- <div style="border-radius: 50%; width: 50px;"> -->
        <div >
        <img src='<?php echo  $data['image'];?>' alt='Image' width='50px'  style="border-radius: 50%; width: 50px; height:50px" >
        </div>
       
         <div class="profile-handle"> <input style="width:90px; font-size:24px; font-weight: 600;" type="text"  name = "r_username" value="<?php echo $data['user_name'] ?>" >
          
        </div>
        </div>
       
      </a>
<!-- aside -->
      <aside>

        <a href="" class="menu-item ">
          <span><img src="./Assets/home2.jpg" alt=""></span> <h3>Home</h3>
        </a>
<!-- 
        <a href="#" class="menu-item">
          <span><img src="./Assets/ex.jpg" alt=""></span> <h3>Explore</h3>
        </a>  -->

        <!-- <a href="" class="menu-item" id="Notify-box">
          <span><img src="./Assets/test2.jpg" alt=""></span>
          <small class="notify-counter">3</small> 
          <h3>Notification</h3> -->
          <!-- box -->
          <!-- <div class="notification-box">
            <div>
              <div class="profile-picture">
                <img src="./Assets/test2.jpg" alt="">
              </div>
              <div class="notification-body">
                <b>Ariba</b> accepted your friend request
                <small class="text-gry">1 day ago</small>
              </div>
            </div>
            <div>
              <div class="profile-picture">
                <img src="./Assets/test2.jpg" alt="">
              </div>
              <div class="notification-body">
                <b>Ariba</b> accepted your friend request
                <small class="text-gry">1 day ago</small>
              </div>
            </div>
            <div>
              <div class="profile-picture">
                <img src="./Assets/test2.jpg" alt="">
              </div>
              <div class="notification-body">
                <b>Ariba</b> accepted your friend request
                <small class="text-gry">1 day ago</small>
              </div>
            </div>
          </div>
        </a> -->

        <a href="#" class="menu-item">
          <span><img src="./Assets/noti.jpg" alt=""></span>
          <!-- <small class="notify-counter">3</small>  -->
          <h3>Notfication</h3>
        </a>

        <a href="" class="menu-item" id="theme">
          <span><img src="./Assets/th.png" alt=""></span> <h3>Theme</h3>
        </a>


        <a href="" class="menu-item ">
          <span><img src="./Assets/set.jpg" alt=""></span> <h3>Setting</h3>
        </a>

        <a href="login.php" class="menu-item ">
          <span><img src="./Assets/log.png" alt=""></span> <h3>Logout</h3>
        </a>

        <label for="add-post" class="btn btn-primary btn-lg" id="create-lg">Create post</label>
        

      </aside>
  
     
    </div>

    <!-- middle -->
    <div class="main-middle">
      <!-- post in -->
     <div class="middle-container">
       <form class="add-post" action="insert.php" method="post" enctype="multipart/form-data">
        <div class="profile-picture" id="my-profile-picture" >
        <?php
   
   if(isset($_SESSION['id'])){
      $id= $_SESSION['id'];
      $select = mysqli_query($connection, "SELECT * FROM idproduct WHERE id = '$id'") or die('query failed');
      $data = mysqli_fetch_assoc($select);
   }
   
   ?>
           <img src='<?php echo  $data['image'];?>' alt='Image'    style="border-radius: 50%; width: 50px; height:50px" >
        </div>
       <!--  <input type="text" placeholder="post"  name="status_text">-->
        <input type="text" class="form-control" name="status_text">
        <!-- <input type="submit" class="btn btn-primary" value="post"> -->
        <!--<input type="file" class="form-control" name="image">-->
        <input type="file" class="form-control" name="image">
        <button type="submit" class="btn btn-primary mini-button">Add</button>

      </form>

      <!-- feed -->
      <div class="feeds">
      <?php
                    include 'config.php';
                         
$query="SELECT post.*,idproduct.user_name, idproduct.image AS user_image
FROM post
JOIN idproduct ON post.user_id = idproduct.id
ORDER BY post.id DESC";
$result = $connection->prepare($query);
$result->execute();
$posts = $result->get_result()->fetch_all(MYSQLI_ASSOC);
                    foreach ($posts as $post){ ?>


<div  class="feed myfeed">
      


<div  class="feed-top">
<div class="user">
<div style="display: flex; gap:1rem;">
                  <div style="display: block; width:50px; border-radius: 50%; aspect-ratio: 1/1; overflow:hidden;">
                  <!-- post img -->
                  <img src='<?php echo $post["user_image"];?>' alt='Image'  style="border-radius: 50%; width: 50px; height:50px">
                  </div> 
                  <h2><?php echo $post["user_name"];?></h2>
              
               </div>
  
              


</div>
<span class="edit">
              <img src="./Assets/threedots.jpg" alt="">
              <!-- <span><i class="fa fa-list-alt"></i></span> 
              -->
              <ul class="edit-menu">


              <a class='btn btn-warning' href='updatepost.php?id=<?php echo $post["id"]; ?>'><button class='btn btn-success'>Update</button></a>
              <a class='btn btn-danger' href='deletepost.php?id=<?php echo $post["id"]; ?>'><button class='btn btn-danger'>Delete</button></a>

             
              </ul>
            </span>
</div>
              


<?php echo $post["status_text"];?>


<div class="feed-img">
<img src='<?php echo $post["image"];?> ' width='100px'>
</div>

<!-- feed action-->
  <div class="action-button">
            <div class="interaction-button">
          
            <span class="acceptbtn btn " id="<?php echo $post['id']; ?>"><i class="fa fa-heart"></i></span>
            <span><i class="fa fa-comment-alt"><div id="display"></div></i></span>
              <!-- <span><i class="fa fa-share-alt"></i></span> -->
       
            </div>
            <input type="text" class="form-control" name=""> 
            <!-- <div class="bookmark">
              <i class="fa fa-bookmark"></i>
            </div> -->
          </div>
          <!-- like -->
          <div class="liked-by">
 
            <span><img src="./Assets/p6.jpeg" alt=""></span>
        <span><img src="./Assets/p2.jpg" alt=""></span>
        <span><img src="./Assets/p3.jpg" alt=""></span>
            <p><b>Ariba</b> and <b>liked</b></p>

</div>   
<div>
</div>




                    </div>
<?php
}
?>
      </div>



<!-- end feed -->
      </div>
     </div>

    <!-- right -->
    <div class="main-right">
      <!-- M Start -->
      <div class="message">
        <div class="message-top">
          <h4>Message</h4>
          <i class="fa fa-edit"></i>
        </div>
        <!-- searchbar  -->
        <!-- <div class="message-search-bar">
          <i class="fa fa-search"></i>
          <input type="search" placeholder="search message" id="message-search">
        </div>  -->
        <!-- m catagories -->
        <!-- message chat! -->
        <label for="chat" class="btn btn-primary btn-lg" id="create-lg"><a href="loginc.php" class="chatid">Chats</a></label>
        <!-- <div class="message-catagories">
          <h6 class="active">Primary</h6>
          <h6>General</h6>
          <h6 class="message-request">Request(2)</h6>
        </div> -->
        <!-- m  
        <div class="message">
           <div class="profile-picture">
            <img src="/Assets/p3.jpg" alt="">
            <div class="green-active"></div>
          </div>
          <div class="message-body">
            <h6>Promi</h6>
            <p class="text-gry">Lorem ipsum dolor sit amet.</p>
          </div> 
        </div>
      </div> -->
      <!-- friend request -->
      <!-- <div class="friend-request">
        <h4>Request</h4>
        <div class="request">
          <div class="info">
            <div class="profile-picture">
              <img src="/Assets/p3.jpeg" alt="">
            </div>
            <div>
              <h5>Ariba Khan</h5>
              <p class="text-gry">
                1 mutual friends
              </p>
              <small class="text-gry" >Your have accepted the friend request</small>
              <div class="action">
                <div class="btn btn-primary">
                  Accept
                </div>
                <div class="btn btn-danger">
                  Delete
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      
    </div>
  </div>
</main>
 <!-- profile -->

 <div class="popup profile-popup">
 <div>
 <div style="text-align: center;">
              
  <div class="popup-box profile-popup-box">

  <div id="my-profile-picture" style="
    width: 100px;
  
    border-radius: 50%;
    object-fit: cover;" >
                           
<?php
  $query= "Select * From idproduct Where id=$id";
  $result = $connection->query($query);
  $name ="";
  $email="";
  $image="";
if ($result) {
    $row = $result->fetch_assoc();
    $name = $row['user_name'];
    $email = $row['user_email'];
    $image = $row['image'];
    
   
}
?>

  <img src='<?php echo $image;?>' alt='Image' width='100px'   >
                  </div>
                  <div class="profile-usertitle-name">
                  <?php  echo $name; ?> 
                  </div>
                  <div>
                  <?php  echo $email; ?> 
                  </div>
        
                  <div>
              

        </div >
                    <div>
                    <a href='update_profie.php?id=<?php echo $id; ?>'><button class='btn btn-success'>Update Profile</button></a>
  <a href='delete.php?id=<?php echo $id; ?>'><button class='btn btn-danger'>Delete</button></a>
                    </div>
                 
                  
 
               <a href="./login.php"><button id="logoutbtn" class="btn btn-primary " style="margin-top: 1rem;">Logout</button></a>

                  </div>
                  </div> 
    </div>
    <span class="close"><i class="fa fa-close"></i></span>
  </div>

 </div>

 <div class="popup add-post-popup">
  <div>
    <form class="popup-box add-post-popup">
      <h1>Add New Post</h1>
      <div class="row post-title">
        <label >Title</label>
        <input type="text" id="add-post">
      </div>
      <div class="row post-img">
       
        <img src="" id="postIMG">
        <label for="feed-pic-upload" class="feed-upload-button">
          <span><i class="fa fa-add"></i></span>
          Update a Picture
        </label>
        <input type="file" accept="image/jpg, image/png, image/jpeg" id="feed-pic-upload">
        <input type="submit" class="btn btn-primary btn-lg" value="Add Post">
      </div>
    </form>
    <span class="close"><i class="fa fa-close"></i></span>
  </div>
  
 </div>

 <!-- theme -->
 <div class="popup theme-customize">
  <div>
    <div class="popup-box theme-customize-popup-box">
      <h2>Customize Your Theme</h2>
      <P>Chose your color and background</P>

      <!-- <div class="font-size">
        <h4>font size</h4>
        <div></div>
      </div> -->

      <!-- color -->
      <div class="colors">
        <h4>Color</h4>
        <div class="choose-color">
          <span class="color-1 active"></span>
          <span class="color-2 "></span>
          <span class="color-3 "></span>
        </div>
      </div>

      <div class="background">
        <h4>Background</h4>
        <div class="choose-bg">
          <div class="bg1 active">
            <span></span>
            <h5 >Light</h5>
          </div>
          <div class="bg2 ">
            <span></span>
            <h5 >Dark</h5>
          </div>
        </div>
      </div>

    </div>
    <span class="close"><i class="fa fa-close"></i></span>
  </div>
 </div>

  <!-- end -->
  <script src="script.js"></script>
  <script>
    $(document).on('click', '#logoutbtn', function () {
            $.ajax({
                url: './logoutc.php',
                method: 'post',
                success: function (response) {
                    console.log(response);
                    if (!response.error) {
                        window.location = 'login.php';
                    }
                }
            });
        });

        $(document).on('click', '.acceptbtn', function () {
        
    var btn_id = $(this).attr("id");
 
    $.ajax({
        url: './friend_request.php',
        method: 'post',
        data: {
            id: btn_id, 
            status: 'accept'
        },
        success: function (response) {
            console.log(response);
            if (!response.error) {
              window.location.reload();  
            }
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
          
          
        });

        $(document).on('click', '.deletebtn', function () {
        
        var btn_id = $(this).attr("id");
     
        $.ajax({
        url: './friend_request.php',
        method: 'post',
        data: {
            id: btn_id, 
            status: 'delete'
        },
        success: function (response) {
            console.log(response);
            if (!response.error) {
              window.location.reload();  
            }
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
          
          
        });
        </script>
        <script type="text/javascript">
var titles = [];
var titleInput = document.getElementById("title");
var messageBox = document.getElementById("display");
function Allow()
{
if (!user.title.value.match(/[a-zA-Z]$/) && user.title.value !="")
{
user.title.value="";
alert("Please Enter only alphabets");
}
window.location.reload()
}
function insert () {
titles.push(titleInput.value);
clearAndShow();
}
function clearAndShow ()
{
titleInput.value = "";
messageBox.innerHTML = "";
messageBox.innerHTML += " " + titles.join("<br/> ") + "<br/>";
}
</script>
  
</body>
</html>