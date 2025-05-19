<html>
<body>
  
  <?php
  include("connection.php");
  $lul= $_POST['lul'];
$truck=$_POST['dev'];
  $sql="select CONVERT_TZ(CURRENT_TIMESTAMP,'+00:00','+12:30');";
$result =mysqli_query($conn,$sql);
$daterows= mysqli_fetch_array($result);
print_r($daterows);

  if ($lul=="load"){
  $route= $_POST['rselect'];
  $lc= $_POST['loadcap'];
  $min =$_POST['MIN'];
  $driv=$_POST['driver'];
 $query="insert into truck_load values (null,'$truck','$lul','$route','$lc','$daterows[0]',null,'$min','$driv')";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {

      echo "<br>inserted ";
      header("Location: devices.php", TRUE, 301); 
    }
    else 
    {
      echo "<br>not inserted";
    }
}
  elseif ($lul=="unload") {
    $sql="select max(id) from truck_load where truck_no='$truck'";
    $result=mysqli_query($conn,$sql);
    $rows =mysqli_fetch_array($result);



  $query1 ="update truck_load set status='unload' , unloadtime='$daterows[0]'  where id='$rows[0]'";
     $query_run1 = mysqli_query($conn,$query1);
    if($query_run1)
    {
      echo "<br>"."updated ";
      header("Location: devices.php", TRUE, 301); 
    }
    else 
    {
      echo "not updated";
    }
    
  }
  
  
    
   
  
 
  ?>
  </body>
</html>