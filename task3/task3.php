<?php

 $eror;
 $result;
   if(!empty($_POST)){
      if(!empty($_POST["number"])){
         $number = $_POST["number"];

         if(!is_numeric($number)){
            $eror = "You must enter a number.";
         }else{
            $type = $_POST["type"];
            if($type == "c"){
               $result = ($number*9/5) + 32 ;
            }else{
               $result = ($number  -  32)  *  5/9 ;
            }
         }
      }else{
         $eror = "Enter value.";
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

      input {
         display: block;
         margin-bottom: 10px;
      }

      select {
         display: block;
         margin-bottom: 10px;
      }

      form {
         width: 200px;
         margin: 0 auto;
         text-align: center;
         border: 2px dashed blue;
         padding: 20px;

      }
      label {
         margin-bottom: 10px;
         display: block;
      }

      p {
         border: 1px solid grey;
         color: blue;
         text-align: center;
      }
   </style>
</head>
<body>
   <form  action="task3.php" method="post">
      <label for="number">Enter your number:</label>
      <input type="text" name="number" id="number">
      <select  name="type">
         <option value="c">From C to F</option>
         <option value="f">From F to C</option>
      </select>
      <input type="submit" value="calculate">
      <?php if(isset($eror) && !empty($_POST)): ?>
         <p style="color:red">
            <?= $eror ?>
         </p>
      <?php elseif(!empty($_POST)):?>
         <p>
            <?= $result ?>
         </p>
      <?php endif; ?>
   </form>
</body>
</html>
