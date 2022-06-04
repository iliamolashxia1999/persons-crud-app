<?php
include 'connect.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];
    $sql="Select * from `crud` where id=$user_id";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);

}else{
    $response['status']=200;
    $response['message']="data not found";
}
 if(isset($_POST['hiddendata'])){
     $uniqueid=$_POST['hiddendata'];
     $name=$_POST['updatename'];
     $surname=$_POST['updatesurname'];
     $mail=$_POST['updatemail'];
     $number=$_POST['updatemobile'];
     $gender=$_POST['updategender'];
 
   $sql="update `crud` set name='$name',surname='$surname',mail='$mail',number='$number',gender='$gender' where id=$uniqueid";

   $result=mysqli_query($con,$sql);


 }


?>
