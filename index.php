<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>persons crud</title>
    <!--bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   


</head>
<body>

  <div class="container my-3" >
   <h1 class="text-center">persons crud</h1>
       <!-- Button trigger modal -->
<button type="button" class="btn btn-success m-5" data-bs-toggle="modal" data-bs-target="#completeModal">
  Add new
</button>
<div id="displayDataTable"> </div>

    </div>

<!-- add Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add person</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


    <form  method="post"  enctype="multipart/form-data">
  

  <div class="mb-3">
    <label for="completename">name</label>
    <input type="text" name="name" class="form-control" id="completename" placeholder="Enter your name"  >
    <div class="span"></div>
  </div>
  <div class="mb-3">
    <label for="completesurname">surname</label>
    <input type="text" name="surname" class="form-control" id="completesurname" placeholder="Enter your surname" > 
    <div class="span"></div>
  </div>
  <div class="mb-3">
    <label for="completemail">email</label>
    <input type="email" name="email" class="form-control" id="completemail" placeholder="Enter your Email" >
    <div class="span"></div>
  </div>
  <div class="mb-3">
    <label for="completemobile">phone number</label>
    <input type="text" name="mobile" class="form-control" id="completemobile" placeholder="Enter your phone number" >
    <div class="span"></div>
  </div>
  <div class="form-check">
  <label  for="" id="completegender">  </label>
  <input  type="radio" name="gender"  value="male">male
  <input  type="radio" name="gender" value="female"> female
  </label>
 </div>
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  onclick="adduser()">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">update person information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


    <form  method="post"  enctype="multipart/form-data">
  

  <div class="mb-3">
    <label for="updatename">name</label>
    <input type="text" name="updatename" class="form-control" id="updatename" placeholder="Enter your name"  >
  </div>
  <div class="mb-3">
    <label for="updatesurname">surname</label>
    <input type="text" name="updatesurname" class="form-control" id="updatesurname" placeholder="Enter your surname" > 
  </div>
  <div class="mb-3">
    <label for="updatemail">email</label>
    <input type="email" name="updatemail" class="form-control" id="updatemail" placeholder="Enter your Email" >
  </div>
  <div class="mb-3">
    <label for="updatemobile">phone number</label>
    <input type="text" name="updatemobile" class="form-control" id="updatemobile" placeholder="Enter your phone number" >
  </div>
  <div class="form-check">
  <label  for="" id="updategender">  </label>
  <input  type="radio" name="updategender" id="gendermale" value="male" >male
  <input  type="radio" name="updategender" id="genderfemale" value="female" >female
  </label>
 </div>
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddendata">
        <button type="button" class="btn btn-primary" onclick="updateDetails()">Update</button>
      </div>
    </div>
  </div>
</div>

<!--bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!--jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--ajax script -->

