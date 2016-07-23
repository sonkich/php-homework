<?php


   $check = false;
   $erors = [];
   $calc;
   if(!empty($_POST)){
      $a =(isset($_POST['first-number']))? $_POST['first-number'] : '';
      $b = $_POST['second-number'];
      $char = $_POST['char'];

      if(is_numeric($a)&&is_numeric($b)){
         if($char == "/" && $b == 0){
            $erors[] = "You cant devide by zero";
         }else{
            switch($char){
               case "/":
                  $calc = $a / $b;
                  break;
               case "*":
                  $calc = $a * $b;
                  break;
               case "-":
                  $calc = $a - $b;
                  break;
               case "+":
                  $calc = $a + $b;
                  break;
            }

            $check = true;
         }
      }else{
         $erors[] = "Enter  numbers only";
      }
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Calculation</title>
      <link rel="stylesheet" href="style.css" type= "text/css">
   </head>
   <body>

      <form  action="task1.php" method="post">
         <input type="text" name="first-number" id="first-number">
         <select class="char" name="char">
            <option value="/">/</option>
            <option value="*">*</option>
            <option value="+">+</option>
            <option value="-">-</option>
         </select>
         <input type="text" name="second-number" id="second-number">
         <input type="submit" value="Calculate">
      </form>
      <?php if($check): ?>
         <p>
            <?= $a ." ". $char." " . $b." " . "=" . $calc?>
         </p>
      <?php else: ?>
         <?php foreach ($erors as  $e) :?>
            <p><?= $e?></p>
         <?php endforeach; ?>
      <?php endif; ?>
   </body>
</html>
