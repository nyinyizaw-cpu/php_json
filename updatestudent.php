<?php 
 $id= $_POST['edit_id'];
 $name= $_POST['edit_name'];
 $email= $_POST['edit_email'];
 $address=$_POST['edit_address'];
 $gender= $_POST['edit_gender'];
  $fullpath= $_POST['old_path'];
  $profile= $_FILES['edit_profile'];

  if($profile['size']>0){
  	$basepath="photo/";
  	$fullpath=$$basepath.$profile["name"];
  	move_uploaded_file($profile['tmp_name'], $fullpath);
  }
  $student=[
  	"name"=>$name,
  	"email"=>$email,
  	"gender"=>$gender,
  	"address"=>$address,
  	"profile"=>$fullpath
  ];

   $stuJson=file_get_contents("student.json");
   if(stuJson){
   	$resonpse=json_decode($stuJson,true);
   	$resonpse[id]=$student;
   	$jsonStr=json_encode($resonpse,JSON_PRETTY_PRINT);
   	file_put_contents("student.json", $jsonStr);
   	header("location:index.php");
   }

 ?>