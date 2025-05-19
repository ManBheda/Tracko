
<?php
$db_host="p3nlmysql11plsk.secureserver.net:3306";
$db_user="forestfiresystem";
$db_password="Fsystem123*";
$db_name="forestfiresystem";

$lat=$_GET['lat'];
$lng=$_GET['lng'];
$truck1=$_GET['truckid'];
if($lat=='0.0000'&& $lng=='0.0000'){
    exit("Invalid Data");
}
else{
echo $lat.$lng.$truck1;

$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$conn){
    die("Connection Failed<br>");
}
echo("Connection success<br>");
$sql = "select routeid from truck_load where  id =(select max(id) from truck_load where truck_no ='$truck1') ";
$result =mysqli_query($conn,$sql);
$res=mysqli_fetch_array($result);
echo $res[0]."<br>";



$sql = "SELECT * FROM routes WHERE lat=$lat AND lng=$lng and routeid ='$res[0]'";
$result= mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
echo("$row<br>");

$sql="select CONVERT_TZ(CURRENT_TIMESTAMP,'+00:00','+12:30');";
$result =mysqli_query($conn,$sql);
$daterows= mysqli_fetch_array($result);
$dt =$daterows[0];

if($row>=1)
{
    $msg1="On Route";
    echo("$msg1<br>");
    $sql1 = "INSERT INTO live(truckid,lat,lng,msg,date_time) VALUES('$truck1','$lat','$lng','$msg1','$daterows[0]') ";
    $result1= mysqli_query($conn,$sql1);
    echo("$result1");
}
else{
    
    $msg2="Off Route";
    echo("$msg2<br>");
    $sql = "INSERT INTO live(truckid,lat,lng,msg,date_time) VALUES('$truck1','$lat','$lng','$msg2','$daterows[0]') ";
    $result2= mysqli_query($conn,$sql);
    echo("$result2");
    //header("Location: mail.php?lat=$lat&lng=$lng&truck1=$truck1&gt=$dt", TRUE, 301);
}
}

?>
<?php
if($msg1=='On Route'){
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();       
    $mail->SMTPDebug = 2;                                    
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'trackotechahm@gmail.com';                    
    $mail->Password   = 'cxvhydnmnomtyoiw';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

  
    $mail->setFrom('trackotechahm@gmail.com', 'Tracko-Track the changes');

    $mail->addAddress('rdtheboss2005@gmail.com');             


    $mail->isHTML(true);                                 
    $mail->Subject = $truck1."   has gone off route";
    $mail->Body    = $truck1." has gone off route on ".$daterows[0]."<br>"."Device=".$truck1."<br>"."<b>Tracking link:-</b><br>"."https://www.google.com/maps/search/?api=1&query=".$lat.",".$lng;
    $mail->AltBody =''; 

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
?>