<?php
include  'connect.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table table-striped">
    <thead class="thead-dark">
      <tr> 
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email </th>
        <th scope="col">Phone</th>
        <th scope="col">Gender</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>' ;
    $sql="Select * from `crud`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $surname=$row['surname'];
        $email=$row['mail'];
        $phone=$row['number'];
        $gender=$row['gender'];
        $table.='<tr>
        <td scope="row">'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$surname.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>'.$gender.'</td>
        <td>
        <button class="btn btn-primary" onclick="GetDetails('.$id.')">Edit</button>
        <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>  
        </td>
       </tr>';
    }
    $table.='</table>';
    echo $table;

    }
        



?>
