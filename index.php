<?php
 //checking if the name value is set
 $error=false;
if(isset($_POST['name'])){
    if(empty($_POST['name'])){
        $error=true;
    }
    else{
        $name=$_POST['name'];
        header("Location:game.php?name=$name");
    }
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rock Paper Scissors</title>
    <link rel="stylesheet" href="./css/index.css" />
    <meta name="viewport" content="width=device-width"/>
</head>
<body>

    <h1>Welcome to the game</h1>
    <p><i>Please Enter your name in the field below :</i></p>
    <?= $error===true?"<p class='error'>Please enter the name</p>":false
    ?>
     <form method="post">
         <input type="text" name="name" placeholder="Enter your name" autocomplete="off" value="<?= isset($_POST['name'])and !empty($_POST['name'])?$_POST['name'] :false ?>"/>
         <input type="submit">
     </form>




</body>
</html>

