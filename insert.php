<?php
include 'connect.php';

extract($_POST);

$errorEmpty = false;
$errorEmail = false;

if(isset($_POST['nameSend']) && isset($_POST['surnameSend']) 
&& isset($_POST['emailSend']) && isset($_POST['mobileSend']) && isset($_POST['genderSend'])){
    
    

    if(empty($nameSend) || empty($surnameSend) || empty($emailSend) || empty($mobileSend) ){
        echo"<span class='form-error'>Fill in all fields!</span>";
        $errorEmpty = true;
    }
    elseif (!filter_var($emailSend,FILTER_VALIDATE_EMAIL)){
         echo"<span class='form-error'>E-mail adress is not valid</span>";

    }
    else{
        $sql="insert into `crud` (name,surname,mail,number,gender) values ('$nameSend','$surnameSend','$emailSend','$mobileSend','$genderSend')";
    

    
    }


    
    $result=mysqli_query($con,$sql);
   

}
    




?>
<script>
    var errorEmpty = "<?php echo $errorEmpty ; ?>";
    var errorEmail = "<?php echo $errorEmail ; ?>";
    if(errorEmpty == true){
        $("#completename, #completesurname, #completemail, #completemobile").addClass("is-invalid");


    }

 $('#completeModal').modal("hide");


</script>
