<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">ie_png.fix('.png, .link1 span, .link1');</script>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<style>
    input[type=text]{
         width:293px;
	       padding:1px 0 1px 3px;
	       background:#000;
	       border:1px solid #3a3a3a;
	       color:#fff;
    }     
    input[type=password]{
        width:293px;
	      padding:1px 0 1px 3px;
	      background:#000;
	      border:1px solid #3a3a3a;
	      color:#fff;
    }     
</style>

<body id="page2">
    
<!-- START PAGE SOURCE -->
<div class="tail-top">
  <div class="tail-bottom">
    <div id="main">
      <div id="header">
        <div class="row-1">
          <div class="fleft"><a href="index.php">Vnox <span>World</span></a></div>
          
          <ul>
              <li><a href="search.php"title="Goto Search Movie"><img src="images/search.png"></li>
            <li><a href="index.php" title="home"><img src="images/icon1.png" alt="" /></a></li>
            <?php
                if(isset($_SESSION['log']))
                {
                    echo '<li><a href="account.php" title="account"><img src="images/icon2.png" alt="" /></a></li>';
                }
                else
                {
                    echo '<li><a href="login.php" title="account"><img src="images/login.png" alt="" /></a></li>';
                }
            ?>
          </ul>
        </div>
        <div class="row-2">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="upcoming.php">Upcoming-Movies</a></li>
            <li><a href="about-us.php">About-Us</a></li>
            <li><a href="account.php" class="active">Account</a></li>
            <?php
               if(isset($_SESSION['log'])){
                  echo '<li class="last"><a href="logout.php">Logout</a></li>';
               }
               else {
                 echo '<li class="last"><a href="login.php">Login</a></li>';
               }
            ?>
          </ul>
        </div>
     </div>
     <?php
        if(!isset($_SESSION['log']))
        {
            header('location:login.php');
        }
        else{
        $con= mysqli_connect("localhost", "root", "", "movieproject");
        $sql = "select * from users where id=".$_SESSION['log'];
        $res = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($res);
     ?>
      <div id="content">
        <div class="line-hor"></div>
          <div class="box">
            <div class="border-right">
              <div class="border-left">
                <div class="inner">
                   <div class="content">
                        <h3>Account <span>Details</span></h3>
                        <form action="updateaccountinfo.php" method="POST">
                            <table border="0">   
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">User Name:</td>
                                    <td><?php echo $row['username']?></td>
                                </tr>
                                <tr style="height:30px;">
                                    <td style="width: 100px;">Password:</td>
                                    <td><input type="text" name="pass" value="<?php echo $row['password'] ?>"></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">*First Name:</td>
                                    <td><input type="text" name="fname" value="<?php echo $row['firstname'] ?>" required></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">*Last Name:</td>
                                    <td><input type="text" name="lname" value="<?php echo $row['lastname'] ?>" required></td>
                                </tr>
                                <tr style="height: 30px;">
                                <td> <label for="gender">*Gender</label></td>
                                <td><?php echo $row['gender']?></td>
                                </tr>
                                <tr style="height: 30px;">
                                <td>
                                *Date of Birth:  
                                </td>
                                <td><?php echo $row['dob']?></td>
                                </tr>                       
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">*Email:</td>
                                    <td><input type="text" name="email" value="<?php echo $row['email'] ?>" required></td>
                                </tr>
                                
                              
                                
                            </table>
                            <br><br>
                            
                            <center><div class="wrapper"> <input style=" border:1px solid #3a3a3a; background-color: #000; color: #858585;" type="submit" name="updateaccount" value="Update"> </div></center>
                            <center><div class="wrapper"><a style="color: #858585;" href="deleteaccount.php">Delete Account</a></div></center>
                        </form>
                    </div>
              </div>
            </div>
       		</div>
        </div>
      </div>
        <?php } ?>
    </div> 
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>

