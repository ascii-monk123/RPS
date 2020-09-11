<?php
 //parsing the url
 if(isset($_GET['name'])){
     $dataSet=false;
     if(empty($_GET['name'])){
         header("Location:error.php");
     }
     if(isset($_POST['userInput'])) {
         $dataSet=true;
         $result = false;
         $color="red";
         function whoWins($person, $computer)
         {
             $scores = array("Rock" => 1, "Paper" => 2, "Scissor" => 3);
             $expression=(3-($scores[$computer]-$scores[$person]))%4;
             global $color;
             if ($scores[$computer] - $scores[$person] === 0) {
                  $color="#ffa801";
                 return "Yikes !!! That's a draw";
             }
             elseif ($expression===0 || $expression===1){
                 $color="#f53b57";
                 return 'You Loose !';
             }
             else{
                 $color="#05c46b";
                 return 'You Win !';
             }



         }

         $numb = array('Rock', 'Paper', 'Scissor');
         $computer = rand(0, 2);
         $player = ($_POST['userInput']);
         $computerChoice = $numb[$computer];
         $result = whoWins($computerChoice, $player);
         $personPic="img/".lcfirst($player).'.png';
         $computerPic="img/".lcfirst($computerChoice).'.png';
     }


 }
 else{
     header("Location:error.php");
 }


?>
<!---------------------------------------------------------------------------------------------->
<!--Main html section starts here-->
<!DOCTYPE  html>
<html lang="en">
<head>
    <title>Rock Paper Scissor Game</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="./css/game.css" />
</head>
<body>
<h1>
    Rock Paper Scissors
</h1>
<p>Welcome <?= $_GET['name']?></p>
<form method="post">
    <select name="userInput">
     <option value="Rock" selected>Rock</option>
      <option value="Paper">Paper</option>
       <option value="Scissor">Scissors</option>
    </select>
    <input type="submit"/>

</form>
<h1 class="status__text" style="color:<?= isset($_POST['userInput'])? $color:'red' ?>"><?= isset($_POST['userInput'])? $result:false ?></h1>
<div class="grid">
    <div class="col">
        <?= $dataSet? "<img src='$personPic' alt='not available'/>":false ?>
       <?= $dataSet? '<p class="human"> You choosed '.$player.'</p>' :false ?>
    </div>
    <div class="col">
        <?= $dataSet? "<img src='$computerPic' alt='not available'/>":false ?>
        <?= $dataSet? '<p class="computer"> Computer choosed '.$computerChoice.'</p>' :false ?>
    </div>

</div>
</body>
</html>