<script>
        $(document).ready(function(){
            displayData();
        });
        function displayData(){
            var displayData="true";
            $.ajax({
                url:"display.php",
                type:'post',
                data:{
                    displaySend:displayData
                },
                success:function(data,status){
                    $('#displayDataTable').html(data);
                }


            });
        }




        function adduser(){
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var reg2 = /^(\+995)?[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
            var nameAdd=$('#completename').val();
            var surnameAdd=$('#completesurname').val();
            var emailAdd=$('#completemail').val();
            var mobileAdd=$('#completemobile').val();
            var genderAdd=$('input[name=gender]:checked').val();



            //add user validation
            if(nameAdd.trim() === '') {
            $("#completename").addClass("is-invalid");
            document.getElementsByName('name')[0].placeholder='name field is empty';
            }if(surnameAdd.trim() === ''){
            $("#completesurname").addClass("is-invalid");
            document.getElementsByName('surname')[0].placeholder='surname field is empty';
            } if(emailAdd.trim() === ''){
            $("#completemail").addClass("is-invalid");
            document.getElementsByName('email')[0].placeholder='email field is empty';
            } if(mobileAdd.trim() === ''){
            $("#completemobile").addClass("is-invalid");
            document.getElementsByName('mobile')[0].placeholder='phone number field is empty';
            } 
            
            if(nameAdd.trim() !== '') {
                $("#completename").removeClass("is-invalid"); 
                $("#completename").addClass("is-valid");
            }if(surnameAdd.trim() !== ''){
                $("#completesurname").removeClass("is-invalid"); 
                $("#completesurname").addClass("is-valid");
            } if(emailAdd.trim() !== '' && reg.test(emailAdd)){
                $("#completemail").removeClass("is-invalid"); 
                $("#completemail").addClass("is-valid");
            } if(mobileAdd.trim() !== '' && reg2.test(mobileAdd)){
                $("#completemobile").removeClass("is-invalid");    
                $("#completemobile").addClass("is-valid");
            }
              if(emailAdd.trim() != '' && !reg.test(emailAdd)){
              $("#completemail").addClass("is-invalid");
              document.getElementsByName('email')[0].placeholder='email field is empty';
              $('#completemail').focus();
            }
              if(mobileAdd.trim() != '' && !reg2.test(mobileAdd)){
              $("#completemobile").addClass("is-invalid");
              document.getElementsByName('mobile')[0].placeholder='email field is empty';
              $('#completemobile').focus();
            }
    
    
    if( nameAdd.trim() !== '' && surnameAdd.trim() !== '' && emailAdd.trim() !== '' && reg.test(emailAdd) && mobileAdd.trim() !== '' && reg2.test(mobileAdd)){
             //ajax insert.php
            $.ajax({
                url:"insert.php",
                type:'post',
                data:{
                    nameSend:nameAdd,
                    surnameSend:surnameAdd,
                    emailSend:emailAdd,
                    mobileSend:mobileAdd,
                    genderSend:genderAdd,
                },
                success: function(data,status){
                  displayData();
                  $("#completename").removeClass("is-valid"); 
                  $("#completesurname").removeClass("is-valid"); 
                  $("#completemail").removeClass("is-valid"); 
                  $("#completemobile").removeClass("is-valid"); 

                       $('input').val('');
                       

                    }
                
               
             }); 
            }
          
      }
         
    
    //delite ajax function
    function DeleteUser(deleteid){
        $.ajax({
            url:"delete.php",
            type:'post',
            data:{
                deletesend:deleteid
            },
            success:function(data,status){
                displayData();
            }
         });
      }
    //get details for update modal input
    function GetDetails(updateid){
        $('#hiddendata').val(updateid);
        $.post("update.php",{updateid:updateid},function(data,status){
            var userid=JSON.parse(data);
            $('#updatename').val(userid.name);
            $('#updatesurname').val(userid.surname);
            $('#updatemail').val(userid.mail);
            $('#updatemobile').val(userid.number);
            $('#updategender').val(userid.gender);
            if(userid.gender === "male")
            {
              document.getElementById("gendermale").checked = true;
            }
            if(userid.gender === "female")
            {
              document.getElementById("genderfemale").checked = true;
            }
        });
        $('#updateModal').modal("show");
    }
    //update details and sendig variables to update.php by ajax
    function updateDetails(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var reg2 = /^(\+995)?[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
        var updatename=$('#updatename').val();
        var updatesurname=$('#updatesurname').val();
        var updatemail=$('#updatemail').val();
        var updatemobile=$('#updatemobile').val();
        var updategender=$('input[name=updategender]:checked').val();
        var hiddendata=$('#hiddendata').val();

        //update modal validation
        if(updatename.trim() === '') {
            $("#updatename").addClass("is-invalid");
            document.getElementsByName('name')[0].placeholder='name field is empty';
            }if(updatesurname.trim() === ''){
            $("#updatesurname").addClass("is-invalid");
            document.getElementsByName('surname')[0].placeholder='surname field is empty';
            } if(updatemail.trim() === ''){
            $("#updatemail").addClass("is-invalid");
            document.getElementsByName('email')[0].placeholder='email field is empty';
            } if(updatemobile.trim() === ''){
            $("#updatemobile").addClass("is-invalid");
            document.getElementsByName('mobile')[0].placeholder='phone number field is empty';
            } 
            
            if(updatename.trim() !== '') {
                $("#updatename").removeClass("is-invalid"); 
                $("#updatename").addClass("is-valid");       
            }if(updatesurname.trim() !== ''){
                $("#updatesurname").removeClass("is-invalid"); 
                $("#updatesurname").addClass("is-valid");
            } if(updatemail.trim() !== '' && reg.test(updatemail)){
                $("#updatemail").removeClass("is-invalid"); 
                $("#updatemail").addClass("is-valid");
            } if(updatemobile.trim() !== '' && reg2.test(updatemobile)){
                $("#updatemobile").removeClass("is-invalid");    
                $("#updatemobile").addClass("is-valid");
            } 
            if(updatemail.trim() != '' && !reg.test(updatemail)){
                $("#updatemail").addClass("is-invalid");
                document.getElementsByName('email')[0].placeholder='email field is empty';
                $('#updatemail').focus();
                }
            if(updatemobile.trim() != '' && !reg2.test(updatemobile)){
                $("#updatemobile").addClass("is-invalid");
                document.getElementsByName('mobile')[0].placeholder='email field is empty';
                $('#updatemobile').focus();
                }
            if( updatename.trim() !== '' && updatesurname.trim() !== '' && updatemail.trim() !== '' && reg.test(updatemail) && updatemobile.trim() !== '' && reg2.test(updatemobile)){
         
        //ajax delite.php
        $.post("update.php",{
            updatename:updatename,
            updatesurname:updatesurname,
            updatemail:updatemail,
            updatemobile:updatemobile,
            updategender:updategender,
            hiddendata:hiddendata
        },function(data,status){
            displayData();
        });
        $("#updatename").removeClass("is-valid"); 
        $("#updatesurname").removeClass("is-valid"); 
        $("#updatemail").removeClass("is-valid"); 
        $("#updatemobile").removeClass("is-valid"); 
        $('#updateModal').modal("hide");
        $('#updateModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');

        })
      }
    };
    </script>

 </body>
</html>
