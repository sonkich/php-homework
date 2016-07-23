<?php

   if(!empty($_POST)){

      $arr = $_POST["numbers"];
      $eror;
      $arr = explode( ",",$arr );

      if(empty($arr)){
         $eror = "Enter value.";
      }

      if(count($arr) != 10){
         $eror = "Enter 10 numbers.";
      }

      foreach ($arr as $key => $value) {
         if(!is_numeric($value)){
            $eror = "Enter numbers only!";
            break;
         }
      }

      if(!isset($eror)){
         sort($arr);

         $min = $arr[0];
         $max = $arr[count($arr)-1];

         $arr = implode(",",$arr);
      }
   };

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style media="screen">
      #box {
         width: 300px;
         padding: 20px;
         border: 5px dashed orange;
         margin: 0 auto;
         display: flex;
         flex-direction: column;
      }

      label{
         align-self: center;

      }
      p {
         align-self: center;
      }

      input[type=text] ,input[type=submit]{
         display: block;
         margin-top: 10px;
      }


   </style>
</head>
<body>
   <form action="task4.php" method="post">
      <div id="box">
         <label for="numbers">Enter ten number devided by ",":</label>
         <input type="text" name="numbers" id="numbers">
         <input type="submit" value="Sort!">
         <?php if(!empty($_POST)): ?>
            <?php if(isset($eror)): ?>
               <p>
                  <?= $eror ?>
               </p>
            <?php else: ?>
               <p>Min number: <?=  $min?></p>
               <p>Max number: <?=  $max?></p>
               <p>Numbers :<?=  $arr?></p>
            <?php endif; ?>
         <?php endif; ?>
      </div>
   </form>
</body>
</html>
