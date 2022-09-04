<?php

session_start();

// variables set up
$score = $_SESSION['score'];
$attempts = $_SESSION['attempts'];
$currentTime = date("Y-m-d H:i:s");

// first time

if($attempts==0)
{
    if(isset($_POST['submit']))
    {
    $duration=$_POST['duration'];
    $_SESSION['duration']=$duration;
    $timeLeft=($duration*60);
    $user=$_POST['user']; 
    $_SESSION['user'] = $user; 
    $actualAnswer = 0 ;
    $answerGiven = 1 ;
    $startTime=date("Y-m-d H:i:s");
    $_SESSION['startTime']=$startTime;

    //set endTime based on duration of quiz
    if ($duration==3)
    {$endTime=date('Y-m-d H:i:s',strtotime('+3 minutes',strtotime($startTime)));}
    elseif ($duration==5)
    {$endTime=date('Y-m-d H:i:s',strtotime('+5 minutes',strtotime($startTime)));}
    else
    {$endTime=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($startTime)));}

    $_SESSION['endTime']=$endTime;
 //   print($startTime."<br /><br />".$endTime."<br /><br />");
    //$currentTime=
    }
}
else
{
    if(isset($_POST['submit']))
    {
    $user = $_SESSION['user']; 
    $duration = $_SESSION['duration'];
    $answerGiven = $_POST['answerGiven'];
    $actualAnswer = $_SESSION['actualAnswer'];
//  print($answerGiven."<br /><br />".$actualAnswer."<br /><br />");
    if ($answerGiven == $actualAnswer)
    {
    $score++;
//  print($score."<br /><br />");
    }
//  calculate time left
    $endTime=$_SESSION['endTime'];
    $timeLeft=strtotime($endTime)-strtotime($currentTime);
//    $timeActualLeft=
//    print($timeLeft."<br /><br />".$endTime."<br /><br />".$currentTime."<br /><br />".date("Y-m-d H:i:s", $timeLeft)."<br /><br />");
    }
}


//  closing the game if time is over!
if($timeLeft<0)
{
    print ($user.", that completes your quiz.<br />Hope you enjoyed it!<br /><br /><br />");
    print ("Your final scores are as below:<br /><br />");
    print ("Your Score : ".$score."<br /><br />");
    print ("Your Attempts : ".$attempts. "<br /><br />");
    $scorePerMinute=$score/$duration;
    $percentCorrect=$score*100/$attempts;
    print ("Your Correct Answers Per Minute : ".round($scorePerMinute,1). "<br /><br />");
    print ("Your Score Percentage : ".round($percentCorrect,1). " % <br /><br />");
    if ($scorePerMinute>8 && $percentCorrect>92)
    {print("You Are Brilliant! <br /><br />");}
    elseif ($scorePerMinute>6)
    {print("You Are Good! <br /><br />");}
    echo "<br /><br /> <a href='index.php'> Play again </a>";
}
else
{
// updating user
print (" Welcome ".$user." !<br /><br /><br />");
print ("Time Left : ".$timeLeft." seconds!<br /><br />");
print ("Your Score : ".$score."<br /><br />");
print ("Your Attempts : ".$attempts. "<br /><br /><br />");
print ("Question : ");


// math sum set up

$operator = rand (0,3) ;
$x = 0 ;
$y = 0 ;
$z = 0 ;

if ($operator==0)
{
    $x = rand ( 1, 99);
    $y = rand ( 1, 99);
    print ($x . " + " . $y. " = <br /><br />");
    $z = $x + $y;
}
elseif ($operator==1)
{
    $x = rand ( 1, 99);
    $y = rand ( 1, 99);
    print ($x . " - " . $y. " = <br /><br />");
    $z = $x - $y;
}
elseif ($operator==2)
{
    $x = rand (2, 9);
    $y = rand (2, 9);
    print ($x . " * " . $y. " = <br /><br />");
    $z = $x * $y;
}
elseif ($operator==3)
{
    $y = rand ( 2, 9);
    $z = rand ( 2, 9);
    $x = $y * $z;
    print ($x . " / " . $y. " = <br /><br />");
}

// setting up session variables

$_SESSION['actualAnswer']=$z;
$attempts++;
$_SESSION['attempts']=$attempts;
$_SESSION['score']=$score;
// user answers the question

echo "<form method='POST' action = 'math.php'>
Your Answer: <input type='number' name='answerGiven'><br /><br />
<input type='submit' name='submit'>
</form>";
}
?>