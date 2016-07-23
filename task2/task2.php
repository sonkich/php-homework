<?php


   if(!empty($_POST)){

      $erors =[];
      // stage 1 checking for any data
      if(!empty($_POST['name'])) {
         $name = $_POST['name'];
      }else{
         $erors[] = "You must enter a name.";
      }

      if(!empty($_POST['password1'])) {
         $password1 = $_POST['password1'];
      }else{
         $erors[] = "You must enter a password.";
      }

      if(!empty($_POST['password2'])) {
         $password2 = $_POST['password2'];
      }else{
         $erors[] = "You must repeat the password.";
      }




      // stage 2 checking passwords
      if(empty($erors)){
         if($password1 != $password2){
            $erors[] = "Passwords dont match.";
         }
      }



      // stage 3 checking for correct data



      if(empty($erors)){
         if (!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",
          $password1 )){
            $erors[]= "Your password is not strong enough( 6-20 chars ,1 uppercase , 1 lowercase and 1 number)";
         }

         if (strlen($name) < 4){
            $erors[] = "Name must be minimum 4 chars";
         }
      }



      if(empty($erors)){
         $pwd = md5($password1);
      }
   }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style media="screen">
      #login {
         width: 300px;
         margin: 0 auto;

      }

      label {
         display: block;
         margin-bottom: 5px;
      }

      input[type="submit"] {
         margin-top: 20px;
         display: block;
      }

      p {
         color : red;
      }
   </style>
</head>
<body>
   <form id="login" action="task2.php" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name">
      <label for="password1">Password</label>
      <input type="password" name="password1" id="password1">
      <label for="password2">Repeat password</label>
      <input type="password" name="password2" id="password2">
      <input type="submit" value="login">

      <?php if(empty($erors) && !empty($_POST)): ?>
         <p>
            <?= "Name : ".$name?>
         </p>
         <p>
            <?= "Password : ".$pwd?>
         </p>
      <?php elseif (!empty($_POST)): ?>
         <?php foreach ($erors as  $e) :?>
            <p><?= $e?></p>
         <?php endforeach; ?>
      <?php endif; ?>
   </form>
</body>
</html>
