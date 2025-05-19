<?php 
 include('connection.php');
 session_start();
 if (isset($_SESSION['a_username']))
 {
 $username=$_SESSION['a_username'];
$dev=$_POST['dev'];
 ?>


<html>

<head>
	<style type="text/css">
		body
{
    margin: 0;
    padding: 0;
    font-family: arial, sans-serif;
}
		.text{
    text-align: center;
    height: 100px;
    background: #262626;
    color: #FFF;
}
.text h2{
    margin: 0;
    line-height: 100px;
    font-size: 48px;
}
#navbar{
    overflow: hidden;
    background: #000;
    color: #FFF;
    display: flex;
    font-size: 18px;
    position: sticky;
    top: 0;

}
#navbar .logo{
    
    padding: 5px;
    margin-left: 40px
}
#navbar .logo a{
    color: #FFF;
    text-decoration: none
}
#navbar ul{
    margin: 20px;
    padding: 0;
    display: flex;
    width: 50%;
    margin-left: auto;

}
ul li{
    padding: 20px;
    list-style: none;
    
}
ul li a{
    color: grey;

    display: block;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold
}
ul li a:hover{
    text-decoration: none;
    color: #fff;
}
 body, div, h1, form, input, p { 

      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1 {
      padding: 10px 0;
      padding-right: 10PX;
      padding-left: 10PX;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }
      input[type=radio] {
      display: none;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #1c87c9;
      }
      html, body {
      
      justify-content: center;
      height: 100%;

      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text], input[type=password] {
      width: calc(75% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px; 
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9; 
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      input[type=password] {
      margin-bottom: 15px;
      }
.main-block {
      max-width: 50%; 
      max-height: 100%; 
      padding: 15px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
#icon {
      display: inline-block;
      padding: 9.3px 15px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #1c87c9;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #26a9e0;
      }
	</style>
    <title>update</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>

<div id="navbar">
        <div class="logo">
            <a href="dashboard.php"><img src="tracko_logo.png"  width=100 height=100 ></a>
        </div>
        <ul >
            <li><a href="dashboard.php" >Dashboard</a></li>
            <li><a href="devices.php">Devices</a></li>
            <li><a href="req_route.php">Request-Route</a></li>
            <li><a href="out.php"><span class="fa fa-sign-out"></span>Sign-Out</a></li>
        </ul>
    </div>
    <br>

    <div class="main-block"><br>
     <h2><b>&nbsp;&nbsp;<a href="devices.php"><span class="fa fa-arrow-left"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; UPDATE &nbsp;&nbsp;<?php echo$dev; ?> &nbsp; </b></h2><br>
      <hr>
       <?PHP 
       include("connection.php");
       $sql="SELECT * FROM truck_load WHERE id=(select max(id) from truck_load where truck_no='$dev')";
       $res=mysqli_query($conn,$sql);
       $row=mysqli_fetch_assoc($res);
       if ($row['status']=="load")
       {?>
        <label style="padding-left: 60px; font-weight: bold; font-size: 20;"> ROUTE : &nbsp;<?PHP ECHO $row['routeid'];?> </label>
        <hr>
        <label style="padding-left: 60px; font-weight: bold; font-size: 20;"> DRIVER : &nbsp;<?PHP ECHO $row['driver'];?> </label><hr>
        <label style="padding-left: 60px; font-weight: bold; font-size: 20;"> MINERIAL : &nbsp;<?PHP ECHO $row['miner'];?> </label>
        <HR>
        <label style="padding-left: 60px; font-weight: bold; font-size: 20;"> LOADING TIME : &nbsp;<?PHP ECHO $row['loadtime'];?> </label> <hr>
        <label style="padding-left: 60px; font-weight: bold; font-size: 20;"> LOAD-CARRYING : &nbsp;<?PHP ECHO $row['loadcap'];?> </label><hr>
        <form method="POST" action="target.php">
        <input type="hidden" name="lul" value="unload">
        <input type="hidden" name="dev" value="<?php echo $dev;?>">
        <button type="submit" name="inup" href ="target.php">UNLOAD</button><BR><BR>
        </form>
       <?php

       }
       elseif ($row['status']=="unload") {
           ?>        <form method="POST" action="target.php">

            <label style="padding-left: 60px; font-weight: bold; font-size: 20; ">ROUTE : &nbsp;</label>
            <select name ="rselect" style=" width: 50%; height: 5%; text-align: center;" required>
                <?php 
                $sql="select routeid from client_route where username='$username'";
                $res=mysqli_query($conn,$sql);
                while($route=mysqli_fetch_assoc($res))
                {?>
                    <option value="<?php echo $route['routeid']; ?>"><?php echo $route['routeid']; ?></option>

                <?php }

                ?>
            </select><hr>

            <label style="padding-left: 60px; font-weight: bold; font-size: 20; ">DRIVER :&nbsp;</label>
            <select name ="driver" style=" width: 50%; height: 5%; text-align: center;" required>
                <?php 
                $sql="select d_username from client_driver where c_username='$username' ";
                $res=mysqli_query($conn,$sql);
                while($route=mysqli_fetch_assoc($res))
                {?>
                    <option value="<?php echo $route['d_username']; ?>"><?php echo $route['d_username']; ?></option>

                <?php }

                ?>
            </select><hr>

            <label style="padding-left: 60px; font-weight: bold; font-size: 20; ">MINERAL : &nbsp;</label>
            <input type="TEXT" name="MIN" placeholder="MINERAL CARING IN TRUCK" style="width: 50%; text-align: center;" required><hr>
            <label style="padding-left: 60px; font-weight: bold; font-size: 20; ">LOAD-CARRYING : &nbsp;</label>
            <input type="number" name="loadcap" placeholder="(kg)" style="text-align: center;height: 5%; width: 50%;" required><hr>
<input type="hidden" name="lul" value="load">
        <input type="hidden" name="dev" value="<?php echo $dev;?>"><br>
        <button type="submit" name="inup" href ="target.php" >LOAD</button><BR><BR>
        
        </form>

           <?php
       }

       ?>
      
      </div>
      
</body>
</html>
<?php }
else {
    header("Location: index.php",TRUE,301);
}
?>
